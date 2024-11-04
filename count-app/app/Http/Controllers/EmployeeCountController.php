<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Program;
use App\Models\Designation;
use App\Models\Level;
use App\Models\District;
use Illuminate\Http\Request;

class EmployeeCountController extends Controller
{
    public function showCountForm()
    {
        $levels = Level::all();
        $districts = District::all();
        $programs = Program::all();
        $designations = Designation::all();

        return view('employee_counts', compact('levels', 'districts', 'programs', 'designations'));
    }

    public function countEmployees(Request $request)
    {
        $groupBy = $request->query('group_by');
        $levelId = $request->query('level_id');
        $districtId = $request->query('district_id');
        $programId = $request->query('program_id');
        $designationId = $request->query('designation_id');

        $allowedGroupings = [
            'districts' => 'district_code',
            'designations' => 'designation_id',
            'programs' => 'program_id',
            'blocks' => 'block_id',
            'gram_panchayats' => 'gram_panchayat_id',
            'levels' => 'level_id'
        ];

        if (!$groupBy) {
            $totalEmployeeCount = Employee::count();
            return response()->json(['total_employee_count' => $totalEmployeeCount]);
        }

        if (!array_key_exists($groupBy, $allowedGroupings)) {
            return response()->json(['error' => 'Invalid group_by parameter'], 400);
        }

        $query = Employee::query();

        if ($levelId) {
            $query->where('level_id', $levelId);
        }

        if ($districtId) {
            $query->where('district_code', $districtId);
        }

        if ($programId) {
            $query->where('program_id', $programId);
        }

        if ($designationId) {
            $query->where('designation_id', $designationId);
        }

        $groupColumn = $allowedGroupings[$groupBy];
        $employeeCounts = $query->select($groupColumn)
            ->selectRaw('COUNT(*) as employee_count')
            ->groupBy($groupColumn)
            ->get();

        return view('employee_counts', [
            'levels' => Level::all(),
            'districts' => District::all(),
            'programs' => Program::all(),
            'designations' => Designation::all(),
            'results' => $employeeCounts,
            'group_by' => $groupBy,
        ]);
    }
}






<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeCountController extends Controller
{
    public function countEmployees(Request $request)
    {
        // Initialize the query
        $query = Employee::query();

        // Only consider employees with status 1 or 5
        $query->whereIn('status', [1, 5]);

        // If a district code is provided, filter by district
        if ($request->has('district_code')) {
            $query->where('district_code', $request->input('district_code'));
        }

        // If a block ID is provided, filter by block
        if ($request->has('block_id')) {
            $query->where('block_id', $request->input('block_id'));
        }

        // Join with programs table to get program names
        $query->join('programs', 'employees.program_id', '=', 'programs.program_id');

        // Select the program name and count of employees
        $counts = $query->select('programs.program_name', DB::raw('count(*) as count'))
                        ->groupBy('programs.program_name') // Group by program name
                        ->get();

        return response()->json($counts);
    }
}
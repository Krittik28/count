<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'employee_id',
        'level_id',
        'program_id',
        'employee_code',
        'district_code',
        'block_id',
        'gram_panchayat_id',
        'designation_id',
        'spouse_name',
        'name',
        'date_of_joining',
        'status',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'district_code');
    }

    public function gramPanchayat()
    {
        return $this->belongsTo(GramPanchayat::class, 'gram_panchayat_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}


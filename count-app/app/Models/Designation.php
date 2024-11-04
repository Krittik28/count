<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $table = 'designations';

    protected $fillable = [
        'designation_id',
        'level_id',
        'designation_name',
        'salary',
        'incremented_salary',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'designation_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}

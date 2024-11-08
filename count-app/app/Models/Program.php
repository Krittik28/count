<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'program_id',
        'program_name',
        'program_abbreviation',
        'administrative_expenditure',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class,'program_id');
    }


}


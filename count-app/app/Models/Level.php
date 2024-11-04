<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $fillable = [
        'level_id',
        'level',
        'level_name',
        'level_code',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'level_id');
    }

    public function designations()
    {
        return $this->hasMany(Designation::class, 'level_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = [
        'district_code',
        'district_name',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'district_code', 'district_code');
    }

    public function blocks()
    {
        return $this->hasMany(Block::class, 'district_id');
    }
}


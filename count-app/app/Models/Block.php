<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $table = 'blocks';

    protected $fillable = [
        'block_id',
        'district_id',
        'block_name',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'block_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function gramPanchayats()
    {
        return $this->hasMany(GramPanchayat::class, 'block_id');
    }
}


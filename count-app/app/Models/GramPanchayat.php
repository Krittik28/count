<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GramPanchayat extends Model
{
    use HasFactory;

    protected $table = 'gram_panchayats';

    protected $fillable = [
        'gram_panchayat_id',
        'block_id',
        'gram_panchayat_name',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'gram_panchayat_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id');
    }
}

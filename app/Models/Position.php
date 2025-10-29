<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /** @use HasFactory<\Database\Factories\PositionFactory> */
    use HasFactory;

    protected $fillable = ['nama_jabatan', 'gaji_pokok'];
}

// app/Models/Department.php
class Department extends Model
{
    protected $fillable = ['nama_departemen'];
}


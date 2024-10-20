<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;

    protected $table = 'buku_tamu';

    // Add fillable property to allow mass assignment
    protected $fillable = [
        'nama',       // Guest's name
        'no_hp',      // Guest's phone number
        'instansi',   // Institution/organization
        'bidang',     // Field/department
        'keperluan',  // Purpose of the visit
    ];
}

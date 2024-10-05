<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan oleh model ini
    protected $table = 'photos';

    // Mass assignment untuk kolom yang bisa diisi
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    /**
     * Atur akses penuh untuk model
     */
    public function getImageUrlAttribute()
    {
        // Mengembalikan URL gambar dengan path lengkap
        return asset('images/' . $this->image);
    }
}

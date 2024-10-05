<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAkademik extends Model
{
    use HasFactory;

    protected $table = 'laporan_akademik';

    // Relation to dataMurid
    public function murid()
    {
        return $this->belongsTo(dataMurid::class, 'id_murid', 'id');
    }

    // Relation to Semester
    public function semester()
    {
        return $this->belongsTo(DataSemester::class, 'id_semester', 'id');
    }

    // Relation to Tahun Ajaran
    public function tahunAjaran()
    {
        return $this->belongsTo(DataTahunAjaran::class, 'id_tahunajaran', 'id');
    }

    // Relation to Kelompok Belajar
    public function kelompokBelajar()
    {
        return $this->belongsTo(DataKelompokBelajar::class, 'id_kelompokbelajar', 'id');
    }
}

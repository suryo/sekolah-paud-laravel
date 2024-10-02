<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananBK extends Model
{
    protected $table = 'format_bk';

    protected $guarded = []; 

    public function daftar_siswa(){
        return $this->hasMany('App\Model\BKSiswa', 'bk_siswa_id');
    }

    public function ditanggapi_oleh(){
        return $this->belongsTo('App\Models\User','tanggapan_guru_id')->withDefault();
    }
    
    public function dibuat_oleh(){
        return $this->belongsTo('App\Models\User','dibuat_oleh_id')->withDefault();
    }
}

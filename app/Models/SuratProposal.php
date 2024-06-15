<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'judul_inovasi',
        'waktu_implementasi',
        'kelompok_inovasi',
        'kategori_inovasi',
        'target_sdgs',
        'video_inovasi',
        'sp_inovator',
        'sp_replikasi',
        'ringkasan',
        'adaptabilitas',
        'sumber_daya',
        'strategi_keberlanjutan',
        'ringkasan_khusus',
        'adaptabilitas_khusus',
        'sumber_daya_khusus',
        'strategi_keberlanjutan_khusus',
        'latar_belakang',
        'kebaruan',
        'implementasi_inovasi',
        'signifikansi',
        'deskripsi_awal',
        'pembaruan',
        'dampak',
        'penguatan',
        'strategi_penguatan',
        'status'
        ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

}

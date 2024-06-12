<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataForm extends Model
{
    use HasFactory;
    protected $table = 'data_forms';

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'kontak_darurat1',
        'hubungan1',
        'kontak_darurat2',
        'hubungan2',
        'upload_kk',
        'upload_ktp',
        'pendidikan',
        'jurusan',
        'tahun_lulus',
        'alamat_ktp',
        'no_rumah_ktp',
        'rt_ktp',
        'rw_ktp',
        'kelurahan_ktp',
        'kecamatan_ktp',
        'kota_ktp',
        'provinsi_ktp',
        'kode_pos_ktp',
        'alamat_domisili',
        'no_rumah_domisili',
        'rt_domisili',
        'rw_domisili',
        'kelurahan_domisili',
        'kecamatan_domisili',
        'kota_domisili',
        'provinsi_domisili',
        'kode_pos_domisili',
        'alamat_sesuai_ktp',
        'is_active',
        'no_dufan_card',
        'dufan_card',
    ];

    public function details()
    {
        return $this->hasMany(DetailKeluarga::class, 'form_id', 'id');
    }
}

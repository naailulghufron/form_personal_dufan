<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_forms', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('email')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('kontak_darurat1')->nullable();
            $table->string('hubungan1')->nullable();
            $table->string('kontak_darurat2')->nullable();
            $table->string('hubungan2')->nullable();
            $table->string('upload_kk')->nullable();
            $table->string('upload_ktp')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jurusan')->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->text('alamat_ktp')->nullable();
            $table->string('no_rumah_ktp')->nullable();
            $table->string('rt_ktp')->nullable();
            $table->string('rw_ktp')->nullable();
            $table->string('kelurahan_ktp')->nullable();
            $table->string('kecamatan_ktp')->nullable();
            $table->string('kota_ktp')->nullable();
            $table->string('provinsi_ktp')->nullable();
            $table->string('kode_pos_ktp')->nullable();
            $table->boolean('alamat_sesuai_ktp')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->string('no_rumah_domisili')->nullable();
            $table->string('rt_domisili')->nullable();
            $table->string('rw_domisili')->nullable();
            $table->string('kelurahan_domisili')->nullable();
            $table->string('kecamatan_domisili')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->string('provinsi_domisili')->nullable();
            $table->string('kode_pos_domisili')->nullable();
            $table->string('upload_domisili')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('no_dufan_card')->nullable();
            $table->text('dufan_card')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_form');
    }
};

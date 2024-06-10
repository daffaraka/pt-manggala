<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            //
            $table->string('nik', 100)->nullable();
            $table->string('desa', 100)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->string('kabupaten', 100)->nullable();
            $table->enum('penempatan', ['BAS', 'BP', 'SLR', 'GAM'])->nullable();
            $table->enum('poh', ['Palembang', 'Jakarta', 'Muara Enim', 'Lahat', 'Tangerang', 'Samarinda', 'Serpong'])->nullable();
            $table->enum('dpt', ['HCGA', 'PLANT', 'HSE', 'PRODUKSI', 'LOGISTIK', 'ENGINEERING',])->nullable();
            $table->enum('golongan', ['I', 'II', 'III', 'IV', 'V', 'VI'])->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->string('note_keluar')->nullable();
            $table->enum('status_aktiv', ['Tidak Aktiv', 'Aktiv'])->nullable();
            $table->string('dokumen_satu', 100)->nullable()->nullable();
            $table->string('dokumen_dua', 100)->nullable()->nullable();
            $table->string('dokumen_tiga', 100)->nullable()->nullable();
            $table->bigInteger('norek')->nullable()->nullable();
            $table->string('namabank', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('nik', 100)->nullable();
            $table->dropColumn('desa', 100)->nullable();
            $table->dropColumn('kecamatan', 100)->nullable();
            $table->dropColumn('kabupaten', 100)->nullable();
            $table->dropColumn('penempatan', ['BAS', 'BP', 'SLR', 'GAM'])->nullable();
            $table->dropColumn('poh', ['Palembang', 'Jakarta', 'Muara Enim', 'Lahat', 'Tangerang'. 'Samarinda', 'Serpong'])->nullable();
            $table->dropColumn('dpt', ['HCGA', 'PLANT', 'HSE', 'PRODUKSI', 'LOGISTIK', 'ENGINEERING',])->nullable();
            $table->dropColumn('golongan', ['I', 'II', 'III', 'IV', 'V', 'IV'])->nullable();
            $table->dropColumn('tgl_masuk')->nullable();
            $table->dropColumn('tgl_keluar')->nullable();
            $table->dropColumn('note_keluar')->nullable();
            $table->dropColumn('status_aktiv', ['Tidak Aktiv', 'Aktiv'])->nullable();
            $table->dropColumn('dokumen_satu', 100)->nullable()->nullable();
            $table->dropColumn('dokumen_dua', 100)->nullable()->nullable();
            $table->dropColumn('dokumen_tiga', 100)->nullable()->nullable();
            $table->dropColumn('norek')->nullable()->nullable();
            $table->dropColumn('namabank', 100)->nullable();
        });
    }
};

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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nip', 100)->unique()->nullable();
            $table->string('nik', 100)->unique()->nullable();
            $table->string('nama', 100)->nullable();;
            $table->string('tmpt_lahir', 40)->nullable();;
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('alamat')->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('nohp', 40)->nullable();
            $table->smallInteger('agama_id')->nullable();
            $table->smallInteger('negara_id')->nullable();
            $table->smallInteger('gol_darah_id')->nullable();
            $table->smallInteger('skeluarga_id')->nullable();
            $table->bigInteger('id_penempatan')->nullable();
            $table->bigInteger('id_poh')->nullable();
            $table->bigInteger('id_dept')->nullable();
            $table->bigInteger('id_golongan')->nullable();
            $table->bigInteger('id_jeniskeluar')->nullable();
            $table->bigInteger('id_statusaktiv')->nullable();
            $table->string('dokumen_satu', 100)->nullable()->nullable();
            $table->string('dokumen_dua', 100)->nullable()->nullable();
            $table->string('dokumen_tiga', 100)->nullable()->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};

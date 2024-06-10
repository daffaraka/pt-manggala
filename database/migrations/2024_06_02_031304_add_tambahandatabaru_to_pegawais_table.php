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
            $table->bigInteger('id_poh')->nullable();
            $table->bigInteger('id_dept')->nullable();
            $table->bigInteger('id_golongan')->nullable();
            $table->bigInteger('id_jeniskeluar')->nullable();
            $table->bigInteger('id_statusaktiv')->nullable();
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
            //
            $table->dropColumn('id_poh')->nullable();
            $table->dropColumn('id_dept')->nullable();
            $table->dropColumn('id_golongan')->nullable();
            $table->dropColumn('id_jeniskeluar')->nullable();
            $table->dropColumn('id_statusaktiv')->nullable();
        });
    }
};

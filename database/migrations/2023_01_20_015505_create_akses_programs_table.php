<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksesProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akses_program', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('departemen',255);
            $table->string('nama_program',255);
            $table->string('latar_belakang',255);
            $table->string('proses_bisnis',255);
            $table->string('sop',255);
            $table->string('benefit',255);
            $table->string('konsekuensi',255);
            $table->string('fitur',255);
            $table->string('prosedur_dan_dokumen',255);
            $table->string('ttd_dir',255)->nullable();
            $table->string('ttd_manager',255)->nullable();
            $table->string('ttd_asisten_dirut',255)->nullable();
            $table->integer('status')->unsigned()->default(1);
            $table->foreign('status')->references('id')->on('status');
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
        Schema::dropIfExists('akses_program');
    }
}

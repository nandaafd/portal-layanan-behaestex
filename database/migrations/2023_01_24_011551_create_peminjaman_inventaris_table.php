<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_inventaris', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('nama',255);
            $table->string('departemen',255);
            $table->string('tanggal',255);
            $table->string('ttd_kabag_ybs',255)->nullable();
            $table->string('ttd_edp',255)->nullable();
            $table->string('ttd_pengembalian',255)->nullable();
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
        Schema::dropIfExists('peminjaman_inventaris');
    }
}

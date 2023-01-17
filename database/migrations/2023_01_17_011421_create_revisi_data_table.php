<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisiDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('jenis_revisi',255);
            $table->date('tanggal');
            $table->date('tanggal_data');
            $table->string('jenis_data',255);
            $table->string('nama_data',255);
            $table->string('detail_revisi',255);
            $table->string('alasan_revisi',255);
            $table->string('status',255);
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
        Schema::dropIfExists('revisi_data');
    }
}

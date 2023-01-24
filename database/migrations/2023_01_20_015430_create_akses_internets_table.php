<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksesInternetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akses_internet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('user');
            $table->string('nama',255);
            $table->string('departemen',255);
            $table->string('jabatan',255);
            $table->string('keperluan_email',255);
            $table->string('keperluan_browsing',255);
            $table->string('ttd_ka_edp',255)->nullable();
            $table->string('ttd_manager',255)->nullable();
            $table->string('ttd_kabag_ybs',255)->nullable();
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('akses_internet');
    }
}

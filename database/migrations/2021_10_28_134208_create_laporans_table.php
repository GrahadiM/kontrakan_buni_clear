<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sewa_id');
            $table->string('bukti_laporan')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('status')->nullable(); //B (Belum), S (Sudah)
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->unsignedBigInteger('kontrakan_id')->nullable();
            
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('kontrakan_id')->references('id')->on('post_kontrakans')->onDelete('cascade');
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
        Schema::dropIfExists('laporans');
    }
}

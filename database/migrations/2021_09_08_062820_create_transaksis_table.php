<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sewa_id');
            $table->integer('nominal')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('note')->nullable();
            $table->string('status'); //BB (Belum Bayar), SB (Sudah Bayar)
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
        Schema::dropIfExists('transaksis');
    }
}

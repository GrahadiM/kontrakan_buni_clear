<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('room_id');
            $table->integer('total_family')->nullable();
            $table->integer('nik')->nullable();
            $table->timestamp('rental_date');
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
        Schema::dropIfExists('sewas');
    }
}

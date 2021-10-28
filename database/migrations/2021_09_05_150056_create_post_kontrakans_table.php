<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostKontrakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_kontrakans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->string('url')->unique();
            $table->string('thumbnail')->nullable();
            $table->integer('price')->nullable();
            $table->string('address')->nullable();
            $table->text('content')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('user_id');
            // $table->unsignedBigInteger('user_id')->nullable();
            
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('post_kontrakans');
    }
}

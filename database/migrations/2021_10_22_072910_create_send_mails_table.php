<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('send_mails', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('subject')->nullable();
        //     $table->string('email');
        //     $table->string('message')->nullable();
        //     $table->string('website')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('send_mails');
    }
}

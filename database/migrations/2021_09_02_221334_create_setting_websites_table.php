<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_websites', function (Blueprint $table) {
            $table->id();
            // setting website
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('app_name')->nullable();
            $table->string('footer_right')->nullable();
            $table->string('footer_left')->nullable();
            // setting sosmed
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('twitter')->nullable();
            $table->string('email')->nullable();
            // setting kontak pribadi
            $table->string('address')->nullable();
            $table->string('call_number')->nullable();
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
        Schema::dropIfExists('setting_websites');
    }
}

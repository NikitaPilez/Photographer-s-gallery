<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('settings',function(Blueprint $table){
            $table->increments("id");
            $table->string("copyright")->nullable();
            $table->string("vk")->nullable();
            $table->string("instagram")->nullable();
            $table->string("fivehundredpx")->nullable();
            $table->string("youtube")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }

}
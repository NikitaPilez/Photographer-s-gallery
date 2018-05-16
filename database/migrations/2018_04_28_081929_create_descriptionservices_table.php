<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateDescriptionServicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('descriptionservices',function(Blueprint $table){
            $table->increments("id");
            $table->integer("services_id")->references("id")->on("services")->nullable();
            $table->string("description")->nullable();
            $table->string("descriptionRus")->nullable();
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
        Schema::drop('descriptionservices');
    }

}
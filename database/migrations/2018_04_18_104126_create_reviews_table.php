<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateReviewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('reviews',function(Blueprint $table){
            $table->increments("id");
            $table->string("name")->nullable();
            $table->string("nameRus")->nullable();
            $table->string("description")->nullable();
            $table->string("descriptionRus")->nullable();
            $table->enum("display", ["show", "hide"])->nullable();
            $table->string("photo")->nullable();
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
        Schema::drop('reviews');
    }

}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complexes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->integer('ostan_id');
            $table->integer('city_id');
            $table->integer('region_id');
            $table->integer('image_id')->nullable();
            $table->float('latitude',9,6)->nullable();
            $table->float('longitude',8,6)->nullable();
           // $table->bigInteger('media_id');
            $table->string('name');
            $table->string('excerpt');
            $table->text('about');
            $table->string('address');
            $table->bigInteger('likes_no')->default('0');
            $table->bigInteger('visits_no')->default('0');
            $table->float('stars')->default('0');
            $table->char('phone');
            $table->char('mobile');
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
        Schema::dropIfExists('complexes');
    }
}

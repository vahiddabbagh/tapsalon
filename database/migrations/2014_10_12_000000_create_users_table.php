<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('fname', 255)->default('');
            $table->char('lname', 255)->default('');
            $table->bigInteger('role_id')->default(3);
            $table->boolean('gender')->nullable();
            $table->char('phone',20)->nullable();
            $table->char('mobile',20)->unique();
            $table->bigInteger('ostan_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->bigInteger('no_comments')->default(0);
            $table->bigInteger('no_likes')->default('0');
            $table->bigInteger('no_reserves')->default('0');
            $table->char('wallet')->default('0');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('api_token', 80)->unique()
            ->nullable()
            ->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

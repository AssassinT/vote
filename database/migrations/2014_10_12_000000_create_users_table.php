<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->enum('has_admin', ['0', '1'])->default('0');
            $table->integer('user_phone')->nullable();
            $table->enum('has_vip', ['0', '1'])->default('0');
            $table->string('password')->nullable();
            $table->integer('integral')->default(0);
            $table->string('head_pic')->default('/uploads/default.jpg');
            $table->string('openid')->default('0');
            $table->string('user_name');
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

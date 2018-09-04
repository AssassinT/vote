<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftGxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_gxs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gift_id');
            $table->integer('option_id');
            $table->integer('openid');
            $table->string('user_name');
            $table->string('head_pic');
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
        Schema::dropIfExists('gift_gxs');
    }
}

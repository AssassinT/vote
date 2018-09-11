<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('has_a_d', ['0', '1'])->default('0');
            $table->enum('has_top', ['0', '1'])->default('0');
            $table->string('has_repeat')->default('0');
            $table->enum('has_wechat', ['0', '1'])->default('1');
            $table->string('has_checkbox')->default('0');
            $table->string('has_password')->default('0');
            $table->enum('has_gift', ['0', '1'])->default('0');
            $table->integer('user_id');
            $table->text('vote_explain');
            $table->string('vote_title');
            $table->string('end_time');
            $table->string('vote_pic');
            $table->enum('comment',['0','1'])->default('0');
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
        Schema::dropIfExists('votes');
    }
}

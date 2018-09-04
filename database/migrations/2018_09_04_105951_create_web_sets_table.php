<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_sets', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('has_off', ['0', '1'])->default('0');
            $table->string('web_pic');
            $table->string('web_title');
            $table->string('record')->comment('备案号');
            $table->string('web_url');
            $table->string('web_keyword');
            $table->string('wechat_qrcode');
            $table->string('blog');
            $table->string('web_email');
            $table->integer('web_qq');
            $table->integer('web_pgine');
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
        Schema::dropIfExists('web_sets');
    }
}

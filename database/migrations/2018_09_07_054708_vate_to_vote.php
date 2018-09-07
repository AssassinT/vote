<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VateToVote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('votes', function (Blueprint $table) {
            $table->string('has_checkbox')->default('0')->change();
            $table->string('has_repeat')->default('0')->change();
            $table->string('has_password')->default('0')->change();
            $table->string('end_time')->change();
            $table->enum('has_comment',['0','1'])->dafault('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            //
            $table->dropColumn('has_comment');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAtrOfColumnsInTblPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_posts', function (Blueprint $table) {
            //
            $table->integer('userID')->unsigned()->change();
            $table->foreign('userID')->references('userID')->on('tbl_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_posts', function (Blueprint $table) {
            //
            $table->dropForeign('tbl_posts_userid_foreign');
            
        });
    }
}

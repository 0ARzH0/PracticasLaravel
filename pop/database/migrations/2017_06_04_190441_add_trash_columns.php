<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrashColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_users', function (Blueprint $table) {
            //
            $table->string('prueba1');
            $table->string('prueba2');
            $table->string('prueba3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_users', function (Blueprint $table) {
            //
            $table->dropColumn('prueba1');
            $table->dropColumn('prueba2');
            $table->dropColumn('prueba3');
        });
    }
}

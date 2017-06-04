<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameIsAdminToAdminInTblUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('tbl_users', function (Blueprint $table) {
            //
            $table->renameColumn('is_admin','admin');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('tbl_users', function (Blueprint $table) {
            //
            $table->renameColumn('admin','is_admin');
        });
    }
}

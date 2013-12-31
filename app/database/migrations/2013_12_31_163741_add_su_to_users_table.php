<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'users', function (Blueprint $table) {
                $table->boolean( 'super_user' )->after( 'password' )->default( false );
            } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'users', function (Blueprint $table) {
                $table->dropColumn( 'super_user' );
            } );
    }

}

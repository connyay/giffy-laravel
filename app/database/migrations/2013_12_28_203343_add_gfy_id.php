<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGfyId extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'gifs', function( Blueprint $table ) {
				$table->string( 'gfy_id' )->after( 'thumb' )->nullable();
			} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'gifs', function( Blueprint $table ) {
				$table->dropColumn( 'gfy_id' );
			} );
	}

}

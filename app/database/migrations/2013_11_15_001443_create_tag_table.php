<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'tags', function( Blueprint $table ) {
				$table->increments( 'id' );

				$table->string( 'name' )->unique();
				$table->integer( 'user_id' );

				$table->timestamps();
			} );
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'tags' );
	}

}
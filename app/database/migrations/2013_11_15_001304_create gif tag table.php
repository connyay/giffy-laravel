<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGifTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'gif_tag', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->integer( 'gif_id' );
				$table->integer( 'tag_id' );
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
		Schema::drop( 'gif_tag' );
	}

}

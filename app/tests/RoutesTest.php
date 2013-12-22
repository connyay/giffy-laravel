<?php

class RoutesTest extends TestCase {

	public function testGifRoutes() {
		Route::enableFilters();
		$this->call( 'GET', '/' );
		$this->assertResponseOk();

		$this->call( 'GET', '/gifs' );
		$this->assertResponseOk();

		$this->call( 'GET', '/gifs/mine' );
		$this->assertRedirectedTo( 'user/login' );
	}

	public function testUserRoutes() {
		$this->call( 'GET', '/user/login' );
		$this->assertResponseOk();

		$this->call( 'GET', '/user/register' );
		$this->assertResponseOk();
	}
}

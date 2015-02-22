<?php

class FrontControllerTest extends DbTestCase
{
	/**
	 * @test
	 */
	public function start_redirects_to_install_when_there_are_no_users()
	{
		$this->actionGet('FrontController@start');

		$this->assertRedirectedToRoute('install.welcome');
	}
}
<?php

class InstallControllerTest extends TestCase
{
	/**
	 * @test
	 */
	public function register_sets_return_url()
	{
		$this->actionGet('InstallController@register');

		$this->assertSessionHas('returnTo');
	}

}
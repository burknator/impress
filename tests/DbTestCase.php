<?php

class DbTestCase extends TestCase
{
	public function setUp()
	{
		parent::setUp();


		Artisan::call('migrate');
	}
}
<?php

use Mockery as m;

class SessionControllerTest extends TestCase
{
	/**
	 * @test
	 */
	public function redirects_back_if_credentials_are_wrong()
	{
		$mock = m::mock();
		$mock->shouldReceive('fails')->once()->andReturn(true);
		$mock->shouldReceive('messages')->once()->andReturn([]);
		Validator::shouldReceive('make')->once()->andReturn($mock);

		$this->actionPost('SessionController@store', [], ['HTTP_REFERER' => 'http://example.com']);

		$this->assertRedirectedTo('http://example.com');

	}
}
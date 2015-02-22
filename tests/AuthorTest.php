<?php

use Mockery as m;

class AuthorTest extends TestCase
{
	private $instance;

	public function setUp()
	{
		parent::setUp();

		$this->instance = new Author();
	}

	public function tearDown()
	{
		m::close();
	}

	/**
	 * @test
	 */
	public function password_is_hashed_on_mass_assignment()
	{
		$password       = 'testPassword';
		$passwordHashed = 'hashedPassword';
		Hash::shouldReceive('make')->once()->with($password)->andReturn($passwordHashed);

		$this->instance->fill(['password' => $password]);

		$this->assertEquals($passwordHashed, $this->instance->password);
	}

	/**
	 * @test
	 */
	public function password_hashed_is_not_hashed_on_mass_assignment()
	{
		Hash::shouldReceive('make')->never();

		$password = 'testPassword';
		$this->instance->fill(['password_hashed' => $password]);

		$this->assertEquals($password, $this->instance->password);
	}

}
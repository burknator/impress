<?php

use Mockery as m;

class ContentControllerTest extends DbTestCase
{
	/**
	 * @test
	 */
	public function update_redirects_back_with_valid_input()
	{
		$contentMock = m::mock('Content');
		$contentMock->shouldReceive('isValidWith')->once()->andReturn(true);
		$contentMock->shouldReceive('save')->once();

		Route::bind('content', function() use($contentMock)
		{
			return $contentMock;
		});

		$this->actionPut('ContentController@update', [], ['HTTP_REFERER' => 'http://example.com']);

		$this->assertRedirectedTo('http://example.com');
	}

	/**
	 * @test
	 */
	public function update_redirects_back_with_error_and_input_when_input_invalid()
	{
		$contentMock = m::mock('Content');
		$contentMock->shouldReceive('isValidWith')->once()->andReturn(false);
		$contentMock->shouldReceive('getValidationErrors')->once()->andReturn(['name' => 'testError']);
		$contentMock->shouldReceive('save')->never();

		Route::bind('content', function() use($contentMock)
		{
			return $contentMock;
		});

		$this->actionPut('ContentController@update', [], ['HTTP_REFERER' => 'http://example.com']);

		$this->assertRedirectedTo('http://example.com');
		$this->assertSessionHasErrors('name');
	}

	/**
	 * @test
	 */
	public function store_redirects_to_edit_route()
	{
		$contentMock = m::mock('Content');
		$contentMock->shouldReceive('getAttribute')->with('slug')->andReturn('slug');
		$contentMock->shouldReceive('isValidWith')->once()->andReturn(true);
		$contentMock->shouldReceive('save')->once();

		$this->app->instance('Content', $contentMock);

		$this->actionPost('ContentController@store');

		$this->assertRedirectedToRoute('i.content.edit', ['content' => 'slug']);
	}

	/**
	 * @test
	 */
	public function store_redirects_back_with_errors_when_input_is_invalid()
	{
		$contentMock = m::mock('Content');
		$contentMock->shouldReceive('isValidWith')->once()->andReturn(false);
		$contentMock->shouldReceive('getValidationErrors')->once()->andReturn(['name' => 'testError']);
		$contentMock->shouldReceive('save')->never();

		$this->app->instance('Content', $contentMock);

		$this->actionPost('ContentController@store', [], ['HTTP_REFERER' => 'http://example.com']);

		$this->assertRedirectedTo('http://example.com');
		$this->assertSessionHasErrors('name');
	}
}
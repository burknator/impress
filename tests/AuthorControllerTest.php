<?php

class AuthorControllerTest extends TestCase
{
	protected function getAuthorInstance($isValid = true)
	{
		$author = $this->getMockBuilder('Author')->getMock();
		$author->expects($this->once())->method('isValidWith')->will($this->returnValue($isValid));

		return $author;
	}

	/**
	 * @param $author
	 */
	protected function bindAuthor($author)
	{
		$this->app->instance('Author', $author);
	}

	/**
	 * @test
	 */
	public function store_redirects_to_return_url_if_valid_input_is_passed()
	{
		$author = $this->getAuthorInstance();
		$this->bindAuthor($author);

		$returnTo = 'install.welcome';
		$this->session(['returnTo' => $returnTo]);

		$this->actionPost('AuthorController@store');

		$this->assertRedirectedToRoute($returnTo);
	}

	/**
	 * @test
	 */
	public function store_redirects_to_author_index_without_return_url_and_valid_input()
	{
		$author = $this->getAuthorInstance();
		$this->bindAuthor($author);

		$this->actionPost('AuthorController@store');

		$this->assertRedirectedToRoute('i.author.index');
	}

	/**
	 * @test
	 */
	public function store_redirects_back_if_input_is_invalid()
	{
		$author = $this->getAuthorInstance(false);
		$this->bindAuthor($author);

		$this->actionPost('AuthorController@store', [], ['HTTP_REFERER' => 'http://example.com']);

		$this->assertRedirectedTo('http://example.com');
	}

	/**
	 * @test
	 */
	public function store_redirects_with_errors()
	{
		$errors = ['name' => 'Lorem ipsum'];

		$author = $this->getAuthorInstance(false);
		$author->expects($this->once())->method('getValidationErrors')->will($this->returnValue($errors));
		$this->bindAuthor($author);

		$this->actionPost('AuthorController@store', [], ['HTTP_REFERER' => 'http://example.com']);

		$this->assertSessionHasErrors($errors);
	}

	/**
	 * @test
	 */
	public function store_saves_model_if_valid_input_is_passed()
	{
		$author = $this->getAuthorInstance();
		$author->expects($this->once())->method('save');
		$this->bindAuthor($author);

		$this->actionPost('AuthorController@store');
	}
}
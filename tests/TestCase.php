<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	public function tearDown()
	{
		Mockery::close();
	}

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	/**
	 * Shorthand for action('get', ...) method call.
	 *
	 * @param $action
	 * @param array $parameters
	 * @param array $server
	 * @return \Illuminate\Http\Response
	 */
	public function actionGet($action, $parameters = [], $server = [])
	{
		return $this->action('get', $action, [], $parameters, [], $server);
	}

	/**
	 * Shorthand for action('post', ...) method call.
	 *
	 * @param $action
	 * @param array $parameters
	 * @param array $server
	 * @return \Illuminate\Http\Response
	 */
	public function actionPost($action, $parameters = [], $server = [])
	{
		return $this->action('post', $action, [], $parameters, [], $server);
	}

	/**
	 * Shorthand for action('post', ...) method call.
	 *
	 * @param $action
	 * @param array $parameters
	 * @param array $server
	 * @return \Illuminate\Http\Response
	 */
	public function actionPut($action, $parameters = [], $server = [])
	{
		return $this->action('put', $action, [], $parameters, [], $server);
	}

}

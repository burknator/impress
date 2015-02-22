<?php

use Illuminate\Database\Eloquent\Model;
use Impress\Model\ModelValidator;
use Impress\Model\ValidatableInterface;
use Impress\Model\ValidatableTrait;
use Mockery as m;

class ModelValidatorTest extends TestCase
{
	/**
	 * @var ModelValidator
	 */
	private $instance;

	/**
	 * @var \Mockery\MockInterface|ValidatableModelStub
	 */
	private $model;

	public function setUp()
	{
		parent::setUp();

		$this->model = m::mock('ValidatableModelStub')->makePartial();
		$this->model->id = null;
	}

	/**
	 * @return ModelValidator
	 */
	public function instance()
	{
		return new ModelValidator($this->app->make('validator'));
	}

	/**
	 * @test
	 */
	public function valid_if_there_are_no_rules()
	{
		$this->model->shouldReceive('hasRules')->once()->andReturn(false);

		Validator::shouldReceive('make')->never();

		$this->instance()->isValidWith($this->model, []);
	}

	/**
	 * Also tests if false is returned when validation fails, but then the name would be a little too long.
	 * @test
	 */
	public function errors_are_saved_when_validation_fails()
	{
		$this->model->shouldReceive('hasRules')->andReturn(true);
		$this->model->shouldReceive('getRules')->andReturn([]);

		$errors = ['test' => 'message'];
		$this->model->shouldReceive('setValidationErrors')->with($errors);

		$mock = m::mock();
		$mock->shouldReceive('fails')->once()->andReturn(true);
		$mock->shouldReceive('messages')->once()->andReturn($errors);

		Validator::shouldReceive('make')->once()->andReturn($mock);

		$this->assertFalse($this->instance()->isValidWith($this->model, []));

	}

	/**
	 * @test
	 */
	public function when_it_validates_fill_will_be_called_per_default()
	{
		$this->model->shouldReceive('hasRules')->andReturn(true);
		$this->model->shouldReceive('getRules')->andReturn([]);

		$mock = m::mock();
		$mock->shouldReceive('fails')->once()->andReturn(false);

		Validator::shouldReceive('make')->once()->andReturn($mock);

		$data = ['test' => 'data'];
		$this->model->shouldReceive('fill')->with($data);

		$this->assertTrue($this->instance()->isValidWith($this->model, $data));
	}

	/**
	 * @test
	 */
	public function when_it_validates_fill_wont_be_called_if_switched_off()
	{
		$this->model->shouldReceive('hasRules')->andReturn(true);
		$this->model->shouldReceive('getRules')->andReturn([]);

		$mock = m::mock();
		$mock->shouldReceive('fails')->once()->andReturn(false);

		Validator::shouldReceive('make')->once()->andReturn($mock);

		$data = ['test' => 'data'];
		$this->model->shouldReceive('fill')->never();

		$this->assertTrue($this->instance()->isValidWith($this->model, $data, false));
	}

	/**
	 * With "long" unique rules referring to unique rules with a column, such as this one: 'unique:tablename,columnname'
	 *
	 * @test
	 */
	public function long_unique_rules_are_modified_when_model_is_updated()
	{
		$testId   = 42;
		$testData = ['name' => 'testName'];

		$rules = [
			'name' => 'required|unique:tablename,columnname',
			'email' => 'required|email'
		];

		$modifiedRules = [
			// That these rules are in array form is because of laravel's parsing of rules and is thus not part of the
			// test.
			'name' => ['required', 'unique:tablename,columnname,' . $testId],
			'email' => ['required', 'email']
		];

		$this->model->shouldReceive('hasRules')->once()->andReturn(true);
		$this->model->shouldReceive('getKey')->andReturn($testId);
		$this->model->shouldReceive('getRules')->once()->andReturn($rules);

		$validationMock = m::mock();
		$validationMock->shouldReceive('fails')->once()->andReturn(false);

		$realValidator = Validator::make($testData, $rules);

		$validatorMock = m::mock('Illuminate\Validation\Factory');
		$validatorMock->shouldReceive('make')->with($testData, $rules)->andReturn($realValidator);
		// This is the main assertion here, "make" must be called with the modified rules.
		$validatorMock->shouldReceive('make')->with($testData, $modifiedRules)->andReturn($validationMock);

		$this->app->instance('validator', $validatorMock);

		$this->instance()->isValidWith($this->model, $testData, false);
	}
}

abstract class ValidatableModelStub extends Model implements ValidatableInterface
{
	use ValidatableTrait;
}
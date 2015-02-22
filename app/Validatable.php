<?php namespace Impress;

trait Validatable
{
	protected $validationErrors;

	/**
	 * @return array
	 */
	public function getValidationErrors()
	{
		return $this->validationErrors ?: [];
	}

	public function setValidationErrors($errors)
	{
		$this->validationErrors = $errors;
	}

	/**
	 * @return bool
	 */
	public static function hasRules()
	{
		$rules = static::getRules();

		return isset($rules) && is_array($rules) && count($rules) > 0;
	}

	/**
	 * Get the validation rules for this model.
	 *
	 * @return null|array
	 */
	public static function getRules()
	{
		return static::$validationRules;
	}

	/**
	 * @param array $data
	 * @return bool
	 */
	public function isValidWith(array $data)
	{
		return app('ModelValidator')->isValidWith($this, $data, true);
	}

}
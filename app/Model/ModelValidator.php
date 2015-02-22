<?php namespace Impress\Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Validation\Factory as Validator;

class ModelValidator
{
	/**
	 * @var Validator
	 */
	private $validator;

	public function __construct(Validator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Checks if the data is validates for the given model.
	 *
	 * @param Eloquent|ValidatableInterface $model
	 * @param array $data
	 * @param bool $fillIfValid
	 * @return bool
	 */
	public function isValidWith(Eloquent $model, array $data, $fillIfValid = true)
	{
		if ( ! $model instanceof ValidatableInterface)
		{
			throw new \BadMethodCallException('You need to pass a validatable model.');
		}

		if ( ! $model->hasRules()) return true;

		$validation = $this->validator->make($data, $model->getRules());

		if ($model->getKey() !== null)
		{
			// If this is an update of the model, we need to change the unique rules
			// in the validation to exclude the record of this model.
			$rules = $this->parseRules($model->getKey(), $validation->getRules(), function ($property, $rule, $id)
			{
				return $this->addExceptionToUniqueRule($property, $rule, $id);
			});

			$validation = $this->validator->make($data, $rules);
		}

		if ($validation->fails())
		{
			$model->setValidationErrors($validation->messages());

			return false;
		}

		if ($fillIfValid) $model->fill(array_except($data, 'password_confirmation'));

		return true;
	}

	/**
	 * @param $property
	 * @param $rule
	 * @param $id
	 * @return string
	 */
	private function addExceptionToUniqueRule($property, $rule, $id)
	{
		// See http://laravel.com/docs/4.2/validation#rule-unique

		// Only table is specified in the rule -> add column parameter
		if (count(explode(',', $rule)) < 2) $rule .= ',' . $property;

		$rule .= ',' . $id;

		return $rule;
	}

	/**
	 * @param $id
	 * @param array $rulesPerProperty
	 * @param callable $ruleModifier
	 * @return array
	 */
	private function parseRules($id, array $rulesPerProperty, \Closure $ruleModifier)
	{
		foreach ($rulesPerProperty as $property => $rules)
		{
			for ($i = 0 ; $i < count($rules) ; $i++)
			{
				$rule = $rules[$i];
				if (starts_with($rule, 'unique:'))
				{
					$rule = $ruleModifier($property, $rule, $id);
				}

				$rulesPerProperty[$property][$i] = $rule;
			}
		}

		return $rulesPerProperty;
	}
}
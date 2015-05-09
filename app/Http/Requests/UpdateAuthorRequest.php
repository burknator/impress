<?php namespace Impress\Http\Requests;

use Impress\Author;

class UpdateAuthorRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return Author::getUpdateRules($this->get('id'));
	}

}

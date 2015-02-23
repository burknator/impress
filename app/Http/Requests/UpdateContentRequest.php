<?php namespace Impress\Http\Requests;

use Impress\Http\Requests\Request;
use Impress\Content;
use Auth;

class UpdateContentRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$authorsContents = Auth::user()->contents()->get()->toArray();

		foreach ($authorsContents as $content) {
			if ($content['slug'] == $this->get('slug')) return true;
		}

		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$id = $this->get('id');

		return array_map(function($rule) use ($id) {
			return str_replace('#id#', $id, $rule);
		}, Content::getRules());
	}

}

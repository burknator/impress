<?php namespace Impress\Http\Requests;

use Auth;
use Impress\Content;

class UpdateContentRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$authorsContents = Auth::user()->contents()->get()->toArray();

		foreach ($authorsContents as $content)
		{
			if ($content['id'] == $this->get('id')) return true;
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
		return Content::getUpdateRules($this->get('id'));
	}

}

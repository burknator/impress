<?php namespace Impress\Http\Requests;

use Impress\Content;

class StoreContentRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		// This request refers to creating whole new content, which every user is authorized to do.
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return Content::getRules();
	}

}

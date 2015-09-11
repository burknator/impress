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
		return [
	        'title'       => 'required|unique:contents,title',
	        'slug'        => 'required|alpha_dash|unique:contents,slug',
	        'type_id'     => 'required|exists:types,id',
	        'category_id' => 'exists:categories,id',
	    ];
	}

}

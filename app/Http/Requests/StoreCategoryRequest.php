<?php namespace Impress\Http\Requests;

use Impress\Category;

class StoreCategoryRequest extends Request {

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
		return [
	        'name'     => 'required|unique:categories,name',
	        'slug'     => 'required|unique:categories,slug|alpha_dash',
	        'color_id' => 'required|exists:category_colors,id'
	    ];
	}

}

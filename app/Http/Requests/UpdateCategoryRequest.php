<?php namespace Impress\Http\Requests;

use Impress\Category;

class UpdateCategoryRequest extends Request {

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
	        'id'       => 'required|exists:categories,id',
	        'name'     => 'required|unique:categories,name,' . $this->get('id'),
	        'slug'     => 'required|unique:categories,slug,' . $this->get('id') . '|alpha_dash',
	        'color_id' => 'required|exists:category_colors,id'
	    ];
	}
}
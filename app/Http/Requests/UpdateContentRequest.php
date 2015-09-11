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
		return [
	        'id'          => 'required|exists:contents,id',
	        'title'       => 'required|unique:contents,title,' . $this->get('id'),
	        'slug'        => 'required|alpha_dash|unique:contents,slug,' . $this->get('id'),
	        'type_id'     => 'required|exists:types,id',
	        'category_id' => 'exists:categories,id',
	    ];
	}

}

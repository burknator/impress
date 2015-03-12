<?php namespace Impress\Http\Controllers;

use Impress\Http\Requests;
use Impress\Http\Controllers\Controller;
use Impress\Type;

use Illuminate\Http\Request;

class FrontController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$postType = Type::where('name', '=', 'post')->firstOrFail();
		$posts = $postType->contents()->published()->orderBy('created_at')->get();

		return view('front.index', compact('posts'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Content $content
	 * @return Response
	 */
	public function show(Content $content)
	{
		//
	}

}

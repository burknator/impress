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
		$postType = Type::post();
		$posts = $postType->contents()->published()->latest()->get();

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

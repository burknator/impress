<?php namespace Impress\Http\Controllers;

use Impress\Http\Requests;
use Impress\Http\Controllers\Controller;
use Impress\Type;
use Impress\Content;

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
		$posts    = $postType->contents()->published()->orderBy('published_at', 'desc')->get();

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
		$type = $content->type()->first()->name;

		return view('front.show_' . $type, compact('content'));
	}

}

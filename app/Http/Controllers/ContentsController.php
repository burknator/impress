<?php namespace Impress\Http\Controllers;

use Impress\Type;
use Impress\Content;
use Request;

class ContentsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contents = Content::all();

		return view('contents.index', compact('contents'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('contents.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * TODO Put this together with update? Currently they're completely equal.
	 * @return Response
	 */
	public function store(Content $content)
	{
		if ( ! $content->isValidWith(Input::all()))
		{
			return back()->withInput()->withErrors($content->getValidationErrors());
		}

		$content->save();

		return route('i.content.edit', ['content' => $content->slug]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Content $content
	 * @return Response
	 */
	public function edit(Content $content)
	{
		return view('content.edit')->withContent($content)->withTypes(Type::flatList());
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * TODO Put this together with store? Currently their completely equal.
	 * @param Content $content
	 * @return Response
	 */
	public function update(Content $content)
	{
		if ( ! $content->isValidWith(Request::all()))
		{
			return back()->withInput()->withErrors($content->getValidationErrors());
		}

		$content->save();

		return back();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

<?php namespace Impress\Http\Controllers;

use Impress\Type;
use Impress\Content;
use Request;
use Auth;
use Impress\Http\Requests\StoreContentRequest;
use Impress\Http\Requests\UpdateContentRequest;

class ContentsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contents = Content::orderBy('created_at', 'desc')->get();

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
	 * @return Response
	 */
	public function store(StoreContentRequest $request)
	{
		$content = new Content($request->all());

		Auth::user()->contents()->save($content);

		return redirect()->route('i.contents.edit', ['contents' => $content->slug]);
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
		return view('contents.edit', compact('content'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param UpdateContentRequest $request
	 * @param Content $oldContent
	 * @return Response
	 */
	public function update(UpdateContentRequest $request, Content $oldContent)
	{
		$oldContent->fill($request->all())->save();

		return redirect()->back();
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

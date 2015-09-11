<?php namespace Impress\Http\Controllers;

use Impress\Type;
use Impress\Content;
use Impress\Http\Requests\StoreContentRequest;
use Impress\Http\Requests\UpdateContentRequest;

use Illuminate\Http\Request;

class ContentsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$contents = Content::orderBy('created_at', 'desc')->get();

		$preview = $contents->last();
		if ($request->has('preview')) {
			$previewId  = $request->get('preview');
			$preview = $contents->filter(function ($content) use ($previewId) {
				return $content->id == $previewId;
			})->first();
		}

		return view('contents.index', compact('contents', 'preview'));
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

		$content->lastEditor()->associate(auth()->user());
		auth()->user()->contents()->save($content);

		return redirect()->route('i.contents.edit', ['contents' => $content->slug]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
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
	 * @param Content              $content
	 * @return Response
	 */
	public function update(UpdateContentRequest $request, Content $content)
	{
		$content->fill($request->all())->save();

		// The last editor relationship is saved via a model event in AppServiceProvider.

		return redirect()->route('i.contents.edit', [$content->slug]);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

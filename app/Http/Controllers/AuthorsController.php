<?php namespace Impress\Http\Controllers;

use Impress\Author;

use Request;

class AuthorsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('back.author')->with('authors', Author::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		dd('test');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Author $author
	 * @return Response
	 */
	public function store(Author $author)
	{
		if (!$author->isValidWith(Request::all()))
		{
			return back()->withInput()->withErrors($author->getValidationErrors());
		}

		$author->save();

		$returnRoute = session('returnTo');

		if (empty($returnRoute))
		{
			$returnRoute = 'i.author.index';
		}

		return route($returnRoute);
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
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

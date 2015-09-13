<?php namespace Impress\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Impress\Author;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('authors.index')->with('authors', Author::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('authors.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param  Author $author
     * @return Response
     */
    public function store(Request $request, Author $author)
    {
        $this->validate($request, [
            'email'    => 'required|email|unique:authors,email',
            'password' => 'required|confirmed',
        ]);

        $author->fill($request->all())->save();

        return redirect()->route('i.authors.edit', [$author->id]);
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
     * @param \Impress\Author $author
     * @return \Impress\Http\Controllers\Response
     * @internal param int $id
     */
    public function edit(Author $author)
    {
        return view('authors.edit')->with('author', $author);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Author  $author
     * @return Response
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request, [
            'id'       => 'required|exists:authors,id',
            'email'    => 'required|email|unique:authors,email,' . $request->get('id'),
            'password' => 'confirmed',
        ]);

        $author->fill($request->all())->save();

        return redirect()->route('i.authors.edit', [$author->id]);
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

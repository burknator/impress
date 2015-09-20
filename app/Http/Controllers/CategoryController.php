<?php

namespace Impress\Http\Controllers;

use Impress\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|unique:categories,name',
            'slug'     => 'required|unique:categories,slug|alpha_dash',
            'color_id' => 'required|exists:category_colors,id'
        ]);

        $category = Category::create($request->all());

        return redirect()->route('i.categories.edit', ['categories' => $category->slug]);
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
     * @param  Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('categories.index', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request  $request
     * @param  Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'id'       => 'required|exists:categories,id',
            'name'     => 'required|unique:categories,name,' . $request->get('id'),
            'slug'     => 'required|unique:categories,slug,' . $request->get('id') . '|alpha_dash',
            'color_id' => 'required|exists:category_colors,id'
        ]);

        // TODO Implement color handling. The user should be able to create new colors here too.

        $category->fill($request->all())->save();

        return redirect()->route('i.categories.edit', [$category->slug]);
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

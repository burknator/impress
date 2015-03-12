<?php namespace Impress\Http\Controllers;

use Impress\Http\Requests\StoreCategoryRequest;
use Impress\Category;
use Request;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('categories.index')->withCategories(Category::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreCategoryRequest $request
	 * @return Response
	 */
	public function store(StoreCategoryRequest $request)
	{
		$category = Category::create($request->all());

		return redirect()->route('i.categories.edit', ['categories' => $category->slug]);
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
	 * @param  Category  $category
	 * @return Response
	 */
	public function edit(Category $category)
	{
		return view('categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param  UpdateCategoryRequest $request
	 * @param  Category              $oldCategory
	 * @return Response
	 */
	public function update(UpdateCategoryRequest $request, Category $oldCategory)
	{
		$oldCategory->fill($request->all())->save();

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

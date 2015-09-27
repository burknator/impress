<?php

namespace Impress\Http\Controllers;

use Impress\Http\Controllers\Controller;
use Impress\Tag;
use Impress\Content;

use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|unique:tags,name',
            'slug'     => 'required|unique:tags,slug|alpha_dash',
            'color_id' => 'required|exists:tag_colors,id'
        ]);

        $tag = Tag::create($request->all());

        return redirect()->route('i.tags.edit', ['tags' => $tag->slug]);
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
     * @param  int  $id
     * @return Response
     */
    public function edit(Tag $tag)
    {
        $contents = $tag->contents()->with('tags.color', 'lastEditor', 'author', 'type')->get();

        $contents = $contents->map(function (Content $content) {
            $tags = $content->tags->map(function (Tag $tag) {
                return array_only($tag->toArray(), ['id', 'name', 'color']);
            })->toArray();

            $json = [
                'title'             => $content->title,
                'created_at'        => $content->created_at,
                'created_at_diff'   => $content->created_at->diffForHumans(),
                'published_at'      => $content->published_at,
                'published_at_diff' => $content->published_at->diffForHumans(),
                'tags'              => $tags,
                'author'            => $content->author->email,
                'last_editor'       => isset($content->lastEditor) ? $content->lastEditor->email : null,
                'edit_link'         => $content->edit_link,
                'type'              => $content->type->name
            ];

            return $json;
        });

        return view('tags.edit', compact('tag', 'contents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Tag      $tag
     * @return Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->fill($request->all())->save();

        return redirect()->route('i.tags.edit', ['tags' => $tag->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Impress\Tag              $tag
     * @return Response
     */
    public function destroy(Request $request, Tag $tag)
    {
        $tag->delete();

        return back();
    }
}

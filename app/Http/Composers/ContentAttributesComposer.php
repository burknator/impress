<?php

namespace Impress\Http\Composers;

use Impress\Category;
use Impress\Tag;
use Impress\Type;

use Illuminate\Contracts\View\View;

class ContentAttributesComposer
{
    protected $types;
    protected $categories;
    protected $tags;

    public function __construct()
    {
        $this->types = Type::flatList();
        $this->categories = array_prepend(Category::flatList(), 'none', '');
        $this->tags = Tag::flatList();
    }

    public function compose(View $view)
    {
        $view->with('types', $this->types)
             ->with('categories', $this->categories)
             ->with('tags', $this->tags);
    }
}

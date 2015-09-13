<?php

namespace Impress\Http\Composers;

use Illuminate\Contracts\View\View;
use Impress\Category;
use Impress\Type;

class ContentAttributesComposer
{
    protected $types;
    protected $categories;

    public function __construct()
    {
        $this->types = Type::flatList();
        $this->categories = array_prepend(Category::flatList(), '', 'none');
    }

    public function compose(View $view)
    {
        $view->with('types', $this->types)
            ->with('categories', $this->categories);
    }
}

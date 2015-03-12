<?php namespace Impress\Http\Composers;

use Impress\Type;
use Impress\Category;

use Illuminate\Contracts\View\View;

class ContentAttributesComposer {
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
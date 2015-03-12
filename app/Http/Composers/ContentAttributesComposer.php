<?php namespace Impress\Http\Composers;

use Illuminate\Contracts\View\View;
use Impress\Type;
use Impress\Category;

class ContentAttributesComposer {
    protected $types;
    protected $categories;

    public function __construct()
    {
        $this->types = Type::flatList();
        $this->categories = array_merge(['' => 'none'], Category::flatList());
    }

    public function compose(View $view)
    {
        $view->with('types', $this->types)
             ->with('categories', $this->categories);
    }
}
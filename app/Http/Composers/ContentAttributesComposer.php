<?php namespace Impress\Http\Composers;

use Illuminate\Contracts\View\View;
use Impress\Type;

class ContentAttributesComposer {
    protected $types;

    public function __construct()
    {
        $this->types = Type::flatList();
    }

    public function compose(View $view)
    {
        $view->with('types', $this->types);
    }
}
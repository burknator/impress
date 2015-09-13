<?php

namespace Impress\Http\Composers;

use Impress\CategoryColor;

use Illuminate\Contracts\View\View;

class CategoryAttributesComposer
{
    protected $colors;

    public function __construct()
    {
        $this->colors = CategoryColor::all();
    }

    public function compose(View $view)
    {
        $view->with('colors', $this->colors);
    }
}

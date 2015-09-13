<?php

namespace Impress\Http\Composers;

use Illuminate\Contracts\View\View;
use Impress\CategoryColor;

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

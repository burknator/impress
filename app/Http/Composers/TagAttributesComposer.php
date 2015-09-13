<?php

namespace Impress\Http\Composers;

use Impress\TagColor;

use Illuminate\Contracts\View\View;

class TagAttributesComposer
{
    protected $colors;

    public function __construct()
    {
        $this->colors = TagColor::all();
    }

    public function compose(View $view)
    {
        $view->with('colors', $this->colors);
    }
}

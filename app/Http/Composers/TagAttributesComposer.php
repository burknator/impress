<?php

namespace Impress\Http\Composers;

use Illuminate\Contracts\View\View;
use Impress\TagColor;

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
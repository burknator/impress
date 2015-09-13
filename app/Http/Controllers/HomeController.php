<?php

namespace Impress\Http\Controllers;

use Impress\Http\Requests;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }
}

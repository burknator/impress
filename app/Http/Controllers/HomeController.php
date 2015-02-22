<?php namespace Impress\Http\Controllers;

use Impress\Http\Requests;
use Impress\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function index()
    {
        return view('home');
    }

}

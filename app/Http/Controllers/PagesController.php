<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function view($slug)
    {
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('pages.view', ['page'=>$page]);
    }
}

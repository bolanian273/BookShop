<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
//
    public function index(){
        $title = "Welcome to Online BookShop";
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = "About Us";
        return view('pages.about')->with('about', $title);
    }

    public function services(){
        $title = array(
            'Title' => 'Services',
            'services' => ['web development', 'SCO', 'Mobile Development']
        );
        return view('pages.services')->with($title);
    }
}

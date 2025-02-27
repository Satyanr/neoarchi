<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.home', ['pageTitle' => 'Home']);
    }

    public function artikel()
    {
        return view('main.artikel', ['pageTitle' => 'News']);
    }

    public function about()
    {
        return view('main.about-us', ['pageTitle' => 'About Us']);
    }

    public function project()
    {
        return view('main.projects', ['pageTitle' => 'Projects']);
    }

    public function contact()
    {
        return view('main.contact', ['pageTitle' => 'Contact']);
    }
}
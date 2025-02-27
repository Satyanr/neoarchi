<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function pengguna()
    {
        return view('admin.pengguna');
    }

    public function artikel()
    {
        return view('admin.artikel');
    }

    public function kategori()
    {
        return view('admin.category');
    }

    // public function tag()
    // {
    //     return view('admin.tag');
    // }

    public function project()
    {
        return view('admin.projek');
    }

}

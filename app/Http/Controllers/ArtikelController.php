<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\CategoryLink;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('admin.artikel.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('ArtikelImages'), $imageName);

        $artikel = new Article();
        $artikel->title = $request->title;
        $artikel->slug = Str::slug($request->title);
        $artikel->content = $request->content;
        $artikel->thumbnail = $imageName;
        $artikel->save();

        $catlink = new CategoryLink();
        $catlink->article_id = $artikel->id;
        $catlink->category_id = $request->category;
        $catlink->save();

        return redirect()->route('admin.artikel')
                        ->with('success','Artikel berhasil ditambahkan.');
    }
}

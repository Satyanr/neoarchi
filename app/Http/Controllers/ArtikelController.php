<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\CategoryLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('admin.artikel.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('ArtikelImages'), $imageName);

        $artikel = new Article();
        if ($request->hasFile('thumbnail')) {
            $oldThumbnail = public_path('ArtikelImages/') . $artikel->thumbnail;
            if (file_exists($oldThumbnail)) {
                unlink($oldThumbnail);
            }
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('ProjectImages'), $imageName);
            $artikel->thumbnail = $imageName;
        }
        $artikel->title = $request->title;
        $artikel->slug = Str::slug($request->title);
        $artikel->content = $request->content;
        $artikel->save();

        $catlink = new CategoryLink();
        $catlink->article_id = $artikel->id;
        $catlink->category_id = $request->category;
        $catlink->save();

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $artikel = Article::find($id);
        $categories = Category::all();
        $catlink = CategoryLink::where('article_id', $id)->first();
        return view('admin.artikel.edit', compact('artikel', 'categories', 'catlink'));
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $artikel = Article::find($id);
        $artikel->title = $request->title;
        $artikel->slug = Str::slug($request->title);
        $artikel->content = $request->content;
        if ($request->gambar) {
            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('ArtikelImages'), $imageName);
            $artikel->thumbnail = $imageName;
        }
        $artikel->save();

        $catlink = CategoryLink::where('article_id', $id)->first();
        $catlink->category_id = $request->category;
        $catlink->save();

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diupdate.');
    }
}

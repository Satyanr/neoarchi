<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projectact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('ProjectImages'), $imageName);

        $project = new Project();
        $project->name = $request->name;
        $project->slug = Str::slug($request->name);
        $project->description = $request->description;
        $project->thumbnail = $imageName;
        $project->category = $request->category;
        $project->save();

        return redirect()->route('admin.projek')->with('success', 'project berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.projectact.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = Project::find($id);
        if ($request->hasFile('thumbnail')) {
            $oldThumbnail = public_path('ProjectlImages/') . $project->thumbnail;
            if (file_exists($oldThumbnail)) {
                unlink($oldThumbnail);
            }
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('ProjectImages'), $imageName);
            $project->thumbnail = $imageName;
        }
        $project->name = $request->name;
        $project->slug = Str::slug($request->name);
        $project->description = $request->description;
        $project->category = $request->category;
        $project->save();

        return redirect()->route('admin.projek')->with('success', 'project berhasil diubah.');
    }
}

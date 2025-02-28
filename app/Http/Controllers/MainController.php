<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.home', [
            'pageTitle' => 'Home',
            'artikels' => Article::latest()->limit(3)->get(),
            'projects' => Project::latest()->limit(3)->get(),
            ]);
    }

    public function artikel()
    {
        return view('main.artikel', ['pageTitle' => 'News']);
    }

    public function about()
    {
        return view('main.about-us', [
            'pageTitle' => 'About Us',
            'projects' => Project::latest()->limit(3)->get(),
        ]);
    }

    public function project()
    {
        return view('main.projects', ['pageTitle' => 'Projects']);
    }

    public function contact()
    {
        return view('main.contact', ['pageTitle' => 'Contact']);
    }

    public function showArticle($id)
    {
        $article = Article::find($id);
        return view('main.artikel.show', [
            'pageTitle' => $article->title,
            'article' => $article,
        ]);
    }

    public function showProject($id)
    {
        $project = Project::find($id);
        return view('main.projectshow.show', [
            'pageTitle' => $project->title,
            'project' => $project,
        ]);
    }
}
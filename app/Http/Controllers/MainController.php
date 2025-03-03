<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'artikels' => Article::where('id', '!=', $id)->latest()->limit(4)->get(),
            'projects' => Project::latest()->limit(4)->get(),
        ]);
    }

    public function showProject($id)
    {
        $project = Project::find($id);
        return view('main.projectshow.show', [
            'pageTitle' => $project->title,
            'project' => $project,
            'artikels' => Article::latest()->limit(4)->get(),
            'projects' => Project::where('id', '!=', $id)->latest()->limit(4)->get(),
        ]);
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ];

        Mail::send('contact', $data, function ($message) use ($data) {
            $message->to('satyanr54@gmail.com')->subject($data['subject'])->from($data['email'], $data['name']);
        });

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}

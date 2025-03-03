@extends('layouts.app')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-white">{{ $article->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-white">{{ $article->created_at->format('d F Y') }}</p>
                </div>
            </div>
            <div class="row mt-3 align-items-center">
                <div class="col text-center">
                    <img src="{{ asset('ArtikelImages/' . $article->thumbnail) }}" class="img-fluid w-100"
                        style="max-width: 500px" alt="...">
                </div>
            </div>
        </div>
    </header>
    <div class="container bg-white">
        <div class="row">
            <div class="col-12">
                <p>{!! $article->content !!}</p>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row text-center">
            <div class="col">
                <h3>Recent News</h3>
            </div>
        </div>
        <div class="row">
            @foreach ($artikels as $article)
                <div class="col-lg-3 col-md-6 col-12 my-4 mb-lg-0">
                    <div class="card p-3 h-100">
                        <a href="{{ route('showArticle', $article->id) }}">
                            <img src="{{ asset('ArtikelImages/' . $article->thumbnail) }}"
                                class="custom-block-image img-fluid mb-2 rounded-3" alt="">
                            <div class="d-flex h-100">
                                <h5 class="mb-2">{{ $article->title }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container py-5">
        <div class="row text-center">
            <div class="col">
                <h3>Recent Projects</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-lg-6 col-md-6 col-12 my-4 mb-lg-0">
                            <div class="card text-bg-dark">
                                <a href="{{ route('showProject', $project->id) }}">
                                    <img src="{{ asset('ProjectImages/' . $project->thumbnail) }}" class="card-img"
                                        style="height: 300px; object-fit: cover;">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title bg-white bg-opacity-50 px-3">{{ $project->name }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

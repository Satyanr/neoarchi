@extends('layouts.app')

@section('content')
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col text-center">
                    <img src="{{ asset('ProjectImages/' . $project->thumbnail) }}" class="img-fluid" style="max-width: 500px"
                        alt="...">
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $project->name }}</h2>
                <p>{!! $project->description !!}</p>
            </div>
        </div>
    </div>
@endsection

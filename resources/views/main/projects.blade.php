@extends('layouts.app')

@section('content')
    @component('components.main.header')
        @slot('pageTitle')
            {{ $pageTitle }}
        @endslot
    @endcomponent
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="custom-block bg-white shadow-lg" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

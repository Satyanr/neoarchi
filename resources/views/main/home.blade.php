@extends('layouts.app')

@section('content')
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row w-75">
                <div class="col">
                    <div id="headcoursel" class="carousel slide" data-bs-ride="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#headcoursel" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#headcoursel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#headcoursel" data-bs-slide-to="2"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('BRAND.png') }}" class="d-block w-100" alt="...">
                                {{-- <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div> --}}
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('BRAND.png') }}" class="d-block w-100" alt="...">
                                {{-- <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div> --}}
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('BRAND.png') }}" class="d-block w-100" alt="...">
                                {{-- <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Some representative placeholder content for the third slide.</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid bg-dark">
        <div class="row text-center py-5">
            <div class="col-sm mb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="text-white"><i class="bi bi-text-indent-left"></i></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="text-white">Meet leading industry experts.</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="text-white"><i class="bi bi-people"></i></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="text-white">Lets’ start our partnership today!.</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="text-white"><i class="bi bi-arrows-fullscreen"></i></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="text-white">A full range of advertising services.</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="text-white"><i class="bi bi-telephone"></i></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5 class="text-white">Contact us & get 100% free consultation!</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row py-5">
            <div class="col-sm">
                <div class="row">
                    <div class="col">
                        <h6>WELCOME TO NEO ARCHI</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Risk more than others think is safe. Dream more than others think is practical.</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <p>Looking to capture your customer’s attention right at the point of sale?
                    DOOH stands for Digital Out of Home. Digital Out of Home Advertising is a fast growing, cost effective
                    solution, that displays ads on a network of screens placed in strategic, high traffic locations offering
                    brands the chance to reach their customers in real time.</p>
            </div>
        </div>
        <div class="row text-center py-5">
            <div class="col">
                <h2>Our Service</h2>
                <div class="row">
                    <div class="col-sm mb-3">
                        <div class="custom-block custom-block-overlay h-100">
                            <div class="d-flex flex-column h-100">
                                <img src="{{ asset('BRAND2.png') }}" class="custom-block-image img-fluid" alt="">
                                <div
                                    class="custom-block-overlay-text d-flex justify-content-center align-items-center text-center p-3">
                                    <div>
                                        <h5 class="text-white mb-2">Advertising</h5>
                                        <p class="text-white">As a full-service advertising agency, we are equipped to serve
                                            our clients in all aspects of communication and promotion.</p>
                                    </div>
                                </div>
                                <div class="section-overlay"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm mb-3">
                        <div class="custom-block custom-block-overlay h-100">
                            <div class="d-flex flex-column h-100">
                                <img src="{{ asset('BRAND2.png') }}" class="custom-block-image img-fluid" alt="">
                                <div
                                    class="custom-block-overlay-text d-flex justify-content-center align-items-center text-center p-3">
                                    <div>
                                        <h5 class="text-white mb-2">Digital Media Supply</h5>
                                        <p class="text-white">We as Digital Media Supply company specializes in building
                                            your brand by putting your advertising digital media assets to best use reaching
                                            out to targeted audiences and motivating them to act in your favor.</p>
                                    </div>
                                </div>
                                <div class="section-overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center py-5">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h2>Recent Projects</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="{{ route('showProject', $project->id) }}">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">{{ $project->name }}</h5>
                                        </div>
                                    </div>

                                    <img src="{{ asset('ProjectImages/' . $project->thumbnail) }}"
                                        class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark">
        <div class="row text-center py-5">
            <div class="col-sm mb-3">
                <div class="row">
                    <div class="col">
                        <h5 class="text-white">Need professional advertising solution?</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <h2 class="text-white">Get in touch! We are looking forward to
                            start a new project.</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{route('contact')}}" class="btn btn-danger">CONTACT US NOW <i
                                class="bi bi-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row text-center">
            <div class="col">
                <h2>Recent News</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    @foreach ($artikels as $article)
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="{{ route('showArticle', $article->id) }}">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">{{ $article->title }}</h5>
                                            <p>
                                                {{ Str::limit($article->description, 100, '...') }}
                                            </p>
                                        </div>
                                    </div>
                                    <img src="{{ asset('ArtikelImages/' . $article->thumbnail) }}"
                                        class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

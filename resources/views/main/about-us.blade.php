@extends('layouts.app')

@section('content')
    @component('components.main.header')
        @slot('pageTitle')
            {{ $pageTitle }}
        @endslot
    @endcomponent
    <div class="container text-center py-3">
        <div class="row py-2">
            <div class="col">
                <p>
                    It is a company founded in 2014. Visitiga provides all type of media related to marketing and
                    advertising since planning, designing, device supply, operation and maintenance in a new level full of
                    creativity and trendiness. We are a group of people who believe in future vision, flexibility, hard-work
                    and cooperation. We listen carefully to our client’s needs and problems to help them find the proper
                    solution.
                </p>
            </div>
        </div>
        <div class="row py-5">
            <div class="col">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <img src="{{ asset('BRAND2.png') }}" class="img-fluid" alt="...">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h4>Visi</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Becoming a Reliable Digital Solution Media Company.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Misi</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Providing integrated Digital Media Solutions for customer satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-5 text-center bg-white">
        <div class="row py-2">
            <div class="col">
                <h3>WHY CHOOSE US</h3>
            </div>
        </div>
        <div class="row">
            <div class="col py-3">
                <div class="custom-block bg-white shadow-lg">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h3>Persistence</h3>
                        <p class="card-text">Be persistent in keeping with an entrepreneurial attitude.</p>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div class="custom-block bg-white shadow-lg">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h3>Stewardship</h3>
                        <p class="card-text">Continually look for ways to improve profitability and sustainability.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col py-3">
                <div class="custom-block bg-white shadow-lg">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h3>Service</h3>
                        <p class="card-text">Give our customers the best service and work hard to make a fair relationship.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div class="custom-block bg-white shadow-lg">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h3>Integrity</h3>
                        <p class="card-text">strive to always do the right thing; be honest.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5">
            <div class="col">
                <h3>OUR RECENT PROJECT</h3>
            </div>
        </div>
        <div class="row p-3">
            @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block bg-white shadow-lg">
                        <a href="{{route('showProject', $project->id)}}">
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
    <div class="container text-center mt-5 pb-5">
        <div class="row py-5">
            <div class="col">
                <h4>Hurry up! Contact us today</h4>
                <h2>FOR CONSULTATION ADVERTISING PROJECT</h2>
                <a href="{{route('contact')}}" class="btn btn-danger btn-lg">CONTACT US TODAY!</a>
            </div>
        </div>
    </div>
@endsection

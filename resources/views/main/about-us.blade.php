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
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div class="custom-block bg-white shadow-lg">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col py-3">
                <div class="custom-block bg-white shadow-lg">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                <div class="custom-block bg-white shadow-lg">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of the
                            card's content.</p>
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
            <div class="col p-3 d-flex justify-content-center">
                <figure class="figure">
                    <img src="{{ asset('BRAND2.png') }}" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption">Outdoor Type S6</figcaption>
                </figure>
            </div>
            <div class="col p-3">
                <figure class="figure">
                    <img src="{{ asset('BRAND2.png') }}" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption">Outdoor Type S6</figcaption>
                </figure>
            </div>
            <div class="col p-3">
                <figure class="figure">
                    <img src="{{ asset('BRAND2.png') }}" class="figure-img img-fluid rounded" alt="...">
                    <figcaption class="figure-caption">Outdoor Type S6</figcaption>
                </figure>
            </div>
        </div>
    </div>
    <div class="container text-center mt-5 pb-5">
        <div class="row py-5">
            <div class="col">
                <h4>Hurry up! Contact us today</h4>
                <h2>FOR CONSULTATION ADVERTISING PROJECT</h2>
                <button type="button" class="btn btn-danger btn-lg">CONTACT US TODAY!</button>
            </div>
        </div>
    </div>
@endsection

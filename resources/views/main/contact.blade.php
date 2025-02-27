@extends('layouts.app')

@section('content')
    @component('components.main.header')
        @slot('pageTitle')
            {{ $pageTitle }}
        @endslot
    @endcomponent

    <section class="section-padding section-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <h3 class="mb-4 pb-2">Send Us a Message</h3>
                </div>

                <div class="col-lg-6 col-12">
                    <form action="#" method="post" class="custom-form contact-form" role="form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" required="">

                                    <label for="floatingInput">Name</label>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        class="form-control" placeholder="Email address" required="">

                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" id="name" class="form-control"
                                        placeholder="Name" required="">

                                    <label for="floatingInput">Subject</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Tell me about the project"></textarea>

                                    <label for="floatingTextarea">Message</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12 ms-auto">
                                <button type="submit" class="form-control">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-lg-5 col-12 mx-auto mt-5 mt-lg-0">
                    <div class="row">
                        <div class="col-auto">
                            <p><i class="bi bi-telephone"></i></p>
                        </div>
                        <div class="col-auto">
                            <p>+62 812-1415-8256</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <p><i class="bi bi-envelope"></i></p>
                        </div>
                        <div class="col-auto">
                            <p>marcomm@visitiga.com</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <p><i class="bi bi-building"></i></p>
                        </div>
                        <div class="col-auto">
                            <p>Jl.Setra Dago Barat No.9 Antapani, Bandung</p>
                        </div>
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.658751502479!2d107.658852!3d-6.910995000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7f18a22d25f%3A0x6121c98f7ceade32!2sJl.%20Setra%20Dago%20Bar.%20No.9%2C%20Antapani%20Kulon%2C%20Kec.%20Antapani%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040291!5e0!3m2!1sen!2sid!4v1740671774626!5m2!1sen!2sid"
                        width="100%" height="250"" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </section>
@endsection

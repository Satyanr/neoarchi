<footer class="site-footer section-padding" style="background-color: #D84040">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-12 mb-4 pb-2">
                <a class="navbar-brand mb-2" href="#">
                    <img src="{{ asset('BRAND.png') }}" class="img-fluid w-50" alt="">
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-6">
                <h6 class="site-footer-title mb-3">Resources</h6>

                <ul class="site-footer-links">
                    <li class="site-footer-link-item">
                        <a href="{{ route('home') }}" class="site-footer-link">Home</a>
                    </li>

                    <li class="site-footer-link-item">
                        <a href="{{ route('about') }}" class="site-footer-link">About Us</a>
                    </li>

                    <li class="site-footer-link-item">
                        <a href="{{ route('project') }}" class="site-footer-link">Projects</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="{{ route('artikel') }}" class="site-footer-link">News</a>
                    </li>
                    <li class="site-footer-link-item">
                        <a href="{{ route('contact') }}" class="site-footer-link">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                <h6 class="site-footer-title mb-3">Information</h6>

                <p class="text-white d-flex mb-1">
                    <a href="https://wa.me/6281214158256" class="site-footer-link">
                        +62 812-1415-8256
                    </a>
                </p>

                <p class="text-white d-flex">
                    <a href="mailto:marcomm@visitiga.com" class="site-footer-link">
                        marcomm@visitiga.com
                    </a>
                </p>
            </div>

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                <p class="copyright-text mt-lg-5 mt-4" style="color: white">
                    Copyright © {{date('Y')}} NEO ARCH. All rights reserved.
                </p>

            </div>

        </div>
    </div>
</footer>

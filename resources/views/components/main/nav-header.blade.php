<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            {{-- <img src="{{asset('BRAND.png')}}" class="image-fluid" alt=""> --}}
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About US</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('project') ? 'active' : '' }}" href="{{ route('project') }}">Projects</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('artikel') ? 'active' : '' }}" href="{{ route('artikel') }}">News</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
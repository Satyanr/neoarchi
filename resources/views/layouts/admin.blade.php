<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.png')}}" />
    <link rel="stylesheet" href="{{ asset('asset-admin/css/styles.min.css')}}" />
    @livewireStyles
    @stack('css')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <x-admin.aside />
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <x-admin.header />
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    
    @livewireScripts
    @stack('script')
    <script src="{{asset('asset-admin/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('asset-admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('asset-admin/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('asset-admin/js/app.min.js')}}"></script>
    <script src="{{asset('asset-admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset('asset-admin/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{asset('asset-admin/js/dashboard.js')}}"></script>
</body>

</html>

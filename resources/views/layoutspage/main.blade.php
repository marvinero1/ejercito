<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>EMSE</title>
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
 

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Styles -->

    <!-- Favicon -->
    <link href="favicon.ico" rel="icon">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/page/lib/wow/wow.min.js') }}" rel="stylesheet">
    <link href="{{ asset('/page/lib/wow/wow.min.js') }}" rel="stylesheet">
    <link href="{{ asset('/page/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/page/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/page/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/page/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/page/css/style.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    {{-- <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> --}}

    <!-- Customized Bootstrap Stylesheet -->
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Template Stylesheet -->
    {{-- <link href="css/style.css" rel="stylesheet"> --}}
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" ondragstart="alert('No se puede 😌');return false" oncontextmenu="alert('No se puede seleccionar 😌');return false"
onselectstart="return false">
   <div id="overlayer"></div>
    {{-- <div class="loader">
        <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>  --}}

    <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
    <!-- Spinner End -->

    
    <div>
        @include('layoutspage.header')


          @yield('content')

        @include('layoutspage.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('/page/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/page/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/page/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/page/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('/page/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/page/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('/page/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('/page/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

</body>
</html>
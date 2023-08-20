<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Ejercito</title>
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="./images/favicon.png">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Styles -->

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
    {{-- <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div> --}}

    <!-- Spinner Start -->
    {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> --}}
    <!-- Spinner End -->

    <header>
        <div class="row">
            <div class="col">

            </div>

            <div class="col">
                <nav class="navbar navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>

        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4 right">
                    <a class="btnclosecollapse" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                        aria-controls="navbarToggleExternalContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        X
                    </a><br><br>
                    {{-- <h4 class="text-white">Collapsed contentaaaaaaa</h4> --}}
                    <ul class="list-group ">
                        <a href="/"><li class="list-group-item bg-dark">INICIO</li></a> 
                        <a href="/historia"><li class="list-group-item bg-dark">RESEÑA HISTORICA</li></a> 
                        <a href="/mision"><li class="list-group-item bg-dark">MISIÓN</li></a> 
                        <a href="/vision"><li class="list-group-item bg-dark">VISIÓN</li></a> 
                        <a href="/"> <li class="list-group-item bg-dark">PERFIL DE EGRESO</li></a> 
                        <a href="/armas"> <li class="list-group-item bg-dark">ARMAS Y ESPECIALIDADES</li></a> 
                        <a href="/postulante">
                            <li class="list-group-item bg-dark">ADMISIÓN 2024</li>
                        </a>
                      
                        <a href="/login">
                            <li class="list-group-item bg-dark">PROSPECTO</li>
                        </a> 
                        <a href="/login">
                            <li class="list-group-item bg-dark">SISTEMA</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <style>
            .navbar-dark {
                cursor: pointer;
                height: 88px;
                right: 0;
                line-height: 3.25em;
                position: fixed;
                text-align: right;
                top: 0;
                z-index: 10001;
                float: right;
                background-color: transparent !important;
            }

            .right {
                color: #000;
                height: 100%;
                padding: 3rem 2rem;
                position: fixed;
                right: 0;
                z-index: 10002;
            }

            .btnclosecollapse {
                cursor: pointer;
                float: right;
                background: transparent !important;
                color: white;
            }

            .list-group {
                line-height: 5ex;
            }
        </style>
    </header>
    <div>
        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="images/img/carousel-bg-4.jpg" alt="Image">
                        <div class="carousel-caption d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center justify-content-center justify-content-lg-start">
                                    <div class="col-12 col-lg-12 text-center text-center">
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">ESCUELA MILITAR
                                        </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">DE SARGENTOS DEL
                                        </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">EJERCITO </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">MAXIMILIANO
                                            PAREDES TEJERINA</h1>
                                        {{-- <a href="" class="btn btn-primary py-3 px-5 animated slideInDown"><i class="fa fa-arrow-right ms-3"></i></a> --}}
                                    </div>
                                    {{-- <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                              <img class="img-fluid" src="images/img/carousel-1.png" alt="">
                          </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="images/img/carousel-bg-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center justify-content-center justify-content-lg-start">
                                    <div class="col-12 col-lg-12 text-center text-center">
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">ESCUELA MILITAR
                                        </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">DE SARGENTOS DEL
                                        </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">EJERCITO </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">MAXIMILIANO
                                            PAREDES TEJERINA</h1>
                                        {{-- <a href="" class="btn btn-primary py-3 px-5 animated slideInDown"><i class="fa fa-arrow-right ms-3"></i></a> --}}
                                    </div>
                                    {{-- <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                              <img class="img-fluid" src="images/img/carousel-1.png" alt="">
                          </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="images/img/carousel-bg-5.jpg" alt="Image">
                        <div class="carousel-caption d-flex align-items-center">
                            <div class="container">
                                <div class="row align-items-center justify-content-center justify-content-lg-start">
                                    <div class="col-12 col-lg-12 text-center text-center">
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">ESCUELA MILITAR
                                        </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">DE SARGENTOS DEL
                                        </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">EJERCITO </h1>
                                        <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">MAXIMILIANO
                                            PAREDES TEJERINA</h1>
                                        {{-- <a href="" class="btn btn-primary py-3 px-5 animated slideInDown"><i class="fa fa-arrow-right ms-3"></i></a> --}}
                                    </div>
                                    {{-- <div class="col-lg-5 d-none d-lg-flex animated zoomIn">
                              <img class="img-fluid" src="images/img/carousel-1.png" alt="">
                          </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


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
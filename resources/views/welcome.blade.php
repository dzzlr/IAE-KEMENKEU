<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kemenkeu | Landing Page</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/80c8f3f2ea.js" crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/app.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body id="page-top">
    <!-- Navigation-->

    <nav id="navbar" class="navbar navbar-expand-md py-1 fixed-top gradient-y">
        <div class="container align-items-center">
            <a id="navbar-brand" class="align-items-center navbar-brand d-flex"
                href="{{ url('/') }}">
                <img src="{{ asset('img/logokemenkeu.png') }}" alt="">
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <i class="fa-solid fa-bars text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if(Route::has('register'))
                            <li class="nav-item mx-2">
                                <a href="{{ route('register') }}">
                                    <button class="btn rounded-pill ms-auto me-4 my-3" style="background-color:#0869A6">
                                        <span class="d-flex align-items-center">
                                            <span class="small" style="color:white">Register</span>
                                        </span>
                                    </button>
                                </a>
                            </li>
                        @endif

                        @if(Route::has('login'))
                            <li class="nav-item mx-2">
                                <a href="{{ route('login') }}">
                                    <button class="btn rounded-pill ms-auto me-4 my-3" style="background-color:#0869A6">
                                        <span class="d-flex align-items-center">
                                            <span class="small" style="color:white">Login</span>
                                        </span>
                                    </button>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            @php
                                $nick = explode(' ',trim(Auth::user()->name))
                            @endphp
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ "Hi, ".ucwords(strtolower($nick[0]))."" }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        {{ __('Dashboard Admin') }}
                                    </a>
                                @elseif(Auth::user()->role == 'user')
                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                        {{ __('Dashboard User') }}
                                    </a>
                                @elseif(Auth::user()->role == 'perizinan')
                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                        {{ __('Dashboard Perizinan') }}
                                    </a>
                                @elseif(Auth::user()->role == 'st')
                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                        {{ __('Dashboard Surat Tugas') }}
                                    </a>
                                @elseif(Auth::user()->role == 'profkeu')
                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                        {{ __('Dashboard Profesi Keuangan') }}
                                    </a>
                                @elseif(Auth::user()->role == 'kebijakan')
                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                        {{ __('Dashboard Kebijakan') }}
                                    </a>
                                @elseif(Auth::user()->role == 'sanksi')
                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                        {{ __('Dashboard Sanksi') }}
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <!-- Mashead header-->
    <header class="masthead bg-white">
        <div class="container px-5 ">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3" style="color:#0869A6
                        ">Kementrian Keuangan RI</h1>
                        <p class="lead fw-normal text-muted mb-5">Sistem Informasi Pusat Pembinaan profesi Keuangan
                            Kemnetrian Keuangan Republik Indonesia</p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">

                            <a class="btn text-white text-center explore-more-button" style="background-color:#0869A6
                            ">Learn More >
                                <a href="#!"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Masthead device mockup feature-->
                    <div class="masthead-device-mockup">
                        <div class="device-wrapper">
                            <img style="height:30rem" src="img/landingpage.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div>
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #0869A6">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-0">
                            <img src="img/logokemenkeu.png">
                            <p class="text-justify">
                                Kementerian Keuangan Republik Indonesia adalah kementerian negara di lingkungan
                                Pemerintah Indonesia yang membidangi urusan keuangan dan kekayaan negara.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Kontak Kami</h6>
                            <div class="row">
                                <div class="col col-1">
                                    <p><i class="fas fa-home mr-3"></i></p>
                                </div>
                                <div class="col col-11">
                                    <p>Jl. Dr.Wahidin Raya No 1 Jakarta 10710</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-1">
                                    <p><i class="fas fa-envelope mr-3"></i></p>
                                </div>
                                <div class="col col-11">
                                    <p>kemenkeu.prime@kemenkeu.go.id</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-1">
                                    <p><i class="fas fa-phone mr-3"></i></p>
                                </div>
                                <div class="col col-11">
                                    <p>(021) 3449230</p>
                                </div>
                            </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                            <!-- Facebook -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998"
                                href="http://www.facebook.com/KemenkeuRI" role="button"><i
                                    class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee"
                                href="http://www.twitter.com/KemenkeuRI" role="button"><i
                                    class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39"
                                href="http://youtube.com/KemenkeuRI" role="button"><i class="fab fa-youtube"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac"
                                href="https://www.instagram.com/KemenkeuRI" role="button"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2022 Copyright:
                <a class="text-white" href="https://www.kemenkeu.go.id">Kemenkeu Republik Indonesia</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- End of .container -->

</body>



</html>

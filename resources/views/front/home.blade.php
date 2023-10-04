<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/jpg" sizes="16x16" href="/favicon.jpg">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title', 'Home') </title>
    <link href="{{ asset('asset/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('asset/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .video-background {
            justify-content: center;
            position: relative;
            align-items: center;
            height: 100vh;
            overflow: hidden;

        }

        .video-background video {
            filter: brightness(50%);
            /* Mengurangi kecerahan menjadi 50% dari aslinya */
            contrast: 0.7;
            height: 100%;
            /* Mengurangi kontras sebesar 30% dari aslinya */
            /* Video akan memiliki tinggi 100% dari tinggi layar */
            /* Minimum tinggi video akan sama dengan tinggi layar */
            width: 100%;
            /* Video akan memiliki lebar 100% */
            /* Video akan mengisi area dengan menjaga aspek rasio */
        }

        .screen-layout {
            display: block;
            position: relative;
        }

        .navbar {
            top: 0;
            width: 100%;
            position: fixed;
            padding: 0 100px;
            transition: top 0.3s;
        }

        .content {
            display: flex;
            width: 52%;
            justify-content: center;
            align-items: center;
            margin-top: 400px;
            font-weight: bold;
            position: absolute;
            font-family: 'Nunito';

        }

        .content p {
            font-size: 32px;
            color: white;
        }

        .section1 {
            display: flex;
            align-items: center;
            height: 400px;
        }

        @media screen and (max-width:767px) {
            .content p {
                font-size: 24px;
            }
        }

        @media screen and (max-width:450px) {
            .content p {
                font-size: 18px;
            }

            .logo {
                font-size: 18px;

            }
        }
    </style>
</head>

<body>

    {{-- menu --}}


    {{-- @php
        if (Auth::user() && Auth::user()->hasRole('Admin')) {
            redirect('/dashboard');
        }
    @endphp --}}

    <div class="video-background">
        <video autoplay muted loop poster="{{ asset('asset/img/bali.jpg') }}" width="100%"
            style="object-fit: cover; position: absolute; z-index: -1;">
            <source src="{{ asset('asset/img/background.mp4') }}" type="video/mp4">
            <!-- Tambahan sumber video jika diperlukan -->
        </video>

        <nav class="navbar navbar-expand topbar" style="background-color: transparent!important; ">

            <!-- Sidebar Toggle (Topbar) -->
            {{-- <button id="sidebarToggleTop" class="btn btn-linkrounded-circle mr-3">
            <i class="fas fa-bars"></i>
        </button> --}}

            <!-- Topbar Search -->
            {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            </div>
          </form> --}}
            <div class="input-group-append">
                <a href="/" style="text-decoration: none">
                    <h4 class="logo text-white font-weight-bold">Wisata Papua </h4>
                </a>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                @if (!Auth::user())
                    <li class="nav-item dropdown no-arrow">
                        <a href="{{ route('login') }}" class="nav-link text-white">Masuk</a>
                    </li>
                    <li class="nav-item dropdown no-arrow">
                        <a href="{{ route('register') }}" class="nav-link text-white">Daftar</a>
                    </li>
                @else
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                            @if (Auth::user()->foto)
                                <img style="object-fit: cover" class="img-profile rounded-circle border-white"
                                    src="/storage/{{ Auth::user()->foto }}">
                            @else
                                <img class="img-profile rounded-circle border-white"
                                    src="{{ asset('asset/img/avatar2.png') }}">
                            @endif
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow " aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('user.profile', [Auth::user()->id]) }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                @endif
            </ul>
        </nav>

        <div class="container">

            <div class="content ">
                <p>Jelajahi keindahan alam Papua yang luar biasa
                    dan temukan keunikan budaya suku-suku asli yang memukau.</p>
            </div>
        </div>

    </div>

    <div class="container text-center" style="height: 1000px">
        <h1>Selamat Datang di Papua!</h1>
        <p>Jelajahi keindahan alam Papua yang luar biasa, nikmati petualangan eksotis di hutan hujan, dan temukan
            keunikan budaya suku-suku asli yang memukau.</p>
    </div>
    {{-- logout modal --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar aplikasi ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" apabila ingin keluar aplikasi</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

<script>
    let prevScrollPos = window.pageYOffset;
    console.log(prevScrollPos)
    window.onscroll = function() {
        let currentScrollPos = window.pageYOffset;
        if (prevScrollPos > currentScrollPos) {
            // Pengguna menggulir ke atas, munculkan navbar
            document.querySelector(".navbar").style.top = "0";
        } else {
            // Pengguna menggulir ke bawah, sembunyikan navbar
            document.querySelector(".navbar").style.top = "-80px";
            // Sesuaikan dengan tinggi navbar Anda
        }
        if (currentScrollPos > window.innerHeight) {
            document.querySelector(".navbar").style.background = "#101820";
        } else {
            document.querySelector(".navbar").style.background = "transparent";
        }
        prevScrollPos = currentScrollPos;
    }
</script>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('asset/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('asset/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('asset/js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ asset('asset/js/demo/datatables-demo.js') }}"></script>
<script src="{{ asset('asset/vendor/select2/dist/js/select2.min.js') }}"></script>

</html>
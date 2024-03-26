<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'Help Desk - TI')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/fonts/simple-line-icons.css') }}"><!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/slicknav.cs') }}"><!-- Slicknav -->

    <!-- Owl carousel -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/owl.theme.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/animate.css') }}"><!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/main.css') }}"><!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/responsive.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <!-- Responsive Style -->

</head>

<body>
    <header id="header-wrap">
        {{-- navbar --}}
        @include('layouts.client.navbar')

        @yield('content')

        <!-- Footer Section Start -->
        @if(!(\Request::is('auth/*') || \Request::is('profile')))

        <footer id="footer" class="footer-area section-padding">
            <div class="container center">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-5 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="footer-logo mb-3"><img src="{{ asset('templates/assets/images/bw-pusri.png') }}"
                                    alt=""></div>
                            <p>Help Desk - Layanan TI PT Pupuk Sriwidjaja</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
        <section id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Copyright © 2024. All Right Reserved</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Go to Top Link -->
        <a href="#" class="back-to-top">
            <i class="lni-arrow-up"></i>
        </a>

        <!-- Preloader -->
        <div id="preloader">
            <div class="loader" id="loader-1"></div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('client/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>

        <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/wow.js') }}"></script>
        <script src="{{ asset('client/assets/js/jquery.nav.js') }}"></script>
        <script src="{{ asset('client/assets/js/scrolling-nav.js') }}"></script>
        <script src="{{ asset('client/assets/js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/jquery.slicknav.js') }}"></script>

        <script src="{{ asset('client/assets/js/main.js') }}"></script>
        <script src="{{ asset('client/assets/js/form-validator.min.js') }}"></script>
        <script src="{{ asset('client/assets/js/contact-form-script.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/forms/editors.js') }}"></script>
        @endif
</body>

</html>

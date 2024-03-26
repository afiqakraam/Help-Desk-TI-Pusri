@extends('layouts.client.main')
@section('content')
    <!-- Hero Area Start -->
    <div id="hero-area" class="hero-area-bg mb-4">
        <div class="overlay"></div>
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12">
                    <div class="contents text-center">
                        @if (Session::has('success'))
                            <h9 class="badge badge-info">Ticket Created Successfully</h9>
                        @endif
                        <h2 class="head-title wow fadeInUp">Selamat Datang di Help Desk TI</h2>
                        <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                            <a href="create-ticket" class="btn btn-outline-primary">Create Ticket</a>
                        </div>
                    </div>
                    <div class="img-thumb text-center wow fadeInUp" data-wow-delay="0.6s">
                        <img class="img-fluid" src="{{ asset('client/assets/img/cs.png') }}" alt="" width="250px">
                    </div>
                </div>
            </div>
        </div>
    </div>

    </header>

    <!-- Services Section Start -->
    <section id="feature" class="section-padding">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Fitur Layanan</h2>
            </div>
            <div class="row clearfix">
                <div class="col-md-6 col-lg-4">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
                        <div class="icon"><i class="icon-screen-desktop"></i></div>
                        <div class="services-content">
                            <h3><a href="#">Layanan TI</a></h3>
                            <p>Teknisi<br>Zoom<br>Troubleshooting</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                        <div class="icon"><i class="icon-bar-chart"></i>
                        </div>
                        <div class="services-content">
                            <h3><a href="#">Pengembangan</a></h3>
                            <p>Permintaan Aplikasi<br>Pengembangan Aplikasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.9s">
                        <div class="icon"><i class="icon-globe"></i></div>
                        <div class="services-content">
                            <h3><a href="#">Infrastruktur</a></h3>
                            <p>Permintaan Domain<br>Permintaan Pembuatan Email<br>Permintaan Deployment Aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

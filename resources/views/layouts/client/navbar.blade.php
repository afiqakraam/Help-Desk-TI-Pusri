<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-menu"></span>
                <span class="icon-menu"></span>
                <span class="icon-menu"></span>
            </button>
            <a href="index.html" class="navbar-brand"><img src="assets/img/logo.svg" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto justify-content-left clearfix">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a class="nav-link"
                        href="/">Home</a></li>
                @if (request()->is('create-ticket'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Fitur Layanan</a></li>
                @elseif (request()->is('profile'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Fitur Layanan</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('index') }}#feature">Fitur Layanan</a></li>
                @endif
                <li class="nav-item {{ request()->is('create-ticket') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('ticket.create') }}">Create Ticket</a></li>
                @guest
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('client.dashboard') }}">Check Ticket</a></li>
                    <li class="nav-item {{ request()->is('profiles') ? 'active' : '' }}"><a class="nav-link" 
                        href="{{ route('auth.profiles') }}">Profile</a></li>
                @endguest
                <li class="nav-item"><a class="nav-link" href="{{ route('view-pdf') }}">How To Create Ticket</a></li>
            </ul>

            @if (Auth::check() && Auth::user()->hasRole('Client'))
                <div class="btn-sing float-right">
                    <div class="user-account margin-0">
                        <div class="dropdown mt-0">
                            <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                                <img src="{{ asset('templates/assets/images/avatar.png') }}" width="23px"
                                    rounded-circle user-photo" alt="User Profile Picture">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right account">
                                <li>
                                    <span>Welcome, </span>
                                    <strong>{{ Auth::user()->name }}</strong>
                                    <br>
                                    <strong>Client</strong>
                                </li>
                                <li class="divider"></li>
                                <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="logout"><i class="/logout"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="btn-sing float-right">
                    <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-primary" href="#">Register</a>
                </div>
            @endif

        </div>
    </div>

    <!-- Mobile Menu Start -->
    <ul class="mobile-menu navbar-nav">
        <li><a class="page-scroll" href="/">Home</a></li>
        <li><a class="page-scroll" href="/feature">Create Ticket</a></li>
        <li><a class="page-scroll" href="#About">Check Ticket</a></li>
        <li><a class="page-scroll" href="#team">How To Create Ticket</a></li>
        <li><a class="page-scroll" href="#profile">Profile</a></li>
    </ul>

</nav>

<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('templates/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('templates/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/pages/forms/editors.js') }}"></script>
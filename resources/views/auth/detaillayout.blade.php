<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', 'Detail Ticket | Help Desk - TI')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
    

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('templates/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/parsleyjs/css/parsley.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}">

    <!-- MAIN CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('templates/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('templates/assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>

    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/forms/editors.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
</head>

<body>
    <!-- Overlay For Sidebars -->
    <div id="wrapper">
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <div class="navbar-brand">
                    <a href="/home">
                        <img src="{{ asset('templates/assets/images/pusri.png') }}" alt="Pusri"
                            class="img-responsive logo">
                    </a>
                </div>
                <style>
                    .navbar-brand .logo {
                        width: 100%;
                        /* Sesuaikan dengan ukuran yang Anda inginkan */
                        height: auto;
                        /* Ini memastikan gambar tetap proporsional */
                    }
                </style>

                <div class="navbar-right">
                    <div id="navbar-menu">
                        
                            <ul class="nav navbar-nav pull-right">
                                @if (Auth::check())
                                    @if (Auth::user()->hasRole('Admin'))
                                        <li><a href="/home" class="icon-menu">Dashboard</a></li>
                                        <li><a href="/users" class="icon-menu">Users Management</a></li>
                                        <li><a href="/roles" class="icon-menu">Role Management</a></li>
                                        <li>
                                            <div class="user-account margin-0">
                                                <div class="dropdown mt-0">
                                                    <a href="javascript:void(0);" class="dropdown-toggle user-name"
                                                        data-toggle="dropdown">
                                                        <img src="{{ asset('templates/assets/images/avatar.png') }}"
                                                            width="23px" rounded-circle user-photo"
                                                            alt="User Profile Picture">
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right account">
                                                        <li>
                                                            <span>Welcome,</span>
                                                            <strong>{{ Auth::user()->name }}</strong>
                                                            <strong>Role - Admin</strong>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="{{ route('auth.profiles') }}"><i class="icon-user"></i>My
                                                                Profile</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="logout"><i class="icon-power"></i>Logout</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @elseif(Auth::user()->hasRole('PIC'))
                                        <li><a href="/home" class="icon-menu">Dashboard</a></li>
                                        <li>
                                            <div class="user-account margin-0">
                                                <div class="dropdown mt-0">
                                                    <a href="javascript:void(0);" class="dropdown-toggle user-name"
                                                        data-toggle="dropdown">
                                                        <img src="{{ asset('templates/assets/images/avatar.png') }}"
                                                            width="23px" rounded-circle user-photo"
                                                            alt="User Profile Picture">
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right account">
                                                        <li>
                                                            <span>Welcome,</span>
                                                            <strong>{{ Auth::user()->name }}</strong>
                                                            <strong>Role - PIC</strong>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="/profiles"><i class="icon-user"></i>My
                                                                Profile</a>
                                                        </li>
                                                        <li><a href="javascript:void(0);"><i
                                                                    class="icon-settings"></i>Settings</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="logout"><i class="icon-power"></i>Logout</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @elseif (Auth::user()->hasRole('Client'))
                                        <li>
                                            <div class="user-account margin-0">
                                                <div class="dropdown mt-0">
                                                    <a href="javascript:void(0);" class="dropdown-toggle user-name"
                                                        data-toggle="dropdown">
                                                        <img src="{{ asset('templates/assets/images/avatar.png') }}"
                                                            width="23px" rounded-circle user-photo"
                                                            alt="User Profile Picture">
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right account">
                                                        <li>
                                                            <span>Welcome,</span>
                                                            <strong>{{ Auth::user()->name }}</strong>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="/profiles"><i class="icon-user"></i>My
                                                                Profile</a>
                                                        </li>
                                                        <li><a href="app-inbox.html"><i
                                                                    class="icon-envelope-open"></i>Messages</a>
                                                        </li>
                                                        <li><a href="javascript:void(0);"><i
                                                                    class="icon-settings"></i>Settings</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="logout"><i class="icon-power"></i>Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </li>
                    </div>
                </div>

            </div>
        </nav>

    </div>
    @yield('content')

    <!-- Javascript -->
    <script>
        $(function() {
            // validation needs name of the element
            $('#food').multiselect();

            // initialize after multiselect
            $('#basic-form').parsley();
        });
    </script>
</body>

</html>

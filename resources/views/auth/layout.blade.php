<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Help Desk | TI</title>
</head>

<body>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                @can('user-list')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">User</a>
                    </li>
                @endcan
                @can('role-list')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">Role</a>
                    </li>
                @endcan
                @can('list-ticket')
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ticket</a>
                    </li>
                @endcan
                <li>
                    <div class="user-account margin-0">
                        <div class="dropdown mt-0">
                            <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                                <img src="../assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right account">
                                <li>
                                    <span>Welcome,</span>
                                    <strong>Alizee Thomas</strong>
                                </li>
                                <li class="divider"></li>
                                <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                                <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
        </div>
    </nav> --}}
    @if(Request::is('home', 'dashboard', 'dashboard-client', 'users'))

    <nav class="navbar navbar-fixed-top">
        <div class="container">
        
            <div class="navbar-right">
                <form id="navbar-search" class="navbar-form search-form">
                    <input value="" class="form-control" placeholder="Search here..." type="text">
                    <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                </form>                

                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <div class="user-account margin-0">
                                <div class="dropdown mt-0">
                                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                                        <img src="{{ asset('templates/assets/images/xs/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right account">
                                        <li>
                                            <span>Welcome,</span>
                                            <strong>HAHAHEHE</strong>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                                        <li><a href="/logout"><i class="icon-power"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <br>
                </div>
            </div>

            <div class="navbar-btn">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                    <i class="lnr lnr-menu fa fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>
    @endif
    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>




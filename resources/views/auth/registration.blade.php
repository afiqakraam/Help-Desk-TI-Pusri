@extends('auth.layout')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <title>:: Lucid H :: Sign Up</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
        <meta name="author" content="WrapTheme, design by: ThemeMakker.com">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="{{ asset('templates//assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('templates//assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('templates//assets/vendor/animate-css/animate.min.css') }}">
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}">
    </head>

        <!-- WRAPPER -->
        <div id="wrapper">
            <div class="vertical-align-wrap">
                <div class="vertical-align-middle auth-main">
                    <div class="auth-box">
                        <div class="top">
                            <img src="{{ asset('templates/assets/images/pusri.svg') }}" alt="Pusri">
                        </div>
                        <div class="card">
                            <div class="header">
                                <p class="lead">Create an account</p>
                            </div>
                            <div class="body">
                                <form action="{{ route('register.post') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="control-label sr-only">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your name" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-email" class="control-label sr-only">Email</label>
                                        <input type="email" class="form-control" id="signup-email" name="email"
                                            placeholder="Your email" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp" class="control-label sr-only">Phone Number</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp"
                                            placeholder="Your phone number" required>
                                        @if ($errors->has('no_telp'))
                                            <span class="text-danger">{{ $errors->first('no_telp') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-password" class="control-label sr-only">Password</label>
                                        <input type="password" class="form-control" id="signup-password" name="password"
                                            placeholder="Password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                                    <div class="bottom">
                                        <span class="helper-text">Already have an account? <a
                                                href="/login">Login</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
    </body>

    </html>
@endsection

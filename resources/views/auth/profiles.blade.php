@extends('layouts.client.main')

@section('title', 'Profile | Help Desk - TI')

@section('content')
    <div class="container mt-5 p-5">
        <div id="main-content" class="profilepage_2 blog-page">
            <div class="container">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <h5>User Profile</h5>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row clearfix">

                        <div class="col-lg-4 col-md-12">
                            <div class="card profile-header p-3">
                                <div class="body">
                                    <div class="profile-image"> <img src="templates/assets/images/avatar.png" width="30%"
                                            class="rounded-circle" alt=""> </div>
                                    <div>
                                        <h5 class="m-b-0"><strong>{{ Auth::user()->name }}</strong></h5>
                                    </div>
                                    <div class="m-t-15">
                                        <button class="btn btn-primary">Follow</button>
                                        <button class="btn btn-outline-secondary">Message</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-5 col-md-12">

                            <div class="tab-content padding-0">
                                <div class="" id="Settings">

                                    <div class="card p-3">
                                        <div class="body">
                                            <form action="{{ route('profile.post') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12">
                                                        <h6>Account Data</h6>
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ Auth::user()->email }}" readonly
                                                                placeholder="Username">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ Auth::user()->name }}" placeholder="Full Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="no_telp" class="form-control"
                                                                value="{{ Auth::user()->no_telp }}"
                                                                placeholder="Phone Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="foto">Foto</label>
                                                            <input id="foto" name="foto" type="file"
                                                                name="foto" class="form-control">
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-12 col-md-12">
                                                        <h6>Change Password</h6>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control"
                                                                placeholder="Current Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control ml-3">
                                                            <option>Select Unit</option>
                                                            <option value="layananti" lang="en">Layanan TI</option>
                                                            <option value="pengembangan">Pengembangan</option>
                                                            <option value="infrastruktur">Infrastruktur TI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

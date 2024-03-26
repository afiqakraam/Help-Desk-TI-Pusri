@extends('layouts.client.main')

@section('title', 'Create Ticket | Help Desk - TI')

@section('content')
    <style>
        label {
            font-size: 20px;
        }
    </style>

    <div class="container p-4 mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
                    @csrf <!-- Menambahkan CSRF token untuk keamanan -->
                    <h3 class="home-label">Need Support? Create a Ticket.</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="subject" class="font-weight-bold">Ticket Subject</label>
                                <input id="subject" type="text" name="subject"
                                    class="form-control @error('subject') is-invalid @enderror"
                                    placeholder="Enter ticket subject here" required>
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input id="name" type="text" name="name" value="{{ Auth::check() ? Auth::user()->name : '' }}" class="form-control"
                                    placeholder="Enter your name" readonly>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Your Email</label>
                                <input id="email" type="email" name="email" value="{{ Auth::check() ? Auth::user()->email : ''}}"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email"
                                    required>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="priority" class="font-weight-bold">Priority</label>
                                <select id="priority" name="priority"
                                    class="form-control @error('priority') is-invalid @enderror">
                                    <option value="0">Low</option>
                                    <option value="1">Medium</option>
                                    <option value="2">High</option>
                                    <option value="3">Urgent</option>
                                </select>
                            </div>
                            @error('priority')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="" class="font-weight-bold">Type</label><br>
                            <select name="jenisid" id="jenisid" class="form-control">
                                <option value="0">Select ... </option>
                                <option value="keluhan">Keluhan</option>
                                <option value="permintaan">Permintaan</option>
                            </select>
                            @error('jenisid')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label class="font-weight-bold">Destination</label>
                                <select name="destination" id="destinatio"
                                    class="form-control @error('destination') is-invalid @enderror">
                                    <option value="0">Select ... </option>
                                    <option value="layanan it">Layanan TI</option>
                                    <option value="pengembangan">Pengembangan</option>
                                    <option value="infrastruktur">Infrastruktur</option>
                                </select>
                            </div>
                            @error('destination')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <div class="card">
                                    <div class="card-body">
                                        <textarea id="ckeditor" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="image" class="font-weight-bold">Upload Image</label>
                                <input id="image" type="file" name="file" id="uploadImage" class="form-control" />
                            </div>
                        </div>
                        @if (Auth::check())
                            <div class="row">
                                <div class="col">
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

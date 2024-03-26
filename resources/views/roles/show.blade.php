@extends('auth.detailLayout')

@section('title', 'Show Role | Help Desk - TI')

@section('content')
<div class="container mt-5 p-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Show Role</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $role->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permissions:</strong>
                                <ul>
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

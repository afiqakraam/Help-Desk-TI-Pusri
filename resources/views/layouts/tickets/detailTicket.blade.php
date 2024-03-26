@extends('auth.detaillayout')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2><a href="../home" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Ticket Detail</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Ticket Detail</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>
                                <div class="form-group">
                                    <label>Ticket Subject</label>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $ticket->subject }}</h6>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $ticket->name }}</h6>
                                </div>
                                <div class="form-group">
                                    <label>Priority</label>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        @if ($ticket->priority == '0')
                                            Low
                                        @elseif ($ticket->priority == '1')
                                            Medium
                                        @elseif ($ticket->priority == '2')
                                            High
                                        @elseif ($ticket->priority == '3')
                                            Urgent
                                        @endif
                                    </h6>
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        @if ($ticket->type == 'keluhan')
                                            <span class="badge badge-danger">{{ $ticket->type }}</span>
                                        @else
                                            <span class="badge badge-success">{{ $ticket->type }}</span>
                                        @endif
                                    </h6>
                                </div>
                                <div class="form-group">
                                    <label>Destination</label>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        @if ($ticket->destination == 'layanan it')
                                            Layanan TI
                                        @elseif($ticket->destination == 'pengembangan')
                                            Pengembangan
                                        @elseif($ticket->destination == 'infrastruktur')
                                            Infrastruktur TI
                                        @else
                                            {{ $ticket->destination }}
                                        @endif
                                    </h6>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        @if ($ticket->status == 'open')
                                            <span class="badge badge-warning">{{ $ticket->status }}</span>
                                        @elseif ($ticket->status == 'ongoing')
                                            <span class="badge badge-primary">{{ $ticket->status }}</span>
                                        @elseif ($ticket->status == 'review')
                                            <span class="badge badge-info">{{ $ticket->status }}</span>
                                        @elseif ($ticket->status == 'closed')
                                            <span class="badge badge-success">{{ $ticket->status }}</span>
                                        @endif
                                    </h6>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <h6 class="card-subtitle mb-2 text-muted">{!! $ticket->message !!}</h6>
                                </div>

                                <div class="form-group">
                                    <label>Images</label>
                                    <h6 class="card-subtitle mb-2 text-muted"></h6><img src="/images/{{ $ticket->file }}"
                                        alt="image" width="300px"></h6>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label>Reply Message by PIC
                                    </label>
                                    <h6 class="card-subtitle mb-2 text-muted">{!! $ticket->reply_message !!}</h6>
                                </div>
                                @if ($ticket->status == 'review')
                                    <button type="submit" class="btn btn-danger">Close Ticket</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('auth.detaillayout')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2><a href="../home" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a>Reply Ticket</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Reply Message</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <form id="basic-form" action="{{ route('ticket.reply.post', $ticket->id) }}" method="post"
                                novalidate>
                                @csrf
                                @method('PATCH')
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
                                            <td>Rendah</td>
                                        @elseif ($ticket->priority == '1')
                                            <td>Medium</td>
                                        @elseif ($ticket->priority == '2')
                                            <td>High</td>
                                        @elseif ($ticket->priority == '3')
                                            <td>Urgent</td>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label>Type</label>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        @if ($ticket->type == 'keluhan')
                                            <td>Keluhan</td>
                                        @elseif ($ticket->type == 'permintaan')
                                            <td>Permintaan</td>
                                        @endif
                                    </h6>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <h6 class="card-subtitle mb-2 text-muted">{!! $ticket->message !!}</h6>
                                </div>

                                <div class="form-group">
                                    <label>Reply Message</label>
                                    <h6 class="card-subtitle mb-2 text-muted">{!! $ticket->reply_message !!}</h6>
                                </div>
                                @if ($ticket->reply_message == 'Belum ada pesan balasan')
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <textarea id="ckeditor" name="reply_message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Balas</button>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

<!doctype html>
<html lang="en">

<head>
    <title>Check Ticket | Help Desk TI</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/animate-css/animate.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('templates/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/assets/vendor/morrisjs/morris.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}">
</head>

    <div id="wrapper">

        <div id="main-content">
            <div class="container">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <h2><a href="../home" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                        class="fa fa-arrow-left"></i></a>Dashboard</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Recent Tickets</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Ticket Number</th>
                                                <th>Subject</th>
                                                <th>Nama</th>
                                                <th>Priority</th>
                                                <th>Type</th>
                                                <th>Destination</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $d->ticket_number }}</td>
                                                    <td>{{ $d->subject }}</td>
                                                    <td>{{ $d->name }}</td>
                                                    @if ($d->priority == '0')
                                                        <td>Rendah</td>
                                                    @elseif ($d->priority == '1')
                                                        <td>Medium</td>
                                                    @elseif ($d->priority == '2')
                                                        <td>High</td>
                                                    @elseif ($d->priority == '3')
                                                        <td>Urgent</td>
                                                    @endif
                                                    <td>
                                                        @if ($d->type == 'keluhan')
                                                            <span class="badge badge-danger">{{ $d->type }}</span>
                                                        @elseif($d->type == 'permintaan')
                                                            <span
                                                                class="badge badge-success">{{ $d->type }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($d->destination == 'layanan it')
                                                            Layanan TI
                                                        @elseif($d->destination == 'pengembangan')
                                                            Pengembangan
                                                        @endif
                                                    </td>
                                                    <td><label class="badge">{{ $d->status }}</label></td>
                                                    <td>
                                                        <form action="">
                                                        @if ($d->status == 'REVIEW')
                                                            <a href="{{ route('ticket.close', $d->id) }}"
                                                                class="btn btn-success">Close</a>
                                                        @endif
                                                        <a href="{{ route('tickets.show', $d->id) }}"
                                                            class="btn btn-primary">Detail</a>
                                                    </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

</html>

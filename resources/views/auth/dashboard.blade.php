@extends('auth.detaillayout')

@section('content')
    <div id="main-content">
        <div class="container">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Dashboard</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{ $ticketCount }}<i class="icon-basket-loaded float-right"></i></h3>
                            <span>Tiket Masuk</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{ $clientCount }}<i class="icon-user-follow float-right"></i></h3>
                            <span>Pengguna</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                            <div class="progress-bar" data-transitiongoal="67"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3>{{ $picCount }}<i class="fa fa-dollar float-right"></i></h3>
                            <span>PIC</span>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                            <div class="progress-bar" data-transitiongoal="89"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h5>Ticket Status</h5>
                            <p>On Going : {{ $ticketOngoing }}</i></p>
                            <p>Close : {{ $ticketClosed }}</i></p>
                            <p>Open : {{ $ticketOpen }}</i></p>
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                            <div class="progress-bar" data-transitiongoal="68"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="container">
                    <form>
                        <label for="monthPicker">Select a Month:</label>
                        <input type="text" id="monthPicker" name="month" placeholder="Select month">
                        <button id="filterBtn" class="btn btn-info" type="submit">Filter</button>
                    </form>
                    <!-- Display your filtered data here -->

                </div>

                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div id="filteredDataContainer">
                            <!-- Filtered data will be displayed here -->
                            <canvas id="keluhanChart" width="400" height="200"></canvas>
                            <canvas id="permintaanChart" width="400" height="200"></canvas>
                        </div>

                        <div class="header">
                            <h2>Recent Tickets</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <!-- Tambahkan atribut id pada tabel -->
                                <table id="ticket-table" class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width:60px;">ID</th>
                                            <th>Tanggal Dibuat</th>
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
                                        @foreach ($tickets as $ticket)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $ticket->created_at }}</td>
                                                <td>{{ $ticket->subject }}</td>
                                                <td>{{ $ticket->name }}</td>
                                                @if ($ticket->priority == '0')
                                                    <td>Low</td>
                                                @elseif ($ticket->priority == '1')
                                                    <td>Medium</td>
                                                @elseif ($ticket->priority == '2')
                                                    <td>High</td>
                                                @elseif ($ticket->priority == '3')
                                                    <td>Urgent</td>
                                                @endif
                                                <td>
                                                    @if ($ticket->type == 'keluhan')
                                                        <span class="badge badge-danger">{{ $ticket->type }}</span>
                                                    @elseif($ticket->type == 'permintaan')
                                                        <span class="badge badge-success">{{ $ticket->type }}</span>
                                                    @else
                                                        <span class="badge">{{ $ticket->type }}</span>
                                                    @endif
                                                </td>
                                                @if ($ticket->destination == 'layanan it')
                                                    <td>Layanan TI</td>
                                                @elseif ($ticket->destination == 'pengembangan')
                                                    <td>Pengembangan</td>
                                                @elseif ($ticket->destination == 'infrastruktur')
                                                    <td>Infrastruktur TI</td>
                                                @endif
                                                <td><label class="badge">{{ $ticket->status }}</label></td>
                                                <td>
                                                    <form action="{{ route('tickets.destroy', $ticket->id) }}"
                                                        method="post">
                                                        {{ csrf_field() }}
                                                        @method('DELETE')

                                                        @if (Auth::user()->hasRole('Admin'))
                                                            @if ($ticket->status == 'open')
                                                                <a href="{{ route('ticket.process', ['id' => $ticket->id, 'type' => 'ongoing']) }}"
                                                                    class="btn btn-success">Teruskan Ke PIC</a>
                                                            @endif
                                                        @elseif(Auth::user()->hasRole('PIC'))
                                                            @if ($ticket->status == 'ongoing')
                                                                <a href="{{ route('ticket.reply', $ticket->id) }}"
                                                                    class="btn btn-primary">Reply</a>
                                                                {{-- @elseif ($ticket->status == 'REVIEW')
                                                                <a href="{{ route('ticket.process', ['id' => $ticket->id, 'type' => 'review']) }}"
                                                                    class="btn btn-success">Review</a> --}}
                                                            @endif
                                                        @endif
                                                        <a href="{{ route('tickets.show', $ticket->id) }}"
                                                            class="btn btn-info">Detail</a>
                                                        <a href="" class="btn btn-warning">Edit</a>
                                                        <button class="btn btn-danger" type="submit">Delete</button>
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

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        flatpickr("#monthPicker", {
            dateFormat: "m",
            enable: [
                function(date) {
                    // Disable dates after the current month
                    return date <= new Date();
                }
            ]
        });
    </script>
    <script>
        var created_at = [];
        document.getElementById('filterBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default form submission behavior
            var month = document.getElementById('monthPicker').value;
            var url = "{{ route('filterbymonth') }}";
            var token = "{{ csrf_token() }}";

            // Send AJAX request
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    month: month,
                    _token: token
                },
                success: function(data) {
                    console.log(data);
                    var keluhanCounts = {};
                    var permintaanCounts = {};

                    // Combine values with the same date and destination
                    data.forEach(function(ticket) {
                        var dataCreate = new Date(ticket.created_at).toLocaleDateString();
                        if (ticket.type === 'keluhan') {
                            if (!keluhanCounts[ticket.destination]) {
                                keluhanCounts[ticket.destination] = {};
                            }
                            keluhanCounts[ticket.destination][dataCreate] = (keluhanCounts[
                                ticket.destination][dataCreate] || 0) + 1;
                        } else if (ticket.type === 'permintaan') {
                            if (!permintaanCounts[ticket.destination]) {
                                permintaanCounts[ticket.destination] = {};
                            }
                            permintaanCounts[ticket.destination][dataCreate] = (
                                permintaanCounts[ticket.destination][dataCreate] || 0) + 1;
                        }
                    });

                    var keluhanDatasets = [];
                    var permintaanDatasets = [];

                    Object.keys(keluhanCounts).forEach(function(destination) {
                        var data = Object.values(keluhanCounts[destination]);
                        keluhanDatasets.push({
                            label: 'Keluhan ' + destination + ' Ticket Count',
                            data: data,
                            fill: false,
                            borderColor: getRandomColor(),
                            borderWidth: 1
                        });
                    });

                    Object.keys(permintaanCounts).forEach(function(destination) {
                        var data = Object.values(permintaanCounts[destination]);
                        permintaanDatasets.push({
                            label: 'Permintaan ' + destination + ' Ticket Count',
                            data: data,
                            fill: false,
                            borderColor: getRandomColor(),
                            borderWidth: 1
                        });
                    });

                    var keluhanCtx = document.getElementById('keluhanChart').getContext('2d');
                    var permintaanCtx = document.getElementById('permintaanChart').getContext('2d');

                    var keluhanChart = new Chart(keluhanCtx, {
                        type: 'line',
                        data: {
                            labels: Object.keys(keluhanCounts[Object.keys(keluhanCounts)[0]] ||
                            {}),
                            datasets: keluhanDatasets
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    type: 'time',
                                    time: {
                                        unit: 'day',
                                        displayFormats: {
                                            day: 'DD MMM YYYY'
                                        }
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    var permintaanChart = new Chart(permintaanCtx, {
                        type: 'line',
                        data: {
                            labels: Object.keys(permintaanCounts[Object.keys(permintaanCounts)[
                                0]] || {}),
                            datasets: permintaanDatasets
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    type: 'time',
                                    time: {
                                        unit: 'day',
                                        displayFormats: {
                                            day: 'DD MMM YYYY'
                                        }
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>






    <script>
        $(document).ready(function() {
            $('#ticket-table').DataTable();
        });
    </script>
@endsection

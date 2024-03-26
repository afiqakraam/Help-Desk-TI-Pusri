<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Detail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for this template */
        .card {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-weight: bold;
        }

        .card-text {
            color: #333;
        }
    </style>
</head>

<body>
    @php
        $data = $dataUserTicket;
        $tickets = '';
        foreach ($data as $value) {
            $tickets = $value->tickets;
        }
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @foreach ($tickets as $t)
                    @foreach ($data as $du)
                        <div class="card">
                            <img class="card-img-top" src="https://via.placeholder.com/300" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $t->subject }}</h5>
                                <p class="card-text">{{ $du->name }}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>

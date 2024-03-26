@extends('auth.detaillayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chat with Client</div>

                <div class="card-body">
                    <div id="chat-messages">
                        <!-- Here you will use a @foreach loop to display the messages -->
                        <!-- Each message should be wrapped in a <div> -->
                        <!-- For example: -->
                        <!-- @foreach ($messages as $message) -->
                        <!-- <div class="message"> -->
                        <!--     <strong>{{ $message->user->name }}:</strong> {{ $message->body }} -->
                        <!-- </div> -->
                        <!-- @endforeach -->
                    </div>

                    <form method="POST" action="{{ route('send.message') }}">
                        @csrf
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" class="form-control" name="message" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
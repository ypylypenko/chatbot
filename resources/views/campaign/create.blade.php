@extends('app')

@section('content')
    <div class="container">
        <h2>Create New Example</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('campaigns.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message"></textarea>
            </div>

            <div class="form-group">
                <label for="scheduled-time">Scheduled time:</label>
                <input type="time" class="form-control" id="scheduled-time" name="scheduled_time" value="">
            </div>

            <div class="form-group">
                <label for="scheduled-date">Scheduled date:</label>
                <input type="date" class="form-control" id="scheduled-date" name="scheduled_date" value="">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

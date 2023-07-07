@extends('app')

@section('content')
    <div class="container">
        <h2>Example Details</h2>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $campaign->title }}" readonly>
        </div>

        <div class="form-group">
            <label for="description">Message:</label>
            <textarea class="form-control" id="description" name="description" readonly>{{ $campaign->message }}</textarea>
        </div>

        <div class="form-group">
            <label for="scheduled-time">Scheduled time:</label>
            <input type="time" class="form-control" id="scheduled-time" name="scheduled_time" value="{{ $campaign->scheduled_time }}" readonly>
        </div>

        <div class="form-group">
            <label for="scheduled-date">Scheduled date:</label>
            <input type="date" class="form-control" id="scheduled-date" name="scheduled_date" value="{{ $campaign->scheduled_date }}" readonly>
        </div>


        <div class="form-group">
            <span class="badge bg-info">{{ $campaign->status }}</span>
        </div class="form-group">

        <a class="btn btn-secondary" href="{{ route('campaigns.index') }}">Back</a>
    </div>
@endsection

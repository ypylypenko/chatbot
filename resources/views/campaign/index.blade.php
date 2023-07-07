@extends('app')

@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Campaigns</h1>
    </div>

    <div class="container">
        <a class="btn btn-success mb-2" href="{{ route('campaigns.create') }}">Create New Campaign</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="table-responsive small">
            <table class="table table-bordered table-sm">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th></th>
                    <th>Action</th>
                </tr>
                @foreach ($campaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->id }}</td>
                        <td>{{ $campaign->title }}</td>
                        <td>{{ $campaign->contact_count }}/{{ $campaign->message_count }}</td>
                        <td>
                            <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('campaigns.show', $campaign->id) }}">Show</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

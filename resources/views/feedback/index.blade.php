@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Feedback</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>File</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->username }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->feedback }}</td>
                    <td>{{ $feedback->file }}</td>
                    <td>
                        <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

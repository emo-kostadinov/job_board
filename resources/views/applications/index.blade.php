@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Applications</h1>
    <a href="{{ route('applications.create') }}" class="btn btn-primary mb-3">Add New Application</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant Name</th>
                <th>Job</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->applicant_name }}</td>
                <td>{{ $application->job->title ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('applications.show', $application) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('applications.edit', $application) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('applications.destroy', $application) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No applications found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

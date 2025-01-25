@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jobs</h1>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">Add New Job</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Job Title</th>
                <th>Description</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->description }}</td>
                <td>{{ $job->company->company_name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('jobs.edit', $job) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No jobs found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

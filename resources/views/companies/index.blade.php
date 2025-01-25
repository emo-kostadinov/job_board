@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Companies</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Add New Company</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Company Name</th>
                <th>Location</th>
                <th>Jobs</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->company_name }}</td>
                <td>{{ $company->location }}</td>
                <td>
                    <ul>
                        @forelse($company->jobs as $job)
                            <li>{{ $job->title }}</li>
                        @empty
                            <li>No jobs available</li>
                        @endforelse
                    </ul>
                </td>
                <td>
                    <a href="{{ route('companies.show', $company) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No companies found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Job Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $job->id }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $job->title }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $job->description }}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>{{ $job->company->company_name ?? 'N/A' }}</td>
        </tr>
        <th>Salaryy</th>
            <td>{{ $job->salary ?? 'N/A' }}</td>
        </tr>
    </table>

    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back to Jobs</a>
</div>
@endsection

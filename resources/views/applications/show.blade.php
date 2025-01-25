@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Application Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Applicant Name: {{ $application->applicant_name }}</h5>
            <p class="card-text">Job: {{ $application->job->title }}</p>
            <p class="card-text">User: {{ $application->user->name }}</p>
            <p class="card-text">Cover Letter:</p>
            <div class="border p-3">
                {{ $application->cover_letter }}
            </div>
        </div>
    </div>

    <a href="{{ route('applications.index') }}" class="btn btn-primary mt-3">Back to List</a>
</div>
@endsection
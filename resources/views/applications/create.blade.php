@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Application</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('applications.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="applicant_name" class="form-label">Applicant Name</label>
            <input type="text" name="applicant_name" id="applicant_name" class="form-control" value="{{ old('applicant_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="job_id" class="form-label">Job</label>
            <select name="job_id" id="job_id" class="form-control" required>
                @foreach($jobs as $job)
                    <option value="{{ $job->id }}" {{ old('job_id') == $job->id ? 'selected' : '' }}>{{ $job->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cover_letter" class="form-label">Cover Letter</label>
            <textarea name="cover_letter" id="cover_letter" class="form-control" rows="5" required>{{ old('cover_letter') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
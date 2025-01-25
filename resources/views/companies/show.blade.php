@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Company Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $company->id }}</td>
        </tr>
        <tr>
            <th>Company Name</th>
            <td>{{ $company->company_name }}</td>
        </tr>
        <tr>
            <th>Location</th>
            <td>{{ $company->location }}</td>
        </tr>
    </table>

    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to Companies</a>
</div>
@endsection

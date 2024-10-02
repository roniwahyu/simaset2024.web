
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Users</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Status</th>
            <th>City</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->fullname }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->status }}</td>
            <td>{{ $record->city }}</td>
            <td>{{ $record->phone }}</td>
            <td>{{ $record->role }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

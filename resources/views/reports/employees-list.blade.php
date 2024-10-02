
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Employees</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Departmentid</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Jobrole</th>
            <th>City</th>
            <th>Country</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->departmentid }}</td>
            <td>{{ $record->fullname }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->jobrole }}</td>
            <td>{{ $record->city }}</td>
            <td>{{ $record->country }}</td>
            <td>{{ $record->address }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

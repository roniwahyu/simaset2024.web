
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Roles</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Role Id</th>
            <th>Role Name</th>
            <th>Description</th>
            <th>Isactive</th>
            <th>Userid</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Deleted</th>
            <th>Key</th>
            <th>Date Created</th>
            <th>Date Updated</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->role_id }}</td>
            <td>{{ $record->role_name }}</td>
            <td>{{ $record->description }}</td>
            <td>{{ $record->isactive }}</td>
            <td>{{ $record->userid }}</td>
            <td>{{ $record->created }}</td>
            <td>{{ $record->modified }}</td>
            <td>{{ $record->deleted }}</td>
            <td>{{ $record->key }}</td>
            <td>{{ $record->date_created }}</td>
            <td>{{ $record->date_updated }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

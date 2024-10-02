
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Role Details</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Role Id</th>
            <td>{{ $record->role_id }}</td>
        </tr>
        <tr>
            <th>Role Name</th>
            <td>{{ $record->role_name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $record->description }}</td>
        </tr>
        <tr>
            <th>Isactive</th>
            <td>{{ $record->isactive }}</td>
        </tr>
        <tr>
            <th>Userid</th>
            <td>{{ $record->userid }}</td>
        </tr>
        <tr>
            <th>Created</th>
            <td>{{ $record->created }}</td>
        </tr>
        <tr>
            <th>Modified</th>
            <td>{{ $record->modified }}</td>
        </tr>
        <tr>
            <th>Deleted</th>
            <td>{{ $record->deleted }}</td>
        </tr>
        <tr>
            <th>Key</th>
            <td>{{ $record->key }}</td>
        </tr>
        <tr>
            <th>Date Created</th>
            <td>{{ $record->date_created }}</td>
        </tr>
        <tr>
            <th>Date Updated</th>
            <td>{{ $record->date_updated }}</td>
        </tr>
    </tbody>
</table>
@endsection

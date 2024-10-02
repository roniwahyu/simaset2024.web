
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Group Details</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Id</th>
            <td>{{ $record->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $record->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $record->description }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $record->created_at }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $record->updated_at }}</td>
        </tr>
    </tbody>
</table>
@endsection

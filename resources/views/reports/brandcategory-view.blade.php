
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Brand Category Details</h1></div>
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
            <th>Modified At</th>
            <td>{{ $record->modified_at }}</td>
        </tr>
        <tr>
            <th>Parents</th>
            <td>{{ $record->parents }}</td>
        </tr>
    </tbody>
</table>
@endsection

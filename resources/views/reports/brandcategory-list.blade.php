
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Brand Category</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Modified At</th>
            <th>Parents</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->name }}</td>
            <td>{{ $record->description }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->modified_at }}</td>
            <td>{{ $record->parents }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

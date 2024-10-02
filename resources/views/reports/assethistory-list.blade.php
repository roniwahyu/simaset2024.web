
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Asset History</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Assetid</th>
            <th>Employeeid</th>
            <th>Date</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->assetid }}</td>
            <td>{{ $record->employeeid }}</td>
            <td>{{ $record->date }}</td>
            <td>{{ $record->status }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

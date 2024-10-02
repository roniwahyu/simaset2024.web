
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Component Assets</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Assetid</th>
            <th>Componentid</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->assetid }}</td>
            <td>{{ $record->componentid }}</td>
            <td>{{ $record->quantity }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
            <td>{{ $record->status }}</td>
            <td>{{ $record->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

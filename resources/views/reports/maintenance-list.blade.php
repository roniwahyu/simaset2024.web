
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Maintenance</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Assetid</th>
            <th>Supplierid</th>
            <th>Startdate</th>
            <th>Enddate</th>
            <th>Type</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->assetid }}</td>
            <td>{{ $record->supplierid }}</td>
            <td>{{ $record->startdate }}</td>
            <td>{{ $record->enddate }}</td>
            <td>{{ $record->type }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Group Role</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Group Id</th>
            <th>Role Id</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->group_id }}</td>
            <td>{{ $record->role_id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

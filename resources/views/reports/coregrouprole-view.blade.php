
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Group Role Details</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Id</th>
            <td>{{ $record->id }}</td>
        </tr>
        <tr>
            <th>Group Id</th>
            <td>{{ $record->group_id }}</td>
        </tr>
        <tr>
            <th>Role Id</th>
            <td>{{ $record->role_id }}</td>
        </tr>
    </tbody>
</table>
@endsection

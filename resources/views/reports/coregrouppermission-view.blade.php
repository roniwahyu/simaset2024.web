
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Group Permission Details</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Group Id</th>
            <td>{{ $record->group_id }}</td>
        </tr>
        <tr>
            <th>Permission Id</th>
            <td>{{ $record->permission_id }}</td>
        </tr>
    </tbody>
</table>
@endsection

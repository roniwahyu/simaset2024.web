
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Group User</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Group Id</th>
            <th>User Id</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->group_id }}</td>
            <td>{{ $record->user_id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

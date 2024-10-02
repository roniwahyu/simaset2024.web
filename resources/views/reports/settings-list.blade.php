
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Settings</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Company</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phonenumber</th>
            <th>Country</th>
            <th>Logo</th>
            <th>Formatdate</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Currency</th>
            <th>Language</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->company }}</td>
            <td>{{ $record->address }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->phonenumber }}</td>
            <td>{{ $record->country }}</td>
            <td>{{ $record->logo }}</td>
            <td>{{ $record->formatdate }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
            <td>{{ $record->currency }}</td>
            <td>{{ $record->language }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

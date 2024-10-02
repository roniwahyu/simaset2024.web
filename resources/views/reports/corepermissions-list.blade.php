
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Permissions</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Id Role</th>
            <th>Name</th>
            <th>Permission</th>
            <th>Action</th>
            <th>Isactive</th>
            <th>Create</th>
            <th>Read</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Setup</th>
            <th>Report</th>
            <th>Print</th>
            <th>Export</th>
            <th>Import</th>
            <th>Upload</th>
            <th>Download</th>
            <th>Backup</th>
            <th>Restore</th>
            <th>User Dashboard</th>
            <th>Admin Dashboard</th>
            <th>Validation</th>
            <th>Userid</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Date Created</th>
            <th>Date Updated</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->id_role }}</td>
            <td>{{ $record->name }}</td>
            <td>{{ $record->permission }}</td>
            <td>{{ $record->action }}</td>
            <td>{{ $record->isactive }}</td>
            <td>{{ $record->create }}</td>
            <td>{{ $record->read }}</td>
            <td>{{ $record->update }}</td>
            <td>{{ $record->delete }}</td>
            <td>{{ $record->setup }}</td>
            <td>{{ $record->report }}</td>
            <td>{{ $record->print }}</td>
            <td>{{ $record->export }}</td>
            <td>{{ $record->import }}</td>
            <td>{{ $record->upload }}</td>
            <td>{{ $record->download }}</td>
            <td>{{ $record->backup }}</td>
            <td>{{ $record->restore }}</td>
            <td>{{ $record->user_dashboard }}</td>
            <td>{{ $record->admin_dashboard }}</td>
            <td>{{ $record->validation }}</td>
            <td>{{ $record->userid }}</td>
            <td>{{ $record->created }}</td>
            <td>{{ $record->modified }}</td>
            <td>{{ $record->date_created }}</td>
            <td>{{ $record->date_updated }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

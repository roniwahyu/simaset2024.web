
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Permission Details</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Id</th>
            <td>{{ $record->id }}</td>
        </tr>
        <tr>
            <th>Id Role</th>
            <td>{{ $record->id_role }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $record->name }}</td>
        </tr>
        <tr>
            <th>Permission</th>
            <td>{{ $record->permission }}</td>
        </tr>
        <tr>
            <th>Action</th>
            <td>{{ $record->action }}</td>
        </tr>
        <tr>
            <th>Isactive</th>
            <td>{{ $record->isactive }}</td>
        </tr>
        <tr>
            <th>Create</th>
            <td>{{ $record->create }}</td>
        </tr>
        <tr>
            <th>Read</th>
            <td>{{ $record->read }}</td>
        </tr>
        <tr>
            <th>Update</th>
            <td>{{ $record->update }}</td>
        </tr>
        <tr>
            <th>Delete</th>
            <td>{{ $record->delete }}</td>
        </tr>
        <tr>
            <th>Setup</th>
            <td>{{ $record->setup }}</td>
        </tr>
        <tr>
            <th>Report</th>
            <td>{{ $record->report }}</td>
        </tr>
        <tr>
            <th>Print</th>
            <td>{{ $record->print }}</td>
        </tr>
        <tr>
            <th>Export</th>
            <td>{{ $record->export }}</td>
        </tr>
        <tr>
            <th>Import</th>
            <td>{{ $record->import }}</td>
        </tr>
        <tr>
            <th>Upload</th>
            <td>{{ $record->upload }}</td>
        </tr>
        <tr>
            <th>Download</th>
            <td>{{ $record->download }}</td>
        </tr>
        <tr>
            <th>Backup</th>
            <td>{{ $record->backup }}</td>
        </tr>
        <tr>
            <th>Restore</th>
            <td>{{ $record->restore }}</td>
        </tr>
        <tr>
            <th>User Dashboard</th>
            <td>{{ $record->user_dashboard }}</td>
        </tr>
        <tr>
            <th>Admin Dashboard</th>
            <td>{{ $record->admin_dashboard }}</td>
        </tr>
        <tr>
            <th>Validation</th>
            <td>{{ $record->validation }}</td>
        </tr>
        <tr>
            <th>Userid</th>
            <td>{{ $record->userid }}</td>
        </tr>
        <tr>
            <th>Created</th>
            <td>{{ $record->created }}</td>
        </tr>
        <tr>
            <th>Modified</th>
            <td>{{ $record->modified }}</td>
        </tr>
        <tr>
            <th>Date Created</th>
            <td>{{ $record->date_created }}</td>
        </tr>
        <tr>
            <th>Date Updated</th>
            <td>{{ $record->date_updated }}</td>
        </tr>
    </tbody>
</table>
@endsection

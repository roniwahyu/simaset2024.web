
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core Users</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Ip Address</th>
            <th>Username</th>
            <th>Email</th>
            <th>Email Login Hash</th>
            <th>Activation Selector</th>
            <th>Activation Code</th>
            <th>Remember Selector</th>
            <th>Remember Code</th>
            <th>Created On</th>
            <th>Last Login</th>
            <th>Active</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Picture</th>
            <th>Oauth Provider</th>
            <th>Oauth Uid</th>
            <th>Created</th>
            <th>Nim</th>
            <th>Claimed</th>
            <th>Wa Activated</th>
            <th>Email Activated</th>
            <th>Activated</th>
            <th>Otp</th>
            <th>Otp Login Code</th>
            <th>Otp Backup Code</th>
            <th>User Role Id</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>User Group Id</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->ip_address }}</td>
            <td>{{ $record->username }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->email_login_hash }}</td>
            <td>{{ $record->activation_selector }}</td>
            <td>{{ $record->activation_code }}</td>
            <td>{{ $record->remember_selector }}</td>
            <td>{{ $record->remember_code }}</td>
            <td>{{ $record->created_on }}</td>
            <td>{{ $record->last_login }}</td>
            <td>{{ $record->active }}</td>
            <td>{{ $record->first_name }}</td>
            <td>{{ $record->last_name }}</td>
            <td>{{ $record->company }}</td>
            <td>{{ $record->phone }}</td>
            <td>{{ $record->picture }}</td>
            <td>{{ $record->oauth_provider }}</td>
            <td>{{ $record->oauth_uid }}</td>
            <td>{{ $record->created }}</td>
            <td>{{ $record->nim }}</td>
            <td>{{ $record->claimed }}</td>
            <td>{{ $record->wa_activated }}</td>
            <td>{{ $record->email_activated }}</td>
            <td>{{ $record->activated }}</td>
            <td>{{ $record->otp }}</td>
            <td>{{ $record->otp_login_code }}</td>
            <td>{{ $record->otp_backup_code }}</td>
            <td>{{ $record->user_role_id }}</td>
            <td>{{ $record->date_created }}</td>
            <td>{{ $record->date_updated }}</td>
            <td>{{ $record->user_group_id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

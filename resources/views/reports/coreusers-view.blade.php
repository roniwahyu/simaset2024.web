
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Core User Details</h1></div>
<table class="table table-sm table-striped">
    <tbody>
        <tr>
            <th>Id</th>
            <td>{{ $record->id }}</td>
        </tr>
        <tr>
            <th>Ip Address</th>
            <td>{{ $record->ip_address }}</td>
        </tr>
        <tr>
            <th>Username</th>
            <td>{{ $record->username }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $record->email }}</td>
        </tr>
        <tr>
            <th>Email Login Hash</th>
            <td>{{ $record->email_login_hash }}</td>
        </tr>
        <tr>
            <th>Activation Selector</th>
            <td>{{ $record->activation_selector }}</td>
        </tr>
        <tr>
            <th>Activation Code</th>
            <td>{{ $record->activation_code }}</td>
        </tr>
        <tr>
            <th>Remember Selector</th>
            <td>{{ $record->remember_selector }}</td>
        </tr>
        <tr>
            <th>Remember Code</th>
            <td>{{ $record->remember_code }}</td>
        </tr>
        <tr>
            <th>Created On</th>
            <td>{{ $record->created_on }}</td>
        </tr>
        <tr>
            <th>Last Login</th>
            <td>{{ $record->last_login }}</td>
        </tr>
        <tr>
            <th>Active</th>
            <td>{{ $record->active }}</td>
        </tr>
        <tr>
            <th>First Name</th>
            <td>{{ $record->first_name }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $record->last_name }}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>{{ $record->company }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $record->phone }}</td>
        </tr>
        <tr>
            <th>Oauth Provider</th>
            <td>{{ $record->oauth_provider }}</td>
        </tr>
        <tr>
            <th>Oauth Uid</th>
            <td>{{ $record->oauth_uid }}</td>
        </tr>
        <tr>
            <th>Created</th>
            <td>{{ $record->created }}</td>
        </tr>
        <tr>
            <th>Nim</th>
            <td>{{ $record->nim }}</td>
        </tr>
        <tr>
            <th>Claimed</th>
            <td>{{ $record->claimed }}</td>
        </tr>
        <tr>
            <th>Wa Activated</th>
            <td>{{ $record->wa_activated }}</td>
        </tr>
        <tr>
            <th>Email Activated</th>
            <td>{{ $record->email_activated }}</td>
        </tr>
        <tr>
            <th>Activated</th>
            <td>{{ $record->activated }}</td>
        </tr>
        <tr>
            <th>Otp</th>
            <td>{{ $record->otp }}</td>
        </tr>
        <tr>
            <th>Otp Login Code</th>
            <td>{{ $record->otp_login_code }}</td>
        </tr>
        <tr>
            <th>Otp Backup Code</th>
            <td>{{ $record->otp_backup_code }}</td>
        </tr>
        <tr>
            <th>User Role Id</th>
            <td>{{ $record->user_role_id }}</td>
        </tr>
        <tr>
            <th>Date Created</th>
            <td>{{ $record->date_created }}</td>
        </tr>
        <tr>
            <th>Date Updated</th>
            <td>{{ $record->date_updated }}</td>
        </tr>
        <tr>
            <th>User Group Id</th>
            <td>{{ $record->user_group_id }}</td>
        </tr>
    </tbody>
</table>
@endsection

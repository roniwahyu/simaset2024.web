
@extends('layouts.report')
@section('content')
<div id="report-title"><h1>Assets</h1></div>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Supplierid</th>
            <th>Typeid</th>
            <th>Brandid</th>
            <th>Assettag</th>
            <th>Name</th>
            <th>Serial</th>
            <th>Quantity</th>
            <th>Purchasedate</th>
            <th>Cost</th>
            <th>Warranty</th>
            <th>Status</th>
            <th>Picture</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Locationid</th>
            <th>Checkstatus</th>
            <th>Brand Name</th>
            <th>Supplier Name</th>
            <th>Assettype Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->supplierid }}</td>
            <td>{{ $record->typeid }}</td>
            <td>{{ $record->brandid }}</td>
            <td>{{ $record->assettag }}</td>
            <td>{{ $record->name }}</td>
            <td>{{ $record->serial }}</td>
            <td>{{ $record->quantity }}</td>
            <td>{{ $record->purchasedate }}</td>
            <td>{{ $record->cost }}</td>
            <td>{{ $record->warranty }}</td>
            <td>{{ $record->status }}</td>
            <td>{{ $record->picture }}</td>
            <td>{{ $record->description }}</td>
            <td>{{ $record->created_at }}</td>
            <td>{{ $record->updated_at }}</td>
            <td>{{ $record->locationid }}</td>
            <td>{{ $record->checkstatus }}</td>
            <td>{{ $record->brand_name }}</td>
            <td>{{ $record->supplier_name }}</td>
            <td>{{ $record->assettype_description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

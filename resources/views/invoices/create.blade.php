@extends('layouts.app')
@section('content')
<h1>Create Invoice</h1>
<div class="row" id="invoice">
    <div class="col-md-8">
        {!! Form::open(array('route' => 'invoices.store')) !!}
            @include('invoices._form')
        {!! Form::close() !!}
    </div>
    <div class="col-md-4">
        <table class="table">
            <tr>
                <td>Client</td>
                <td>@{{ invoice.client.name }}</td>
            </tr>
            <tr>
                <td>Hourly Rate</td>
                <td>$ @{{ invoice.rate }}</td>
            </tr>
            <tr>
                <td>Authorized Hours</td>
                <td>@{{ invoice.authorized_hours }}</td>
            </tr>
            <tr>
                <td>Worked Hours</td>
                <td>@{{ invoice.billed_hours }}</td>
            </tr>
            <tr>
                <td>Billed Amount</td>
                <td>$ @{{ invoice.rate * invoice.billed_hours }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>@{{ invoice.status }}</td>
            </tr>

        </table>
    </div>
</div>

<p>{!! link_to_route('invoices.index', 'Back')  !!}</p>
@endsection

@extends('layouts.app')
@section('content')
    <h1>Invoices</h1>
    <div class="row">
        <div class="col-md-6">
            {!! link_to_route('invoices.create', 'Generate Invoice','',['class'=>'btn btn-primary','role'=>'button'])  !!}
        </div>
        <div class="col-md-6">

        </div>
    </div>
    <div class="row">
        <table class="table table-condensed">
            <thead>
            <tr>
                <td>Client Name</td>
                <td>Week ending</td>
                <td>Number</td>
                <td>Rate</td>
                <td>Authorized Hours</td>
                <td>Billed Hours</td>
                <td>Billed Amount</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Responsive Client Name</td>
                <td>15-11-2015</td>
                <td>002</td>
                <td>xx.x</td>
                <td>35</td>
                <td>32</td>
                <td>xxx.xx</td>
                <td>
                    <p class="text-primary">Sent on 16-11-2015</p>
                </td>
                <td>
                    <p class="bg-primary" style="padding: 10px;">Paid on 18-11-2015</p>
                </td>
            </tr>
            <tr>
                <td>
                   <a href="/clients/1/edit">Responsive Client Name</a>
                </td>
                <td>15-11-2015</td>
                <td>002</td>
                <td>xx.x</td>
                <td>35</td>
                <td>32</td>
                <td>xxx.xx</td>
                <td>
                    <p class="text-primary">Sent on 16-11-2015</p>
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-block">Mark As Paid</button>
                </td>
            </tr>
            <tr>
                <td>Responsive Client Name</td>
                <td>15-11-2015</td>
                <td>002</td>
                <td>xx.x</td>
                <td>35</td>
                <td>32</td>
                <td>xxx.xx</td>
                <td>
                    <p class="text-info">Draft</p>
                </td>
                <td>
                    <button type="button" class="btn btn-info btn-block">Send</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection


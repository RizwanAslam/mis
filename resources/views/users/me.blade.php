@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <h3>Personal Information</h3>
            </div>
            {!! Form::model($teammate, array('url' => '/me' ,'method' => 'post')) !!}
            @include('teammates._form')
            {!! Form::close() !!}
        </div>
        <div class="col-md-6" >
            <div class="page-header">
                <h3>Payroll <small>| {!! link_to_route('employment_policy','View Employment Policy') !!}</small></h3>
            </div>
            <p>Starting Pay: {{ number_format($teammate->basic_pay) }} | Total Increments : {{ number_format($teammate->increments->sum('amount')) }} | Net Pay {{ number_format($teammate->basic_pay + $teammate->increments->sum('amount')) }}</p>
            @if($teammate->increments->first()!=null)
                <p>Last Increment : {{ $teammate->increments->last()->increment_date }}  Next Increment :  {{ \Carbon\Carbon::instance(new DateTime($teammate->increments->last()->increment_date))->addMonth($teammate->months_of_increment)->format('Y-m-d') }}</p>
            @endif

            <table class="table">
                <tr>
                    <td>Increment Date</td>
                    <td>Increment Amount</td>
                </tr>
                @foreach($teammate->increments()->orderBy('created_at','DESC')->get() as $increment)
                    <tr>
                        <td>{{ $increment->increment_date }}</td>
                        <td>{{ number_format($increment->amount) }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="page-header">
                <h3>Leaves</h3>
            </div>
            <!-- {{ $availed=$teammate->leaves->sum('leave_hours')/8  }} -->
            <!-- {{ $earned=employment_months($teammate->date_of_joining) * (round($teammate->no_of_leaves/12,2))  }} -->
            <p>Leaves quota: {{ $teammate->no_of_leaves }} | Earned: {{ $earned }} | Availed : {{ $availed }} | Balance: {{ $earned - $availed }}</p>

            <table class="table">
                <tr>
                    <td>Date</td>
                    <td>Leave Type</td>
                    <td>Approved On</td>
                </tr>
                @foreach($teammate->leaves()->approved()->orderBy('created_at','DESC')->get() as $leave)
                    <tr>
                        <td>{{ $leave->start_date }}</td>
                        <td>{{ leave_types()[$leave->leave_hours]  }}</td>
                        <td>{{ $leave->updated_at  }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="page-header">
                <h3>My Documents <small>personal and HR related files</small></h3>
            </div>
            <p>Coming soon!</p>
        </div>
    </div>
@endsection
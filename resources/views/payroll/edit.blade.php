@extends('layouts.app')
@section('content')
    <h1>{{ $teammate->full_name }} | Payroll</h1>
    <div class="row">
        <div class="col-md-6">
            {!! Form::model($teammate, array('route' => array('teammates.payroll.update', $teammate->id),'method' => 'put')) !!}
            @include('payroll._form')
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">
            <h4>Increments</h4>
            @if($teammate->increments->first()!=null)
                <p>Initial Pay: {{ number_format($teammate->basic_pay) }} | Total Increments : {{ number_format($teammate->increments->sum('amount')) }} | Net Pay {{ number_format($teammate->basic_pay + $teammate->increments->sum('amount')) }}</p>
                <p>Last Increment : {{ $teammate->increments->last()->increment_date }} | Next Increment :  {{ \Carbon\Carbon::instance(new DateTime($teammate->increments->last()->increment_date))->addMonth($teammate->months_of_increment)->format('Y-m-d') }}</p>
            @endif
            <table class="table">
                <tr>
                    <td>Increment Date</td>
                    <td>Increment Amount</td>
                </tr>
                @foreach($teammate->increments as $increment)
                    <tr>
                        <td>{{ $increment->increment_date }}</td>
                        <td>{{ number_format($increment->amount) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <p>{!! link_to_route('teammates.index', 'Back')  !!}</p>
@endsection
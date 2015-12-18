@extends('layouts.app')
@section('content')
    <h1>{{ $teammate->full_name }} | Increments</h1>
    <p>Date of Joining : {{ $teammate->date_of_joining }} | Duration :  {{ date_diff(date_create(date('y-m-d')),date_create($teammate->date_of_joining))->format("%y Year %m Month %d Day") }}</p>
    @if($teammate->increments->first()!=null)
        <p>Initial Pay: {{ number_format($teammate->basic_pay) }} | Total Increments : {{ number_format($teammate->increments->sum('amount')) }} | Net Pay {{ number_format($teammate->basic_pay + $teammate->increments->sum('amount')) }}</p>
        <p>Last Increment : {{ $teammate->increments->last()->increment_date }} | Next Increment :  {{ \Carbon\Carbon::instance(new DateTime($teammate->increments->last()->increment_date))->addMonth($teammate->months_of_increment)->format('Y-m-d') }}</p>
    @endif
    <p>{!! link_to_route('teammates.{teammate}.increments.create', 'Add',[$teammate->id])  !!}</p>
    <div class="row">
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
    <p>{!! link_to_route('teammates.index', 'Back')  !!}</p>
@endsection


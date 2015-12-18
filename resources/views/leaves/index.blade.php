@extends('layouts.app')
@section('content')
    <h1>{{ $teammate->full_name }} | Leaves</h1>
    <p>Date of Joining : {{ $teammate->date_of_joining }}</p>
    <p>Months : {{ $teammate->number_of_months }}</p>
    <p>Leaves quota: {{ $teammate->no_of_leaves }} | Earned: {{ $teammate->earned }} | Availed : {{ $teammate->availed }} | Balance: {{ round($teammate->earned-$teammate->availed,2) }}</p>
    <p>{!! link_to_route('teammates.{teammate}.leaves.create', 'Add',[$teammate->id])  !!}</p>
    <div class="row">
        <table class="table">
            <tr>
                <td>Date</td>
                <td>Leave Type</td>
            </tr>
            @foreach($teammate->leaves as $leave)
                <tr>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ leave_types()[$leave->leave_hours]  }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <p>{!! link_to_route('teammates.index', 'Back')  !!}</p>
@endsection


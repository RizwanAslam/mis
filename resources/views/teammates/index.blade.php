@extends('layouts.app')
@section('content')
    <h1>Team</h1>
    <p>{!! link_to_route('teammates.create', 'Create')  !!}</p>
    @foreach($teammates as $teammate)
        <div class="col-xs-6 col-md-2">
            <img src="{{ get_gravatar($teammate->email,150) }}" class="img-thumbnail">
            <p> <b>{{ $teammate->full_name }}</b> <br> {{ $teammate->designation }}</p>
            <p>Joining Date : {{ $teammate->date_of_joining }} | Duration :  {{ date_diff(date_create(date('y-m-d')),date_create($teammate->date_of_joining))->format("%y Year %m Month %d Day") }}</p>
            <p>
                {!! link_to_route('teammates.edit', 'Edit',array('id'=>$teammate->id))  !!} |
                {!! link_to_route('teammates.payroll.edit', 'Payroll',array('id'=>$teammate->id))  !!} |
                {!! link_to_route('teammates.{teammate}.leaves.index', 'Leaves',array('id'=>$teammate->id))  !!} |
                {!! link_to_route('teammates.{teammate}.increments.index', 'Increments',array('id'=>$teammate->id))  !!}
            </p>
        </div>
    @endforeach
@endsection
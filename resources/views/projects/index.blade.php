@extends('layouts.app')
@section('content')
    @foreach($projects as $project)
        @if($project->status=="Working")
            <div class="page-header">
                <h2>{{ $project->name }}<small> Start Date: {{ $project->startDate  }}
                        | Duration : {{ date_diff(date_create(date('Y-m-d')),date_create($project->startDate))->format("%y Year %m Month %d Day") }}</small></h2>
            </div>
            <p>Description: {{ $project->description }}</p>
            <p>Category: {{ $project->category }}</p>
            <p>Status: {{ $project->status }}
                @if($project->isHourly)
                    |  <a href="{{ url() }}/projects/{{ $project->bidId }}/timesheets">View Timesheets</a>
                @endif
            </p>
            <p>Team: {{ implode(', ',$project->team) }}</p>
         @endif
    @endforeach

@endsection
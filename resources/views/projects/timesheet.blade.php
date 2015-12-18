@extends('layouts.app')
@section('content')
    <h1>{{ $timesheets->bidDetails->jobName }} | Time Sheets</h1>
    <table class="table">
        <tr>
            <td>Week Ending</td>
            {{--<td>Developer</td>--}}
            {{--<td>Status</td>--}}
            <td>Authorized Hours</td>
            <td>Hours To Date</td>
            <td>Worked Hours</td>
            <td>Total Hours</td>
            <td>Productively</td>
        </tr>
        @foreach($timesheets->timesheets as $timesheet)
            @if($timesheet->workedHours>0)
            <tr>
               <td><a href="{{ $timesheet->id }}">{{ $timesheet->week }}</a></td>
               <td>{{ $timesheet->authorizedHours }}</td>
                <td>
                    @if($timesheet->status=='Draft')
                      <!--  {{ $perday = $timesheet->authorizedHours/5 }} -->
                      <!--  {{ $required = (7-((int) date_diff(date_create(date('d-M-y')),date_create($timesheet->week))->format("%a"))) }} -->
                        {{ $total = $perday*$required }}
                    @endif
                </td>
               <td>{{ $timesheet->workedHours }}</td>
               <td>{{ $timesheet->totalHours }}</td>

               <td>
                   @if($timesheet->status=='Draft')
                       <!-- {{ $productivity=round(100*($timesheet->totalHours/$total)) }} -->
                   @else
                      <!-- {{ $productivity=round(100*($timesheet->totalHours/$timesheet->authorizedHours)) }} -->
                   @endif
                   <label style="padding: 10px;" class="alert-{{ $productivity<60 ? 'danger' : ($productivity<80 ? 'warning' : ($productivity<90 ? 'info' :'success'))}}" role="alert">{{ $productivity }}%</label>
                   @if($productivity>95)
                       Good Job
                   @endif
               </td>
            </tr>
            @else
                <tr>
                    <td><a href="{{ $timesheet->id }}">{{ $timesheet->week }}</a></td>
                    {{--<td></td>--}}
                    <td colspan="5">Project on Hold</td>
                </tr>
            @endif
        @endforeach
    </table>
    <p>
        <a href="/projects">Back</a>
    </p>

    <nav>
        <ul class="pagination">
            @if($timesheets->page<$timesheets->totalPages)
                @if($timesheets->page>1)
                    <li>
                        <a href="{{ url() }}/projects/{{ $bidId }}/timesheets?page={{ $timesheets->page-1 }}" aria-label="Previous">
                            <span aria-hidden="true">Previous</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ url() }}/projects/{{ $bidId }}/timesheets?page={{ $timesheets->page+1 }}" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            @else
                @if(($timesheets->totalPages-1 )>0 )
                <li>
                    <a href="{{ url() }}/projects/{{ $bidId }}/timesheets?page={{ $timesheets->totalPages-1 }}" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </a>
                </li>
                @endif
            @endif
        </ul>
    </nav>
@endsection
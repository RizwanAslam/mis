<h1><img src="{{ get_gravatar(auth()->user()->teammate->email,60) }}">{{ auth()->user()->teammate->full_name }} </h1>
<p>Date of Joining : {{ auth()->user()->teammate->date_of_joining }} | Duration :  {{ date_diff(date_create(date('y-m-d')),date_create(auth()->user()->teammate->date_of_joining))->format("%y Year %m Month %d Day") }}</p>
<div class="row">
    <div class="col-md-6" >
        <div class="page-header">
            <h3><span class="glyphicon glyphicon-bullhorn"></span> Notice Board <small>news and announcements</small></h3>
        </div>
        @foreach($callouts as $callout)
        <div class="bs-callout bs-callout-{{ $callout->type }}">
            <h4>{{ $callout->title }}</h4>
            <p>{{ $callout->description }}</p>
        </div>
        @endforeach
        <div class="page-header">
            <h3>Help Desk <small>complaint's and suggestions</small></h3>
        </div>
        <p>Coming soon!</p>
    </div>
    <div class="col-md-6">
        <div class="page-header">
            <h3>Leave Requests <small> </small></h3>
        </div>

        <p>Leaves quota: {{ auth()->user()->teammate->no_of_leaves }} | Earned: {{ auth()->user()->teammate->earned }} | Availed : {{ auth()->user()->teammate->availed }} | Balance: {{ auth()->user()->teammate->earned-auth()->user()->teammate->availed }} |  <a href="/application">Add application</a></p>
        <table class="table">
            <tr>
                <td>Date</td>
                <td>Leave Type</td>
                <td>Requested On</td>
            </tr>
            @foreach(auth()->user()->teammate->leaves()->requests()->orderBy('created_at','DESC')->get() as $leave)
                <tr>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ leave_types()[$leave->leave_hours]  }}</td>
                    <td>{{ $leave->created_at }}</td>
                </tr>
            @endforeach
        </table>

        <div class="page-header">
            <h3>Attendance <small>this month's attendance calendar</small></h3>
        </div>
        <p>Coming soon!</p>

    </div>


</div>
<div class="row"></div>

@section('page-css')

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ url() }}/css/docs.min.css">
@endsection
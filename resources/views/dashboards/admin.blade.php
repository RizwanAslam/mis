<h1>Admin Dashboard</h1>
<div class="row">
    <div class="col-md-6">
        <h4>Leave Requests</h4>
        <table class="table">
            <tr>
                <td>Date</td>
                <td>Leave Type</td>
                <td>Requested By</td>
                <td>Action</td>
            </tr>
            @foreach(\App\Leave::requests()->get() as $leave)
                <tr>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ leave_types()[$leave->leave_hours]  }}</td>
                    <td>{{ $leave->teammate->full_name  }}</td>
                    <td>
                        {!! Form::open(array('route' => ['approval.leaves.{leave}',$leave->id])) !!}
                        {!! Form::submit('Approve',array('class'=>'btn btn-info btn-xs')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-6" >
        <h4>Upcoming team leaves</h4>
        <ul class="list-group">
            @foreach(\App\Leave::approved()->where('start_date','>=',date('Y-m-d'))->orderBy('start_date')->get()->groupBy('start_date') as $leaves)
                <li class="list-group-item">
                    <b>{{ date('l jS \, F Y',strtotime($leaves[0]->start_date))  }}</b>
                    <ul>
                        @foreach($leaves as $leave)
                            <li>
                                <img src="{{ get_gravatar($leave->teammate->email,40) }}">
                                {{ $leave->teammate->full_name  }}  is on {{ leave_types()[$leave->leave_hours]  }} leave | Balance: {{ round($leave->teammate->earned-$leave->teammate->availed,2)  }}

                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>

</div>
<div class="row"></div>

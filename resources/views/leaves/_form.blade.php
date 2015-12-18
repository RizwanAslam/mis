
<div class="form-group">
    {!! Form::label('start_date', 'Date')  !!}
    {!! Form::date('start_date', $leave->start_date,array('class'=>'form-control')) !!}
</div>



<div class="form-group">
    {!! Form::label('leave_hours', 'Leave type')  !!}
    {!! Form::select('leave_hours', leave_types(),$leave->leave_hours,array('class'=>'form-control')) !!}
</div>

{!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}

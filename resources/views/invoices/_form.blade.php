<div class="form-group">
    {!! Form::label('project_id', 'Project')  !!}
    {!! Form::select('project_id',$projects , null,array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('week', 'Week Ending')  !!}
    {!! Form::text('week', 0,array('class'=>'form-control')) !!}
</div>

<div class="row form-group">
    <div class="col-md-3 col-sm-6">
        {!! Form::label('billed_hours', 'Billed Hours')  !!}
        {!! Form::text('billed_hours', 0,array('class'=>'form-control','v-model'=>'invoice.billed_hours')) !!}
    </div>
    <div class="col-md-6 col-sm-10">

    </div>
</div>

{!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}


<div class="form-group">
    {!! Form::label('increment_date', 'Increment date')  !!}
    {!! Form::date('increment_date', $increment->increment_date,array('class'=>'form-control')) !!}
</div>



<div class="form-group">
    {!! Form::label('amount', 'Increment Amount')  !!}
    {!! Form::text('amount', $increment->amount,array('class'=>'form-control')) !!}
</div>

{!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}

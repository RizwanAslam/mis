
    <div class="form-group">
        {!! Form::label('full_name', 'Full Name')  !!}
        <span>{{ $teammate->full_name }}</span>
    </div>
    <div class="form-group">
        {!! Form::label('father_name', 'Father Name')  !!}
        <span>{{ $teammate->father_name }}</span>
    </div>
    <div class="form-group">
        {!! Form::label('date_of_joining', 'Date of Joining')  !!}
        {!! Form::date('date_of_joining', $teammate->date_of_joining,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('designation', 'Designation')  !!}
        {!! Form::text('designation', $teammate->designation,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('months_of_confirmation', 'Months of confirmation')  !!}
        {!! Form::text('months_of_confirmation', $teammate->months_of_confirmation,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('months_of_increment', 'Months of increment')  !!}
        {!! Form::text('months_of_increment', $teammate->months_of_increment,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('basic_pay', 'Basic Pay')  !!}
        {!! Form::text('basic_pay', $teammate->basic_pay,array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('no_of_leaves', 'Annual Leaves')  !!}
        {!! Form::text('no_of_leaves', $teammate->no_of_leaves,array('class'=>'form-control')) !!}
    </div>

    {!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}

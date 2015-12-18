

    <div class="row form-group">
            <div class="col-md-6 col-sm-10">
                {!! Form::label('full_name', 'Full Name')  !!}
                {!! Form::text('full_name', $teammate->full_name,array('class'=>'form-control')) !!}
            </div>
            <div class="col-md-6 col-sm-10">
                {!! Form::label('father_name', 'Father Name')  !!}
                {!! Form::text('father_name', $teammate->father_name,array('class'=>'form-control')) !!}
            </div>
    </div>
    <div class="row form-group">
            <div class="col-md-6 col-sm-10">
                {!! Form::label('date_of_birth', 'Date of Birth')  !!}
                {!! Form::date('date_of_birth', $teammate->date_of_birth,array('class'=>'form-control')) !!}
            </div>
            <div class="col-md-6 col-sm-10">
                {!! Form::label('email', 'Email')  !!}
                {!! Form::text('email', $teammate->email,array('class'=>'form-control')) !!}
            </div>
    </div>

    <div class="row form-group">
            <div class="col-md-6 col-sm-10">
                {!! Form::label('phone_mobile', 'Mobile Phone')  !!}
                {!! Form::text('phone_mobile', $teammate->phone_mobile,array('class'=>'form-control')) !!}
            </div>
            <div class="col-md-6 col-sm-10">
                {!! Form::label('phone_home', 'Home Phone')  !!}
                {!! Form::text('phone_home', $teammate->phone_home,array('class'=>'form-control')) !!}
            </div>
    </div>

    <div class="row form-group">
            <div class="col-md-6 col-sm-10">
                {!! Form::label('address1', 'Address Line 1')  !!}
                {!! Form::text('address1', $teammate->address1,array('class'=>'form-control')) !!}
            </div>
            <div class="col-md-6 col-sm-10">
                {!! Form::label('address2', 'Address Line 2')  !!}
                {!! Form::text('address2', $teammate->address2,array('class'=>'form-control')) !!}
            </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-10">
        {!! Form::label('city', 'City')  !!}
        {!! Form::text('city', $teammate->city,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <br>
            {!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}
        </div>
    </div>
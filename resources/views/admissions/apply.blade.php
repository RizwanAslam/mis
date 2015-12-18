@extends('layouts.app')
@section('content')
    <style>
        .form-group.required .control-label:after {
            content:" *";
            color:red;
        }
    </style>
    <div class="col-md-6">

    <h1>Admission Form</h1>
    {!! Form::open(array('url' => '/admissions/apply')) !!}
        {!! csrf_field() !!}
    <div class="form-group required">
        {!! Form::label('course', 'Course',array('class'=>'control-label'))  !!}
        {!! Form::text('course','Laravel Framework Training',array('class'=>'form-control','readonly')) !!}
    </div>

    <div class="form-group required">
        {!! Form::label('fullName', 'Full Name',array('class'=>'control-label'))  !!}
        {!! Form::text('fullName','',array('class'=>'form-control','placeholder'=>'Enter your full name')) !!}
    </div>

    <div class="form-group required">
        {!! Form::label('email', 'Email',array('class'=>'control-label'))  !!}
        {!! Form::text('email','',array('class'=>'form-control','placeholder'=>'Enter your email address')) !!}
    </div>

    <div class="form-group required">
        {!! Form::label('phone', 'Skype or Phone',array('class'=>'control-label'))  !!}
        {!! Form::text('phone','',array('class'=>'form-control','placeholder'=>'Enter your contact')) !!}
    </div>
    <div class="form-group required">
        {!! Form::label('degree', 'Highest Degree',array('class'=>'control-label'))  !!}
        {!! Form::text('degree','',array('class'=>'form-control','placeholder'=>'Enter your highest degree for computer science')) !!}
    </div>

    <div class="form-group required">
        <label class="control-label">Experience</label>
        <div class="radio">
            <label>
                <input type="radio" name="experience" id="optionsRadios1" value="Fresh">
                Fresh - Just did my final project in web development
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="experience" id="optionsRadios2" value="Medium" >
                Medium - Having 6+ months web development experience
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="experience" id="optionsRadios3" value="Expert">
                Expert- Having 1+ year web development experience
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="experience" id="optionsRadios4" value="No Experience">
                I don't have any web experience
            </label>
        </div>
    </div>
    <div class="form-group">
        <label>Discount coupon</label>
        <input type="text" class="form-control" id="coupon" name="coupon" placeholder="Enter discount coupon code" aria-describedby="helpBlock">
        <span id="helpBlock" class="help-block">If you have received discount coupon enter it other wise leave blank.</span>

    </div>
    {!! Form::submit('Apply',array('class'=>'btn btn-primary')) !!}

    {!! Form::close() !!}

    </div>
    <div class="col-md-6">
        <h3>Class Schedule</h3>
        <pre class="well">
        Class:    Monday to Friday
        Duration: 2hrs per day
        Medium:   Skype & Team Viewer
        </pre>
        <h3>Course Outline</h3>
        <ol>
            <li>Introducing Laravel</li>
            <li>Managing Your Project Controllers, Layout, Views, and Other Assets</li>
            <li>Talking to the Database</li>
            <li>Model Relations, Scopes, and Other Advanced Features</li>
            <li>Integrating Web Forms</li>
            <li>Integrating Middleware</li>
            <li>Authenticating and Managing Your Users</li>
            <li>Deploying, Optimizing and Maintaining Your Application</li>
            <li>Creating a Restricted Administration Console</li>
            <li>Introducing the Lumen Microframework</li>
            <li>Introducing Events</li>
            <li>Deploying Your Laravel Application to Forge</li>
        </ol>
        <p>
            Reference book: <a href="http://www.easylaravelbook.com/" target="_blank">Easy Laravel 5</a>
        </p>
    </div>
@endsection
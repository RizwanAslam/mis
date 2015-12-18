@extends('layouts.app')
@section('content')
    <h1>Elance | Settings</h1>
    <p><a href="{{ url() }}/code">Authenticate Elance</a></p>
    <div class="row">
        <div class="col-md-8">
            {{--{!! Form::open(array('url' =>'elance/settings')) !!}--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('access_code', 'Access Code')  !!}--}}
                    {{--{!! Form::label('code',  $settings->access_code,array('class'=>'form-control','disabled'=>'disabled')) !!}--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('access_token', 'Access token')  !!}--}}
                    {{--{!! Form::label('access_token',  $settings->access_token,array('class'=>'form-control','disabled'=>'disabled')) !!}--}}
                {{--</div>--}}
                {{--{!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}--}}
            {{--{!! Form::close() !!}--}}
            <p></p>
            <p>
                <a href="/sync/elance/projects" class="btn btn-primary">Synchronize Projects</a>
            </p>
        </div>
        <div class="col-md-4">

        </div>
    </div>
@endsection
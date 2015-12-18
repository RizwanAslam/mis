@extends('layouts.app')
@section('content')
    <h1>Edit Teammate</h1>
    <div class="row">
        <div class="col-md-8">
            {!! Form::model($teammate, array('route' => array('teammates.update', $teammate->id),'method' => 'put')) !!}
            @include('teammates._form')
            {!! Form::close() !!}
        </div>
        <div class="col-md-4"></div>
    </div>
    <p>{!! link_to_route('teammates.index', 'Back')  !!}</p>
@endsection
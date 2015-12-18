
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Login</h1>
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
    </div>

@endsection
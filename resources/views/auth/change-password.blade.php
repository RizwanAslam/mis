
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Change Password</h1>
            <form method="POST" action="/auth/change-password">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="old_password">Current Password</label>
                    <input type="password" name="old_password" class="form-control"  placeholder="Current password">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" class="form-control"  placeholder="New Password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

@endsection
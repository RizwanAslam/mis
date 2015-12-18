@extends('layouts.app')
@section('content')
    <h1>Project : {{ $user->bidData->jobName }}</h1>
    <ul>
        <li>Name : {{ $user->userName }}</li>
    </ul>
@endsection
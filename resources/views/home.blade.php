@extends('layouts.app')
@section('content')
    @include('dashboards.'.auth()->user()->role)
@endsection
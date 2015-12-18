@extends('layouts.app')
@section('content')
    <h1>Salary for the month of {{ date('M-Y') }}</h1>
    <table class="table bordered">
    <tr>
        <td>Name</td>
        <td>Duration</td>
        <td>Net Pay</td>
        <td>Over time</td>
        <td>Total</td>
    </tr>
    @foreach($teammates as $teammate)
        <tr>
            <td>{{ $teammate->full_name }} </td>
            <td>{{ date_diff(date_create(date('y-m-d')),date_create($teammate->date_of_joining))->format("%y Year %m Month %d Day") }} </td>
            <td>{{ number_format($teammate->basic_pay + $teammate->increments->sum('amount')) }}</td>
            <td><input  type="text" name="overtime"></td>
            <td><input  type="text" name="total" disabled></td>
        </tr>
    @endforeach
    </table>
@endsection
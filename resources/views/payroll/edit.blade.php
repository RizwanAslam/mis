@extends('layouts.app')
@section('page-css')
    <link rel="stylesheet" href="{{asset('css/datepicker.min.css')}}">
    <style>
        .panel-heading a:after {
            font-family:'Glyphicons Halflings';
            content:"\e114";
            float: right;
            color: grey;
        }
        .panel-heading a.collapsed:after {
            content:"\e080";
        }
    </style>
@endsection
@section('content')
    <h1>{{ $teammate->full_name }} | Payroll</h1>
    <div class="row">
        <div class="col-md-6">
            {!! Form::model($teammate, array('route' => array('teammates.payroll.update', $teammate->id),'method' => 'put')) !!}
            @include('payroll._form')
            {!! Form::close() !!}
        </div>
        <div class="col-md-6 panel-group" id="accordion">

            <div class="pay-calculation panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-target="#collapseOne" href="#collapseOne">
                        Calculate Pay
                    </a>
                </div>
                <div class="panel-body panel-collapse collapse in" id="collapseOne">
                    <div class="row">
                        <div class="col-lg-12" id="additional-pay">
                            <form class="form-inline">
                                <div class="form-group col-lg-6">
                                    <label for="salary-month">Salary Month</label>
                                    <input class="form-control" id="salary-month"  type="text" placeholder="Aug 2017">
                                </div>

                                @if($teammate->hourly_rate != 0.0)
                                <div class="form-group col-lg-6">
                                    <label for="total-hour">Total Hrs</label>
                                    <input class="form-control" id="total-hour"  type="number" placeholder="0">
                                </div>
                                @endif
                                <div class="form-group col-lg-6">
                                    <label for="bonus-amount">Bonus Amount</label>
                                    <input class="form-control" id="bonus-amount" type="number" placeholder="0">
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Initial Pay:</td><td id="init-pay">{{ number_format($teammate->basic_pay) }}</td>
                                    </tr>
                                    @if($teammate->increments->first()!=null)
                                    <tr>
                                        <td>Total Increments:</td><td id="total-inc">{{ number_format($teammate->increments->sum('amount')) }}</td>
                                    </tr>
                                    @endif
                                    @if($teammate->hourly_rate != 0.0)
                                        <tr>
                                            <td>Hourly pay:</td><td><span id="hourly-pay">0</span></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Bonus:</td><td><span id="bonus-pay">0</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Net Pay:</strong></td><td><strong id="total-net-pay">{{ number_format($teammate->basic_pay + $teammate->increments->sum('amount')) }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12"><hr></div>
                        <div class="col-lg-12">
                            <h6> <span id="issued-message">issue this pay  :</span>  <button class="btn btn-primary" id="pay-issued">Salary Issued</button></h6>
                        </div>
                    </div>
                </div>
            </div>


            <div class="salary-history panel panel-default" id="panel2">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-target="#collapseTwo"
                       href="#collapseTwo" class="collapsed">
                        Previous Issued Salaries
                    </a>
                </div>
                <div class="panel-body panel-collapse collapse" id="collapseTwo">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Issued Month</th>
                            <th>Basic Pay</th>
                            <th>Increment Amount</th>
                            <th>Hourly Rate</th>
                            <th>Hourly Amount</th>
                            <th>Bonus Amount</th>
                            <th>Total Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teammate->salaries()->orderBy('issued_date' , 'desc')->get() as $salary)
                            <tr>
                                <td>{{ $salary->issued_date }}</td>
                                <td>{{ number_format($salary->basic_pay) }}</td>
                                <td>{{ number_format($salary->increment_amount) }}</td>
                                <td>{{ number_format($salary->hourly_rate) }}</td>
                                <td>{{ number_format($salary->hourly_amount) }}</td>
                                <td>{{ number_format($salary->bonus_amount) }}</td>
                                <td>{{ number_format($salary->totalSalary()) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="increment panel panel-default" id="panel3">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-target="#collapseThree"
                       href="#collapseThree" class="collapsed">
                        Increments
                    </a>
                </div>
                <div class="panel-body panel-collapse collapse" id="collapseThree">
                    @if($teammate->increments->first()!=null)
                        <p>Last Increment : {{ $teammate->increments->last()->increment_date }} | Next Increment :  {{ \Carbon\Carbon::instance(new DateTime($teammate->increments->last()->increment_date))->addMonth($teammate->months_of_increment)->format('Y-m-d') }}</p>
                    @endif
                    <table class="table">
                        <tr>
                            <td>Increment Date</td>
                            <td>Increment Amount</td>
                        </tr>
                        @foreach($teammate->increments as $increment)
                            <tr>
                                <td>{{ $increment->increment_date }}</td>
                                <td>{{ number_format($increment->amount) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <p>{!! link_to_route('teammates.index', 'Back')  !!}</p>
@endsection
@section('scripts')
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready( function () {

            var total_hours = 0;
            var bonus_amount = 0;
            var teammate_id = {{$teammate->id}};
            var per_hour_rate = {{$teammate->hourly_rate }};
            var hourly_amount = 0;
            var increment_pay = {{$teammate->increments->sum('amount')}};
            var initial_pay =  {{$teammate->basic_pay}};
            var salary_month = false;


            $('#total-hour').keyup(function () {

                total_hours = $('#total-hour').val();
                if (!total_hours)
                    total_hours = 0;

                hourly_amount =  total_hours * per_hour_rate;
                $('#hourly-pay').html(hourly_amount);
                netPay();
            });

            $('#bonus-amount').keyup('change' ,function () {
                bonus_amount = parseFloat($(this).val());
                if (!bonus_amount)
                    bonus_amount = 0;

                $('#bonus-pay').html(bonus_amount);
                netPay();
            });

            function netPay() {
                total_pay = increment_pay + initial_pay + bonus_amount + hourly_amount;
                $('#total-net-pay').html(total_pay);
                return true
            }

            $('#pay-issued').on('click' , function () {
                $(this).attr("disabled", "disabled");
                var action = "{{url('/salary/store')}}";
                data = {
                    'teammate_id' : teammate_id,
                    'issued_date' : salary_month,
                    'basic_pay' : initial_pay,
                    'increment_amount' : increment_pay,
                    'hourly_rate' : per_hour_rate,
                    'hourly_amount' : hourly_amount,
                    'bonus_amount' : bonus_amount,
                    'issued' : 1
                };
                $.ajax({
                    url: action,
                    data: data,
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(data) {
                        console.log(data);
                        location.reload();
                    },
                    type: 'POST'
                });
            });

            $('#salary-month').datepicker({
                autoclose: true,
                minViewMode: 1,
                format: 'M yyyy'
            }).on('changeDate', function(selected){
                salary_month = $(this).val();
//                startDate = new Date(selected.date.valueOf());
//                startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
//                $('.to').datepicker('setStartDate', startDate);

                $.ajax({
                    url: "{{url('salary/check-month')}}/"+teammate_id,
                    data: {'date' : salary_month},
                    headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
                    error: function() {

                    },
                    success: function(data) {
                        if (data.salary){
                            $('#issued-message').html('Already Issued The Salary on Selected month : ');
                            $('#pay-issued').attr("disabled", "disabled");
                        }else {
                            $('#issued-message').html('issue this pay : ');
                            $('#pay-issued').removeAttr('disabled');
                        }
                    },
                    type: 'POST'
                });
            });
        });
    </script>
@endsection
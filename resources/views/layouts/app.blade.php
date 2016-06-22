<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MIS | CodeBrisk</title>
    <link rel="shortcut icon" href="/images/brisk.png">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url() }}/css/app.css">

    <link rel="stylesheet" href="{{ url() }}/css/bootstrap-theme.min.css">
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
    <!-- favicon -->
    <link rel="shortcut icon" href="/images/brisk.png">

    @yield('page-css')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                <a href="/"><img src="/images/cblogo.png" style="height: 30px;width: 55px; background-color: #9d9d9d; border-radius: 25px; padding: 2px;"></a>
                MIS
            </div>

        </div>
        @if(Auth::check())
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @if(Request::is('/*')) class="active" @endif><a href="/">Home</a></li>
                @if(auth()->user()->isSuperAdmin())
                    <li @if(Request::is('teammates/*')) class="active" @endif><a href="/teammates">Team</a></li>
                    <li @if(Request::is('salary/*')) class="active" @endif><a href="/salary">Salary</a></li>
                    <li @if(Request::is('invoices/*')) class="active" @endif><a href="/invoices">Invoices</a></li>
                @endif
                {{--<li @if(Request::is('projects/*')) class="active" @endif><a href="/projects">Projects</a></li>--}}


            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(!auth()->user()->isSuperAdmin())
                            <img src="{{ get_gravatar(auth()->user()->teammate->email,20) }}"> {{ Auth::user()->name }}
                        @endif
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @if(auth()->user()->isSuperAdmin())
                            <li @if(Request::is('/elance/settings')) class="active" @endif><a href="/elance/settings">Settings</a></li>
                            <li role="separator" class="divider"></li>
                        @endif
                            <li><a href="/me"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
                            <li><a href="/auth/change-password"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/auth/logout"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                    </ul>
                </li>


            </ul>
        </div><!--/.nav-collapse -->
        @endif

    </div>
</nav>

<div class="container" id="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content')
</div><!-- /.container -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url() }}/js/jquery.min.js"></script>
<script src="{{ url() }}/js/vue.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="{{ url() }}/js/bootstrap.min.js"></script>


<script src="{{ url() }}/js/app.js"></script>
@yield('scripts')

<script>
    setTimeout(function() {
        $('.alert').slideUp( "slow");
    }, 3000);
</script>
</body>
</html>
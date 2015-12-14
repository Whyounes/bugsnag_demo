
@extends('layouts.login')

@section('header')
    <meta charset="UTF-8">
    <title>Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
@stop




@section('header_assets')
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
@stop




@section('content')
    <div class="form-box" id="login-box">
        <div class="header">Sign In</div>

        {{ Form::open( ['route' => 'login.submit', 'method' => 'POST'] ) }}
            <div class="body bg-gray">
                @if( Session::has('inputs.error') )
                    <div class="form-group has-error">
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ Session::get('inputs.error') }}</label>
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div> 
                <div class="form-group">
                    <input type="checkbox" name="remember_me"/> Remember me
                </div>
            </div>
            <div class="footer"> 
                <button type="submit" class="btn bg-olive btn-block">Sign in</button>  
            </div>
        {{ Form::close() }}

    </div>
@stop

@section('footer')

@stop

@section('footer_assets')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js" type="text/javascript"></script> 
@stop
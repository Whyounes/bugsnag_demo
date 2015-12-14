@extends('layouts.user')

@section('header')
	<title>Neoos::Foto - {{ $user->username }}</title>
@stop

@section('header_assets')
	<link href="/css/iCheck/all.css" rel="stylesheet" type="text/css" />
@stop

@section('content')
<aside class="right-side strech">
	<!-- Content Header (Page header) -->
	<section class="clearfix content-header">
		<h1 class="pull-left">
			Foto - Profile
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3">
				@include('partials.error')
				
				@if( Session::has('messages') )
					<div class="alert alert-danger alert-dismissable">
					    <i class="fa fa-check"></i>
					    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					    @foreach (Session::get('messages')->all(':message') as $message)
					    	{{ $message }} <br/>
						@endforeach
					</div>
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6 col-xs-offset-3">
                <div class="box box-info">
	                <div class="box-header">
	                    <i class="fa fa-user"></i>
	                    <h3 class="box-title">Update Profile</h3>
	                </div>
	                <div class="box-body">
                	{{ Form::open( ['route' => 'profile.update', 'method' => 'POST'] ) }}
                		<input type="hidden" name='uid' value="{{ $user->id }}" />
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}" disabled/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Re-type Password"/>
                        </div>

		                <div class="box-footer clearfix">
		                    <input type="submit" class="pull-right btn btn-default" value="Edit" />
		                </div>
	                {{ Form::close() }}
	           		</div>
	            </div>
			</div>
		</div> <!-- row -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->
@stop

@section('footer_assets')
	<script src="/js/plugins/iCheck/icheck.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function(){

			//Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
		});

	</script>
@stop
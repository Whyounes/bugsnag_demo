@extends('layouts.user')

@section('header')
	<title>Neoos::Foto - Questions</title>
@stop

@section('header_assets')
<link href="/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<link href="/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
@stop

@section('content')
<aside class="right-side strech">
	<!-- Content Header (Page header) -->
	<section class="clearfix content-header">
		<h1 class="pull-left">
			Foto - Dashboard
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		@include('partials.error')
		
		<div class="row">
			<div class="col-xs-12">
				<div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                {{ $count_users }}
                            </h3>
                            <p>
                                Users
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                {{ $count_questions }}
                            </h3>
                            <p>
                                Questions
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-question"></i>
                        </div>
                        <a href="/questions" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                            	{{ $count_responses }}
                            </h3>
                            <p>
                                Responses
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-comments"></i>
                        </div>
                        <a href="/responses" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                {{ $count_unanswered_questions }}
                            </h3>
                            <p>
                                Unanswered Questions
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
			</div>
		</div>

       <hr />

        <section class="col-md-5">
            <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title">Calendar</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                </div><!-- /.box-body -->  
                <div class="box-footer text-black">                                                       
                </div>
            </div><!-- /.box --> 
        </section>
    </section>
        
	</section><!-- /.content -->
</aside><!-- /.right-side -->
@stop

@section('footer_assets')
    <script src="/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

	<script type="text/javascript">
        $(function() {
            //The Calender
            $("#calendar").datepicker();
        });
    </script>
@stop
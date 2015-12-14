@extends('layouts.user')

@section('header')
	<title>Neoos::Foto - New Question</title>
@stop

@section('header_assets')
	<link href="/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
@stop

@section('content')
<aside class="right-side strech">
	<!-- Content Header (Page header) -->
	<section class="clearfix content-header">
		<h1 class="pull-left">
			Foto - New Question
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		@include('partials.error')

		<div class="row">
			<div class="col-xs-12">
                <div class="box box-info">
	                <div class="box-header">
	                    <i class="fa fa-question"></i>
	                    <h3 class="box-title">New Question</h3>
	                </div>
	                <div class="box-body">
                	{{ Form::open( ['route' => 'questions.store', 'method' => 'POST'] ) }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Title"/>
                        </div>
                        <div class="form-group">
                            <textarea class="textarea wysiwyg" name="description" placeholder="Description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="form-group">
	                		<input type="text" name="tags" placeholder="Tags" class="tags"/>
		                </div>
		                <div class="box-footer clearfix">
		                    <input type="submit" class="pull-right btn btn-default" value="Submit" />
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
	<script type="text/javascript" src="/js/bootstrap3-typeahead.min.js"></script>
	<script src="/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

	<link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css" />
	<script type="text/javascript" src="/js/jquery.tagsinput.min.js"></script>

	<script type="text/javascript">
		$(function(){
			$(".wysiwyg").wysihtml5();

			$('.tags').tagsInput({ 
	    		width: 'auto',
			  	autocomplete_url:'/tags',
			  	defaultText: 'Add tags'
			});
		});

	</script>
@stop
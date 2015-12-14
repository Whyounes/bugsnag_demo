@extends('layouts.user')

@section('header')
	<title>Neoos::Foto - Question - {{ $question['title'] }}</title>
@stop

@section('header_assets')
	<link href="/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.box .chat .item {
			padding-bottom: 5px;
			border-bottom: 1px solid #ccc;
		}
	</style>
@stop

@section('content')
<aside class="right-side strech">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Question: #{{ $question['id'] }}
		</h1>		
	</section>
	
	<!-- Main content -->
	<section class="content">
		
		@include('partials.error')

		<div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $question->title }}</h3>
                <small class="text-muted pull-right box-tools"><i class="fa fa-clock-o"></i> {{ $question->created_at }}</small>
            </div>
            <div class="box-body">
                <p>
                   {{ $question->description }}
                </p>
            </div><!-- /.box-body -->
            <div class="box-footer">
	            <div class="box-tools">
	            	@foreach( $question->tags as $tag )
	            		<div class="label bg-aqua">{{ $tag->name }}</div>
			        @endforeach
	            </div>
            </div><!-- /.box-footer-->
        </div> <!-- end .box question -->

        <div class="box">
	        <div class="box-body chat" id="chat-box" style="width: auto;">
		        @foreach( $responses as $response )
			        <div class="item" id="response_{{ $response->id }}">
		                <img src="/img/avatar.png" alt="user image" class="online">
		                <p class="message">
		                <a href="#" class="name">
	                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $response->created_at }}</small>
	                        {{ $response->user->username }}
	                    </a>

		                    {{ $response->description }}
		                </p>
		                <div class="pull-right">
		                	@if( $response->active )
		                		<a class="label bg-red" href="/admin/responses/desactivate/{{ $response->id }}">Desactivate</a>
		                	@else
								<a class="label bg-green" href="/admin/responses/activate/{{ $response->id }}">Activate</a>
		                	@endif
		                	<a class="label label-danger" href="/admin/responses/delete/{{ $response->id }}"><i class="fa fa-times-circle"></i> delete</a>
		                </div>
		            </div><!-- /.item -->
		        @endforeach
	        </div> 
        </div><!-- end .vox responses -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->
@stop

@section('footer_assets')
<script src="/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script src="/js/jquery.color.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	$(".wysiwyg").wysihtml5();

	var url = document.URL;
	var res = url.split('#');
	if( res.length > 1 ){
		var id = res[res.length -  1], 
			el = $("#" + id);
		el.css('background-color', 'rgba(42,128,197,.2)');
		el.animate({
			backgroundColor: 'white'
		}, 2000, function(){
			
		});
	}

});
</script>
@stop
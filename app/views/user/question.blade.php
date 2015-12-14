@extends('layouts.user')

@section('header')
	<title>Neoos::Foto - Question - {{ $question['title'] }}</title>
@stop

@section('header_assets')
	<link href="/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
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
			        <div class="item">
			   			<a class="pull-right h_link" href="#response_{{ $response->id }}"></a>
		                <img src="/img/avatar.png" alt="user image" class="online">
		                <p class="message">
		                <a href="#" class="name">
	                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $response->created_at }}</small>
	                        {{ $response->user->username }}
	                    </a>

		                    {{ $response->description }}
		                </p>
		            </div><!-- /.item -->
		        @endforeach
	        </div> 
        </div><!-- end .vox responses -->

        <div class="box box-info">
        	<div class="box-header" style="cursor: move;">
        		<i class="fa fa-envelope"></i>
        		<h3 class="box-title">Add a comment or a response</h3>
        	</div>
        	
    		{{ Form::open(array('route' => 'responses.store', 'method' => 'POST')) }}
        		<div class="box-body">
        			<input type="hidden" name="qid" value="{{ $question->id }}" />
                    <div>
                        <textarea name="message" class="textarea wysiwyg" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
               	</div>
                <div class="box-footer clearfix">
		        	<button class="pull-right btn btn-default" type="submit">Submit <i class="fa fa-arrow-circle-right"></i></button>
		        </div>
            {{ Form::close() }}
        	
        
    </div>
	</section><!-- /.content -->
</aside><!-- /.right-side -->
@stop

@section('footer_assets')
<script src="/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	$(".wysiwyg").wysihtml5();
});
</script>
@stop
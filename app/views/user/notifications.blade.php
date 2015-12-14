@extends('layouts.user')

@section('header')
	<title>Neoos::Foto - Notifications</title>
@stop

@section('header_assets')
	
	<style type="text/css">
		.box .chat>.item{
			padding: 5px;
			border-top: 1px solid #ccc;
			margin-bottom: 0px;
		}
	</style>
@stop

@section('content')
<aside class="right-side strech">
	<!-- Content Header (Page header) -->
	<section class="clearfix content-header">
		<h1 class="pull-left">
			Foto - Notifications
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		@include('partials.error')
		
		<div class="row">
			<div class="col-xs-6">

				<div class="box">
					<!-- Chat box -->
		            <div class="box box-success">
		                <div class="box-header">
		                    <i class="fa fa-comments-o"></i>
		                    <h3 class="box-title">Notifications</h3>
		                </div>
		                <div class="box-body chat" id="chat-box">
		                	@foreach( $notifications as $notification )
			                    <!-- chat item -->
			                    <div class="item">
			                        <img src="img/avatar.png" alt="user image" class="online"/>
			                        <p class="message">
			                            <a href="#" class="name">
			                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $notification->created_at }}</small>
			                                @if( $notification->sender_id == 0 )
			                                	System
			                                @else
			                                	{{ $notification->sender->username }}
			                                @endif
			                           	</a>
			                            {{ $notification->description }}
			                        </p>
			                        @if( $notification->new == 1 )
 										<a href="#" class="pull-right fa fa-eye mark_read" data-notif="{{ $notification->id }}" title="Mark as read"></a>
 									@endif
			                       
			                    </div><!-- /.item -->
		                    @endforeach
		                </div><!-- /.chat -->
		            </div><!-- /.box (chat box) -->   

				</div><!-- /.box -->
			</div>

			<div class="col-xs-6">
				<div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-comments-o"></i>
                        <h3 class="box-title">New Notification</h3>
                        
                    </div>
                    <div class="box-body">
	                    {{ Form::open( ['route' => 'notifications.store', 'method' => 'POST'] ) }}
	                        <div class="form-group">
	                        	{{-- <select name="user" class="form-control" >
	                        		@foreach($users as $user)
	                        			<option value="{{ $user->id }}">{{ $user->username }}</option>
	                        		@endforeach
	                        	</select> --}}

	                            <input type="text" class="tags form-control" name="users" placeholder="Notify users:"/>
	                        </div>
	                        <div>
	                            <textarea class="textarea" placeholder="Description" name="description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
	                        </div>
	                        <div class="box-footer clearfix">
		                        <input type="submit" class="pull-right btn btn-default" value="Send" />
		                    </div>
	                    {{ Form::close() }}
                    </div>
                    
                </div>
            </div> <!-- /.col-xs-6 -->
		</div> <!-- /.row -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->
@stop

@section('footer_assets')
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

<link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.css" />
<script type="text/javascript" src="/js/jquery.tagsinput.min.js"></script>

<script type="text/javascript">
    $(function() {
    	
    	$('[name="users"]').tagsInput({ 
    		width: 'auto',
		  	autocomplete_url:'/users',
		  	defaultText: 'Add users'
		});

		$('.mark_read').click(function(e){
			e.preventDefault();
			var $this = $(this);

			$.ajax({
				url: '/notifications/read/' + $this.data('notif'),
				type: 'GET',
				dataType: 'json',
				success: function( data ){
					if( data.success )
						$this.remove();
					else
						alert('An error has occured while updating your notification to read.');
				},//success
				error: function(){
					alert('An error has occured while updating your notification to read.');
				}//error
			});
		});

    });
</script>
@stop
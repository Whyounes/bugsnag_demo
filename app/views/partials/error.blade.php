@if( Session::has('message') )
	<div class="alert alert-success alert-dismissable">
	    <i class="fa fa-check"></i>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <b>Info!</b> {{ Session::get('message') }}
	</div>
@endif
@if( Session::has('error') )
	<div class="alert alert-danger alert-dismissable">
	    <i class="fa fa-check"></i>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <b>Error!</b> {{ Session::get('error') }}
	</div>
@endif
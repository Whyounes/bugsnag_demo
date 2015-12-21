@extends('layouts.user')

@section('header')
	<title>Neoos::Foto - Questions</title>
@stop

@section('content')
<aside class="right-side strech">
	<!-- Content Header (Page header) -->
	<section class="clearfix content-header">
		<h1 class="pull-left">
			Foto - Questions
		</h1>
		<div class="pull-right">
			{{ link_to_route('questions.create', 'New Question', NULL, [ 'class' => 'btn btn-primary' ] ) }}
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		@include('partials.error')
		
		<div class="row">
			<div class="col-xs-12">

			<div class="box">
					<div class="box-body table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Title</th>
									<th>Description</th>
									<th>User</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $questions as $question )
									<tr>
										<td>{{ $question->id }}</td>
										<td>{{ link_to_route( 'questions.show', $question->title, [ 'id' => $question->id ] ); }}</td>
										<td>{{{ str_limit( $question->description, 90, '...' ) }}}</td>
										<td>{{ $question->user->username }}</td>
										<td>{{ $question->created_at }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
		</div>

	</section><!-- /.content -->
</aside><!-- /.right-side -->
@stop

@section('footer_assets')
	<script type="text/javascript">
        $(function() {
            $("#example1").dataTable();
            // $('#example2').dataTable({
            //     "bPaginate": true,
            //     "bLengthChange": false,
            //     "bFilter": false,
            //     "bSort": true,
            //     "bInfo": true,
            //     "bAutoWidth": false
            // });
        });
    </script>
@stop
@extends('layouts.user')

@section('header')
	<title>Neoos::Foto - Users</title>
@stop

@section('content')
<aside class="right-side strech">
	<!-- Content Header (Page header) -->
	<section class="clearfix content-header">
		<h1 class="pull-left">
			Foto - Users
		</h1>
		<div class="pull-right">
			{{ link_to_route('admin.users.create', 'New User', NULL, [ 'class' => 'btn btn-primary' ] ) }}
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		@include('partials.error')
		
		<div class="row">
			<div class="col-xs-12">

			<div class="box">
					<div class="box-body table-responsive">
						<table id="table_users" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Status</th>
									<th>Role</th>
									<th>Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $users as $user )
									<tr>
										<td>{{ $user->id }}</td>
										<td>{{ $user->username }}</td>
										<td>
											@if( $user->active )
												<div class="label bg-green">Active</div>
											@else
												<div class="label bg-red">Inactive</div>
											@endif
										</td>
										<td>{{ $user->role }}</td>
										<td>{{ $user->created_at }}</td>
										<td>
											{{ link_to_route('admin.users.delete', 'remove', [ 'id' => $user->id ]) }} | 
											{{ link_to_route( 'admin.users.edit', 'edit', [ 'id' => $user->id ] ); }} | 
											@if( $user->active )
												{{ link_to_route('admin.users.desactivate', 'desactivate', [ 'id' => $user->id ]) }}
											@else
												{{ link_to_route('admin.users.activate', 'activate', [ 'id' => $user->id ]) }}
											@endif
										</td>
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
            $('#table_users').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        });
    </script>
@stop
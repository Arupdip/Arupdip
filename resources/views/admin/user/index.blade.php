@extends('layouts.adminlayout')

@section('content')


<div class="container-fluid bdy">
	<div class="row">
		<div class="col-sm-3 py-5">
			@include('layouts.sidebar')
		</div>
		<div class="col-sm-9">
			<div class="py-5 section">
				<card class="card">
					<h5 class="card-header">User List
						<div class="btn-grp">
							<btn onclick="window.history.back()" title="Back">
								<i class="priya-arrow-left"></i></btn>
							<btn onclick="" title="Dashboard">
								<i class="priya-dashboard"></i></btn>
							<btn onclick="helpModal('#add-dist-help')" title="Help">
								<i class="priya-info"></i></btn>
							<btn onclick="" title="History">
								<i class="priya-history"></i></btn>
						</div>
					</h5>
					<div class="card-body">
						@include('layouts.alerts')
						<div class="table-responsive">
							<table class="table table-stripped table-bordered theme-tbl datatable">
								<thead>
									<tr>
										<th class="text-center">Sl.No.</th>
										<th class="text-center">Name</th>
										<th class="text-center">Email</th>
										<th class="text-center">Phone</th>
										<th class="text-center">Roll</th>
										<th class="text-center">Designation</th>
										<th class="text-center">Status</th>
										<th class="text-center">Action</th>
										<!--<th>Action</th>-->
									</tr>
								</thead>
								<tbody>
									@php
										$i=1;
									@endphp
									
									@foreach ($users as $val)
									<tr>
										<td>{{$i++}}</td>
										<td>{{$val->name}}</td>
										<td>{{$val->email}}</td>
										<td>{{$val->phone}}</td>
										<td>{{$val->phone}}</td>
										<td>{{user_roll($val->user_type)}}</td>
										<td>{{$val->phone}}</td>
										<td>{{$val->phone}}</td>
										<!--<td align="center">
											<a href="{{url('/')}}/admin/usertype/{{$val->id}}/edit" class="btn btn-icon btn-info" title="Edit">
												<i class="priya-edit"></i></a>
												<a href="javascript:void(0)" title="Delete" class="btn btn-icon btn-danger" onclick="deleteid({{$val->id}})">
												<i class="priya-trash"></i> </a>
										</td>-->
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</card>
			</div>
		</div>
	</div>
</div>
<!-- <a href="{{url('/')}}/admin/usertype/create" class="float-btn" title="Add New">+</a>-->

<script type="text/javascript">

	function deleteid(id)
	{
		if (confirm('Are you sure to delete?')) {

			$.ajax({
				type: "DELETE",
				url: "{{url('/')}}/admin/user/"+id,
				data: {_token: "{{csrf_token()}}", id: id}, // serializes the form's elements.
				success: function(data) {
					window.location.reload();
				}
			});
		}
	}
</script>
@stop

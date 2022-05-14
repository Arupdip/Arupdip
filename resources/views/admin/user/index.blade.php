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
									
									@foreach ($user as $val)
									<tr>
										<td class="text-center">{{$i++}}</td>
										<td>{{$val->name}}</td>
										<td>{{$val->email}}</td>
										<td class="text-center">{{$val->phone}}</td>
										<td >
											@if($val->usertype->name){{$val->usertype->name}} 
											@else
											<span class="text-center text-warning">NO</span>
											@endif
										</td>
										<td class="text-center">
											@if($val->status == 1)
											<span class="text-success">Active</span>
											@elseif($val->status == 2)
											<span class="text-danger">Deactive</span>
											@endif
										</td>
										<td align="center">
												<a href="{{url('/')}}/admin/user/{{$val->id}}/edit" class="btn btn-icon btn-info" title="Edit">
												<i class="priya-edit"></i></a>
											@if($val->status == 1)
												<a href="javascript:void(0)" title="Deactive" class="btn btn-icon btn-danger" onclick="deleteid({{$val->id}})">
												<i class="priya-ban"></i> </a>
											@else
												<a href="javascript:void(0)" title="Active" class="btn btn-icon btn-success" onclick="actived({{$val->id}})">
												<i class="priya-check-circle-o"></i> </a>
											@endif
										</td>
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
<a href="{{url('/')}}/admin/user/create" class="float-btn" title="Add New">+</a>

<script type="text/javascript">

	function deleteid(id)
	{
		if (confirm('Are you sure, You want to deactive this ?')) {

			$.ajax({
				type: "DELETE",
				url: "{{url('/')}}/admin/user/"+id,
				data: {_token: "{{csrf_token()}}", id: id}, // serializes the form's elements.
				success: function(data) {
					location.reload();
				}
			});
		}
	}
	function actived(id)
	{
		if (confirm('Are you sure, You want to active this ?')) {

			$.ajax({
				type: "DELETE",
				url: "{{url('/')}}/admin/user/"+id,
				data: {_token: "{{csrf_token()}}", id: id}, // serializes the form's elements.
				success: function(data) {
					location.reload();
				}
			});
		}
	}
</script>
@stop

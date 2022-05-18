@extends('amc.layouts.app')

@section('content')
@include('status')
<div class="container-fluid">
	<div class="row">
	    <div class="col-sm-12">

	        @include('layouts.alerts')
			
	        <div class="py-5 section">
	            <card class="card">
	                <h5 class="card-header">Trader Applications
	                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
	                </h5>
	                <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table table-stripped table-bordered theme-tbl">
	                            <thead>
	                                <tr>
	                                    <th class="text-center">Sl.No.</th>
										<th class="text-center">Full Name</th>
										<th class="text-center">Apply Date</th>
										<th class="text-center">Aadhar No.</th>
										<th class="text-center">GSTIN</th>
										<th class="text-center">Status</th>
										<th class="text-center">Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <?php $i=0;?>
	                              @foreach($data as $row)
	                              <?php $i++;?>
	                                <tr>
	                                  <td>{{$i}}</td>
	                                  <td>{{$row->name}}</td>
	                                  <td>{{$row->created_at}}</td>
	                                  <td>{{$row->aadhar_no}}</td>
	                                  <td>{{$row->gstin}}</td>
	                                  <td>{{getStatus($row->status)}}</td>
	                                  <td >
	                                    <a href="{{url('/')}}/amc/traderviewdetails/{{$row->application_id}}" class="btn btn-icon btn-info" title="View Details"><i class="priya-eye"></i></a> 
										@if($row->status == 0 ||  $row->status == 3  ||  $row->status ==4   )
										<a href="#" onClick="editcomply({{$row->id}})" class="btn btn-icon btn-info" title="View Details"><i class="priya-edit"></i></a> 
									  @endif
									 @if($row->is_pdf_generate == 1) 
									  <a href="{{url('/')}}/public/uploads/{{$row->attested_pdf}}" class="btn btn-icon btn-info" download><i class="priya-download"></i></a> 
									  
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
</div>


<div id="view-trader-details" class="help-modal"  style="display: none;"> 
</div>

<script>

function editcomply(id)
{
    $.ajax({
        type: "get",
        url: "{{url('/')}}/edittradercomply/"+id,
        success: function(data)
        {
            $("#view-trader-details").html(data);
            helpModal('#view-trader-details')
          // show response from the php script.
        }
    });
}

</script>
@endsection
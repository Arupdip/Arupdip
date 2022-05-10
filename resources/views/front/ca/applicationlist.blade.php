@extends('front.ca.layouts.app')

@section('content')

<div class="container-fluid bdy">
    <div class="row">
    <div class="col-sm-12">
        <div class="py-5 section">
            <card class="card">
                <h5 class="card-header">My Applications
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped table-bordered theme-tbl">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Full Name</th>
                                    <th>Aadhar No.</th>
                                    <th>GSTIN</th>
                                    <th>Expiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                              @foreach($data as $row)
                              <?php $i++;?>
                                <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$row->name}}</td>
                                  <td>{{$row->aadhar_no}}</td>
                                  <td>{{$row->gstin}}</td>
                                  <td>
                                    @if($row->is_sign_upload == 1 && $row->expiry_date <= date('Y-m-d'))
{{$row->expiry_date}}
@else
Process
                                    @endif
                                  </td>
                                 
                                     
                                  <td align="center">
                                    <a href="{{url('/')}}/ca/approval-status/{{$row->application_id}}" class="btn btn-icon btn-info" title="View Details"><i class="priya-eye"></i></a> 
                                    @if($row->is_sign_upload == 1 && $row->expiry_date <= date('Y-m-d') && $row->is_renew_apply == 0)
                                   <a href="{{url('/')}}/ca/renew/{{$row->application_id}}" class="btn btn-icon btn-info" title="View Details">Renew</a> 
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
@endsection
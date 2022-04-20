@extends('front.trader.layouts.app')

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
                                 
                                  <td align="center">
                                    <a href="{{url('/')}}/trader/approval-status/{{$row->application_id}}" class="btn btn-icon btn-info" title="View Details"><i class="priya-eye"></i></a> 
                                   

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
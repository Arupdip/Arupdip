@extends('amc.layouts.app')

@section('content')

<style>
    dl dd{margin-bottom: 0;}
    dl a[download] {
        position: absolute;
        right: 5px;
        top: 5px;
    }
    .photoupload{border-width: 1px;}
</style>
<div class="container-fluid bdy">
    <div class="row">
    <div class="col-sm-12">
        @include('layouts.alerts')
        <div class="py-5 section">
            <card class="card">
                <h5 class="card-header">Uploaded Signature (CA)
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
                                    <th>Signature</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $key => $row)
                                <tr>
                                    
                                  <td>{{$key+1}}</td>
                                  <td>{{$row->name}}</td>
                                  <td>{{$row->aadhar_no}}</td>
                                  <td>
                                  <div class="photoupload">
                                    <form name="" id="sign-upload-form-{{$row->id}}" class="clearfix" enctype="multipart/form-data" method="post" action="{{url('amc/upload-ca-sign')}}" >
                                        @csrf
                                        <input type="hidden" value="{{$row->id}}" name="id">
                                        <img src="{{url('/')}}/public/uploads/{{$row->signature_file}}" class="img" id="id_{{$row->id}}" alt="" accept="image/*" style="max-height: 70px; object-fit:contain">
                                        <input type="file" name="upload_signature" id="upload_signature" class="sign sign_{{$row->id}}" onchange="javascript: document.getElementById('id_{{$row->id}}').src = window.URL.createObjectURL(this.files[0])">
                                      </form>
                                    
                                    </div>
                                  </td>
                                  <td align="center">
                                    <a href="#" onClick="submitform({{$row->id}})" title="Approve"  class="btn btn-icon btn-info"><i class="priya-check"></i> </a>
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


<script>

function submitform(id)
{
    if($(".sign_"+id).val()!='')
    $("#sign-upload-form-"+id).submit();
}
</script>
@endsection
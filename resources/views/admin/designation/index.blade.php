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
                <h5 class="card-header"> Designation
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
                    @include('layouts.alerts')
                    <div class="table-responsive">
                        <table class="table table-stripped table-bordered theme-tbl datatable">
                            <thead>
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Name</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0; ?>
                                @foreach($designation as $d)
                                <?php
                                $i++; ?>
                                <tr>
                                  <td>{{$i}}</td>
                                  <td>{{$d->name}}</td>
                                 
                                  <td align="center">
                                      <a href="{{url('/')}}/admin/designation/{{$d->id}}/edit" class="btn btn-icon btn-info" title="Edit"><i class="priya-edit"></i></a> 
                                    <span title="Delete" class="btn btn-icon btn-danger" onclick="deleteid({{$d->id}})"><i class="priya-trash"></i> </span>
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
<a href="{{url('/')}}/admin/designation/create" class="float-btn" title="Add New">+</a>
<script type="text/javascript">
    
    function deleteid(id)
    {
            if(confirm('Are you sure to delete?'))
            {
                 
    $.ajax({
        type: "DELETE",
        url: "{{url('/')}}/admin/designation/"+id,
        data: {_token: "{{csrf_token()}}", id: id}, // serializes the form's elements.
        success: function(data)
        {
          location.reload();
        }
    });
            }
    }
</script>
@stop
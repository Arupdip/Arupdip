

<?php $__env->startSection('content'); ?>


<div class="container-fluid bdy">
    <div class="row">
      <div class="col-sm-3 py-5">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-sm-9">
        <div class="py-5 section">
            <card class="card">
                <h5 class="card-header"> Designation
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
                    <?php echo $__env->make('layouts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $i++; ?>
                                <tr>
                                  <td><?php echo e($i); ?></td>
                                  <td><?php echo e($d->name); ?></td>
                                 
                                  <td align="center">
                                      <a href="<?php echo e(url('/')); ?>/admin/designation/<?php echo e($d->id); ?>/edit" class="btn btn-icon btn-info" title="Edit"><i class="priya-edit"></i></a> 
                                    <span title="Delete" class="btn btn-icon btn-danger" onclick="deleteid(<?php echo e($d->id); ?>)"><i class="priya-trash"></i> </span>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </card>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    
    function deleteid(id)
    {
            if(confirm('Are you sure to delete?'))
            {
                 
    $.ajax({
        type: "DELETE",
        url: "<?php echo e(url('/')); ?>/admin/designation/"+id,
        data: {_token: "<?php echo e(csrf_token()); ?>", id: id}, // serializes the form's elements.
        success: function(data)
        {
          location.reload();
        }
    });
            }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\olms\resources\views/admin/designation/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>


<div class="container-fluid bdy">
    <div class="row">
      <div class="col-sm-3 py-5">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-sm-9">
        <div class="py-5 section">
            <card class="card">
                <h5 class="card-header">Add New License Type
                    <div class="btn-grp"><btn onclick="window.history.back()" title="Back"><i class="priya-arrow-left"></i></btn><btn onclick="" title="Dashboard"><i class="priya-dashboard"></i></btn><btn onclick="helpModal('#add-dist-help')" title="Help"><i class="priya-info"></i></btn> <btn onclick="" title="History"><i class="priya-history"></i></btn></div>
                </h5>
                <div class="card-body">
                    <form id="mandalfrm" name="mandalfrm" enctype="multipart/form-data" action="<?php echo e(url('/')); ?>/admin/licensetype" method="post" >

                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>License Type<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control pri-form" autocomplete="off" required />
                                </div>
                            </div>                  
                            <div class="col-md-4">
                               
                               
                                    <label>&nbsp;</label>
                                    <div><button class="btn" type="submit">Save</button></div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </card>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\olms\resources\views/admin/licensetype/create.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>

<div class="container-fluid bdy">
    <div class="row">
      <div class="col-sm-3 py-5">
                 <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    <div class="col-sm-9">
        
    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\olms\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
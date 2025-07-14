<?php $__env->startSection('title', 'Dahsboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<div class="row">
    <div class="col-sm-4 grid-margin">
    <div class="card">
        <div class="card-body">
        <h5>Total Users</h5>
        <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0"><?php echo e($users_count ?? 0); ?></h2>
            </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    <?php if(session('success')): ?>
        toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>
    <?php if(session('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>
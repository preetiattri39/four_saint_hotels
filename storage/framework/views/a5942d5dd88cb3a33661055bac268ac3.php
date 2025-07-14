<?php $__env->startSection('title', 'Notifications'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper user-manage-box">
    <div class="help-info">
        <div class="help-heading mb-3 mt-4">
            <h3 class="p-h-color fs-clash fw-600">Notifications</h3>
        </div>
    </div>
    <div class="admin-notification-content-box admin-help-content-box f8-bg rounded-20 p-4 border-e7 ">
        <div class="notify-box">
            <div class="row">
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-3">
                        <div class="1st-box d-flex gap-2 shadow rounded p-2">
                            <div class="n-img mx-3">
                                <img src="<?php echo e(asset('assets/images/place.png')); ?>" class="position-img">
                                <span class="n-circle"></span>
                            </div>
                            <div class="n-content-box ">
                                <p class="fs-14 m-0"><a href="<?php echo e(route('notification-detail',['notification_id'=>$notification->id])); ?>"><?php echo e($notification->title); ?></a></p>
                                <p class="fs-12 m-0 light-gray">
                                <?php
                                    $created_at = \Carbon\Carbon::parse($notification->created_at);
                                    $time_ago = $created_at->diffForHumans();
                                ?>
                                <?php echo e($time_ago); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/notification/index.blade.php ENDPATH**/ ?>
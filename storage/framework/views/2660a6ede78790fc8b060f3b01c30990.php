<?php $__env->startSection('title', 'Notifications'); ?>
<?php $__env->startSection('content'); ?>

        <div class="content-wrapper user-manage-box">
            
                <div class="help-info">
                    <div class="help-heading mb-3 mt-4">
                        <h3 class="p-h-color fs-clash fw-600">Notifications</h3>
                    </div>
                </div>
                <div class="admin-notification-content-box content-box admin-help-content-box f8-bg rounded-20 p-4 border-e7 ">
                    <div class="notification-title-box">
                        <h5 class="fw-600 mb-0">Notifications Title</h5>
                        <p class="fw-600 fs-14 mb-3"><?php echo e($notification->title); ?></p>
                        <h6 class="fw-600">Notifications Description</h6>
                        <p><?php echo e($notification->message); ?></p>
                    </div>
                    <div class="notify-btn-box d-flex gap-3 flex-lg-nowrap flex-wrap">
                        <form action="<?php echo e(route('mark-read')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="notification_id" value="<?php echo e($notification->id); ?>">
                            <div class="submit-btn mt-4">
                                <button type="submit" class="btn primary-btn">Mark as Read</button>
                            </div>
                        </form>
                    </div>
                </div>
            
        </div>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/notification/details.blade.php ENDPATH**/ ?>
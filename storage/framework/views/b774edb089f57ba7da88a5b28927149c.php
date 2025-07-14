<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="row pt-0">
        <div class="col-md-12">
            <div class="top-titlebar pb-3">
                <h2 class="f-20 bold title-main">User Details</h2>
            </div>
            <div class="white-card card">
                <div class="text-center p-3">
                    <div class="user-img-block py-3 pro-img-box">
                        <?php if(isset($user->profile_pic) && !empty($user->profile_pic)): ?>
                            <img alt="binary" src="<?php echo e(asset('storage/profile')); ?>/<?php echo e($user->profile_pic); ?>" width=50 height=50 class="img-fluid rounded-circle profile">
                        <?php else: ?>
                            <img alt="binary" src="<?php echo e(asset('assets/icons/user-default.jpg')); ?>" class="img-fluid rounded-circle profile">
                        <?php endif; ?>
                    </div>
                    <div class="user-des mb-3">
                    <h6><?php echo e($user->name); ?></h6>
                    <p class="f-13 "><a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a></p>
                    </div>
                    <div class="row px-2 py-2">
                    <div class="col-md-6">
                        <div class="four-user-block py-2 my-2 bggray border-0">
                            <h5>Phone</h5>
                            <p class="mb-0"><?php echo e($user->phone_code); ?><?php echo e($user->phone_number); ?></p>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="four-user-block py-2 my-2  bggray border-0">
                            <h5>Status</h5>
                            <?php if(isset($user->status) && $user->status): ?>
                                <p class="mb-0" style="color: rgb(39, 174, 96);">Active</p>
                            <?php else: ?>
                                <p class="mb-0" style="color: rgb(39, 174, 96);">Inactive</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/user/details.blade.php ENDPATH**/ ?>
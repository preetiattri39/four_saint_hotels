<?php $__env->startSection('title','2FA'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
  <div class="card col-lg-4 mx-auto">
    <div class="card-body px-5 py-5">
      <h3 class="card-title text-left mb-3">Two-Factor Authentication</h3>
   
    <p>Please enter the OTP code sent to your email.</p>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.2fa.verify')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="otp">One-Time Password (OTP)</label>
            <input type="text" name="code" id="otp" class="form-control" required maxlength="6">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Verify</button>
    </form>
</div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/auth/2fa.blade.php ENDPATH**/ ?>
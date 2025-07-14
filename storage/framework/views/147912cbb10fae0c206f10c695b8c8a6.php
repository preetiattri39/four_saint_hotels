<?php $__env->startSection('title', 'Dahsboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="img-box">
            <img src="<?php echo e(asset('images/fram-2.png')); ?>" alt="" class="img-fluid img-2">
            <img src="<?php echo e(asset('images/fram-1.png')); ?>" alt="" class="img-fluid img-1">
            <img src="<?php echo e(asset('images/circle-2.png')); ?>" alt="" class="img-fluid img-3">
            <img src="<?php echo e(asset('images/bg-circle.png')); ?>" alt="" class="img-fluid img-5">
            <img src="<?php echo e(asset('images/circle-1.png')); ?>" alt="" class="img-fluid img-4">
        </div>
        <div class="card col-lg-6 login-form bg-white  mx-auto">
            <div class="card-body p-5">
              <div class="text-center">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="" class="img-fluid logo">
            </div>
            <h3 class=" text-center mb-3">Forgot Password</h3>
            <p class="card-sub-title text-center">Enter your email account to reset Password </p>
            <form action="<?php echo e(route('admin-forgot-password')); ?>" method="post" id="admin_forgot_password" class="px-3 ">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="title-label">Email *</label>
                    <input type="email" name="email" id="email" class="form-control p_input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <span class="mdi mdi-email-outline eye-icon absolute"></span>
                    
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
               
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Continue</button>
                </div>
                <div  class="text-center">
                  <a href="<?php echo e(route('login')); ?>">Back to Login</a>
                </div>
                
            </form>
            </div>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
$("#admin_forgot_password").validate({
  rules: {
    email: {
      required: true,
    }
  },
  messages: {
    email: {
      required: "Email is required.",
    }
  }
});
</script>

<script>
    <?php if(session('success')): ?>
        toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>
    <?php if(session('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/auth/forgot.blade.php ENDPATH**/ ?>
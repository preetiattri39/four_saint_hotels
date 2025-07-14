<?php $__env->startSection('title','Foget Password'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-lg-6 auth login-bg p-0">
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active bg-slide bg-slide-1">
          <div class="overlay"></div>
          <div class="carousel-caption  text-white">
            <h3 class="pt-5 my-2">Find Hotels Anytime,<br> Anywhere</h3>
            <p class="w-75 mx-auto">Lorem ipsum dolor sit amet consectetur. Lorem posuere at odio nullam pulvinar enim consequat at vitae. Elit ullamcorper ultrices magna malesuada erat.</p>
          </div>
        </div>
        <div class="carousel-item bg-slide bg-slide-2">
          <div class="overlay"></div>
          <div class="carousel-caption  text-white">
            <h3 class="pt-5 my-2">Find Hotels Anytime,<br> Anywhere</h3>
            <p class="w-75 mx-auto">Lorem ipsum dolor sit amet consectetur. Lorem posuere at odio nullam pulvinar enim consequat at vitae. Elit ullamcorper ultrices magna malesuada erat.</p>
          </div>
        </div>
        <div class="carousel-item bg-slide bg-slide-3">
          <div class="overlay"></div>
          <div class="carousel-caption text-white">
            <h3 class="pt-5 my-2">Find Hotels Anytime,<br> Anywhere</h3>
            <p class="w-75 mx-auto">Lorem ipsum dolor sit amet consectetur. Lorem posuere at odio nullam pulvinar enim consequat at vitae. Elit ullamcorper ultrices magna malesuada erat.</p>
          </div>
        </div>
      </div>
    
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
  </div>
  <div class=" col-lg-6 bg-white px-5 py-5">
    <div class="card-body login-form px-5 py-5">
      <div class="text-center">
        <img src="<?php echo e(asset('admin/images/auth/new_logo.png')); ?>" class="img-fluid" alt="">
        <h1 class=" heading-primary my-3"><?php echo e(__('Reset Password')); ?></h1>
        <p class="grey">Don’t worry happens to all of us. enter your email below to recover your password</p>
      </div>
        
      <form action="<?php echo e(route('forget-password')); ?>" method="POST" id="loginForm">
          <?php echo csrf_field(); ?>
          <div class="form-group">
              <label for="email"><?php echo e(__('Email Address')); ?> *</label>
              <input type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus>

              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="invalid-feedback" role="alert">
                      <strong><?php echo e($message); ?></strong>
                  </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>

        <div class="text-center mt-3">
          <button type="submit" class="btn btn-primary btn-block enter-btn"><?php echo e(__('Send Password Reset Link')); ?></button>
        </div>
        <div class="text-center mt-3 humb-line">
          <a href="<?php echo e(route('login')); ?>"> Back to login </a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $(document).ready(function () {
    $('#loginForm').validate({
      rules: {
        email: {
          required: true,
          email: true
        },
      },
      messages: {
        email: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
        },
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.auth.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/auth/forget-password.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','Log in'); ?>
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
          <h3 class="pt-4 my-2">Find Hotels Anytime,<br> Anywhere</h3>
          <p class="w-75 mx-auto">Lorem ipsum dolor sit amet consectetur. Lorem posuere at odio nullam pulvinar enim consequat at vitae. Elit ullamcorper ultrices magna malesuada erat.</p>
        </div>
      </div>
      <div class="carousel-item bg-slide bg-slide-2">
        <div class="overlay"></div>
        <div class="carousel-caption  text-white">
          <h3 class="pt-4 my-2">Find Hotels Anytime,<br> Anywhere</h3>
          <p class="w-75 mx-auto">Lorem ipsum dolor sit amet consectetur. Lorem posuere at odio nullam pulvinar enim consequat at vitae. Elit ullamcorper ultrices magna malesuada erat.</p>
        </div>
      </div>
      <div class="carousel-item bg-slide bg-slide-3">
        <div class="overlay"></div>
        <div class="carousel-caption text-white">
          <h3 class="pt-4 my-2">Find Hotels Anytime,<br> Anywhere</h3>
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
  <div class="col-lg-6 bg-white px-md-5 py-md-5 px-2 py-2">
    
    <div class="card-body login-form px-md-5 py-md-3 px-4 py-2">
      <div class="text-center">
      <img src="<?php echo e(asset('admin/images/auth/new_logo.png')); ?>" class="img-fluid" alt="">
      <h1 class="heading-primary my-3"><?php echo e(__('Login')); ?></h1>
      <p class="grey">Enter your email and password to access your account</p>
    </div>
        
      <form action="<?php echo e(route('login')); ?>" method="POST" id="loginForm">
          <?php echo csrf_field(); ?>
          <div class="form-group mb-1">
              <label for="email"><?php echo e(__('Email')); ?></label>
              <input type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your email" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus>

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

          <div class="form-group mb-1 pt-2">
            <label for="password"><?php echo e(__('Password')); ?></label>
            <div class="form-input">
            <input name="password" id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your password" autocomplete="current-password">
            <span class="togglePassword eye-icon" data-toggle="password">
                <i class="fa fa-eye-slash"></i>
            </span>
          </div>
            <?php $__errorArgs = ['password'];
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

        <div class="form-group d-flex align-items-center justify-content-between">
          <div class="form-check my-1">
    
          </div>
          <a href="<?php echo e(route('forget-password')); ?>" class="forgot-pass grey"><?php echo e(__('Forgot Your Password?')); ?></a>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-block enter-btn"><?php echo e(__('Sign In')); ?></button>
        </div>
        
      </form>
    </div>
  
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
       $('#loginForm').validate({
          rules: {
            email: {
              required: true,
              email: true
            },
            password: {
              required: true,
              minlength: 8
            },
          },
          messages: {
            email: {
              required: 'Please enter Email Address.',
              email: 'Please enter a valid Email Address.',
            },
            password: {
              required: 'Please enter Password.',
              minlength: 'Password must be at least 8 characters long.',
            },
          },
          submitHandler: function (form) {
            form.submit();
          }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.auth.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>
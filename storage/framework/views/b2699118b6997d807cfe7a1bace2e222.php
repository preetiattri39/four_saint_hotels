
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->

    <link rel="stylesheet" href="<?php echo e(asset('admin/css/style.css')); ?>">
    <style>
      label.error {
        color: #db7373;
        position: relative;
        padding-top: 11px;
      }
    </style>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo e(asset('admin/images/app-logo.jpg')); ?>" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth  login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3"><?php echo e(__('Login')); ?></h3>
                  
                <form action="<?php echo e(route('login')); ?>" method="POST" id="loginForm">
                    <?php echo csrf_field(); ?>
                    dfdfdfdsfdfdf
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

                    <div class="form-group">
                        <label for="password"><?php echo e(__('Password')); ?> *</label>
                        <input name="password" id="password" type="password" class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="current-password">
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
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember me </label>
                    </div>
                    <a href="<?php echo e(route('password.request')); ?>" class="forgot-pass"><?php echo e(__('Forgot Your Password?')); ?></a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn"><?php echo e(__('Login')); ?></button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?php echo e(asset('admin/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
            
        $(document).ready(function () {
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
        });
      </script>
  </body>
</html>
<?php /**PATH /var/www/html/four_saints_hotels/resources/views/auth/login.blade.php ENDPATH**/ ?>
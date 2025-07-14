<?php $__env->startSection('title', 'Change Password'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Change Password</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Settings</a></li>  
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
      </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                 
                <form class="forms-sample" action=<?php echo e(route('admin.changePassword')); ?> method="post" id="change-password">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                      <label for="exampleInputPassword" class="col-sm-3 col-form-label">Current Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputPassword" placeholder="Current Password" name="current_password">
                        <span class="togglePassword eye-icon" data-toggle="exampleInputPassword">
                          <i class="fa fa-eye-slash"></i>
                        </span>
                        <?php $__errorArgs = ['current_password'];
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
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" placeholder="New Password" name="password">
                      <span class="togglePassword eye-icon" data-toggle="password">
                        <i class="fa fa-eye-slash"></i>
                      </span>
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
                  </div>
                  <div class="form-group row">
                    <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id = "confirm_password" name="password_confirmation" placeholder="Confirm Password">
                      <span class="togglePassword eye-icon" data-toggle="confirm_password">
                        <i class="fa fa-eye-slash"></i>
                      </span>
                      <?php $__errorArgs = ['confirm_password'];
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
                  </div>
                  <div class="text-end">
                  <button type="submit" class="btn btn-primary mr-2">Update</button>
                  
                </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  $("#change-password").submit(function(e){
      e.preventDefault();
  }).validate({
      rules: {
          current_password: {
              required: true,
              noSpace: true,
              minlength: 8,
          },
          password: {
            required: true,
            noSpace: true,
            minlength: 8,
          },
          password_confirmation: {
            required: true,
            noSpace: true,
            minlength: 8,
            equalTo: "#password",
          },
      },
      messages: {
          current_password: {
              required: 'Current password is required.',
              minlength: 'Current password length must contain 8 charcter.'
          },
          password: {
            required: 'New password is required.',
            minlength: 'New password length must contain 8 charcter.',
          },
          password_confirmation: {
              required: 'Confirm password is required.',
              minlength: 'Confirm password length must contain 8 charcter.',
              equalTo: "New password and confirm password must be same"
          },
      },
      submitHandler: function(form) {
        var formData = new FormData(form);
        var action = $(form).attr('action'); // Corrected to use jQuery
        $.ajax({
            url: action, // Use the form's action attribute
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
              console.log(response);  
                // Handle success
                if (response.status == "success") {
                  toastr.success(response.message);
                    
                  setTimeout(function() {
                      location.reload();
                  }, 2000);
                } else {
                  toastr.error(response.message);
                }
            },
            error: function(xhr) {
                // Handle error
                // let errors = xhr.responseJSON;
                let response = xhr.responseJSON;
                toastr.error(response.message);
            }
        });
    }

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/profile/change-password.blade.php ENDPATH**/ ?>
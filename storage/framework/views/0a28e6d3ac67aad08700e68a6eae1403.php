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
        <div class="card col-lg-6 login-form bg-white mx-auto">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="" class="img-fluid logo">
                </div>
            <h3 class="text-center mb-3">Reset Password</h3>
            <p class="card-sub-title text-center">The Password must be different than before</p>
            <form action="<?php echo e(route('admin-reset-password')); ?>" method="post" id="admin_reset_password">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($token); ?>" name="token"> 
                <div class="form-group">
                    <label class="title-label">Password *</label>
                    <input type="password" id="password" name="password" class="form-control p_input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <span class="mdi mdi-eye-off-outline eye-icon absolute" id="togglePassword"></span>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label class="title-label">Confirm Password *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control p_input <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <span class="mdi mdi-eye-off-outline eye-icon absolute" id="toggleConfirmPassword"></span>
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


<script>
$(document).ready(function () {
    // Custom validation method for strong passwords
    jQuery.validator.addMethod("strongPassword", function(value, element) {
        return this.optional(element) || 
               /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
    }, "Password must have at least 8 characters, including one uppercase, one lowercase, one number, and one special character.");

    $("#admin_reset_password").validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                strongPassword: true
            },
            password_confirmation: {
                required: true,
                equalTo: "#password" // Ensures it matches password
            }
        },
        messages: {
            password: {
                required: "Password is required.",
                minlength: "Password must be at least 8 characters long."
            },
            password_confirmation: {
                required: "Password confirmation is required.",
                equalTo: "Passwords do not match."
            }
        }
    });
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
<script>

    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');
   
        togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            if (type === 'text') {
                $('#togglePassword')
                .removeClass('mdi-eye-off-outline')
                .addClass('mdi-eye-outline');
            } else {
                $('#togglePassword')
                .removeClass('mdi-eye-outline')
                .addClass('mdi-eye-off-outline');
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const passwordField = document.querySelector('#password_confirmation');
   
        toggleConfirmPassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            if (type === 'text') {
                $('#toggleConfirmPassword')
                .removeClass('mdi-eye-off-outline')
                .addClass('mdi-eye-outline');
            } else {
                $('#toggleConfirmPassword')
                .removeClass('mdi-eye-outline')
                .addClass('mdi-eye-off-outline');
            }
        });
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/auth/reset.blade.php ENDPATH**/ ?>
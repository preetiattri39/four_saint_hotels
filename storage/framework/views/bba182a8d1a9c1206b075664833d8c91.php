<?php $__env->startSection('title', 'PayPal'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Config Setting</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">PAYPAL Information</li>
      </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">PAYPAL Information</h4>
             
            <form class="forms-sample" id="paypal-information" action="<?php echo e(route('admin.config-setting.paypal')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputFromCLIENT_ID">PayPal Client Id</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['PAYPAL_CLIENT_ID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputFromCLIENT_ID" placeholder="PayPal Client Id" name = "PAYPAL_CLIENT_ID" value="<?php echo e($paypalDetail['PAYPAL_CLIENT_ID'] ?? ''); ?>">
                        <?php $__errorArgs = ['PAYPAL_CLIENT_ID'];
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
                    <div class="col-6">
                        <label for="exampleInputCLIENT_SECRET">PayPal Client Secret</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['PAYPAL_CLIENT_SECRET'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputCLIENT_SECRET" placeholder="PaylPal Client Secret" name="PAYPAL_CLIENT_SECRET" value="<?php echo e($paypalDetail['PAYPAL_CLIENT_SECRET'] ?? ''); ?>">
                        <?php $__errorArgs = ['PAYPAL_CLIENT_SECRET'];
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
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="card_type">PayPal Mode</label>
                        <select class="js-example-basic-single select2-hidden-accessible <?php $__errorArgs = ['PAYPAL_MODE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="PAYPAL_MODE" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true" id="card_type">
                            <option value="sandbox" <?php echo e((isset($paypalDetail['PAYPAL_MODE']) && $paypalDetail['PAYPAL_MODE'] == 'sandbox') ? 'selected' : ''); ?>>sandbox</option>
                            <option value="live"<?php echo e((isset($paypalDetail['PAYPAL_MODE']) && $paypalDetail['PAYPAL_MODE'] == 'live')  ? 'selected' : ''); ?>>live</option>
                        </select>
                        <?php $__errorArgs = ['PAYPAL_MODE'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($type); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>    
                    </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $(document).ready(function() {
    $("#paypal-information").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            PAYPAL_CLIENT_ID: {
              required: true,
              noSpace: true,
              minlength: 3,
            },
            PAYPAL_CLIENT_SECRET: {
                required: true,
                noSpace: true,
                minlength: 3,
            },
            PAYPAL_MODE: {
                required: true,
            },
        },
        messages: {
            PAYPAL_CLIENT_ID: {
              required: "Client Id is required",
              minlength: "Client Id must consist of at least 3 characters"
            },
            PAYPAL_CLIENT_SECRET: {
              required: "Client secret is required",
              minlength: "Client secret must consist of at least 3 characters"
            },
            PAYPAL_MODE: {
              required: "Please select paypal mode",
            },
        },
        submitHandler: function(form) {
            form.submit();
        }

    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/config-setting/paypal.blade.php ENDPATH**/ ?>
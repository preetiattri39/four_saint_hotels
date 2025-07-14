<?php $__env->startSection('title', 'Stripe'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Config Setting</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">STRIPE Information</li>
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
            <h4 class="card-title">STRIPE Information</h4>
             
            <form class="forms-sample" id="stripe-information" action="<?php echo e(route('admin.config-setting.stripe')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputFromName">Stripe Key</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['STRIPE_KEY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputFromName" placeholder="Stripe Key" name = "STRIPE_KEY" value="<?php echo e($stripeDetail['STRIPE_KEY'] ?? ''); ?>">
                        <?php $__errorArgs = ['STRIPE_KEY'];
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
                        <label for="exampleInputSTRIPE_SECRET">Stripe Secret</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['STRIPE_SECRET'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputSTRIPE_SECRET" placeholder="Stripe Secret" name="STRIPE_SECRET" value="<?php echo e($stripeDetail['STRIPE_SECRET'] ?? ''); ?>">
                        <?php $__errorArgs = ['STRIPE_SECRET'];
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
    $("#stripe-information").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            STRIPE_KEY: {
                required: true,
                noSpace: true,
                minlength: 3,
            },
            STRIPE_SECRET: {
                required: true,
                noSpace: true,
                minlength: 3,
            },
        },
        messages: {
            STRIPE_KEY: {
                required: "Stripe key is required",
                minlength: "Stripe key must consist of at least 3 characters"
            },
            STRIPE_SECRET: {
                required: "Stripe secret is required",
                minlength: "Stripe secret must consist of at least 3 characters"
            },
        },
        submitHandler: function(form) {
            form.submit();
        }

    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/config-setting/stripe.blade.php ENDPATH**/ ?>
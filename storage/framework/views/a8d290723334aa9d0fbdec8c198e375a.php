<?php $__env->startSection('title', 'Config'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Config Setting</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">General Information</li>
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
            <h4 class="card-title">General Information</h4>
             
            <form class="forms-sample" id="config-information" action="<?php echo e(route('admin.config-setting.config')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputCardLimit">Card Limit</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['CARD_LIMIT'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputCardLimit" min=0 max=99 placeholder="Card Limit" name = "CARD_LIMIT" value="<?php echo e($configDetail['CARD_LIMIT'] ?? ''); ?>">
                        <?php $__errorArgs = ['CARD_LIMIT'];
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
                        <label for="exampleInputQuestionLimit">Question Limit</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['QUESTION_LIMIT'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputQuestionLimit" placeholder="Question Limit" name = "QUESTION_LIMIT" min=0 max=99 value="<?php echo e($configDetail['QUESTION_LIMIT'] ?? ''); ?>">
                        <?php $__errorArgs = ['QUESTION_LIMIT'];
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
                    <label for="exampleInputPriceCategorized">Price ( Categorized Board)</label>
                    <input type="number" class="form-control <?php $__errorArgs = ['PRICE_CATEGORIZED'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" min=0 max=9999 id="exampleInputPriceCategorized" placeholder="Price" name = "PRICE_CATEGORIZED" value="<?php echo e($configDetail['PRICE_CATEGORIZED'] ?? ''); ?>">
                    <?php $__errorArgs = ['PRICE_CATEGORIZED'];
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
                    <label for="exampleInputPricePersonalized">Price ( Personalized Board)</label>
                    <input type="number" class="form-control <?php $__errorArgs = ['PRICE_PERSONALIZED'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputPricePersonalized" min=0 max=9999 placeholder="Price" name = "PRICE_PERSONALIZED" value="<?php echo e($configDetail['PRICE_PERSONALIZED'] ?? ''); ?>">
                    <?php $__errorArgs = ['PRICE_PERSONALIZED'];
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
                    <label for="exampleInputBoardExpiry">Board Expiry Time ( in days )</label>
                    <input type="number" class="form-control <?php $__errorArgs = ['BOARD_EXPIRY'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputBoardExpiry" min=0 max=9999 placeholder="Price" name = "BOARD_EXPIRY" value="<?php echo e($configDetail['BOARD_EXPIRY'] ?? ''); ?>">
                    <?php $__errorArgs = ['BOARD_EXPIRY'];
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
    $("#config-information").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            CARD_LIMIT: {
                required: true,
                number: true,
                maxlength:2
            },
            QUESTION_LIMIT: {
                required: true,
                number: true,
                maxlength:2
            },
            PRICE_CATEGORIZED:{
              required: true,
              number: true,
              maxlength:4
            },
            PRICE_PERSONALIZED:{
              required: true,
              number: true,
              maxlength:4
            },
            BOARD_EXPIRY:{
              required: true,
              number: true,
              maxlength:3
            }
        },
        messages: {
            CARD_LIMIT: {
              required: "Card limit is required",
              number: "Only numeric value is acceptable",
              maxlength: "Card limit must not be greater than 2 digits"
            },
            QUESTION_LIMIT: {
              required: "Question limit is required",
              number: "Only numeric value is acceptable",
              maxlength: "Question limit must not be greater than 2 digits"
            },
            PRICE_CATEGORIZED: {
              required: "Price is required",
              number: "Only numeric value is acceptable",
              maxlength: "Price must not be greater than 4 digits"
            },
            PRICE_PERSONALIZED: {
              required: "Price is required",
              number: "Only numeric value is acceptable",
              maxlength: "Price must not be greater than 4 digits"
            },
            BOARD_EXPIRY: {
              required: "Board expiry is required",
              number: "Only numeric value is acceptable",
              maxlength: "Board expirymust not be greater than 3 digits"
            },
        },
        submitHandler: function(form) {
            form.submit();
        }

    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/config-setting/config.blade.php ENDPATH**/ ?>
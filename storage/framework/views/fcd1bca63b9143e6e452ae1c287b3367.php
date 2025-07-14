<?php $__env->startSection('title', 'Edit FAQ'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title"> FAQ</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.f-a-q.list')); ?>">FAQ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            <h4 class="card-title">Edit FAQ</h4>
             
            <form class="forms-sample" id="add-faq" action="<?php echo e(route('admin.f-a-q.edit',['id' => $faq->id])); ?>" method="POST" >
              <?php echo csrf_field(); ?>

              <div class="form-group">
                  <div class="row">
                    <div class="col-12">
                        <label for="exampleInputName">Question</label>
                        <textarea name="question" id="question" rows="3" class="form-control"><?php echo e($faq->question); ?></textarea>
                        <?php $__errorArgs = ['question'];
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
                    <div class="col-12">
                        <label>Answer</label>
                        <textarea name="answer" id="answer" rows="6" class="form-control"><?php echo e($faq->answer); ?></textarea>
                        <?php $__errorArgs = ['answer'];
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
              <button type="submit" class="btn btn-primary mr-2 mt-2">Update</button>
              
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
    $("#edit-faq").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            question: {
                required: true,
                noSpace: true,
                minlength: 3,
            },
            answer: {
                required: true,
                noSpace: true,
                minlength: 3,
            },
        },
        messages: {
            question: {
                required: "Question is required.",
                minlength: "Question must consist of at least 3 characters."
            },
            answer: {
                required: "Answer is required.",
                minlength: "Answer must consist of at least 3 characters."
            },
        },
        submitHandler: function(form) {
            form.submit();
        }

    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/contentPage/f-a-q/edit.blade.php ENDPATH**/ ?>
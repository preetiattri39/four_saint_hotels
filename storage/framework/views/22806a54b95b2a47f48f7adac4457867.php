<?php $__env->startSection('title', 'Edit Banner'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Banners</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.banner.list')); ?>">Banners</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="row justify-content-center">
      <div class="col-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Banner</h4>
             
            <form class="forms-sample" id="edit-banner" action="<?php echo e(route('admin.banner.edit',['id' => $banner->id])); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              
                <div class="form-group">
                    <div class="row">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputTitle" placeholder="Title" name="title" value="<?php echo e($banner->title ?? ''); ?>">
                        <?php $__errorArgs = ['title'];
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
                <div class="form-group">
                    <div class="row">
                        <label for="card_type">Type</label>
                        <select class="js-example-basic-single select2-hidden-accessible  form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true" id="card_type">
                            <option value="default" <?php echo e($banner->type == 'default' ? 'selected' : ''); ?>>Default</option>
                            <option value="subscription" <?php echo e($banner->type == 'subscription' ? 'selected' : ''); ?>>Subscription</option>
                            <option value="contact-Four Saints Hotel" <?php echo e($banner->type == 'contact-Four Saints Hotel' ? 'selected' : ''); ?>>Contact Four Saints Hotel</option>
                        </select>
                        <?php $__errorArgs = ['type'];
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
                

                <div class="form-group">
                    <div class="row">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image" accept="image/*" value="<?php echo e($banner->path); ?>">
                        <?php $__errorArgs = ['image'];
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

              <button type="submit" class="btn btn-primary mr-2" >Update</button>
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
    
    $("#edit-banner").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            title: {
                required: true,
                noSpace: true,
                minlength: 3,
            },
            type: {
                required: true,
            },
            
            // file: {
            //     required: true,
            // },
        },
        messages: {
            title: {
                required: "Title is required.",
                minlength: "Title must consist of at least 3 characters."
            },
            type: {
                required: "Please select type.",
            },
            // file:{
            //     required: "Please select banner image."
            // },
        },
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            if (element.prop('type') === 'file') {
                error.appendTo(element.closest('.row'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/banner/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', $content_detail->slug); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title"> Content Page </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><?php echo e(ucwords(str_replace('-', ' ', $content_detail->slug))); ?></li>
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
            <h4 class="card-title"><?php echo e(ucwords(str_replace('-', ' ', $content_detail->slug))); ?></h4>
             
            <form class="forms-sample" id="update-content" action="<?php echo e(route('admin.contentPages.detail',['slug' => $content_detail->slug])); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
             
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <label for="exampleInputTitle">Title</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputTitle" placeholder="Title" name = "title" value="<?php echo e($content_detail->title); ?>">
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
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12">
                            <textarea id="editor" name="content"><?php echo e($content_detail->content); ?></textarea>
                        </div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
  $(document).ready(function() {
    ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
    $("#update-content").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            title: {
                required: true,
                noSpace: true,
                minlength: 3,
            },
            content: {
                required: true,
            },
        },
        messages: {
            title: {
                required: "Title is required",
                minlength: "Title must consist of at least 3 characters"
            },
            content: {
                required: "Content is required",
            },
        },
        submitHandler: function(form) {
            form.submit();
        }

    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/contentPage/update.blade.php ENDPATH**/ ?>
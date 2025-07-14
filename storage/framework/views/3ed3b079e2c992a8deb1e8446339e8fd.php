<?php $__env->startSection('title', 'Content Management'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper user-manage-box">
    <div class="top-titlebar pb-2">
        <h2 class="f-20 bold title-main">Content Management</h2>
    </div>
    <div class="card">
        <form action="<?php echo e(route('pages.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="page_id" id="page_id" value="<?php echo e($page->id); ?>">
            <div class="content-page-form shadow rounded-20 p-lg-3 p-3">
                <div class="col-md-12">
                    <div class="c-title-input mb-3">
                        <label for="content_title" class="form-label fw-600">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control rounded-30 bg-f6 <?php $__errorArgs = ['content_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="content_title" name="content_title" placeholder="title" value="<?php echo e($page->PageContent->name); ?>">
                    </div>
                    <?php $__errorArgs = ['content_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-12">
                    <div class="c-title-input">
                        <label for="page_slug" class="form-label fw-600">Slug</label>
                        <input type="text" class="form-control rounded-30 bg-f6 <?php $__errorArgs = ['page_slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="page_slug" name="page_slug" value="<?php echo e($page->slug); ?>" disabled>
                    </div>
                </div>
                <?php $__errorArgs = ['page_slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="text-editor-box">
                    <h6 class="color-23 fw-600 mt-3">Product Information</h6>
                    <div id="wysiwyg">
                        <textarea id="content_editor" name="content" class="form-control rounded-30 bg-f6">
                        <?php echo $page->PageContent->page_content; ?>

                        </textarea>
                    </div>
                    <div class="submit-btn mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.tiny.cloud/1/k6vov7xs3x5yy8qq6m6nl4qolwen4gg1kedvjbqk7cae33hv/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/pages/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Content Management'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper user-manage-box">
    <div class="top-titlebar pb-2">
        <h2 class="f-20 bold title-main">Content Management</h2>
    </div>
    <div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-light  shadow">
                <thead class="bg-e6 rounded-8">
                    <tr>
                        <th>Title</th>
                        <th></th>
                        <th>Slug</th>
                        <th></th>
                        <th></th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($pages->count()>0): ?>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($pages->PageContent->name); ?>

                                </td>
                                <td></td>
                                <td>
                                <?php echo e($pages->slug); ?>

                                </td>
                                <td></td>
                                <td></td>

                                <td>
                                    <div class="td-delete-icon d-flex gap-3">
                                        <a href="<?php echo e(route('edit-page-content',['slug'=>$pages->slug])); ?>">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No Page found</td>
                    </tr>
                    <?php endif; ?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.tiny.cloud/1/k6vov7xs3x5yy8qq6m6nl4qolwen4gg1kedvjbqk7cae33hv/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    <?php if(session('success')): ?>
        toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>

    <?php if(session('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/pages/index.blade.php ENDPATH**/ ?>
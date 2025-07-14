<!doctype html>
<html lang="en">
<?php echo $__env->make('admin.layouts.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<body>
    <div class="container-scroller">
        <?php if(Auth::guard('admin')->check()): ?>
            <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="container-fluid page-body-wrapper">
                <?php echo $__env->make('admin.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="main-panel">
                    <?php echo $__env->yieldContent('content'); ?>   
                    <?php echo $__env->make('admin.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
        <?php else: ?>
            <?php echo $__env->yieldContent('content'); ?>    
        <?php endif; ?> 
    </div>
    <?php echo $__env->make('admin.layouts.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>
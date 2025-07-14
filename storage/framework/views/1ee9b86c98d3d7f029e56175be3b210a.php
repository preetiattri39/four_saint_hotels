<div>
    <?php if($error = session('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo e($error); ?>

        </div>
    <?php elseif($success = session('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e($success); ?>

        </div>
    <?php endif; ?>
</div><?php /**PATH /var/www/html/four_saints_hotels/resources/views/components/alert.blade.php ENDPATH**/ ?>
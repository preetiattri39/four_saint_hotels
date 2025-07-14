<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Free Web tutorials" />
    <meta name="keywords" content="HTML,CSS,XML,JavaScript" />
    <meta name="author" content="John Doe" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title><?php echo $__env->yieldContent('title', 'Edupalz'); ?></title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/welcome.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        html { scroll-behavior: smooth; }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <?php echo $__env->yieldContent('content'); ?>

    
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        <?php if(session('success')): ?>
            toastr.options = { "closeButton": true, "progressBar": true, "positionClass": "toast-top-right" };
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>

        <?php if($errors->any()): ?>
            toastr.options = { "closeButton": true, "progressBar": true, "positionClass": "toast-top-right" };
            toastr.error("Please fix the errors and try again.");
        <?php endif; ?>
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/four_saints_hotels/resources/views/layouts/app.blade.php ENDPATH**/ ?>
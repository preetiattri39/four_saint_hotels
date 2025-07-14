<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/mdi/css/materialdesignicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/css/vendor.bundle.base.css')); ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/jvectormap/jquery-jvectormap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/owl-carousel-2/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendors/owl-carousel-2/owl.theme.default.min.css')); ?>">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/style.css')); ?>">
    <!-- End layout styles -->


    <link rel="shortcut icon" href="<?php echo e(asset('admin/images/app-logo.jpg')); ?>" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?php echo e(asset('admin/cstm-css/custom.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    


    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <?php 
        $user = '';
        if(Auth::Check())
        $user = Auth::user();
    ?>
    <div class="container-scroller">
        <?php echo $__env->make('admin.layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="container-fluid page-body-wrapper">
            <?php echo $__env->make('admin.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="main-panel">
                <div class="preloader" style = "display:none;"></div>
                <div class="content-wrapper">
                    <?php echo $__env->yieldContent('breadcrum'); ?>
                    
                    <?php echo $__env->yieldContent('content'); ?>
                    
                </div>
                
                
                
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                      <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Four Saints Hotel <?php echo e(date('Y')); ?></span>
                    </div>
                </footer>
                
            </div>
        </div>
        
    </div>
    <!-- plugins:js -->
        <script src="<?php echo e(asset('admin/vendors/js/vendor.bundle.base.js')); ?>"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="<?php echo e(asset('admin/vendors/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/progressbar.js/progressbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/jvectormap/jquery-jvectormap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/vendors/owl-carousel-2/owl.carousel.min.js')); ?>"></script>
    <!-- End plugin js for this page -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- External scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- endexternal -->

    <!-- inject:js -->
    <script src="<?php echo e(asset('admin/js/off-canvas.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/hoverable-collapse.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/misc.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/settings.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/todolist.js')); ?>"></script>
    <!-- endinject -->

    <!-- Custom js -->
    <script src="<?php echo e(asset('admin/cstm-js/custom.js')); ?>"></script>
    <!-- endcustom -->


    <script>

      $(document).ready(function () {
        $(document).on('click', '.togglePassword', function() {
          const inputSelector = $(this).data('toggle');
          const password = $('#' + inputSelector);
          const type = password.attr('type') === 'password' ? 'text' : 'password';
          password.attr('type', type);

          $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        <?php if(Session::has('success')): ?>
            toastr.success("<?php echo e(Session::get('success')); ?>");
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            toastr.error("<?php echo e(Session::get('error')); ?>");
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            toastr.info("<?php echo e(Session::get('info')); ?>");
        <?php endif; ?>

        <?php if(Session::has('warning')): ?>
            toastr.warning("<?php echo e(Session::get('warning')); ?>");
        <?php endif; ?>
      });
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>



<?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>
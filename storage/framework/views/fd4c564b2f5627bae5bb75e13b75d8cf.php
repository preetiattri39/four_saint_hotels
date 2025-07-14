<?php $__env->startSection('title', 'Notification'); ?>

<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Notification</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Notifications</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-0">
                <div class="d-flex px-3 py-3 mb-2 flex-md-row flex-column row-gap-3 justify-content-between align-items-center header-wrapper">
                    <h4 class="card-title m-0">Your Notifications</h4>
                    <div class="btn-box">
                        <button class="btn mark">
                            <i class="fa-solid fa-check-double clear"></i><span>Mark All as read</span>
                        </button>
                        <button class="btn clear">
                            <span>Clear All</span>
                        </button>
                    </div>
                </div>

                <div class="pt-2 pb-3">
                    <div class="status py-2 px-3 mb-3">
                        <h5 class="title m-0">Today</h5>
                    </div>

                    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="py-2 px-3">
                            <div class="card-content p-2">
                                <div class="row align-items-center">
                                    <div class="col-lg-11 col-10">
                                        <div class="d-flex align-items-center">
                                            <span class="notifi-icon">
                                                <img src="<?php echo e(asset('images/calendar.png')); ?>" alt="" class="img-fluid">
                                            </span>
                                            <div class="body-content pl-2">
                                                <p class="m-0">
                                                    <?php if(isset(($notification->data)['route'])): ?>
                                                        <a href="<?php echo e(($notification->data)['route']); ?>">
                                                            <?php echo e(($notification->data)['description']); ?>

                                                        </a>
                                                    <?php else: ?>
                                                        <?php echo e(($notification->data)['description']); ?>

                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-2">
                                        <button class="btn del-btn deleteNotification" data-id="<?php echo e($notification->id); ?>">
                                            <img src="<?php echo e(asset('images/delete.png')); ?>" alt="" class="img-fluid">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-12 text-center py-4">
                            <p>No record found</p>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
$(document).ready(function () {
    $('.deleteNotification').on('click', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            text: "You want to delete the Notification?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#B46326',
           cancelButtonColor: '#fff',
          confirmButtonText: "Yes, delete it!",
          customClass: {
            cancelButton: 'swal-cancel-custom'
        }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/notification/delete/" + id,
                    type: "GET",
                    success: function(response) {
                        if (response.api_response === "success") {
                            toastr.success(response.message);
                            location.reload();
                        } else {
                            toastr.error(response.message);
                        }
                    }
                });
            }
        });
    });

    $('.clear').on('click', function() {
        Swal.fire({
            title: "Are you sure?",
            text: "You want to clear all Notifications?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2ea57c",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/notification/delete/clear",
                    type: "GET",
                    success: function(response) {
                        if (response.api_response === "success") {
                            toastr.success(response.message);
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        } else {
                            toastr.error(response.message);
                        }
                    }
                });
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/notification/list.blade.php ENDPATH**/ ?>
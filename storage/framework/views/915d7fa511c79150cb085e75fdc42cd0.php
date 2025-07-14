<?php $__env->startSection('title', 'Service List'); ?>
<?php $__env->startSection('breadcrum'); ?>
    <div class="page-header">
        <h3 class="page-title">Services</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Service List</li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body p-0">
            <div class="px-3 py-3">
                <h4 class="card-title m-0">Services List</h4>
            </div>
            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($service->service_name); ?></td>
                                <td><?php echo e($service->service_category_name); ?></td>
                                <td><?php echo e(Str::limit($service->description, 50, '...')); ?></td>
                                <td><?php echo e($service->currency); ?> <?php echo e(number_format($service->price, 2)); ?></td>
                                <td>
                                    <a href="<?php echo e(route('service.view', $service->id)); ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="<?php echo e(route('service.edit', $service->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center">No services available</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrapper">
                <?php echo e($services->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/service/list.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'View Service'); ?>
<?php $__env->startSection('breadcrum'); ?>
    <div class="page-header">
        <h3 class="page-title">Services</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('service.list')); ?>">Service List</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Service</li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">View Service</h4>

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

            <div class="row">
                <div class="col-md-6">
                    <h5>Service Information</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td><?php echo e($service->service_name); ?></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td><?php echo e($service->service_category_name); ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo e($service->description ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><?php echo e($service->currency); ?> <?php echo e(number_format($service->price, 2)); ?></td>
                        </tr>
                        <tr>
                            <th>Price Type</th>
                            <td><?php echo e(ucfirst($service->price_type)); ?></td>
                        </tr>
                        <tr>
                            <th>VAT</th>
                            <td><?php echo e($service->vat); ?>%</td>
                        </tr>
                        <tr>
                            <th>Currency</th>
                            <td><?php echo e($service->currency); ?></td>
                        </tr>
                        <tr>
                            <th>City Tax Applied</th>
                            <td><?php echo e($service->apply_city_tax ? 'Yes' : 'No'); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Service Image</h5>
                    <div class="text-center">
                        <img src="<?php echo e($service->image_url); ?>" alt="Service Image" class="img-fluid" style="max-height: 250px;">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h5>Available Rate Plans</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Rate Plan Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $service->available_rateplans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rateplan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($rateplan['rateplan_name']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 text-right">
                    <a href="<?php echo e(route('service.list')); ?>" class="btn btn-secondary">Back to Service List</a>
                    <a href="<?php echo e(route('service.edit', $service->id)); ?>" class="btn btn-warning">Edit Service</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/service/view.blade.php ENDPATH**/ ?>
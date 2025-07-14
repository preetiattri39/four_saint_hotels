<?php $__env->startSection('title', 'Booking Transactions'); ?>

<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Booking Transactions</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transactions</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Booking Transactions</h4>
                    <form id="filter" method="GET">
                        <div class="row align-items-end">
                            <div class="col">
                                <input type="text" name="search_keyword" class="form-control" placeholder="Search Booking Code" value="<?php echo e(request('search_keyword')); ?>">
                            </div>
                            <div class="col">
                                <label>From</label>
                                <input type="date" name="from_date" class="form-control" value="<?php echo e(request('from_date')); ?>">
                            </div>
                            <div class="col">
                                <label>To</label>
                                <input type="date" name="to_date" class="form-control" value="<?php echo e(request('to_date')); ?>">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <?php if(request()->filled('search_keyword') || request()->filled('from_date') || request()->filled('to_date')): ?>
                                    <a href="<?php echo e(route('admin.payment.list')); ?>" class="btn btn-danger">Clear</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-stripe">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Booking Code</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Payment Method</th>
                                <th>Payment Date</th>
                                <th>Status</th>
                                <th>Room</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($payment['booking']['reservation_code'] ?? 'N/A'); ?></td>
                                    <td><?php echo e($payment['amount']); ?></td>
                                    <td><?php echo e($payment['currency']); ?></td>
                                    <td><?php echo e(ucfirst($payment['payment_type'])); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($payment['payment_date'])->format('d M Y, H:i')); ?></td>
                                    <td><?php echo e($payment['payment_status']); ?></td>
                                    <td><?php echo e($payment['booking']['room_name'] ?? 'N/A'); ?></td>
                                    <td> 
                                    <span class="menu-icon">
                                            <a href="<?php echo e(route('admin.booking.view',['id' => $payment['booking']['id']])); ?>" title="View" class="text-primary"><i class="mdi mdi-eye"></i></a>
                                          </span>&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center">No payments found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if(method_exists($payments, 'links')): ?>
                    <div class="custom_pagination">
                        <?php echo e($payments->appends(request()->query())->links('pagination::bootstrap-4')); ?>

                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/transaction/list.blade.php ENDPATH**/ ?>
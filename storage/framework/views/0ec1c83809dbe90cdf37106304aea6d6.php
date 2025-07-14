<?php $__env->startSection('title', 'View Booking'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Bookings</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.booking.list')); ?>">Bookings</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Booking</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
    <h4 class="user-title">Booking Details</h4>
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <h6><strong>Reservation Code:</strong> <?php echo e($booking->reservation_code); ?></h6>
                    <h6><strong>Door Code:</strong> <?php echo e($booking->door_code ?? 'N/A'); ?></h6>
                    <h6><strong>Status:</strong> <?php echo e($booking->status); ?></h6>
                    <h6><strong>Created At:</strong> <?php echo e(convertDate($booking->created_at)); ?></h6>
                </div>
                <div class="col-md-4">
                    <h6><strong>Room Type:</strong> <?php echo e($booking->room_type_name); ?></h6>
                    <h6><strong>Room Name:</strong> <?php echo e($booking->room_name); ?></h6>
                    <h6><strong>Check-in:</strong> <?php echo e($booking->checkin_date); ?></h6>
                    <h6><strong>Check-out:</strong> <?php echo e($booking->checkout_date); ?></h6>
                </div>
                <div class="col-md-4">
                    <h6><strong>Guests:</strong> <?php echo e($booking->number_of_guests); ?></h6>
                    <h6><strong>Adults:</strong> <?php echo e($booking->guest_count['adults']); ?></h6>
                    <h6><strong>Children:</strong> <?php echo e($booking->guest_count['children']); ?></h6>
                    <h6><strong>Infants:</strong> <?php echo e($booking->guest_count['infants']); ?></h6>

                </div>
            </div>

            <hr>

            <h5 class="mb-3">Customer Details</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6><strong>Name:</strong> <?php echo e($booking->customer->first_name); ?> <?php echo e($booking->customer->last_name); ?></h6>
                    <h6><strong>Email:</strong> <?php echo e($booking->customer->email); ?></h6>
                    <h6><strong>Phone:</strong> <?php echo e($booking->customer->phone_number); ?></h6>
                    <h6><strong>Country Code:</strong> <?php echo e($booking->customer->country_code); ?></h6>
                </div>
                <div class="col-md-6">
                    <h6><strong>Address:</strong> <?php echo e($booking->customer->address ?? 'N/A'); ?></h6>
                    <h6><strong>City:</strong> <?php echo e($booking->customer->city ?? 'N/A'); ?></h6>
                    <h6><strong>Zip:</strong> <?php echo e($booking->customer->zip ?? 'N/A'); ?></h6>
                    <h6><strong>Remarks:</strong> <?php echo e($booking->customer->remarks ?? 'N/A'); ?></h6>
                </div>
            </div>

            <hr>

            <?php $__empty_1 = true; $__currentLoopData = $booking->booking_guests ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <p>- <?php echo e($guest->first_name); ?> <?php echo e($guest->last_name); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No guests found.</p>
            <?php endif; ?>

            <hr>

            <h5 class="mb-3">Booking Services</h5>

            <?php if($booking->bookingServices->count()): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Currency</th>
                        <th>Description</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $booking->bookingServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($service->service_name ?? '-'); ?></td>
                        <td><?php echo e($service->quantity ?? 1); ?></td>
                        <td><?php echo e(number_format($service->price, 2) ?? '0.00'); ?></td>
                        <td><?php echo e($booking->currency); ?></td>
                        <td><?php echo e($service->description ?? '-'); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($service->created_at)->format('d M Y H:i')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>No services found for this booking.</p>
            <?php endif; ?>




            <hr>

            <h5 class="mb-3">Booking Payments</h5>

            <?php if($booking->payments->count()): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Payment Type</th>
                        <th>Payment Source</th>
                        <th>Description</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $booking->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                       <td><?php echo e($booking->customer->first_name ?? '-'); ?> <?php echo e($booking->customer->last_name ?? ''); ?></td>

                        <td><?php echo e(number_format($payment->amount, 2)); ?></td>
                        <td><?php echo e($payment->currency); ?></td>
                        <td><?php echo e($payment->payment_type); ?></td>
                        <td><?php echo e($payment->payment_status ?? '-'); ?></td>
                        <td><?php echo e($payment->description ?? '-'); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($payment->payment_date)->format('d M Y H:i')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>No payments found for this booking.</p>
            <?php endif; ?>



            <h5 class="mb-3">Comment</h5>
            <div class="p-3 border rounded">
                <?php echo $booking->comment; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/booking/view.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'View Hotel'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Hotel</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.hotel.list')); ?>">Hotel</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Hotel</li>
        </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <hr>
    <h4 class="mt-4">Hotel Details</h4>
    <div class="card mt-3">
        <div class="card-body">
            <h6><strong>Hotel Name:</strong> <?php echo e($hotel->name); ?></h6>
            <h6><strong>City:</strong> <?php echo e($hotel->city); ?></h6>
            <h6><strong>Country:</strong> <?php echo e($hotel->country); ?></h6>
            <h6><strong>Zip:</strong> <?php echo e($hotel->zip); ?></h6>
            <h6><strong>Address:</strong> <?php echo e($hotel->address); ?></h6>
            <h6><strong>Latitude:</strong> <?php echo e($hotel->latitude); ?></h6>
            <h6><strong>Longitude:</strong> <?php echo e($hotel->longitude); ?></h6>
            <h6><strong>Phone:</strong> <?php echo e($hotel->phone); ?></h6>
            <h6><strong>Email:</strong> <?php echo e($hotel->email); ?></h6>
            <h6><strong>Currency:</strong> <?php echo e($hotel->currency); ?></h6>
            <h6><strong>Room Rate per Night:</strong> <?php echo e($hotel->rate_per_night); ?></h6>
        </div>
        <?php if($hotel->hotel_images): ?>
        <h4 class="mt-4">Hotel Images</h4>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <?php $__currentLoopData = $hotel->hotel_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 mb-3">
                        <div class="border p-2 rounded">
                            <img src="<?php echo e($image->image_path); ?>" alt="Hotel Image" class="img-fluid rounded" style="height: 150px; object-fit: cover;">
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>


    </div>

    <h4 class="mt-4">Room Types</h4>
    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table class="table table-stripe" id="roomsTable">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Property Type</th>
                        <th>Max Occupancy</th>
                        <th>Number of Rooms</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $hotel->room_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($room->room_name); ?></td>
                        <td><?php echo e($room->property_type); ?></td>
                        <td><?php echo e($room->max_occupancy); ?></td>
                        <td><?php echo e($room->number_of_rooms); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($room->create_date_time)->format('d M Y H:i')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <h4 class="mt-4">Rate Plans</h4>
    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table class="table table-stripe" id="ratesTable">
                <thead>
                    <tr>
                        <th>Rate Plan Name</th>
                        <th>Rate Plan ID</th>
                        <th>Linked to Master</th>
                        <th>Dynamic Pricing</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $hotel->rate_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($rate->rateplan_name); ?></td>
                        <td><?php echo e($rate->rateplan_id); ?></td>
                        <td><?php echo e($rate->linked_to_master ? 'Yes' : 'No'); ?></td>
                        <td><?php echo e($rate->dynamic_pricing ? 'Yes' : 'No'); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($rate->created_at)->format('d M Y H:i')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>



</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#roomsTable').DataTable();
        $('#ratesTable').DataTable();
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/hotel/view.blade.php ENDPATH**/ ?>
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
            <h6><strong>Hotel Name:</strong> <?php echo e($hotel->hotel->name); ?></h6>
        </div>
        <?php if($hotel->images): ?>
        <h4 class="mt-4">Room Types Images</h4>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <?php $__currentLoopData = $hotel->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

      <h4 class="mt-4">Rooms</h4>
    <div class="card mt-3">
        <div class="card-body table-responsive">
            <table class="table table-stripe" id="roomsTable">

                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Room Name</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $hotel->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($room->room_id); ?></td>
                        <td><?php echo e($room->room_name); ?></td>
                    
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
                        <th>Rate Plan ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Number of Guests</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $hotel->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($rate->rateplan_id); ?></td>
                        <td><?php echo e($rate->start_rate_date); ?></td>
                        <td><?php echo e($rate->end_rate_date); ?></td>
                        <td><?php echo e($rate->number_of_guests); ?></td>
                        <td><?php echo e($rate->currency); ?> <?php echo e($rate->price); ?></td>
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/roomtype/view.blade.php ENDPATH**/ ?>
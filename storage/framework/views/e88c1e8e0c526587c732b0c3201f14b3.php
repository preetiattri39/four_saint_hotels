<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('breadcrum'); ?>
<?php
    $hour = now()->format('H');
  
    if ($hour >= 5 && $hour < 12) {
        $greeting = 'Good Morning';
    } elseif ($hour >= 12 && $hour < 17) {
        $greeting = 'Good Afternoon';
    } elseif ($hour >= 17 && $hour < 21) {
        $greeting = 'Good Evening';
    } else {
        $greeting = 'Good Night';
    }
?>

<h2 class="main-title"><?php echo e($greeting); ?>, <?php echo e(auth()->user()->full_name); ?>!</h2>

<div class="page-header">
   
    <h5 class="m-0 page-title">Booking Summary</h5>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="<?php echo e(route('admin.user.list')); ?>">
                    <div class="card-body">
                        <div class="icon icon-box-success ">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                         <h3 class="my-2 count-text"><?php echo e($responseData['total_bookings'] ?? 0); ?></h3>
                        <h6 class="glove-text  font-weight-normal">Total Booking</h6>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="<?php echo e(route('admin.user.list',['status' => 1])); ?>">
                    <div class="card-body">
                        <div class="icon icon-box-success">
                            <i class="fa-solid fa-check"></i>
                        </div>
                         <h3 class="my-2 count-text"><?php echo e($responseData['CheckedIn'] ?? 0); ?></h3>
                        <h6 class="glove-text  font-weight-normal">CheckedIn Booking</h6>
                    </div>
                </a>
            </div>
        </div>
         <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="<?php echo e(route('admin.user.list',['status' => 1])); ?>">
                    <div class="card-body">
                        <div class="icon icon-box-success">
                            <i class="fa-solid fa-check"></i>
                        </div>
                         <h3 class="my-2 count-text"><?php echo e($responseData['total_Option'] ?? 0); ?></h3>
                        <h6 class="glove-text  font-weight-normal">Cancelled Booking</h6>
                    </div>
                </a>
            </div>
        </div>
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="<?php echo e(route('admin.user.list',['status' => 1])); ?>">
                    <div class="card-body">
                        <div class="icon icon-box-success">
                            <i class="fa-solid fa-check"></i>
                        </div>
                         <h3 class="my-2 count-text"><?php echo e($responseData['total_confirmed'] ?? 0); ?></h3>
                        <h6 class="glove-text  font-weight-normal">Option Booking</h6>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
                <a href="#">
                    <div class="card-body">
                        <div class="icon icon-box-success ">
                            <i class="fa-solid fa-ellipsis"></i>
                        </div>
                        <h3 class="my-2 count-text"><?php echo e($responseData['total_onboared'] ?? 0); ?></h3>
                        <h6 class="glove-text  font-weight-normal">OnBoard Booking</h6>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
                <a href="#">
                    <div class="card-body">
                        <div class="icon icon-box-success ">
                            <i class="fa-solid fa-ellipsis"></i>
                        </div>
                        <h3 class="my-2 count-text"><?php echo e($responseData['total_checkedOut'] ?? 0); ?></h3>
                        <h6 class="glove-text  font-weight-normal">CheckedOut Booking</h6>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <a href="<?php echo e(route('admin.transaction.list')); ?>">
                    <div class="card-body">
                        <div class="icon icon-box-success ">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h3 class="my-2 count-text">$<?php echo e($responseData['total_earning'] ?? 0); ?></h3>
                        <h6 class="glove-text font-weight-normal">Revenue</h6>
                    </div>
                </a>
            </div>
        </div>
  
    
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Booking chart</h4>
                <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Earning chart</h4>
                <canvas id="lineChart1" style="height:250px"></canvas>
            </div>
            </div>
        </div>
    </div>
   
<div class="row">
  <div class="col-12 grid-margin">
    <h5 class="mb-3 page-title">Recent Bookings</h5>
    <table class="table">
  <thead>
    <tr>
      <th>Res. Code</th>
      <th>Guest Name</th>
      <th>Guest Email</th>
      <th>Check‑In</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <?php $__currentLoopData = $booking->bookingGuests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($booking->reservation_code); ?></td>
          <td><?php echo e($guest->first_name); ?> <?php echo e($guest->last_name); ?></td>
          <td><?php echo e($guest->email); ?></td>
          <td><?php echo e(\Carbon\Carbon::parse($booking->checkin_date)->format('d M Y')); ?></td>
          <td><?php echo e($booking->status); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr>
        <td colspan="5" class="text-center">No bookings found.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

  </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('admin/js/dashboard.js')); ?>"></script>
<script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const bookingStatusData = {
    option: <?php echo e($responseData['total_Option']); ?>,
    confirmed: <?php echo e($responseData['total_confirmed']); ?>,
    checkedIn: <?php echo e($responseData['total_checkedIn']); ?>,
    onboard: <?php echo e($responseData['total_onboared']); ?>,
    checkedOut: <?php echo e($responseData['total_checkedOut']); ?>,
    
  };
  const doughnutPieData = {
    labels: ["Cancelled", "Confirmed", "CheckedIn", "Onboard", "CheckedOut"],
    datasets: [{
      data: [
      bookingStatusData.option,
      bookingStatusData.confirmed,
      bookingStatusData.checkedIn,
      bookingStatusData.onboard,
      bookingStatusData.checkedOut
    ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)'
      ],
      borderWidth: 1
    }]
  };

  const doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };

  const pieChartCanvas = document.getElementById("pieChart").getContext("2d");
  new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: doughnutPieData,
    options: doughnutPieOptions
  });

  const lineChartCanvas = document.getElementById("lineChart1").getContext("2d");
  new Chart(lineChartCanvas, {
    type: 'line',
    data: {
      labels: <?php echo $responseData['months']; ?>,
      datasets: [{
        label: 'Monthly Earnings ($)',
        data: <?php echo $responseData['monthly_earnings']; ?>,
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        fill: true,
        borderWidth: 2,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: true
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 200
          }
        }
      }
    }
  });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>
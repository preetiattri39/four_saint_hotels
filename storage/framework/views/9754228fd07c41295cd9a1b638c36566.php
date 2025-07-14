<?php $__env->startSection('title', 'Booking'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Bookings</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bookings</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="d-flex gap-2 align-items-right">
        
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">

        <div class="card-body p-0">
            <div class="d-flex justify-content-between flex-column flex-md-row px-3 row-gap-3 py-3 align-items-md-center align-items-start">
                <h4 class="card-title m-0">Booking Management</h4>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="admin-filters">
                        <form id="filter">
                            <div class="row align-items-center justify-content-end">
                                <div class="col-6 d-flex gap-2">
                                    <input type="text" class="form-control"  placeholder="Search" name="search_keyword" value="<?php echo e(request()->filled('search_keyword') ? request()->search_keyword : ''); ?>">            
                                </div>
                                <div class="col-3">
                                    <select class="form-control" name="status" style="width:100%">
                                        <option value="">All</option>
                                        <option value="CheckedOut" <?php echo e((request()->filled('status') && request()->status == "CheckedOut")? 'selected' : ''); ?>>CheckedOut</option>
                                        <option value="Confirmed" <?php echo e((request()->filled('status') && request()->status == "Confirmed")? 'selected' : ''); ?>>Confirmed</option>
                                        <option value="Onboard" <?php echo e((request()->filled('status') && request()->status == "Onboard")? 'selected' : ''); ?>>Onboard</option>

                                    </select>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <?php if(request()->filled('search_keyword') || request()->filled('status') || request()->filled('category_id')): ?>
                                        <button class="btn btn-danger" id="clear_filter">Clear Filter</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <button id="fetchBookingsBtn" class="btn btn-sm btn-primary fetch-btn fetch-hotels-btn" style="">
                        <span class="fetch-icon" id="fetchBookingBtnLoader"><i class="fa-solid fa-arrows-rotate spinner-icon"></i></span>
                        <span id="fetchBookingBtnText" class="fetch-text">Fetch Bookings</span>
                        
                    </button>
                </div>
            </div>
          <div class="table-responsive">
           <table class="table table-striped">
        <thead>
            <tr>
                <th>Reservation Code</th>
                <th>Room</th>
                <th>Guests</th>
                <th>Prices</th>
                <th>Services</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Check-in</th>
                <th>Check-out</th>
                 <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($booking->reservation_code); ?></td>
                <td>
                    <?php echo e($booking->room_type_name); ?><br>
                    <small><?php echo e($booking->room_name); ?></small>
                </td>
                <td>
                    <?php $__currentLoopData = $booking->bookingGuests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($guest->first_name); ?> <?php echo e($guest->last_name); ?><br>
                        <small><?php echo e($guest->email); ?></small><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                    <?php $__currentLoopData = $booking->bookingPrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        Date: <?php echo e($price->date); ?><br>
                        Amount: <?php echo e($price->amount); ?> <?php echo e($booking->currency); ?><br>
                        VAT: <?php echo e($price->vat); ?><br><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                    <?php $__empty_2 = true; $__currentLoopData = $booking->bookingServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <?php echo e($service->service_name); ?> - £<?php echo e($service->total_price); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <em>No Services</em>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($booking->customer): ?>
                        <?php echo e($booking->customer->first_name); ?> <?php echo e($booking->customer->last_name); ?><br>
                        <small><?php echo e($booking->customer->email); ?></small><br>
                        <small><?php echo e($booking->customer->phone_number); ?></small>
                    <?php else: ?>
                        <em>No Customer</em>
                    <?php endif; ?>
                </td>
                <td><?php echo e($booking->status); ?></td>
                <td><?php echo e($booking->checkin_date); ?></td>
                <td><?php echo e($booking->checkout_date); ?></td>
                 <td> 
                <span class="menu-icon">
                        <a href="<?php echo e(route('admin.booking.view',['id' => $booking->id])); ?>" title="View" class="text-primary"><i class="mdi mdi-eye"></i></a>
                      </span>&nbsp;&nbsp;&nbsp;
                       
                   <a href="#" title="Cancel Booking" class="text-danger cancelBooking" data-id="<?php echo e($booking->reservation_code); ?>" data-hotel="<?php echo e($booking->hotel_id); ?>"><i class="mdi mdi-cancel"></i></a>

                </td>

               

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="9" class="text-center">No bookings found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
          </div>
            <div class="custom_pagination">
              <?php echo e($bookings->appends(request()->query())->links('pagination::bootstrap-4')); ?>

            </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $('.deleteUser').on('click', function() {
    var user_id = $(this).data('id');
      Swal.fire({
          title: "Are you sure?",
          text: "You want to delete the User?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#2ea57c",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  url: "/admin/user/delete/" + user_id,
                  type: "GET", 
                  success: function(response) {
                    if (response.status == "success") {
                       $(`tr[data-id="${user_id}"]`).remove();
                        toastr.success(response.message);
                      } else {
                        toastr.error(response.message);
                      }
                  }
              });
          }
      });
  });

  $('.changeUserSubscription').on('click', function() {
    var user_id = $(this).data('id');
      Swal.fire({
          title: "Are you sure?",
          text: "Do you want to change the user subscription from Basic to Premium?",
          icon: "info",
          showCancelButton: true,
          confirmButtonColor: "#2ea57c",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, proceed it!"
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  url: "/admin/user/changeSubscription/" + user_id,
                  type: "GET", 
                  success: function(response) {
                    if (response.status == "success") {
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

  $('.switch').on('click', function() {
    var status = $(this).data('value');
    var action = (status == 1) ? 0 : 1;
    var id = $(this).data('id');

    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to change the status of the user?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2ea57c",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, mark as status"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/user/changeStatus",
                type: "GET",
                data: { id: id, status: action },
                success: function(response) {
                    if (response.status == "success") {
                        toastr.success(response.message);
                        $('.switch[data-id="' + id + '"]').data('value',!action);
                    } else {
                        $('.switch[data-id="' + id + '"]').data('value',action);
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    console.log('error', error);
                }
            });
        } else {
          var switchToToggle = $('.switch[data-id="' + id + '"]');
          switchToToggle.prop('checked', !switchToToggle.prop('checked'));
        }
    });
  });

</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".fetch-hotels-btn").forEach(button => {
        button.addEventListener("click", function () {
            const spinner = this.querySelector(".spinner-icon");

            if (spinner) {
                spinner.style.display = "inline-block";
                spinner.classList.add("spin");

             
                if (!this.querySelector(".wait-text")) {
                    const waitText = document.createElement("span");
                    waitText.textContent = " Please wait...";
                    waitText.classList.add("wait-text");
                    spinner.insertAdjacentElement("afterend", waitText);
                }

                setTimeout(() => {
                    spinner.classList.remove("spin");
                    const waitText = this.querySelector(".wait-text");
                   
                }, 3000);
            }
        });
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const fetchBookingsUrl = <?php echo json_encode(route('admin.booking.get'), 15, 512) ?>;

    const fetchBtn = document.getElementById('fetchBookingsBtn');
    const fetchText = document.getElementById('fetchBookingBtnText');
    const fetchLoader = document.getElementById('fetchBookingBtnLoader');

    fetchBtn.addEventListener('click', function () {
        // Show loader, hide text
        fetchText.classList.add('d-none');
        fetchLoader.classList.remove('d-none');

        const today = new Date().toISOString().split('T')[0];
        const endDateObj = new Date();
        endDateObj.setDate(endDateObj.getDate() + 1);
        const end = endDateObj.toISOString().split('T')[0];

        const params = new URLSearchParams({
            hotel_id: 8618,
            start_date: today,
            end_date: end,
            extended_list: 1,
            services: 1,
            guest_details: 1
        });

        fetch(`${fetchBookingsUrl}?${params.toString()}`)
            .then(response => response.json())
            .then(data => {
                // Restore UI
                fetchText.classList.remove('d-none');
                fetchLoader.classList.add('d-none');

                if (data.status_code == 200) {
                    toastr.success(data.message);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr.error(data.message || "Failed to fetch bookings.");
                }
            })
            .catch(error => {
                fetchText.classList.remove('d-none');
                fetchLoader.classList.add('d-none');
                toastr.error("Something went wrong: " + error.message);
            });
    });
});
</script>




<script>
$(document).on('click', '.cancelBooking', function(e) {
    e.preventDefault();

    let reservationCode = $(this).data('id');
    let hotelId = $(this).data('hotel');

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to cancel this booking?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#B46326',
        cancelButtonColor: '#fff',
        confirmButtonText: 'Yes, cancel it!',
        cancelButtonText: 'No, keep it',
        customClass: {
            cancelButton: 'swal-cancel-custom'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '<?php echo e(route("admin.booking.cancel")); ?>',
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    reservation_code: reservationCode,
                    hotel_id: hotelId,
                },
                success: function(response) {
                    console.log(response.data);
                    if (response.data.success === true) {
                        toastr.success(response.message);
                    } else if (response.status === 'warning') {
                        toastr.warning(response.message);
                    } else {
                        toastr.error('Error cancelling booking: Already cancelled');
                    }
                },
                error: function() {
                    toastr.error('An error occurred while cancelling booking.');
                }
            });
        }
    });
});

</script>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/booking/list.blade.php ENDPATH**/ ?>
<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini" href="index.html">
      <img src="<?php echo e(asset('images/logo.jpg')); ?>" alt="logo" />
    </a>
  </div>

  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <ul class="navbar-nav navbar-nav-right">

      <?php
    $selectedHotelId = session('selected_hotel_id');

   
    ?>

  <form method="POST" action="<?php echo e(route('admin.hotel.select')); ?>">
      <?php echo csrf_field(); ?>
      <select name="hotel_id" class="form-control hotel_status" onchange="this.form.submit()">
          <option value="">Select Hotel</option>
          <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($hotel->hotel_id); ?>" <?php echo e($selectedHotelId == $hotel->hotel_id ? 'selected' : ''); ?>>
                  <?php echo e($hotel->name); ?>

              </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
  </form>







      <?php
      $notification_count = auth()->user()->unreadNotifications()->count();
      ?>

      <!-- Notifications -->
      <li class="nav-item dropdown">
  <a class="nav-link count-indicator dropdown-toggle notifi read-notification" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
    <i class="fa-regular fa-bell"></i>
    <?php if($notification_count): ?>
      <span class="noti-count"><?php echo e($notification_count); ?></span>
      <span class="count bg-danger"></span>
    <?php endif; ?>
  </a>

  <?php if($notification_count): ?>
  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
    <h6 class="p-3 mb-0">Notifications</h6>

    <?php $__currentLoopData = auth()->user()->unreadNotifications()->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="dropdown-divider m-0"></div>
      <a class="dropdown-item preview-item" href="<?php echo e(route('admin.notification.list')); ?>">
        <div class="preview-item-content">
          <p class="preview-subject mb-0"><?php echo e(($notification->data)['description']); ?></p>
        </div>
      </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(auth()->user()->unreadNotifications()->count() > 5): ?>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item text-center" href="<?php echo e(route('admin.notification.list')); ?>">
        See all notifications
      </a>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</li>


      <!-- Profile -->
      <li class="nav-item dropdown">
        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
          <div class="navbar-profile">
            <img class="img-xs rounded-circle" src="<?php echo e(userImageById(authId())); ?>" alt="User profile picture">
            <p class="mb-0 d-none d-sm-block navbar-profile-name text-capitalize"><?php echo e(UserNameById(authId())); ?></p>
            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-dropdown preview-list" aria-labelledby="profileDropdown">
          
          <a class="dropdown-item preview-item" href="<?php echo e(route('admin.profile')); ?>">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-regular fa-user"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Profile</p>
            </div>
          </a>
          
          <a class="dropdown-item preview-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal1">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject mb-1">Log out</p>
            </div>
          </a>
        </div>
      </li>

    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>
<div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content px-4 py-3">
      <div class="icon-box text-center pb-3">
        <span>
          <img src="<?php echo e(asset('images/logout-img.png')); ?>" alt="logout" class="img-fluid">
        </span>
      </div>
      <div class="modal-body text-center">
        <h3 class="modal-title" id="logoutModalLabel">Are you sure you want to logout?</h3>
      </div>
      <div class="text-center modal-footer-btn pt-2">
        <!-- Cancel Button -->
        <a href="javascript:void(0);" class="btn btn-secondary mr-3" data-dismiss="modal">Cancel</a>
        <!-- Logout Button -->
        <a class="btn btn-logout" href="<?php echo e(route('admin.logout')); ?>">Logout</a>
      </div>
    </div>
  </div>
</div><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/layouts/header.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Users</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body p-0">
          <div class="d-flex justify-content-between flex-column row-gap-3 flex-md-row px-3 py-3 align-items-md-center align-items-start">
            <h4 class="card-title m-0">User Management</h4>
            <div class="d-flex align-items-center justify-content-between">
              <div class="admin-filters">
                <?php if (isset($component)) { $__componentOriginal2848fab3424fc8162748b5c6984d5047 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2848fab3424fc8162748b5c6984d5047 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2848fab3424fc8162748b5c6984d5047)): ?>
<?php $attributes = $__attributesOriginal2848fab3424fc8162748b5c6984d5047; ?>
<?php unset($__attributesOriginal2848fab3424fc8162748b5c6984d5047); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2848fab3424fc8162748b5c6984d5047)): ?>
<?php $component = $__componentOriginal2848fab3424fc8162748b5c6984d5047; ?>
<?php unset($__componentOriginal2848fab3424fc8162748b5c6984d5047); ?>
<?php endif; ?>
              </div>
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-add')): ?>
              <a href="<?php echo e(route('admin.user.add')); ?>" class="add-btn">
                <button type="button" class="btn btn-primary btn-md">
                  <span class="menu-icon"><i class="fa-solid fa-plus"></i></span>
                    <span class="menu-text"> Add User</span>
                </button></a>
              <?php endif; ?>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> Profile </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr data-id="<?php echo e($user->id); ?>">
                    <td class="py-1">
                      <img src="<?php echo e(userImageById($user->id)); ?>" onerror="this.src = '<?php echo e(asset('admin/images/faces/face15.jpg')); ?>'"
                      alt="User profile picture">
                    </td>
                    <td> <?php echo e($user->full_name); ?> </td>
                    <td><?php echo e($user->email); ?></td>
                    
                    
                    <td> <div class="toggle-user dark-toggle">
                      <input type="checkbox" name="is_active" data-id="<?php echo e($user->id); ?>" class="switch" <?php if($user->status == 1): ?> checked <?php endif; ?> data-value="<?php echo e($user->status); ?>">

                    </div> </td>
                    <td> 
                   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-view')): ?>
                      <span class="menu-icon">
                        <a href="<?php echo e(route('admin.user.view',['id' => $user->id])); ?>" title="View" class="text-primary"><i class="mdi mdi-eye"></i></a>
                      </span>&nbsp;&nbsp;&nbsp;
                      <?php endif; ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-edit')): ?>
                      <span class="menu-icon">
                        <a href="<?php echo e(route('admin.user.edit',['id' => $user->id])); ?>" title="Edit" class="text-success"><i class="mdi mdi-pencil"></i></a>
                      </span>&nbsp;&nbsp;
                      <?php endif; ?>
                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-delete')): ?>
                      <span class="menu-icon">
                        <a href="#" title="Delete" class="text-danger deleteUser" data-id="<?php echo e($user->id); ?>"><i class="mdi mdi-delete"></i></a>
                      </span> 
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                      <td colspan="6" class="no-record"> <center>No record found </center></td>
                    </tr>
                <?php endif; ?>
              </tbody>
              <?php endif; ?>
            </table>
          </div>
            <div class="custom_pagination">
              <?php echo e($users->appends(request()->query())->links('pagination::bootstrap-4')); ?>

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
          confirmButtonColor: '#B46326',
          cancelButtonColor: '#fff',
          confirmButtonText: "Yes, delete it!",
          customClass: {
            cancelButton: 'swal-cancel-custom'
        }
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/user/list.blade.php ENDPATH**/ ?>
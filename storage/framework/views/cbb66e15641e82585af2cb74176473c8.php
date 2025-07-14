<?php $__env->startSection('title', 'Trashed Users'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Trashed Users</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Trashed Users</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h4 class="card-title">Trashed Users Management</h4>
              <div class="admin-filters">
                <form id="filter">
                  <div class="row align-items-center justify-content-end mb-3">
                      <div class="col-6 d-flex gap-2">
                          <input type="text" class="form-control"  placeholder="Search" name="search_keyword" value="<?php echo e(request()->filled('search_keyword') ? request()->search_keyword : ''); ?>">            
                      </div>
                      <div class="col-6">
                          <button type="submit" class="btn btn-primary">Filter</button>
                          <?php if(request()->filled('search_keyword') || request()->filled('status') || request()->filled('category_id')): ?>
                              <button class="btn btn-danger" id="clear_filter">Clear Filter</button>
                          <?php endif; ?>
                      </div>
                  </div>
              </form>
              </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Action </th>
                </tr>
              </thead>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-trashed-list')): ?>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr data-id="<?php echo e($user->id); ?>">
                    <td> <?php echo e($user->full_name); ?> </td>
                    <td><?php echo e($user->email); ?></td>
                    <td> 
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-restore')): ?>
                      <span class="menu-icon">
                        <a href="#" title="Restore" class="text-success restoreUser" data-id="<?php echo e($user->id); ?>"><i class="mdi mdi-backup-restore"></i></a>
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
  $('.restoreUser').on('click', function() {
    var user_id = $(this).data('id');
      Swal.fire({
          title: "Are you sure?",
          text: "You want to restore the deleted user?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#2ea57c",
          cancelButtonColor: "#d33",                        

          confirmButtonText: "Yes, restore it!"
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  url: "/admin/user/restore/" + user_id,
                  type: "GET", 
                  success: function(response) {
                    if (response.status == "success") {
                        toastr.success(response.message);
                        $(`tr[data-id="${user_id}"]`).remove();
                      } else {
                        toastr.error(response.message);
                      }
                  }
              });
          }
      });
  });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/user/trashed-list.blade.php ENDPATH**/ ?>
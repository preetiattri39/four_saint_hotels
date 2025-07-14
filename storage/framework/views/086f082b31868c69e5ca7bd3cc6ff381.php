<?php $__env->startSection('title', 'Roles'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Roles</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Roles</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body p-0">
          <div class="d-flex px-3 py-3 justify-content-between align-items-center">
            <h4 class="card-title m-0">Role Management</h4>

              <a href="<?php echo e(route('admin.role.add')); ?>"><button type="button" class="btn btn-primary btn-md">
                <span class="menu-icon"><i class="fa-solid fa-plus"></i></span>
                <span class="menu-text"> Add Role</span></button></a>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> Sr. No.</th>
                  <th> Name </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr data-id="<?php echo e($role->id); ?>">
                    <td><?php echo e(++$key); ?></td>
                    <td> <?php echo e(ucfirst($role->name)); ?> </td>
                    <td> 
                      <span class="menu-icon">
                        <a href="<?php echo e(route('admin.role.edit',['id' => $role->id])); ?>" title="Edit" class="text-success"><i class="mdi mdi-pencil"></i></a>
                      </span>&nbsp;&nbsp;
                      <span class="menu-icon">
                        <a href="#" title="Delete" class="text-danger deleteRole" data-id="<?php echo e($role->id); ?>"><i class="mdi mdi-delete"></i></a>
                      </span> 
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                      <td colspan="3" class="no-record"> <div class="col-12 text-center">No record found </div></td>
                    </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
            <div class="custom_pagination">
             <?php echo e($roles->links('pagination::bootstrap-4')); ?>

            </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $('.deleteRole').on('click', function() {
    var id = $(this).attr('data-id');
      Swal.fire({
          title: "Are you sure?",
          text: "You want to delete the Role?",
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
                  url: "/role/delete/" + id,
                  type: "GET", 
                  success: function(response) {
                    if (response.status == "success") {
                      $(`tr[data-id="${id}"]`).remove();
                      toastr.success(response.message);
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

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/role/list.blade.php ENDPATH**/ ?>
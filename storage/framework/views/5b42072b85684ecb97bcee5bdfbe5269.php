<?php $__env->startSection('title', 'Sub Feature'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
  <h3 class="page-title">Sub Feature</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sub Feature</li>
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
          <h4 class="card-title">Sub Feature Management</h4>
          <a href="<?php echo e(route('admin.sub_category.add')); ?>" class="btn btn-primary btn-md">
            + Add Sub Feature
          </a>
        </div>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr data-id="<?php echo e($subCategory->id); ?>">
                <td>
                  <?php if($subCategory->image && file_exists(public_path('storage/' . $subCategory->image))): ?>
                    <img src="<?php echo e(asset('storage/' . $subCategory->image)); ?>" alt="Image" width="50" height="50">
                  <?php else: ?>
                    <img src="<?php echo e(asset('admin/images/default-icon.png')); ?>" alt="Default Image" width="50" height="50">
                  <?php endif; ?>
                </td>
                <td><?php echo e($subCategory->title); ?></td>
                <td><?php echo e($subCategory->category ? $subCategory->category->title : '-'); ?></td>
                <td><?php echo e(\Illuminate\Support\Str::words($subCategory->description, 10, '...')); ?></td>
                
                <td><?php echo e($subCategory->created_at->format('d M, Y')); ?></td>
                <td>
                  <a href="<?php echo e(route('admin.sub_category.edit', $subCategory->id)); ?>" class="text-success me-2">
                    <i class="mdi mdi-pencil"></i>
                  </a>
                  <a href="javascript:void(0);" 
                    class="text-danger deleteSubCategory" 
                    data-id="<?php echo e($subCategory->id); ?>">
                    <i class="mdi mdi-delete"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                <td colspan="7" class="text-center">No Sub Categories found.</td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          <?php echo e($subCategories->links('pagination::bootstrap-4')); ?>

        </div>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  $(document).on('click', '.deleteSubCategory', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
   

    Swal.fire({
      title: "Are you sure?",
      text: "You want to delete this sub-category?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#B46326",
      cancelButtonColor: "#fff",
      confirmButtonText: "Yes, delete it!",
      customClass: {
        cancelButton: 'swal-cancel-custom'
      }
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "/admin/sub_category/delete/" + id,
          type: "GET",
          success: function(response) {
            if (response.status === "success") {
              $(`tr[data-id="${id}"]`).remove();
              toastr.success(response.message || "Sub-category deleted successfully.");
            } else {
              toastr.error(response.message || "Something went wrong.");
            }
          },
          error: function() {
            toastr.error("Server error. Please try again.");
          }
        });
      }
    });
  });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/sub_category/list.blade.php ENDPATH**/ ?>
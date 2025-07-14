<?php $__env->startSection('title', 'Feature'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
  <h3 class="page-title">Feature</h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Feature</li>
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
          <h4 class="card-title">Feature Management</h4>

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

          <a href="<?php echo e(route('admin.category.add')); ?>"><button type="button" class="btn default-btn btn-md">
              <span class="menu-icon">+ Add Feature</span></button></a>
        </div>

        <div class="table-responsive">
          <table class="table table-stripe">
            <thead>
              <tr>
                <th>Icon</th>
                <th>Title</th>
                <th>Hotel</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <?php if($category->icon && file_exists(public_path('storage/' . $category->icon))): ?>
                      <img src="<?php echo e(asset('storage/' . $category->icon)); ?>" alt="Category Icon" width="50" height="50">
                  <?php else: ?>
                      <img src="<?php echo e(asset('admin/images/default-icon.png')); ?>" alt="Default Icon" width="50" height="50">
                  <?php endif; ?>
              </td>

                <td><?php echo e($category->title); ?></td>
                <td><?php echo e($category->hotel->name); ?></td>
                
              <td><?php echo e(\Illuminate\Support\Str::words($category->description, 10, '...')); ?></td>
                <td>
                  <a href="<?php echo e(route('admin.category.edit', $category->id)); ?>" class="text-success" ><i class="mdi mdi-pencil"></i></a>
                  <a href="<?php echo e(route('admin.category.delete', $category->id)); ?>" class="text-danger deleteUser"  onclick="return confirm('Are you sure?')"><i class="mdi mdi-delete"></i></a>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <div class="custom_pagination">
          <?php echo e($categories->appends(request()->query())->links('pagination::bootstrap-4')); ?>

        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $('.deleteCategory').on('click', function() {
    var category_id = $(this).data('id');
    Swal.fire({
      title: "Are you sure?",
      text: "You want to delete the Category?",
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
          url: "/admin/category/delete/" + category_id,
          type: "GET",
          success: function(response) {
            if (response.status == "success") {
              if (response.count == 0) {
                $(`tr[data-id="${category_id}"]`).remove();
                toastr.success(response.message);
              } else {
                Swal.fire({
                  title: "OOPs! Unable to delete. ",
                  text: response.message,
                  icon: "info",
                  confirmButtonColor: "#2ea57c",
                  confirmButtonText: "Ok"
                });
              }
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
      text: "Do you want to change the status of the category?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#2ea57c",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, mark as status"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "/admin/category/changeStatus",
          type: "GET",
          data: {
            id: id,
            status: action
          },
          success: function(response) {
            if (response.status == "success") {
              toastr.success(response.message);
              $('.switch[data-id="' + id + '"]').data('value', !action);
            } else {
              $('.switch[data-id="' + id + '"]').data('value', action);
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
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/category/list.blade.php ENDPATH**/ ?>
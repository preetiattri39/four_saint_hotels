<?php $__env->startSection('title', 'Banners'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Banners</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Banners</li>
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
          <h4 class="card-title">Banner Management</h4>
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
            <a href="<?php echo e(route('admin.banner.add')); ?>">
              <button type="button" class="btn default-btn btn-md">
                <span class="menu-icon">+ Add Banner</span>
              </button>
            </a>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Sr. No. </th>
                <th> Image </th>
                <th> Title </th>
                <th> Type </th>
                
                <th> Status </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr data-id="<?php echo e($data->id); ?>">
                  <td><?php echo e(++$key); ?></td>
                  <td class="py-1">
                    <img src="<?php echo e((!is_null($data->path) && file_exists(public_path('storage/images/' .$data->path))) ? asset('storage/images/' . $data->path) : asset('admin/images/faces/face15.jpg')); ?>" onerror="this.src = '<?php echo e(asset('admin/images/faces/face15.jpg')); ?>'"
                    alt="Banner picture">
                  </td>
                  <td> <?php echo e($data->title); ?> </td>
                    <td><?php echo e(ucfirst($data->type)); ?></td>
                  
                  <td> 
                      <div class="toggle-user dark-toggle">
                      <input type="checkbox" name="is_active" data-id="<?php echo e($data->id); ?>" class="switch" <?php if($data->status == 1): ?> checked <?php endif; ?> data-value="<?php echo e($data->status); ?>">
                      </div> 
                  </td>
                  <td> 
                    <span class="menu-icon">
                      <a href="<?php echo e(route('admin.banner.edit',['id' => $data->id])); ?>" title="Edit" class="text-success"><i class="mdi mdi-pencil"></i></a>
                    </span>&nbsp;&nbsp;
                    <span class="menu-icon">
                      <a href="#" title="Delete" class="text-danger deleteBanner" data-id="<?php echo e($data->id); ?>"><i class="mdi mdi-delete"></i></a>
                    </span> 
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr>
                    <td colspan="6" class="no-record"> <center>No record found </center></td>
                  </tr>    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <div class="custom_pagination">
          <?php echo e($banners->appends(request()->query())->links('pagination::bootstrap-4')); ?>

        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $('.deleteBanner').on('click', function() {
    var category_id = $(this).data('id');
    Swal.fire({
        title: "Are you sure?",
        text: "You want to delete the Banner?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2ea57c",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/banner/delete/" + category_id,
                type: "GET", 
                success: function(response) {
                  if (response.status == "success") {
                      $(`tr[data-id="${category_id}"]`).remove();
                      toastr.success(response.message);
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
        text: "Do you want to change the status of the banner?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2ea57c",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, mark as status"
    }).then((result) => {
        if (result.isConfirmed) {
          $('.preloader').show();
            $.ajax({
                url: "/admin/banner/changeStatus",
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

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/banner/list.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Contact Messages'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Contact Messages</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
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
            <h4 class="card-title">Contact Messages Management</h4>
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
              
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr data-id="<?php echo e($data->id); ?>">
                    <td><?php echo e(++$key); ?></td>
                    <td> <?php echo e(Str::limit($data->name,50, '...')); ?> </td>
                    <td> <?php echo e(Str::limit($data->email,50, '...')); ?> </td>
                    <td> 
                      
                    <span class="menu-icon">
                <a href="<?php echo e(route('admin.contact.edit', ['id' => $data->id])); ?>" 
                  title="<?php echo e($data->is_replied ? 'View Reply' : 'Send Reply'); ?>" 
                  class="<?php echo e($data->is_replied ? 'text-info' : 'text-success'); ?>">
                  
                    <?php if($data->is_replied ==1): ?>
                        <i class="mdi mdi-message-reply-text"></i> 
                    <?php else: ?>
                        <i class="mdi mdi-send"></i>
                    <?php endif; ?>

                </a>
            </span>

                      <span class="menu-icon">
                        <a href="#" title="Delete" class="text-danger deleteFaq" data-id="<?php echo e($data->id); ?>"><i class="mdi mdi-delete"></i></a>
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
            <?php echo e($faq->appends(request()->query())->links('pagination::bootstrap-4')); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $('.deleteFaq').on('click', function() {
    var id = $(this).data('id');
      Swal.fire({
          title: "Are you sure?",
          text: "You want to delete the contact?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#2ea57c",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  url: "/admin/contact/delete/" + id,
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

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/contact/list.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Feedbacks'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Feedbacks</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Feedback</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body p-0">
          <div class="d-flex justify-content-between flex-column flex-md-row px-3 row-gap-3 py-3 align-items-md-center align-items-start">
            <h4 class="card-title m-0">Feedback Management</h4>
            
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
                 <th>  </th>
                  <th> User </th>
                  <th> Feedback </th>
                  <th> Rating </th>
                  <th> Status </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr data-id="<?php echo e($feedback->id); ?>">
                    <td class="py-1">
                      <img src="<?php echo e(userImageById($feedback->user->id)); ?>" onerror="this.src = '<?php echo e(asset('admin/images/faces/face15.jpg')); ?>'"
                      alt="User profile picture">
                    </td>
                    <td> <?php echo e($feedback->user->full_name); ?> </td>
                    <td> <?php echo e(Str::limit($feedback->message,50, '...')); ?> </td>

                    <td><?php echo e($feedback->rating); ?></td>
                    
                    <td> <div class="toggle-user dark-toggle">
                      <input type="checkbox" name="is_active" data-id="<?php echo e($feedback->id); ?>" class="switch" <?php if($feedback->status == 1): ?> checked <?php endif; ?> data-value="<?php echo e($feedback->status); ?>">

                    </div> </td>
                    <td> 
                     
                      <span class="menu-icon">
                        <a href="<?php echo e(route('admin.feedback.view',['id' => $feedback->id])); ?>" title="View" class="text-primary"><i class="mdi mdi-eye"></i></a>
                      </span>&nbsp;&nbsp;&nbsp;
                      
                      <span class="menu-icon">
                        <a href="#" title="Delete" class="text-danger deleteUser" data-id="<?php echo e($feedback->id); ?>"><i class="mdi mdi-delete"></i></a>
                      </span> 
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                      <td colspan="6" class="no-record"> <center>No record found </center></td>
                    </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
            <div class="custom_pagination">
              <?php echo e($feedbacks->appends(request()->query())->links('pagination::bootstrap-4')); ?>

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
          text: "You want to delete the Feedback?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#2ea57c",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  url: "/admin/feedback/delete/" + user_id,
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

  
   

  $('.switch').on('click', function() {
    var status = $(this).data('value');
    var action = (status == 1) ? 0 : 1;
    var id = $(this).data('id');
    
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to change the status of the Feedback?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2ea57c",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, mark as status"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/feedback/changeStatus",
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

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/feedback/list.blade.php ENDPATH**/ ?>
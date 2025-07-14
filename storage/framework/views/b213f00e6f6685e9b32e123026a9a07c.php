    
<?php $__env->startSection('title', 'Announcements'); ?>
    
  
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Announcements</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Announcements</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-lg-8 offset-lg-2 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Send Announcement to Subscribers</h4>
        <form action="<?php echo e(route('admin.announcements.send')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea name="message" rows="5" class=" summernote form-control d-block" required></textarea>
          </div>
          <div class="text-end">
          <button type="submit" class="btn btn-success">Send Announcement</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

 <script type="text/javascript">

        $(document).ready(function() {

          $('.summernote').summernote();

        });

    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/announcements/create.blade.php ENDPATH**/ ?>
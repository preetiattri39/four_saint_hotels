<?php $__env->startSection('title', 'Help Desk'); ?>
<?php $__env->startSection('styles'); ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Help Desk</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Help Desk</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
       
       
      <div class="card-body">
        <!-- BEGIN TICKET -->
        <div class="grid support-content">
            <div class="grid-body help-desk">
              <div class="btn-group">
              
              <a href="<?php echo e(route('admin.helpDesk.list',['type' => 'open'])); ?>">
                <button type="button" class="btn ticket btn-default mx-2 <?php echo e($type == "open" ? "active" : ''); ?>"><?php echo e($openCount  ?? 0); ?> Open</button></a>
              <a href="<?php echo e(route('admin.helpDesk.list',['type' => 'close'])); ?>"><button type="button" class="btn ticket btn-default mx-2 <?php echo e($type == "close" ? "active" : ''); ?>"><?php echo e($closeCount ?? 0); ?> Closed</button></a>
            </div>
              
            <div class="padding"></div>
              
            <div class="row">
              <!-- BEGIN TICKET CONTENT -->
              <div class="col-md-12">
                <ul class="list-group fa-padding">
                  <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="list-group-item ticket-list" >
                      <div class="media">
                        <div class="media-body">
                          <a href="<?php echo e(route('admin.helpDesk.response',['id' => $ticket->id])); ?>">
                              <strong><?php echo e($ticket->title); ?></strong>
                          </a>
                            <span class="number pull-right d-flex">
                              <?php if($type == "open"): ?>
                              <span class="label label-danger">
                                
                                
                                  <?php switch($ticket->status):
                                      case ('Done'): ?>
                                          <button type="button" class="btn default-btn btn-rounded btn-sm">Done</button>
                                        <?php break; ?>
                                      <?php case ('In Progress'): ?>
                                          <button type="button" class="btn btn-info btn-rounded btn-sm">In Progress</button>
                                        <?php break; ?>
                                      <?php case ('Pending'): ?>
                                        <button type="button" class="btn btn-danger btn-rounded btn-sm">Pending</button>
                                        <?php break; ?>
                                      <?php default: ?>
                                        <button type="button" class="btn btn-danger btn-rounded btn-sm">Pending</button>
                                  <?php endswitch; ?>
                              </span> 
                              <a href="#" title="Mark as Done" class="text-success markAsComplete" data-id="<?php echo e($ticket->id); ?>">
                                Close <i class="fa-solid fa-delete-left"></i>
                              </a>
                            <?php endif; ?>
                          # <?php echo e($ticket->ticket_id); ?>

                        </span>
                          <p class="info">Opened by  <a href="<?php echo e(route('admin.helpDesk.response',['id' => $ticket->id])); ?>"><?php echo e(userNameById($ticket->user_id)); ?></a>  
                            <?php if($ticket->response()->where('user_id',$ticket->user_id)->get()->last()): ?>
                            <?php echo e(replyDiffernceCalculate($ticket->response()->where('user_id',$ticket->user_id)->get()->last()->created_at)); ?>  ago 
                            <?php endif; ?>
                            <i class="fa fa-comments"></i>  
                            <a href="<?php echo e(route('admin.helpDesk.response',['id' => $ticket->id])); ?>"><?php echo e($ticket->response()->count()); ?> comments</a></p>
                        </div>
                      </div>
                    </li>
                   
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <li class="list-group-item">
                          <strong class="no-record"><center>No record Found</center></strong> 
                      </li>
                  <?php endif; ?>
                  <!-- BEGIN DETAIL TICKET -->
                  <div class="modal fade" id="issue" tabindex="-1" role="dialog" aria-labelledby="issue" aria-hidden="true">
                    <div class="modal-wrapper">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-blue">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"><i class="fa fa-cog"></i> Add drag and drop config import closes</h4>
                          </div>
                          <form action="#" method="post">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-2">
                                  <img src="assets/img/user/avatar01.png" class="img-circle" alt="" width="50">
                                </div>
                                <div class="col-md-10">
                                  <p>Issue <strong>#13698</strong> opened by <a href="#">jqilliams</a> 5 hours ago</p>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                              </div>
                              <div class="row support-content-comment">
                                <div class="col-md-2">
                                  <img src="assets/img/user/avatar02.png" class="img-circle" alt="" width="50">
                                </div>
                                <div class="col-md-10">
                                  <p>Posted by <a href="#">ehernandez</a> on 16/06/2014 at 14:12</p>
                                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                  <a href="#"><span class="fa fa-reply"></span> &nbsp;Post a reply</a>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- END DETAIL TICKET -->
              </div>
              <!-- END TICKET CONTENT -->
            </div>
          </div>
        </div>
        <!-- END TICKET -->
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $('.markAsComplete').on('click', function() {
    var id = $(this).data('id');
  
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to mark as complete?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2ea57c",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, mark as Complete"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/helpDesk/changeStatus",
                type: "GET",
                data: { id: id},
                success: function(response) {
                    if (response.status == "success") {
                      toastr.success(response.message);
                         
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    console.log('error', error);
                }
            });
        } 
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/helpDesk/list.blade.php ENDPATH**/ ?>
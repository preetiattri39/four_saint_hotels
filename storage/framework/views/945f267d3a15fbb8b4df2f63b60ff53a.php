<?php $__env->startSection('title', 'View Feedback'); ?>
<?php $__env->startSection('breadcrum'); ?>
    <div class="page-header">
        <h3 class="page-title">Users</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.user.list')); ?>">Feedbacks</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Feedback</li>
            </ol>
        </nav>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div>
        <h4 class="user-title">View Feedback</h4>
        <div class="card">
            <div class="card-body">
                <form class="forms-sample">
                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-3">
                                <div class="view-user-details">
                                    
                                    <div class="text-center">
                                        <img class="user-image"
                                            <?php if(isset($feedback->user->userDetail) && !is_null($feedback->user->userDetail->profile)): ?> src="<?php echo e(asset('storage/images/' . $feedback->user->userDetail->profile)); ?>"
                                <?php else: ?>
                                    src="<?php echo e(asset('admin/images/faces/face15.jpg')); ?>" <?php endif; ?>
                                            onerror="this.src = '<?php echo e(asset('admin/images/faces/face15.jpg')); ?>'"
                                            alt="User profile picture">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-md-8">
                              
                            
                                <div class="response-data ml-4">
                                    <h6 class="f-14 mb-1">
                                      <span class="semi-bold qury">Name :</span> 
                                      <span class="text-muted"><?php echo e($feedback->user->full_name); ?></span>
                                    </h6>

                                    <h6 class="f-14 mb-1">
                                      <span class="semi-bold qury">Email :</span> 
                                      <span class="text-muted"><?php echo e($feedback->user->email ?? ''); ?></span>
                                    </h6>

                                    <h6 class="f-14 mb-1">
                                      <span class="semi-bold qury">Message :</span> 
                                      <span class="text-muted"><?php echo e($feedback->message ? $feedback->message ?? 'N/A' : 'N/A'); ?></span>
                                    </h6>

                                  

                                   <h6 class="f-14 mb-1">
                                        <span class="semi-bold qury">Rating :</span>
                                        <?php
                                            $rating = $feedback->rating ?? 0;
                                            $maxStars = 5;
                                        ?>
                                        <?php for($i = 1; $i <= $maxStars; $i++): ?>
                                            <?php if($i <= $rating): ?>
                                                <i class="mdi mdi-star text-warning"></i>
                                            <?php elseif($i - 0.5 == $rating): ?>
                                                <i class="mdi mdi-star-half-full text-warning"></i>
                                            <?php else: ?>
                                                <i class="mdi mdi-star-outline text-warning"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                      </h6>



                                   
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

      
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/feedback/view.blade.php ENDPATH**/ ?>
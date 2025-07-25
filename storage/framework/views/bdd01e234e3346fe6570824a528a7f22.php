<?php $__env->startSection('title', 'Query Response'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">Help Desk</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.helpDesk.list',['type' => 'open'])); ?>">Help Desk</a></li>
        <li class="breadcrumb-item active" aria-current="page">Response</li>
      </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="help-response">
  <h4 class="response-title d-flex justify-content-between align-items-center">
    <div>
      <h6 class="f-14 mb-1"><span class="semi-bold qury">Title :</span> <span class="text-muted"> <?php echo e($response->title); ?> </span></h6>
      <h6 class="f-14 mb-1"><span class="semi-bold qury ">Description :</span> <span class="text-muted"><?php echo e($response->description); ?></span></h6>
    </div>
    <div>
      <h6 class="f-14 mb-1"><span class="semi-bold qury help-id"># <?php echo e($response->ticket_id); ?> </span></h6>
    </div>
  </h4>
  <div class="row justify-content-center">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
           
           
          <div class="card-header d-flex justify-content-between p-3">
            <p class="fw-bold mb-0">Admin</p>
           
          </div>
            <ul class="list-unstyled chat-box">
              <?php $__empty_1 = true; $__currentLoopData = $response->response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
               <?php if($data->user_id == authId()): ?>
               
                  <li class="d-flex mb-4 right-msg">
                    <div class="card w-100">
                      
                      <div class="card-body">
                        <p class="mb-0">
                          <?php echo e($data->response); ?>

                        </p>
                        <p class="text-muted small mb-0 msg_time"> <?php echo e(replyDiffernceCalculate($data->created_at)); ?> ago</p>
                      </div>
                    </div>
                    <img src="<?php echo e(userImageById($data->user_id)); ?>" alt="avatar"
                      class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                  </li>
                <?php else: ?>
                  <li class="d-flex  mb-4 left-msg">
                    <img src="<?php echo e(userImageById($data->user_id)); ?>" alt="avatar"
                      class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                    <div class="card">
                      <div class="card-body">
                        <p class="mb-0">
                          <?php echo e($data->response); ?>

                        </p>
                        <p class="text-muted small mb-0 msg_time"> <?php echo e(replyDiffernceCalculate($data->created_at)); ?> ago</p>
                      </div>
                    </div>
                  </li>
                <?php endif; ?>
                
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <center><img class="mt-4" src="<?php echo e(asset('admin/images/faces/no-record.png')); ?>" height="300px"></center>
              <?php endif; ?>
              
            </ul>
        </div>
        <form id="query-response" action="<?php echo e(route('admin.helpDesk.response',['id' => $response->id])); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="card messages-card mb-1">
                <div data-mdb-input-init class="form-outline">
                  <textarea type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="textAreaExample2" rows="4" placeholder="Type..." name="response"></textarea>
                  <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <span class="invalid-feedback" role="alert">
                          <strong><?php echo e($message); ?></strong>
                      </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
              </div>
              <div class="send-btn text-end pb-4">
                <?php if($response->type == 'subscription'): ?>
                  <span class="btn btn-success btn-md" data-bs-toggle="modal" data-bs-target="#generateLink">Payment Link</span>
                <?php endif; ?>
                <button class="btn default-btn btn-md mr-4" type="submit">Send</button>
              </div>
        </form>
      </div>
      <div class="modal fade" id="generateLink" tabindex="-1" aria-labelledby="generateLinkLabel"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Generate Payment Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                  <form action="<?php echo e(route('admin.helpDesk.generatePaymentLink')); ?>" method="POST" id="generate_payment_links" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <div class="mb-2">
                        <div class="row">
                          <input type="hidden" name="user_id" value="<?php echo e($response->user_id); ?>">
                          <input type="hidden" name="ticket_id" value="<?php echo e($response->id); ?>">
                          <div class="col-6">
                            <label for="payment_method">Payment Method</label>
                            <select class="js-example-basic-single select2-hidden-accessible form-control <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="payment_method" style="width:100%" data-select2-id="1" tabindex="-1" aria-hidden="true" id="payment_method">
                                <option value="">--Select Payment Method--</option>
                                <option value="paypal">Paypal</option>
                                <option value="ETH">Crypto (ETH)</option>
                                <option value="USDTERC20">Crypto (USDT)</option>
                            </select>
                            <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($type); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>    
                          </div>
                          <div class="col-6">
                              <label for="amount">Amount</label>
                              <input type="number" class="form-control  <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="amount"  min=0 max=9999 placeholder="Amount" name="amount">
                              <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($message); ?></strong>
                                  </span>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </div>
                        </div>
                          
                      </div>
                      <button type="submit" class="btn btn-primary enter-btn">Save</button>
                  </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  $(document).ready(function() {
    $("#query-response").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            response: {
                required: true,
                noSpace: true,
            },
        },
        messages: {
            response: {
                required: "Response is required.",
            },
        },
        submitHandler: function(form) {
          form.submit();
      }

    });

    $('#generate_payment_links').submit(function(event) {
        event.preventDefault();
        var payment_method = $('#payment_method').val();
        var amount = $('#amount').val()

        if(payment_method == ''){
            toastr.error('Payment Method is required');
            return false;
        }
        if(amount == ''){
          toastr.error('Amount is required');
          return false;
        }
        $('.enter-btn').prop('disabled', true);
        this.submit();

    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/helpDesk/response.blade.php ENDPATH**/ ?>
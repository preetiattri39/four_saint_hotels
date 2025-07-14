<?php $__env->startSection('title', 'Help & Support'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper user-manage-box">
    <div class="help-info">
        <div class="help-heading mb-3 mt-4">
            <h3 class="p-h-color fs-clash fw-600">Help &amp; Support</h3>
        </div>
    </div>
    <div class="card col-lg-10 p-3">
        <div class="row gy-lg-0 gy-4">

                <div class="col-md-12">
                    <div class="d-flex justify-content-between ">
                    <div class="name-info d-flex">
                        <div class="p-name">
                            <p>Name</p>
                            <p>Email</p>
                            <p>Message</p>
                        </div>
                        <div class="p-n-details">
                            <p><span class="ps-3 pe-3">:- </span><?php echo e($ticket_detail->name); ?></p>
                            <p><span class="ps-3 pe-3">:- </span><?php echo e($ticket_detail->email); ?></p>
                            <p><span class="ps-3 pe-3">:- </span><?php echo e($ticket_detail->message); ?></p>
                        </div>
                    </div>
                    <div class="pending-btn">
                        <button type="button" class="btn btn-primary pe-4 fs-14 rounded-10 fw-500"><?php echo e($ticket_detail->status); ?></button>
                    </div>
                </div>

                    <form action="<?php echo e(route('resolved-ticket')); ?>" method="post" id="resolvedTicket">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo e($ticket_detail->id); ?>">
                        <div class="col-md-12">
                            <div class="h-solution mt-4">
                                <label for="solution" class="form-label d-block">Solution</label>
                                <textarea placeholder="Write Solution here.." id="solution"  name="solution" class="form-control text-black rounded-10  <?php $__errorArgs = ['solution'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  style="height: 100px">  <?php echo e($ticket_detail->solutions); ?></textarea>                           
                                <?php $__errorArgs = ['solution'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="submit-btn mt-4">
                                <button type="submit" class="btn btn-primary px-5 py-2 rounded-8 fw-500">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
           
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!-- Include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("textarea#solution").val($.trim($("textarea#solution").val()));
    });
    
    $(document).ready(function () {
        $("#resolvedTicket").validate({
            rules: {
                solution: {
                    required: true, // Ensures the textarea is not empty
                }
            },
            messages: {
                solution: {
                    required: "Solution is required.", // Custom error message for the textarea
                }
            },
            errorPlacement: function (error, element) {
                if (element.prop("tagName").toLowerCase() === "textarea") {
                    error.insertAfter(element); // Ensures error is displayed right after the textarea
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/ticket/edit.blade.php ENDPATH**/ ?>
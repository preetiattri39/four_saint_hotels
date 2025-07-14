<?php $__env->startSection('title', 'Faq'); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper user-manage-box">
    <div class="admin-help-pending-content-box f8-bg rounded-20 border-e7">
        <div class="row gy-lg-0 gy-4">
            <div class="col-12">
                <h4 class="f-20 bold title-main">Add New Faq</h4>
                <div class="card">
                    <div class="card-body">
                       
                        <form id="add-faq" method="post" action="<?php echo e(route('add-faq')); ?>">
                            <?php echo csrf_field(); ?>

                             <div class="form-group">
                                <label for="question">Question</label>
                                <textarea id="question"  name="question" class="form-control text-black rounded-10  <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  style="height: 100px"> <?php echo e(old('question')); ?></textarea>       
                                <?php $__errorArgs = ['question'];
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
                         
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea id="answer"  name="answer" class="form-control text-black rounded-10  <?php $__errorArgs = ['answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  style="height: 100px"> <?php echo e(old('answer')); ?></textarea>       
                                <?php $__errorArgs = ['answer'];
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
                            <button type="submit" class="btn btn-primary mr-2" id="submitButton">Submit</button>
                        </form>
                    </div>
                </div>
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
        $("textarea#question").val($.trim($("textarea#question").val()));
          $("textarea#answer").val($.trim($("textarea#answer").val()));
    });
    
    $(document).ready(function () {
        $("#add-faq").validate({
            rules: {
                question: {
                    required: true, 
                },
                answer: {
                    required: true, 
                }
            },
            messages: {
                question: {
                    required: "Question is required.",
                },
                 answer: {
                    required: "Answer is required.",
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
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/faq/add.blade.php ENDPATH**/ ?>
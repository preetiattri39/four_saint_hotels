<?php $__env->startSection('title', 'Edit Role'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title"> Roles</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.role.list')); ?>">Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
      </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <form action="<?php echo e(route('admin.role.edit',['id' => $role->id])); ?>" method="POST" id="edit-role">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Role</h4>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e($role->name); ?>">
                                    <?php $__errorArgs = ['name'];
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="selection-body">
                                <div class="selection-row selection-row-heading main-heading">
                                    <div class="selection-td">
                                        <input type="checkbox" name="<?php echo e($key); ?>" id="<?php echo e($key); ?>" class="main-td" data-value="<?php echo e($key); ?>" <?php echo e(($permission->count() == $role->permissions->where('group_name',$key)->count()) ? 'checked' : ''); ?>>
                                        <label for="<?php echo e($key); ?>">
                                            <h4><?php echo e(ucfirst($key)); ?></h4>
                                        </label>
                                    </div>
                                </div>
                                <div class="selection-row">
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="selection-td <?php echo e($key); ?>">  
                                            <input class="permission-key" type="checkbox" name="permissions[]" id="<?php echo e($value->name); ?>"  data-value="<?php echo e($key); ?>" value="<?php echo e($value->name); ?>"  <?php echo e(in_array($value->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : ''); ?>>
                                            <?php
                                                $data = explode("-", $value->name);
                                                unset($data[0]);
                                            ?>
                                            <label for="<?php echo e($value->name); ?>"><?php echo e(ucfirst(implode(" ",$data))); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <input type="hidden" id="permissions-input" name="assign_permissions" value="[]" />
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-12 justify-content-end d-flex">
                <button type="submit" class="btn btn-primary edit-role-btn">Edit Role</button>
            </div>
        </div>
    </form>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $('.main-td').on('click',function(){
        var mainclass = $(this).data('value');
        var isChecked = $(this).prop('checked');
        if (isChecked) {
            $(`.${mainclass}`).find('input[type="checkbox"]').prop('checked',true);
        } else {
            $(`.${mainclass}`).find('input[type="checkbox"]').prop('checked',false);
        }
    });

    $('.permission-key').on('click', function() {
        var mainclass = $(this).data('value'); 

        var allChecked = $(`.${mainclass}`).find('input[type="checkbox"]').length === $(`.${mainclass}`).find('input[type="checkbox"]:checked').length; 
        
        if (allChecked) {
            $(`#${mainclass}`).prop('checked', true);
        } else {
            $(`#${mainclass}`).prop('checked', false);
        }
    });

    $(document).ready(function() {
        $("#edit-role").submit(function(e){
            e.preventDefault();
        }).validate({
            rules: {
                name: {
                    required: true,
                    noSpace: true,
                    minlength: 3,
                    maxlength: 25
                },
            },
            messages: {
                name: {
                    required:  "Name is required",
                    minlength: "Name must consist of at least 3 characters",
                    maxlength: "Name must not be greater than 25 characters"
                },
            },
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                if (element.prop('type') === 'file') {
                    error.insertAfter(element.closest('.form-control'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                var permissions = [];
                $("input[name='permissions[]']:checked").each(function() {
                    permissions.push($(this).val());
                });
                $("#permissions-input").val(permissions);

                form.submit();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/role/edit.blade.php ENDPATH**/ ?>
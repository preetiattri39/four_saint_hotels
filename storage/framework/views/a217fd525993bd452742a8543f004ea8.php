<?php $__env->startSection('title', 'View Contact Message'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title">View Contact Message</h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.contact.list')); ?>">Contact Messages</a></li>
        <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Message Details</h4>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tr>
                            <th>Name:</th>
                            <td><?php echo e($contact->name); ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo e($contact->email); ?></td>
                        </tr>
                        <tr>
                            <th>Subject:</th>
                            <td><?php echo e($contact->subject ?? 'N/A'); ?></td>
                        </tr>
                        <tr>
                            <th>Message:</th>
                            <td><?php echo e($contact->message); ?></td>
                        </tr>
                    </table>
                </div>

                <hr>

                <h5>Reply to User</h5>
                <form action="<?php echo e(route('admin.contact.edit', ['id' => $contact->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="reply">Your Message</label>
                        <textarea name="reply" class="form-control" rows="6" required><?php echo e(old('reply', $contact->reply)); ?>

                        </textarea>
                    </div>
                    <?php if($contact->is_replied == 0): ?>
                    <button type="submit" class="btn btn-primary">Send Reply</button>
                    <?php endif; ?>
                    <a href="<?php echo e(route('admin.contact.list')); ?>" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/contact/edit.blade.php ENDPATH**/ ?>
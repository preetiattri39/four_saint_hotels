<?php $__env->startSection('title','Verify OTP'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-lg-6 auth login-bg p-0">
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active bg-slide bg-slide-1">
          <div class="overlay"></div>
          <div class="carousel-caption  text-white">
            <h3 class="pt-5 my-2">Find Hotels Anytime,<br> Anywhere</h3>
            <p class="w-75 mx-auto">Lorem ipsum dolor sit amet consectetur. Lorem posuere at odio nullam pulvinar enim consequat at vitae. Elit ullamcorper ultrices magna malesuada erat.</p>
          </div>
        </div>
        <div class="carousel-item bg-slide bg-slide-2">
          <div class="overlay"></div>
          <div class="carousel-caption  text-white">
            <h3 class="pt-5 my-2">Find Hotels Anytime,<br> Anywhere</h3>
            <p class="w-75 mx-auto">Lorem ipsum dolor sit amet consectetur. Lorem posuere at odio nullam pulvinar enim consequat at vitae. Elit ullamcorper ultrices magna malesuada erat.</p>
          </div>
        </div>
        <div class="carousel-item bg-slide bg-slide-3">
          <div class="overlay"></div>
          <div class="carousel-caption text-white">
            <h3 class="pt-5 my-2">Find Hotels Anytime,<br> Anywhere</h3>
            <p class="w-75 mx-auto">Lorem ipsum dolor sit amet consectetur. Lorem posuere at odio nullam pulvinar enim consequat at vitae. Elit ullamcorper ultrices magna malesuada erat.</p>
          </div>
        </div>
      </div>
    
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
  </div>
  <div class="col-lg-6  px-5 py-5">
    <div class="card-body login-form px-5 py-5">
      <div class="text-center">
        <img src="<?php echo e(asset('admin/images/auth/new_logo.png')); ?>" class="img-fluid" alt="">
        <h1 class="card-title heading-primary my-3">Verify Code</h1>
        <p class="grey">An authentication code has been sent to your email address.</p>
      </div>
      
      

      <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
      <?php endif; ?>


     <form method="POST" action="<?php echo e(route('verify')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <input type="hidden" name="email" value="<?php echo e($email); ?>">

            <label for="otp">Enter Code</label>
            <input type="text" name="otp" id="otp" class="form-control" required maxlength="6">
        </div>

        <div class="mt-2 text-center">
            <small>Didn’t receive a code? 
                <a href="<?php echo e(route('resend')); ?>" class="text-danger">Resend</a>
            </small>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary w-100 mt-3">Continue</button>
        </div>
       
    </form>

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.auth.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/auth/verify-otp.blade.php ENDPATH**/ ?>
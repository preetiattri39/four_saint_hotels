<?php $__env->startSection('title', 'Welcome to Edupalz'); ?>
<?php $__env->startSection('content'); ?>
  <!----------------------Banner----------------------->
<section class="main-banner home relative">
        <div class="row align-items-center w-100 m-auto">
          <div class="col-12 col-md-6">
              <div class="inner-banenr-cnt">
                <span class="d-block welcome-txt mb-4">Welcome to Edupalz</span>
                <h2 class="f-60 pb-3 semi-bold">Education Made  Social</h2>
                <p class="f-20 pb-3">Study Smarter with Students Around the World, Get Help in Any Language,  Anytime, <span class="semi-bold">100% Free!</span></p>
                <button class="arrow-btn">Download Now on the App Store <img src="./images/arrow.svg" class="btn-arw swing" alt="arrow" /></button>
              </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="home-right-img">
                <="<?php echo e(asset('images/banner.png')); ?>" class="home-banenr w-100 " alt="banner" />
            </div>
          </div>

        </div>
        <img src="<?php echo e(asset('images/shape.svg')); ?>" class="shape-top grow" alt="shape" />
        <img src="<?php echo e(asset('images/shape1.svg')); ?>" class="shape-right grow" alt="shape" />
        <img src="<?php echo e(asset('images/shape.svg')); ?>" class="shape-left grow" alt="shape" />
        <img src="<?php echo e(asset('images/shape1.svg')); ?>" class="shape-bottom grow" alt="shape" />
      </div>
  </section>

  
  
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/welcome.blade.php ENDPATH**/ ?>
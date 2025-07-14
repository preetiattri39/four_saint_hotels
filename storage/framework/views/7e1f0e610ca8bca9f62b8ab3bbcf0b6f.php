<?php $__env->startSection('title', 'News Letter'); ?>
<?php $__env->startSection('content'); ?>
 <!----------------------Newsletter section----------------------->
 <div class="container-cstm about-page contacts">
    <section class="about-section  abot bgblue relative">
        <div class="about-banenr-cnt text-center">
            <h2 class="f-42 pb-1 semi-bold">Newsletter</h2>
            <p class="f-18 gray">Edupalz was born from a simple yet powerful idea: What if students could help each other;  anytime, anywhere, in any language,and online forums were either overwhelming or  unhelpful.</p>
        </div>
      <img src="<?php echo e(asset('images/plane.svg')); ?>" class="shape-plane grow" alt="shape" />
      <img src="<?php echo e(asset('images/shape.svg')); ?>" class="shape-top grow" alt="shape" />
      <img src="<?php echo e(asset('images/shape1.svg')); ?>" class="shape-right grow" alt="shape" />
      <img src="<?php echo e(asset('images/shape.svg')); ?>" class="shape-left grow" alt="shape" />
  </section>
  </div>
  <!----------------------Insights----------------------->
  <section class="insights-section relative">
    <div class="container-cstm">
        <div class="insight-banenr-cnt">
            <h2 class="f-42 pb-5 semi-bold">Get weekly insights, learning resources, and platform updates in any language worldwide</h2>
            <div class="insight-container relative">
                <form action="/action_page.php">
                    <div class="insight-box relative">
                        <input type="text" placeholder="Enter your email" name="search">
                        <span class="atrate">@</span>
                        <button type="submit">Sign Up</button>
                    </div>
                </form>
              </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/home/news-letter.blade.php ENDPATH**/ ?>
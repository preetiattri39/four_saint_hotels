<?php $__env->startSection('title', 'Faq'); ?>
<?php $__env->startSection('content'); ?>

<!----------------------Faq section----------------------->
<div class="container-cstm about-page faq">
  <section class="about-section  abot bgblue relative">
    <div class="about-banenr-cnt text-center">
      <h2 class="f-42 pb-1 semi-bold">Frequently Asked Questions</h2>
      <p class="f-18 gray">Edupalz was born from a simple yet powerful idea: What if students could help each other; anytime, anywhere, in any language,and online forums were either overwhelming or unhelpful.</p>
    </div>
    <img src="<?php echo e(asset('images/plane.svg')); ?>" class="shape-plane grow" alt="shape" />
    <img src="<?php echo e(asset('images/shape.svg')); ?>" class="shape-top grow" alt="shape" />
    <img src="<?php echo e(asset('images/shape1.svg')); ?>" class="shape-right grow" alt="shape" />
    <img src="<?php echo e(asset('images/shape.svg')); ?>" class="shape-left grow" alt="shape" />
  </section>
</div>


<!----------------------faq----------------------->
<section id="faq" class="faq-section relative">
  <div class="container-cstm">
    <div class="faq-banenr-cnt text-center">
      <h2 class="f-42 pb-1 semi-bold">Frequently Asked Questions</h2>
      <p class="f-18 pb-3 grey">A list of frequently asked questions to help users troubleshoot issues or learn more about the app.</p>
      <div class="search-container relative">
        <form action="<?php echo e(route('faq.search')); ?>" method="GET">

          <div class="search-box relative">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><img src="<?php echo e(asset('images/search.svg')); ?>" class="search-icon"></button>
          </div>
        </form>
      </div>

      <div class="faq-accordion ">
        <div class="accordion accordion-flush" id="faqAccordion">
          <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo e($index); ?>">
              <button class="accordion-button collapsed" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse<?php echo e($index); ?>"
                aria-expanded="false"
                aria-controls="collapse<?php echo e($index); ?>">
                <?php echo e($faq->question); ?>

              </button>
            </h2>
            <div id="collapse<?php echo e($index); ?>" class="accordion-collapse collapse"
              aria-labelledby="heading<?php echo e($index); ?>"
              data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                <?php echo e($faq->answer); ?>

              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/home/faq.blade.php ENDPATH**/ ?>
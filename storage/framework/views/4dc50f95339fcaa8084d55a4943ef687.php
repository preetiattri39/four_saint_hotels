<?php $__env->startSection('title', 'Contact-us'); ?>
<?php $__env->startSection('content'); ?>
  <section class="contact-section relative">
    <div class="container-cstm">
        
        <div class="row">
            <div class="col-12 col-md-5 mb-4">
                <div class="row">
                    <div class="col-12 col-md-12 mb-3">
                        <div class="contact-info-bx text-center">
                            <img src="<?php echo e(asset('images/call.png')); ?>" class="shape-call swing" alt="call" />
                            <p class="f-30 semi-bold mb-0">Phone Number</p>  
                            <p class="f-16 mb-0"><a  class="grey text-decoration-none" href="tel:123456789">123456789</a></p>  
                        </div>
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                        <div class="contact-info-bx text-center">
                            <img src="<?php echo e(asset('images/email.png')); ?>" class="shape-call swing" alt="call" />
                            <p class="f-30 semi-bold mb-0">Email Address</p>  
                            <p class="f-16 mb-0"><a  class="grey text-decoration-none" href="mailto:test@gmail.com">test@gmail.com</a></p>  
                        </div>
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                        <div class="contact-info-bx text-center">
                            <img src="<?php echo e(asset('images/map.png')); ?>" class="shape-call swing" alt="call" />
                            <p class="f-30 semi-bold mb-0">Address</p>  
                            <p class="f-16 mb-0"><a  class="grey text-decoration-none" href="tel:123456789">35926 Zane Junction, Beaumont, Utah - 47953, Virgin Islands, British</a></p>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 mb-4">
                <div class="contct-banenr-cnt">
                    <h2 class="f-42 semi-bold">Reach Us</h2>
                    <p class="f-20 pb-4 grey">We’d love to hear from you! Drop us a message, and we’ll be in touch soon.</p>
                    <div class="contact-form-bx relative">
                    <form action="<?php echo e(route('contact-us')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-field mb-4">
                                <label for="fname" class="d-block">Name</label>
                                <input type="text" id="fname" name="name"value="<?php echo e(old('name')); ?>" placeholder="Enter your name">
                                </div>
                                <div class="form-field mb-4">
                                <label for="email" class="d-block">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email">
                                </div>
                                <div class="form-field mb-4">
                                <label for="message" class="d-block">How can we help?</label>
                                <textarea name="message" class="form-area" rows="5" placeholder="Enter your message"><?php echo e(old('message')); ?></textarea>
                                </div>
                                <button class="sbmt-btn text-white">Submit</button>
                            </form>
                      </div>
                </div>
            </div>
           
        </div>
       
    </div>
    <img src="<?php echo e(asset('images/poly.svg')); ?>" class="shape-poly-top" alt="shape" />
    <img src="<?php echo e(asset('images/poly1.svg')); ?>" class="shape-polygn-right" alt="shape" />
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/home/contact-us.blade.php ENDPATH**/ ?>
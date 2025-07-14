<header class="header-top">
  <div class="container-cstm">
    <nav class="navbar navbar-expand-lg flex-wrap align-items-center">
      <div class="header-logo">
        <a class="navbar-brand f-40 text-black semi-bold" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/logo.svg')); ?>"></a>
      </div>
      <div class="header-right">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
          <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="<?php echo e(url('/')); ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/about-us')); ?>">About</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/faq')); ?>">FAQ</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/news-letter')); ?>">Newsletter</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/contact-us')); ?>">Contact</a></li>
        </ul>

        </div>
      </div>
    </nav>
  </div>
</header>
<?php /**PATH /var/www/html/four_saints_hotels/resources/views/partials/header.blade.php ENDPATH**/ ?>
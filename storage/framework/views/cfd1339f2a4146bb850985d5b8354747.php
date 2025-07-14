
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Four Saints Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    a.navbar-brand img {
        /* filter: brightness(1) invert(1); */
        width: 70px;
    }
    .banner {
    background: #000;
    min-height:100vh;
}

.banner-card {
    background: #191c24;
    color: #fff;
}
.main-header {
    background: #191c24;
}

.faq-card .accordion-button {
    background: #191c24;
    color: #fff;
}

.faq-card .accordion-button::after {
    filter: brightness(0)invert(1);
}
.faq-card .accordion-body {
    background: #000;
    color: #fff;
}
.faq-card .accordion-button:focus {
    box-shadow: none;
}
.accordion {
    --bs-accordion-border-color: none;
    --bs-accordion-border-width: 0;
}
</style>

<body>

    <div class="main-container">
        <div class="main-header shadow">
            <header>
                <div class="container">
                    <div class="nav-menu">
                        <nav class="navbar navbar-expand-lg ">
                            <div class="container-fluid px-0">
                                <a class="navbar-brand" href="#"><img src="<?php echo e(asset('admin/images/app-logo.jpg')); ?>"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                                    <ul class="navbar-nav gap-lg-5  ms-auto mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link text-white <?php echo e(request()->slug == "privacy-and-policy" ? 'border-bottom' : ''); ?> " aria-current="page" href="<?php echo e(route('contentPage',['slug' => 'privacy-and-policy'])); ?>">Privacy and Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white <?php echo e(request()->slug == "about-us" ? 'border-bottom' : ''); ?> "  href="<?php echo e(route('contentPage',['slug' => 'about-us'])); ?>">About Us</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link text-white <?php echo e(request()->slug == "terms-and-conditions" ? 'border-bottom' : ''); ?> " href="<?php echo e(route('contentPage',['slug' => 'terms-and-conditions'])); ?>">Term and Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white <?php echo e(request()->slug == "delete-account-steps" ? 'border-bottom' : ''); ?> " href="<?php echo e(route('contentPage',['slug' => 'delete-account-steps'])); ?>">Delete Account Steps</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white <?php echo e(request()->slug == "FAQ" ? 'border-bottom' : ''); ?>" href="<?php echo e(route('contentPage',['slug' => 'FAQ'])); ?>">FAQ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
        </div>
        <div class="banner  p-lg-5 p-2">
            <div class="container">
                <?php if(request()->slug == "FAQ"): ?>
                    <div class="faq-sec mt-5 mb-0">
                        <div class="faq-card">
                            <div class="accordion" id="accordionExample">
                                <?php $__currentLoopData = $content_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button <?php echo e($key != 0 ? 'collapsed' : ''); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($key); ?>" aria-expanded="<?php echo e($key == 0 ? true: false); ?>" aria-controls="collapse<?php echo e($key); ?>">
                                            <?php echo e($value->question); ?>

                                            </button>
                                        </h2>
                                        <div id="collapse<?php echo e($key); ?>" class="accordion-collapse collapse <?php echo e($key == 0 ? 'show' : ''); ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?php echo e($value->answer); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="banner-card shadow mt-5 rounded-3">
                        <div class="banner-card-content p-lg-5 p-2 ">
                            <?php echo $content_detail ? $content_detail->content : ''; ?>

                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
<?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/content-page.blade.php ENDPATH**/ ?>
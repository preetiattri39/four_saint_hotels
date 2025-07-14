<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="<?php echo e(route('admin.dashboard')); ?>">
            <img src="<?php echo e(asset('images/logo.jpg')); ?>" alt="logo" />
        </a>
        <a class="sidebar-brand brand-logo-mini" href="<?php echo e(route('admin.dashboard')); ?>">
            <img src="<?php echo e(asset('images/logo.jpg')); ?>" alt="logo" />
        </a>
    </div>

    <ul class="nav ml-3">
        

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['dashboard-view'])): ?>
        <!-- Dashboard Link -->
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/dashboard.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <?php endif; ?>



        <!-- Settings Link -->
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.profile', 'admin.changePassword') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(request()->routeIs('admin.profile', 'admin.changePassword') ? '' : 'collapsed'); ?>"
                data-toggle="collapse" href="#settings-menu" aria-expanded="<?php echo e(request()->routeIs('admin.profile', 'admin.changePassword') ? 'true' : 'false'); ?>" aria-controls="settings-menu">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/setting.png')); ?>" alt="logout" class="img-fluid">
                </span>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php echo e(request()->routeIs('admin.profile', 'admin.changePassword') ? 'show' : ''); ?>" id="settings-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.profile') ? 'active' : ''); ?>" href="<?php echo e(route('admin.profile')); ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.changePassword') ? 'active' : ''); ?>" href="<?php echo e(route('admin.changePassword')); ?>">Change Password</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Roles & Permissions -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role-list', 'permission-list'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.role.list') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(request()->routeIs('admin.role.list') ? '' : 'collapsed'); ?>" data-toggle="collapse" href="#role-permissions-menu"
                aria-expanded="<?php echo e(request()->routeIs('admin.role.list') ? 'true' : 'false'); ?>" aria-controls="role-permissions-menu">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/user.png')); ?>" alt="logout" class="img-fluid">
                </span>
                <span class="menu-title">Roles & Permissions</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php echo e(request()->routeIs('admin.role.list') ? 'show' : ''); ?>" id="role-permissions-menu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.role.list') ? 'active' : ''); ?>" href="<?php echo e(route('admin.role.list')); ?>">Roles</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php endif; ?>

        <!-- User Management -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['user-list','user-add','user-edit','user-delete','user-view','user-change-status','user-trashed-list','user-restore','staff-list'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.customer.*','admin.driver.*','admin.staff.*','admin.trashed.list') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(request()->routeIs('admin.customer.*','admin.driver.*','admin.staff.*','admin.trashed.list') ? '' : 'collapsed'); ?>" data-toggle="collapse" href="#service1" aria-expanded="<?php echo e(request()->routeIs('admin.customer.*','admin.driver.*','admin.staff.*','admin.trashed.list') ? 'true' : 'false'); ?>" aria-controls="service1">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/people.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php echo e(request()->routeIs('admin.user.*','admin.staff.*','admin.trashed.list') ? 'show' : ''); ?>" id="service1">
                <ul class="nav flex-column sub-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.user.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.user.list')); ?>">Users</a>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('staff-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.staff.*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.staff.list')); ?>">Staff</a>
                    </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('trashed-user-list')): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.trashed.list') ? 'active' : ''); ?>" href="<?php echo e(route('admin.trashed.list')); ?>">Trashed User</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
        <?php endif; ?>
        <!-- Trashed User -->


        <!-- Vouchers -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['vouchers-list', 'vouchers-add', 'vouchers-edit', 'vouchers-delete', 'vouchers-change-status'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.vouchers.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.vouchers.index')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/gift.png')); ?>" alt="logout" class="img-fluid">
                </span>
                <span class="menu-title">Coupans</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#featureSubmenu" role="button"
                aria-expanded="<?php echo e(request()->routeIs('admin.category.*') || request()->routeIs('admin.sub_category.*') ? 'true' : 'false'); ?>"
                aria-controls="featureSubmenu">
                <span class="menu-icon">
                    <img src="<?php echo e(asset('images/features.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Feature Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php echo e(request()->routeIs('admin.category.*') || request()->routeIs('admin.sub_category.*') ? 'show' : ''); ?>" id="featureSubmenu">
                <ul class="nav flex-column sub-menu">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-list')): ?>
                    <li class="nav-item <?php echo e(request()->routeIs('admin.category.*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.category.list')); ?>">
                            Feature
                        </a>
                    </li>
                    <?php endif; ?>

                    
                    <li class="nav-item <?php echo e(request()->routeIs('admin.sub_category.*') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.sub_category.list')); ?>">
                            Sub Feature
                        </a>
                    </li>
                    

                </ul>
            </div>
        </li>

        <!-- Hotel -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['hotel-list','hotel-view','hotel-upload-images','hotel-get-images','hotel-delete-image'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.hotel.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.hotel.list')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/hotel.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Hotel Management</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['roomtype-list', 'roomtype-add', 'roomtype-edit', 'roomtype-delete'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.roomtype.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.roomtype.list')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/living-room.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Room Type Management</span>
            </a>
        </li>
        <?php endif; ?>


        <!-- Vouchers -->
       
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.booking.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.booking.list')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/tick-mark.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Booking Management</span>
            </a>
        </li>
        


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['payment-list', 'payment-view', 'payment-edit'])): ?> 
            <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.payment.*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('admin.payment.list')); ?>">
                    <span class="menu-icon">
                        
                        <img src="<?php echo e(asset('images/payment.png')); ?>" alt="" class="img-fluid">
                    </span>
                    <span class="menu-title">Payments</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- Vouchers -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['vouchers-list', 'vouchers-add', 'vouchers-edit', 'vouchers-delete', 'vouchers-change-status'])): ?>
            <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.service.*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('admin.service.list')); ?>">
                    <span class="menu-icon">
                        
                        <img src="<?php echo e(asset('images/services.png')); ?>" alt="" class="img-fluid">
                    </span>
                    <span class="menu-title">Service Management</span>
                </a>
            </li>
            <?php endif; ?>


        <!-- Notifications -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['notification-list', 'notification-read', 'notification-delete'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.notification.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.notification.list')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/notification.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Notifications</span>
            </a>
        </li>
        <?php endif; ?>

        <!-- Newsletter -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['newsletter-index', 'newsletter-delete', 'newsletter-change-status'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.newsletter.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.newsletter.index')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/newsletter.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Newsletter Subscribers</span>
            </a>
        </li>
        <?php endif; ?>

        <!-- Announcements -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['announcements-create', 'announcements-index', 'announcements-send', 'announcements-delete', 'announcements-change-status'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.announcements.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.announcements.index')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/announce.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Announcements</span>
            </a>
        </li>
        <?php endif; ?>

        <!-- Feedback -->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['feedback-list', 'feedback-change-status', 'feedback-delete', 'feedback-view'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.feedback.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.feedback.list')); ?>">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/feedback.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Feedbacks</span>
            </a>
        </li>
        <?php endif; ?>

        <!-- Content Pages -->
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.contentPages.*') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(request()->routeIs('admin.contentPages.*') ? '' : 'collapsed'); ?>" data-toggle="collapse" href="#contentPages" aria-expanded="<?php echo e(request()->routeIs('admin.contentPages.*') ? 'true' : 'false'); ?>" aria-controls="contentPages">
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/notes.png')); ?>" alt="logout" class="img-fluid">
                </span>
                <span class="menu-title">Content Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php echo e(request()->routeIs('admin.contentPages.*') ? 'show' : ''); ?>" id="contentPages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.contentPages.detail') ? 'active' : ''); ?>" href="<?php echo e(route('admin.contentPages.detail', ['slug' => 'about-us'])); ?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.contentPages.detail') ? 'active' : ''); ?>" href="<?php echo e(route('admin.contentPages.detail', ['slug' => 'privacy-and-policy'])); ?>">Privacy And Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('admin.contentPages.detail') ? 'active' : ''); ?>" href="<?php echo e(route('admin.contentPages.detail', ['slug' => 'terms-and-conditions'])); ?>">Terms And Conditions</a>
                    </li>
                </ul>
            </div>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['chat-index', 'chat-messages', 'chat-send', 'chat-list-conversations'])): ?>
        <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.chat.*') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.chat.index')); ?>">
                <span class="menu-icon">
                    <img src="<?php echo e(asset('images/chat.png')); ?>" alt="" class="img-fluid">
                </span>
                <span class="menu-title">Chat</span>
            </a>
        </li>
        <?php endif; ?>


      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('helpdesk-list')): ?>
    <li class="nav-item menu-items <?php echo e(request()->routeIs('admin.helpDesk.*') ? 'active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('admin.helpDesk.list', ['type' => 'open'])); ?>">
            <span class="menu-icon">
                
                <img src="<?php echo e(asset('images/helpdesk.png')); ?>" alt="" class="img-fluid">
            </span>
            <span class="menu-title">Helpdesk</span>
        </a>
    </li>
<?php endif; ?>


        <!-- Log Out -->
        <li class="nav-item menu-items">
            <a href="javascript:void(0);" class="nav-link" data-toggle="modal" data-target="#logoutModal">

                
                <span class="menu-icon">
                    
                    <img src="<?php echo e(asset('images/logout.png')); ?>" alt="logout" class="img-fluid">
                </span>
                <span class="menu-title">Log Out</span>
            </a>

        </li>

    </ul>

</nav>
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content px-4 py-3">
            <div class="icon-box text-center pb-3">
                <span>
                    <img src="<?php echo e(asset('images/logout-img.png')); ?>" alt="logout" class="img-fluid">
                </span>
            </div>
            <div class="modal-body text-center">
                <h3 class="modal-title" id="logoutModalLabel">Are you sure you want to logout?</h3>
            </div>
            <div class="text-center modal-footer-btn pt-2">
                <!-- Cancel Button -->
                <a href="javascript:void(0);" class="btn btn-secondary mr-3" data-dismiss="modal">Cancel</a>
                <!-- Logout Button -->
                <a class="btn btn-logout" href="<?php echo e(route('admin.logout')); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- partial --><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/layouts/navbar.blade.php ENDPATH**/ ?>
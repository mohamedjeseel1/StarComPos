<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="<?php echo e(route('dashboard')); ?>">
            <div class="logo-img">
              <!-- <img height="30" src="<?php echo e(asset('img/logo_white.png')); ?>" class="header-brand-img" > -->
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <?php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    ?>
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item <?php echo e(($segment1 == 'dashboard') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('dashboard')); ?>"><i class="ik ik-bar-chart-2"></i><span><?php echo e(__('Dashboard')); ?></span></a>
                </div>
                <div class="nav-lavel"><?php echo e(__('Layouts')); ?> </div>
               <!-- <div class="nav-item <?php echo e(($segment1 == 'pos') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('inventory')); ?>"><i class="ik ik-shopping-cart"></i><span><?php echo e(__('Inventory')); ?></span> </a>
                </div> -->

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_pos')): ?>
             <!--   <div class="nav-item <?php echo e(($segment1 == 'pos') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('pos')); ?>"><i class="ik ik-printer"></i><span><?php echo e(__('POS')); ?></span> </a>
                </div> -->
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_pos')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'invoice') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('invoice')); ?>"><i class="ik ik-printer"></i><span><?php echo e(__('POS')); ?></span> </a>
                </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_stock')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'stock' || $segment1 == 'billing') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-codepen"></i><span><?php echo e(__(' Stock')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('stock')); ?>" class="menu-item <?php echo e(($segment1 == 'stock') ? 'active' : ''); ?>"><?php echo e(__('Add Stock')); ?></a>
                        <a href="<?php echo e(url('billing')); ?>" class="menu-item <?php echo e(($segment1 == 'billing') ? 'active' : ''); ?>"><?php echo e(__('Billing')); ?></a>
                      
                    </div>
                </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_pos')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'search') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('search')); ?>"><i class="ik ik-clipboard"></i><span><?php echo e(__('Invoice')); ?></span> </a>
                </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_branch')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'branch') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('branch')); ?>"><i class="ik ik-layout"></i><span><?php echo e(__('Branch')); ?></span> </a>
                </div>
                <?php endif; ?>

              <!--  <div class="nav-item <?php echo e(($segment1 == 'accounting') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('accounting')); ?>"><i class="ik ik-printer"></i><span><?php echo e(__('Accounting')); ?></span> <span class=" badge badge-success badge-right"><?php echo e(__('New')); ?></span></a>
            </div> -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_user')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-user"></i><span><?php echo e(__('Adminstrator')); ?></span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_user')): ?>
                        <a href="<?php echo e(url('users')); ?>" class="menu-item <?php echo e(($segment1 == 'users') ? 'active' : ''); ?>"><?php echo e(__('Users')); ?></a>
                        <a href="<?php echo e(url('user/create')); ?>" class="menu-item <?php echo e(($segment1 == 'user' && $segment2 == 'create') ? 'active' : ''); ?>"><?php echo e(__('Add User')); ?></a>
                         <?php endif; ?>
                         <!-- only those have manage_role permission will get access -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_roles')): ?>
                        <a href="<?php echo e(url('roles')); ?>" class="menu-item <?php echo e(($segment1 == 'roles') ? 'active' : ''); ?>"><?php echo e(__('Roles')); ?></a>
                        <?php endif; ?>
                        <!-- only those have manage_permission permission will get access -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_permission')): ?>
                        <a href="<?php echo e(url('permission')); ?>" class="menu-item <?php echo e(($segment1 == 'permission') ? 'active' : ''); ?>"><?php echo e(__('Permission')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_product')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'products') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span><?php echo e(__(' Add Products')); ?></span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                    
                        <a href="<?php echo e(url('brand')); ?>" class="menu-item <?php echo e(($segment1 == 'brand') ? 'active' : ''); ?>"><?php echo e(__('Brand')); ?></a>
                    
                        <a href="<?php echo e(url('unit')); ?>" class="menu-item <?php echo e(($segment1 == 'unit') ? 'active' : ''); ?>"><?php echo e(__('unit')); ?></a>
                       
                        <a href="<?php echo e(url('category')); ?>" class="menu-item <?php echo e(($segment1 == 'category') ? 'active' : ''); ?>"><?php echo e(__('Category')); ?></a>

                        <a href="<?php echo e(url('product')); ?>" class="menu-item <?php echo e(($segment1 == 'product') ? 'active' : ''); ?>"><?php echo e(__('Product')); ?></a>

                        <a href="<?php echo e(url('supplier')); ?>" class="menu-item <?php echo e(($segment1 == 'supplier') ? 'active' : ''); ?>"><?php echo e(__('Supplier')); ?></a>
                      
                    </div>
                </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_user')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'customer') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('customer')); ?>"><i class="ik ik-user"></i><span><?php echo e(__('Customer')); ?></span> </a>
                </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_return')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'return') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('return')); ?>"><i class="ik ik-repeat"></i><span><?php echo e(__('Return')); ?></span> </a>
                </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_warranty')): ?>
                <div class="nav-item <?php echo e(($segment1 == 'warranty') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('warranty')); ?>"><i class="ik ik-gift"></i><span><?php echo e(__('Warranty')); ?></span> </a>
                </div>
                <?php endif; ?>



                <!-- Include demo pages inside sidebar start-->
                <?php echo $__env->make('pages.sidebar-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Include demo pages inside sidebar end-->

            </nav>   
                
        </div>
    </div>
</div><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/include/sidebar.blade.php ENDPATH**/ ?>
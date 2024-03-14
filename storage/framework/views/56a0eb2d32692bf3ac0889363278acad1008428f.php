<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="<?php echo e(route('dashboard')); ?>">
            <div class="logo-img">
               <img height="30" src="<?php echo e(asset('img/logo_white.png')); ?>" class="header-brand-img" title="RADMIN"> 
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
                <div class="nav-item <?php echo e(($segment2 == 'inventory') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('/inventory')); ?>"><i class="ik ik-bar-chart-2"></i><span><?php echo e(__('Dashboard')); ?></span></a>
                </div>

                <!-- start inventory pages -->
                <div class="nav-item <?php echo e(($segment1 == 'pos') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('pos')); ?>"><i class="ik ik-printer"></i><span><?php echo e(__('POS')); ?></span> <span class=" badge badge-success badge-right"><?php echo e(__('New')); ?></span></a>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'products') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-headphones"></i><span><?php echo e(__('Products')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('products/create')); ?>" class="menu-item <?php echo e(($segment1 == 'products' && $segment2 == 'create') ? 'active' : ''); ?>"><?php echo e(__('Add Product')); ?></a>
                        <a href="<?php echo e(url('products')); ?>" class="menu-item <?php echo e(($segment1 == 'products' && $segment2 == '') ? 'active' : ''); ?>"><?php echo e(__('List Producs')); ?></a>
                        <a href="<?php echo e(url('unit')); ?>" class="menu-item <?php echo e(($segment1 == 'unit' && $segment2 == '') ? 'active' : ''); ?>"><?php echo e(__('Unit')); ?></a>
                        <a href="<?php echo e(url('category')); ?>" class="menu-item <?php echo e(($segment1 == 'category' && $segment2 == '') ? 'active' : ''); ?>"><?php echo e(__('Category')); ?></a>
                        <a href="<?php echo e(url('brand')); ?>" class="menu-item <?php echo e(($segment1 == 'brand' && $segment2 == '') ? 'active' : ''); ?>"><?php echo e(__('Brand')); ?></a>
                    </div>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'categories') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('categories')); ?>"><i class="ik ik-list"></i><span><?php echo e(__('Categories')); ?></span></a>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'sales') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-shopping-cart"></i><span><?php echo e(__('Sales')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('sales/create')); ?>" class="menu-item <?php echo e(($segment1 == 'sales' && $segment2 == 'create') ? 'active' : ''); ?>"><?php echo e(__('Add Sale')); ?></a>
                        <a href="<?php echo e(url('sales')); ?>" class="menu-item <?php echo e(($segment1 == 'sales' && $segment2 == '') ? 'active' : ''); ?>"><?php echo e(__('List Sales')); ?></a>
                    </div>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'purchases') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-truck"></i><span><?php echo e(__('Purchases')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('purchases/create')); ?>" class="menu-item <?php echo e(($segment1 == 'purchases' && $segment2 == 'create') ? 'active' : ''); ?>"><?php echo e(__('Add Purchase')); ?></a>
                        <a href="<?php echo e(url('purchases')); ?>" class="menu-item <?php echo e(($segment1 == 'purchases' && $segment2 == '') ? 'active' : ''); ?>"><?php echo e(__('List Purchases')); ?></a>
                    </div>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'suppliers' || $segment1 == 'customers') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-users"></i><span><?php echo e(__('People')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('suppliers')); ?>" class="menu-item <?php echo e(($segment1 == 'suppliers') ? 'active' : ''); ?>"><?php echo e(__('Suppliers')); ?></a>
                        <a href="<?php echo e(url('customers')); ?>" class="menu-item <?php echo e(($segment1 == 'customers') ? 'active' : ''); ?>"><?php echo e(__('Customers')); ?></a>
                    </div>
                </div>



                <!-- end inventory pages -->

                
        </div>
    </div>
</div><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/inventory/inventory_sidebar.blade.php ENDPATH**/ ?>
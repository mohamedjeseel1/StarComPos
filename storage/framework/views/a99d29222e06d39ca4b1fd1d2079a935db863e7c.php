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
                <div class="nav-item <?php echo e(($segment1 == 'accounting') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('/accounting')); ?>"><i class="ik ik-bar-chart-2"></i><span><?php echo e(__('Dashboard')); ?></span></a>
                </div>

                <!-- start accounting pages -->
                <div class="nav-item <?php echo e(($segment1 == 'presale') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-file"></i><span><?php echo e(__('Presale')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('presale/proposal')); ?>" class="menu-item <?php echo e(($segment1 == 'presale' && $segment2 == 'proposal') ? 'active' : ''); ?>"><?php echo e(__('Proposals')); ?></a>
                        <a href="<?php echo e(url('presale/retainer')); ?>" class="menu-item <?php echo e(($segment1 == 'presale' && $segment2 == 'retainer') ? 'active' : ''); ?>"><?php echo e(__('Retainers')); ?></a>
                    </div>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'banking') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-home"></i><span><?php echo e(__('Banking')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('banking/account')); ?>" class="menu-item <?php echo e(($segment1 == 'banking' && $segment2 == 'account') ? 'active' : ''); ?>"><?php echo e(__('Account')); ?></a>
                        <a href="<?php echo e(url('banking/transfer')); ?>" class="menu-item <?php echo e(($segment1 == 'banking' && $segment2 == 'transfer') ? 'active' : ''); ?>"><?php echo e(__('Transfer')); ?></a>
                    </div>
                </div>

                <div class="nav-item <?php echo e(($segment1 == 'income') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-dollar-sign"></i><span><?php echo e(__('Income')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('income/invoice')); ?>" class="menu-item <?php echo e(($segment1 == 'income' && $segment2 == 'invoice') ? 'active' : ''); ?>"><?php echo e(__('Invoice')); ?></a>
                        <a href="<?php echo e(url('income/revenue')); ?>" class="menu-item <?php echo e(($segment1 == 'income' && $segment2 == 'revenue') ? 'active' : ''); ?>"><?php echo e(__('Revenue')); ?></a>
                    </div>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'expense') ? 'active open' : ''); ?> has-sub">
                    <a href="#"><i class="ik ik-dollar-sign"></i><span><?php echo e(__('Expense')); ?></span></a>
                    <div class="submenu-content">
                        <a href="<?php echo e(url('expense/bill')); ?>" class="menu-item <?php echo e(($segment1 == 'expense' && $segment2 == 'bill') ? 'active' : ''); ?>"><?php echo e(__('Bill')); ?></a>
                        <a href="<?php echo e(url('expense/payment')); ?>" class="menu-item <?php echo e(($segment1 == 'expense' && $segment2 == 'payment') ? 'active' : ''); ?>"><?php echo e(__('Payment')); ?></a>
                    </div>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'budget-planner') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('budget-planner')); ?>"><i class="ik ik-briefcase"></i><span><?php echo e(__('Budget Planner')); ?></span></a>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'goal') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('goal')); ?>"><i class="ik ik-trending-up"></i><span><?php echo e(__('Goal')); ?></span></a>
                </div>
                <div class="nav-item <?php echo e(($segment1 == 'assets') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('assets')); ?>"><i class="ik ik-package"></i><span><?php echo e(__('Assets')); ?></span></a>
                </div>
                <!-- end accounting pages -->
            </nav>   
        </div>
    </div>
</div><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/accounting/sidebar.blade.php ENDPATH**/ ?>
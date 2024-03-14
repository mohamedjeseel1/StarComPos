<?php
    $segment1 = request()->segment(1);
    $segment2 = request()->segment(2);
?>



<div class="nav-item <?php echo e(($segment1 == 'icons') ? 'active' : ''); ?>">
    <a href="<?php echo e(url('icons')); ?>"><i class="ik ik-command"></i><span><?php echo e(__('Icons')); ?></span></a>
</div>
<?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/pages/sidebar-menu.blade.php ENDPATH**/ ?>
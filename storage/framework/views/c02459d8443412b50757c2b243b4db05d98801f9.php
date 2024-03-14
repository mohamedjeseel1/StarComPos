 
<?php $__env->startSection('title', 'Knob Chart'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-pie-chart bg-blue"></i>
                        <div class="d-inline">
                            <h5><?php echo e(__('Knob Chart')); ?></h5>
                            <span><?php echo e(__('lorem ipsum dolor sit amet, consectetur adipisicing elit')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo e(route('dashboard')); ?>"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#"><?php echo e(__('Charts')); ?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Knob Chart')); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Overloaded "draw" method')); ?></h3>
                    </div>
                    <div class="card-block text-center">
                        <input type="text" class="dial" value="24" data-width="200" data-height="200" data-fgColor="#1abc9c" data-skin="tron" data-thickness=".1" data-angleOffset="180">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Angle offset and arc')); ?></h3>
                    </div>
                    <div class="card-block text-center">
                        <input type="text" class="dial" value="35" data-width="200" data-height="200" data-fgColor="#FF9F55" data-angleOffset="-125" data-angleArc="250" data-rotation="anticlockwise">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Cursor mode')); ?></h3>
                    </div>
                    <div class="card-block text-center">
                        <input type="text" class="dial" value="70" data-width="200" data-height="200" data-cursor="true" data-thickness=".1" data-fgColor="#9b59b6">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Disable display input')); ?></h3>
                    </div>
                    <div class="card-block text-center">
                        <input type="text" class="dial" value="50" data-width="200" data-height="200" data-linecap="round" data-displayInput="false" data-fgColor="#40c4ff">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Display previous value ')); ?></h3>
                    </div>
                    <div class="card-block text-center">
                        <input type="text" class="dial" value="32" data-width="200" data-height="200" data-linecap="round" data-displayprevious="true" data-displayInput="true" data-fgColor="#34495e">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Read only and size')); ?> </h3>
                    </div>
                    <div class="card-block text-center">
                        <input type="text" class="dial" value="48" data-width="100" data-height="200" data-linecap="round" data-displayprevious="true" data-displayInput="true" data-readonly="true" data-fgColor="#4ECDC4">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- push external js -->
    <?php $__env->startPush('script'); ?>

        <script src="<?php echo e(asset('plugins/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/chart-knob.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/pages/charts-knob.blade.php ENDPATH**/ ?>
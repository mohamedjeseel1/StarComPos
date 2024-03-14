
<?php $__env->startSection('title', 'Chartist'); ?>
<?php $__env->startSection('content'); ?>
    <!-- push external head elements to head -->
    <?php $__env->startPush('head'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('plugins/chartist/dist/chartist.min.css')); ?>">
    <?php $__env->stopPush(); ?>
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-pie-chart bg-blue"></i>
                        <div class="d-inline">
                            <h5><?php echo e(__('Chartist')); ?></h5>
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
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Chartist')); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Slimple Line Chart')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="lineChart" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Line Chart with area')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="lineChart_area" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Advanced Smil Animations')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="lineChart_animation" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Bi Polar Bar Chart')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="barChart_bipolar" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Overlapping Bars on mobile')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="barChart_overlapping" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Extreme Responsive Configuaration')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="barChart_responsive" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Pie Chart')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="pieChart" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Gauge Chart')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="guageChart" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3><?php echo e(__('Animated Donut Chart')); ?></h3>
                    </div>
                    <div class="card-block">
                        <div id="donutChart_animated" class="chart-shadow st-cir-chart"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- push external js -->
    <?php $__env->startPush('script'); ?>

        <script src="<?php echo e(asset('plugins/chartist/dist/chartist.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/chart-chartist.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/pages/charts-chartist.blade.php ENDPATH**/ ?>
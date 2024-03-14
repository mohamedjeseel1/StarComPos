
<?php $__env->startSection('title', 'Accounting Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<!-- push external head elements to head -->
<?php $__env->startPush('head'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/weather-icons/css/weather-icons.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/chartist/dist/chartist.min.css')); ?>">
<?php $__env->stopPush(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-red st-cir-card text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div id="status-round-1" class="chart-shadow st-cir-chart">
                                <h5>42%</h5>
                            </div>
                        </div>
                        <div class="col text-center">
                            <h3 class=" fw-700 mb-5">144</h3>
                            <h6 class="mb-0 ">Bills</h6>
                        </div>
                    </div>
                    <span class="st-bt-lbl">42</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-blue st-cir-card text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div id="status-round-2" class="chart-shadow st-cir-chart">
                                <h5>56%</h5>
                            </div>
                        </div>
                        <div class="col text-center">
                            <h3 class="fw-700 mb-5">10</h3>
                            <h6 class="mb-0">Goals</h6>
                        </div>
                    </div>
                    <span class="st-bt-lbl">56</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-green st-cir-card text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div id="status-round-3" class="chart-shadow st-cir-chart">
                                <h5>83%</h5>
                            </div>
                        </div>
                        <div class="col text-center">
                            <h3 class="fw-700 mb-5">124</h3>
                            <h6 class="mb-0">Contacts</h6>
                        </div>
                    </div>
                    <span class="st-bt-lbl">83</span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-yellow st-cir-card text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div id="status-round-4" class="chart-shadow st-cir-chart">
                                <h5>42%</h5>
                            </div>
                        </div>
                        <div class="col text-center">
                            <h3 class="fw-700 mb-5">84</h3>
                            <h6 class="mb-0">Invoices</h6>
                        </div>
                    </div>
                    <span class="st-bt-lbl">42</span>
                </div>
            </div>
        </div>
    </div>
    <!-- page statustic chart end -->
    <div class="row">
        <div class="col-xl-8 col-md-12">
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card sale-card">
                        <div class="card-header">
                            <h3><?php echo e(__('Realtime Profit')); ?></h3>
                        </div>
                        <div class="card-block text-center">
                            <div id="realtime-profit"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="card sale-card">
                        <div class="card-header">
                            <h3><?php echo e(__('Income & Expense')); ?></h3>
                        </div>
                        <div class="card-block text-center">
                            <div id="sale-diff" class="chart-shadow"></div>
                        </div>
                    </div>
                </div>
                <!-- sale 2 card end -->
                <div class="col-xl-12 col-md-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h3><?php echo e(__('Recent Invoices')); ?></h3>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                    <li><i class="ik ik-minus minimize-card"></i></li>
                                    <li><i class="ik ik-x close-card"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('#')); ?></th>
                                            <th><?php echo e(__('Customer')); ?></th>
                                            <th><?php echo e(__('Issue Date')); ?></th>
                                            <th><?php echo e(__('Due Date')); ?></th>
                                            <th><?php echo e(__('Amount')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#INV00001</td>
                                            <td>Apple Company</td>
                                            <td>23/05/2017</td>
                                            <td>04/08/2018</td>
                                            <td>$55.00</td>
                                            <td><label class="badge badge-info">Draft</label></td>
                                        </tr>
                                        <tr>
                                            <td>#INV00002</td>
                                            <td>Envato Pvt Ltd.</td>
                                            <td>20/03/2017</td>
                                            <td>04/08/2019</td>
                                            <td>$551.00</td>
                                            <td><label class="badge badge-danger">Unpaid</label></td>
                                        </tr>
                                        <tr>
                                            <td>#INV00003</td>
                                            <td>Dribble Company</td>
                                            <td>13/05/2017</td>
                                            <td>03/01/2018</td>
                                            <td>$655.00</td>
                                            <td><label class="badge badge-warning">Sent</label></td>
                                        </tr>
                                        <tr>
                                            <td>#INV00004</td>
                                            <td>Adobe Family</td>
                                            <td>11/01/2016</td>
                                            <td>02/03/2017</td>
                                            <td>$535.00</td>
                                            <td><label class="badge badge-success">Paid</label></td>
                                        </tr>
                                        <tr>
                                            <td>#INV00005</td>
                                            <td>Apple Company</td>
                                            <td>23/05/2017</td>
                                            <td>04/08/2018</td>
                                            <td>$25.00</td>
                                            <td><label class="badge badge-danger">Unpaid</label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- income start -->
                <div class="col-xl-6 col-md-6">
                    <div class="card o-hidden">
                        <div class="card-header">
                            <h3><?php echo e(__('Income')); ?></h3>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted mb-5">Overall</p>
                                    <h6>68.52%</h6>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted mb-5">Monthly</p>
                                    <h6>28.90%</h6>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted mb-5">Day</p>
                                    <h6>13.50%</h6>
                                </div>
                            </div>
                        </div>
                        <div id="sal-income"></div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="card o-hidden">
                        <div class="card-header">
                            <h3><?php echo e(__('Expense')); ?></h3>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted mb-5">Overall</p>
                                    <h6>68.52%</h6>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted mb-5">Monthly</p>
                                    <h6>28.90%</h6>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted mb-5">Day</p>
                                    <h6>13.50%</h6>
                                </div>
                            </div>
                        </div>
                        <div id="rent-income"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-4 col-md-12">

            <div class="card card-green text-white">
                <div class="card-block pb-0">
                    <div class="row mb-50">
                        <div class="col">
                            <h6 class="mb-5"><?php echo e(__('Cashflow')); ?></h6>
                            <h5 class="mb-0  fw-700"><?php echo e(__('$2665.00')); ?></h5>
                        </div>
                        <div class="col-auto text-center">
                            <p class="mb-5"><?php echo e(__('Direct Sale')); ?></p>
                            <h6 class="mb-0"><?php echo e(__('$1768')); ?></h6>
                        </div>

                        <div class="col-auto text-center">
                            <p class="mb-5"><?php echo e(__('Referal')); ?></p>
                            <h6 class="mb-0"><?php echo e(__('$897')); ?></h6>
                        </div>
                    </div>
                    <div id="sec-ecommerce-chart-line" class="chart-shadow"></div>
                    <div id="sec-ecommerce-chart-bar"></div>
                </div>
            </div>
            <div id="card-412" class="card ">
                <div class="card-header">
                    <h3>Todos</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="task-list">
                        <li class="list">
                            <span></span>
                            <div class="task-details">
                                <p class="date">
                                    <small class="text-primary">Meeting</small> - Upcoming in 5 days
                                </p>
                                <p>Meeting with Sara in the Caffee Caldo for Brunch</p>
                                <small>Scheduled for 16th Mar, 2017</small>
                            </div>
                        </li>
                        <li class="list">
                            <span></span>
                            <div class="task-details">
                                <p class="date">
                                    <small class="text-primary">Meeting</small> - Delay 7 days
                                </p>
                                <p>Technical management meeting</p>
                                <small>Completed 15 days ago</small>
                            </div>
                        </li>
                        <li class="list completed">
                            <span></span>
                            <div class="task-details">
                                <p class="date">
                                    <small class="text-danger">Transfer</small> - Completed
                                </p>
                                <p>Transfer all domain names as soon as possible!</p>
                                <small>Completed 2 days ago</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- push external js -->
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('plugins/owl.carousel/dist/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/chartist/dist/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/flot-charts/jquery.flot.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('plugins/flot-charts/jquery.flot.categories.js')); ?>"></script> -->
<script src="<?php echo e(asset('plugins/flot-charts/curvedLines.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/flot-charts/jquery.flot.tooltip.min.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/amcharts/amcharts.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/amcharts/serial.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/amcharts/themes/light.js')); ?>"></script>


<script src="<?php echo e(asset('js/widget-statistic.js')); ?>"></script>
<script src="<?php echo e(asset('js/widget-data.js')); ?>"></script>
<script src="<?php echo e(asset('js/dashboard-charts.js')); ?>"></script>
<script>
    floatchart();
    var chart = new Chartist.Pie('#status-round-1', {
        series: [5, 7]
    }, {
        donut: true,
        donutWidth: 5,
        showLabel: false
    });
    var chart = new Chartist.Pie('#status-round-2', {
        series: [7, 5]
    }, {
        donut: true,
        donutWidth: 5,
        showLabel: false
    });
    var chart = new Chartist.Pie('#status-round-3', {
        series: [11, 5]
    }, {
        donut: true,
        donutWidth: 5,
        showLabel: false
    });
    var chart = new Chartist.Pie('#status-round-4', {
        series: [11, 10]
    }, {
        donut: true,
        donutWidth: 5,
        showLabel: false
    });

    function floatchart() {
        //flot options
        var options = {
            legend: {
                show: false
            },
            series: {
                label: "",
                curvedLines: {
                    active: true,
                    nrSplinePoints: 20
                },
            },
            tooltip: {
                show: true,
                content: "x : %x | y : %y"
            },
            grid: {
                hoverable: true,
                borderWidth: 0,
                labelMargin: 0,
                axisMargin: 0,
                minBorderMargin: 0,
            },
            yaxis: {
                min: 0,
                max: 30,
                color: 'transparent',
                font: {
                    size: 0,
                }
            },
            xaxis: {
                color: 'transparent',
                font: {
                    size: 0,
                }
            }
        };
        $.plot($("#sal-income"), [{
            data: [
                [0, 25],
                [1, 15],
                [2, 20],
                [3, 27],
                [4, 10],
                [5, 20],
                [6, 10],
                [7, 26],
                [8, 20],
                [9, 10],
                [10, 25],
                [11, 27],
                [12, 12],
                [13, 26],
            ],
            color: "#4099ff",
            lines: {
                show: true,
                fill: true,
                lineWidth: 3
            },
            points: {
                show: false,
            },
            curvedLines: {
                apply: true,
            }
        }], options);
        $.plot($("#rent-income"), [{
            data: [
                [0, 25],
                [1, 15],
                [2, 25],
                [3, 27],
                [4, 10],
                [5, 20],
                [6, 15],
                [7, 26],
                [8, 20],
                [9, 13],
                [10, 25],
                [11, 27],
                [12, 12],
                [13, 1],
            ],
            color: "#2ed8b6",
            lines: {
                show: true,
                fill: true,
                lineWidth: 3
            },
            points: {
                show: false,
            },
            curvedLines: {
                apply: true,
            }
        }], options);
        $.plot($("#income-analysis"), [{
            data: [
                [0, 25],
                [1, 30],
                [2, 25],
                [3, 27],
                [4, 10],
                [5, 20],
                [6, 15],
                [7, 26],
                [8, 10],
                [9, 13],
                [10, 25],
                [11, 27],
                [12, 12],
                [13, 27],
            ],
            color: "#FF5370",
            lines: {
                show: true,
                fill: true,
                lineWidth: 3
            },
            points: {
                show: false,
            },
            curvedLines: {
                apply: true,
            }
        }], options);
    }
</script>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accounting.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/accounting/dashboard.blade.php ENDPATH**/ ?>
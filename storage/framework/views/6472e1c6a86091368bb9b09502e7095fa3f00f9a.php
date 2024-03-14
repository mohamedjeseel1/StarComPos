 
<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
    <!-- push external head elements to head -->
    <?php $__env->startPush('head'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('plugins/DataTables/datatables.min.css')); ?>">
    <?php $__env->stopPush(); ?>

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-codepen bg-blue"></i>
                        <div class="d-inline">
                            <h5>invoice</h5>
                            <span></span>
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
                                <a href="#">invoice</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="InvoiceModalLabel">Preview Invoice</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-header">
                                <h3 class="d-block w-100">Radmin<small class="float-right">07/10/2021</small></h3>
                            </div>
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-hover"id="myTable1">
                                            <thead>
                                                <tr>
                                                    <th class="wp-40">Product</th>
                                                    <th class="wp-20">Unit Price</th>
                                                    <th class="wp-15">Qty</th>
                                                    <th class="wp-15">Discount</th>
                                                    <th class="wp-15 text-right">Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($product->product_name); ?></td>
                                                    <td><?php echo e($product->uni_price); ?></td>
                                                    <td><?php echo e($product->quantity); ?></td>
                                                    <td><?php echo e($product->discount_price); ?></td>
                                                    <td><?php echo e($product->amt); ?></td>
                                                    <td class="text-right"></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <p class="lead">Payment Methods:</p>
                                        <img src="<?php echo e(asset('/img/credit/visa.png')); ?>" alt="Visa">
                                        <img src="<?php echo e(asset('/img/credit/mastercard.png')); ?>" alt="Mastercard">
                                        <img src="<?php echo e(asset('/img/credit/american-express.png')); ?>" alt="American Express">
                                        <img src="<?php echo e(asset('/img/credit/paypal2.png')); ?>" alt="Paypal">
                                
                                        <div class="alert alert-secondary mt-20">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </div>
                                    </div>
                                <div class="row no-print">
                                    <div class="col-12">
                                        <button type="button"  class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                        <button type="button" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Generate PDF</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

   
    
    <!-- push external js -->
    <?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('plugins/DataTables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/select2/dist/js/select2.min.js')); ?>"></script>
    <!--server side users table script-->
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/viewInvoice.blade.php ENDPATH**/ ?>
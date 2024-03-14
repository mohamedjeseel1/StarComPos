 
<?php $__env->startSection('title', 'Editable Datatable'); ?>
<?php $__env->startSection('content'); ?>
    <!-- push external head elements to head -->
    <?php $__env->startPush('head'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('plugins/DataTables/datatables.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/jquery-ui/jquery-ui.css')); ?>">
    <?php $__env->stopPush(); ?>

    
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-pie-chart bg-blue"></i>
                        <div class="d-inline">
                            <h5><?php echo e(__('Editable Datatable')); ?></h5>
                            <span><?php echo e(__('Make cells within a DataTable to be editable.')); ?></span>
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
                                <a href="#"><?php echo e(__('Tables')); ?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#"><?php echo e(__('Editable Datatable')); ?></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card table-card proj-t-card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 p-3">
                                    <code><?php echo e(__('CellEdit')); ?></code> <?php echo e(__('plugin allows cells within a DataTable to be editable. When a')); ?> <span class="text-red">cell</span> <?php echo e(__('is click on, an input field will appear. When focus is lost on the input and the underlying DataTable object will be updated and the table will be redrawn. The new value is passed to a callback function, along with its row, allowing for easy server-side data updates.')); ?><br><br>

                                    <?php echo e(__('Example:')); ?> <br>
                                    <img src="<?php echo e(asset('img/editable-datatable.JPG')); ?>" alt="" class="img-fluid"> <br><br>
                                    <?php echo e(__('Read CellEdit')); ?>  <a class="text-red" href="https://github.com/ejbeaty/CellEdit"> <?php echo e(__('documentation')); ?> </a>. 
                                </div>
                            </div>
                        <h6 class="pt-badge bg-red"><?php echo e(__('ejbeaty')); ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3><?php echo e(__('Editable Data Table')); ?></h3></div>
                    <div class="card-body">
                        <table id="myAdvancedTable" class="table p-3">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('First Name')); ?></th>
                                    <th><?php echo e(__('Last Name')); ?></th>
                                    <th><?php echo e(__('DOB')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo e(__('Elliott')); ?></td>
                                    <td><?php echo e(__('Beaty')); ?></td>
                                    <td><?php echo e(__('01/14/2011')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Joe')); ?></td>
                                    <td><?php echo e(__('Dirt')); ?></td>
                                    <td><?php echo e(__('01/14/2004')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('John')); ?></td>
                                    <td><?php echo e(__('Doe')); ?></td>
                                    <td><?php echo e(__('01/14/2003')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Jane')); ?></td>
                                    <td><?php echo e(__('Doe')); ?></td>
                                    <td><?php echo e(__('01/11/2001')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Billy')); ?></td>
                                    <td><?php echo e(__('Bob')); ?></td>
                                    <td><?php echo e(__('02/14/1947')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Bobby')); ?></td>
                                    <td><?php echo e(__('Axlerod')); ?></td>
                                    <td><?php echo e(__('01/27/2001')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Elliott')); ?></td>
                                    <td><?php echo e(__('Beaty')); ?></td>
                                    <td><?php echo e(__('01/13/2007')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Joe')); ?></td>
                                    <td><?php echo e(__('Dirt')); ?></td>
                                    <td><?php echo e(__('01/14/2001')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('John')); ?></td>
                                    <td><?php echo e(__('Doe')); ?></td>
                                    <td><?php echo e(__('01/14/2001')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Jane')); ?></td>
                                    <td><?php echo e(__('Doe')); ?></td>
                                    <td><?php echo e(__('01/14/2001')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Billy')); ?></td>
                                    <td><?php echo e(__('Bob')); ?></td>
                                    <td><?php echo e(__('01/14/2001')); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Bobby')); ?></td>
                                    <td><?php echo e(__('Axlerod')); ?></td>
                                    <td><?php echo e(__('01/14/2001')); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <!-- push external js -->
    <?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/DataTables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/DataTables/Cell-edit/dataTables.cellEdit.js')); ?>"></script>
    <!--get editable datatable script-->
    <script src="<?php echo e(asset('js/editable-datatable.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/pages/datatable-editable.blade.php ENDPATH**/ ?>
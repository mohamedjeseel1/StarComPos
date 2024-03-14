 
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
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>Supplier</h5>
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
                                <a href="#">Supplier</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            <?php echo $__env->make('include.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header">
                        <h3>
                            <a href="#supplierAdd" data-toggle="modal" data-target="#supplierAdd" class="btn btn-sm btn-primary">Add supplier </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="supplier_table8" class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Phone')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('Address')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Model supplier -->
    <div class="modal fade edit-layout-modal pr-0" id="supplierAdd" role="dialog" aria-labelledby="supplierAddLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierAddLabel">Add supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="supplier/store" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="d-block">supplier Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter supplier Name">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter address">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="Save" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade edit-layout-modal pr-0" id="supplierEdit" role="dialog" aria-labelledby="supplierEditLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierEditLabel">Edit supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="supplier/update" method="post">
						<?php echo csrf_field(); ?>
						<input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                            <label class="d-block">supplier Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter supplier Name" value="" >
                        </div>
                        <div class="form-group">
                            <label class="d-block">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Address</label>
                            <input type="text" name="address"id="address" class="form-control" placeholder="Enter address">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="Save" value="Save">
                        </div>
                    </form>
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

    <script>
            $(document).on('click', '#editsupplier',function() {
                let supplierId = $(this).data('id');
                var token = $('#token').val();
                var ur = "supplier/edit/"+supplierId;
        $.ajax({
            url : ur ,
            type: 'get',
            success: function (data)
            {
                $('#name').val(data.name);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#address').val(data.address);
				$('#id').val(supplierId);
            },
            error: function()
            {
                alert('failed...');

            }
        });
         
        });
   </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/supplier.blade.php ENDPATH**/ ?>
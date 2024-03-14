 
<?php $__env->startSection('title', 'Layouts'); ?>
<?php $__env->startSection('content'); ?>
    

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5><?php echo e(__('Layouts')); ?></h5>
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
                                <a href="#"><?php echo e(__('Ui Elements')); ?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Layouts')); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-2 clearfix">
                    <a class="btn pt-0 pl-0 d-md-none d-lg-none" data-toggle="collapse" href="#displayOptions" role="button" aria-expanded="true" aria-controls="displayOptions">
                        <?php echo e(__('Display Options')); ?>

                        <i class="ik ik-chevron-down align-middle"></i>
                    </a>
                    <div class="collapse d-md-block display-options" id="displayOptions">
                        <span class="mr-3 d-inline-block float-md-left dispaly-option-buttons">
                            <a href="#" class="mr-1 view-list active">
                                <i class="ik ik-menu view-icon"></i>
                            </a>
                            <a href="#" class="mr-1 view-thumb">
                                <i class="ik ik-list view-icon"></i>
                            </a>
                            <a href="#" class="mr-1 view-grid">
                                <i class="ik ik-grid view-icon"></i>
                            </a>
                        </span>
                        <div class="d-block d-md-inline-block">
                            <div class="btn-group float-md-left mr-1 mb-1">
                                <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(__('
                                    Order By')); ?> 
                                    <i class="ik ik-chevron-down mr-0 align-middle"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><?php echo e(__('Action')); ?></a>
                                    <a class="dropdown-item" href="#"><?php echo e(__('Another action')); ?></a>
                                </div>
                            </div>
                            <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                                <form action="">
                                    <input type="text" class="form-control" placeholder="Search.." required>
                                    <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                    <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                        <button class="btn btn-theme"><?php echo e(__('Search')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="float-md-right">
                            <span class="text-muted text-small mr-2"><?php echo e(__('Displaying 1-10 of 210 items')); ?> </span>
                            <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                20
                                <i class="ik ik-chevron-down mr-0 align-middle"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">10</a>
                                <a class="dropdown-item" href="#">20</a>
                                <a class="dropdown-item" href="#">30</a>
                                <a class="dropdown-item" href="#">50</a>
                                <a class="dropdown-item" href="#">100</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator mb-20"></div>

                <div class="row layout-wrap" id="layout-wrap">
                    <div class="col-12 list-item">
                        <div class="card d-flex flex-row mb-3">
                            <a class="d-flex card-img" href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem">
                                <img src="../img/portfolio-1.jpg" alt="Donec sit amet est at sem iaculis aliquam." class="list-thumbnail responsive border-0">
                                <span class="badge badge-pill badge-primary position-absolute badge-top-left"><?php echo e(__('New')); ?></span>
                                <span class="badge badge-pill badge-secondary position-absolute badge-top-left-2"><?php echo e(__('Trending')); ?></span>
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero card-content">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                    <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem">
                                        <?php echo e(__('Donec felis urna, commodo eget velit interdum, malesuada lacinia eros.')); ?>

                                    </a>
                                    <p class="mb-1 text-muted text-small category w-15 w-xs-100">Art')}}</p>
                                    <p class="mb-1 text-muted text-small date w-15 w-xs-100"><?php echo e(__('02.04.2018')); ?></p>
                                    <div class="w-15 w-xs-100">
                                        <span class="badge badge-pill badge-secondary"><?php echo e(__('On Hold')); ?></span>
                                    </div>
                                </div>
                                <div class="list-actions">
                                    <a href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem"><i class="ik ik-eye"></i></a>
                                    <a href="layout-edit-item.html"><i class="ik ik-edit-2"></i></a>
                                    <a href="#" class="list-delete"><i class="ik ik-trash-2"></i></a>
                                </div>
                                <div class="custom-control custom-checkbox pl-1 align-self-center">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label"></span>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 list-item">
                        <div class="card d-flex flex-row mb-3">
                            <a class="d-flex card-img" href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem">
                                <img src="../img/portfolio-2.jpg" alt="Nullam porttitor elit rhoncus luctus volutpat." class="list-thumbnail responsive border-0">
                                <span class="badge badge-pill badge-primary position-absolute badge-top-left"><?php echo e(__('New')); ?></span>
                                <span class="badge badge-pill badge-secondary position-absolute badge-top-left-2"><?php echo e(__('Trending')); ?></span>
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero card-content">
                                <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                    <a href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem" class="w-40 w-sm-100">
                                        <p class="list-item-heading mb-1 truncate"><?php echo e(__('Proin sit amet augue lorem. Interdum et malesuada fames.')); ?></p>
                                    </a>
                                    <p class="mb-1 text-muted text-small category w-15 w-sm-100">Travel</p>
                                    <p class="mb-1 text-muted text-small date  w-15 w-sm-100"><?php echo e(__('21.03.2018')); ?></p>
                                    <div class="w-15 w-sm-100">
                                        <span class="badge badge-pill badge-primary"><?php echo e(__('Processed')); ?></span>
                                    </div>
                                </div>
                                <div class="list-actions">
                                    <a href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem"><i class="ik ik-eye"></i></a>
                                    <a href="layout-edit-item.html"><i class="ik ik-edit-2"></i></a>
                                    <a href="#" class="list-delete"><i class="ik ik-trash-2"></i></a>
                                </div>
                                <div class="custom-control custom-checkbox pl-1 align-self-center">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 list-item">
                        <div class="card d-flex flex-row mb-3">
                            <a class="d-flex card-img" href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem">
                                <img src="../img/portfolio-7.jpg" alt="Nullam porttitor elit rhoncus luctus volutpat." class="list-thumbnail responsive border-0">
                                <span class="badge badge-pill badge-primary position-absolute badge-top-left"><?php echo e(__('New')); ?></span>
                                <span class="badge badge-pill badge-secondary position-absolute badge-top-left-2"><?php echo e(__('Trending')); ?></span>
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero card-content">
                                <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                    <a href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem" class="w-40 w-sm-100">
                                        <p class="list-item-heading mb-1 truncate"><?php echo e(__('Class aptent taciti sociosqu ad litora torquent per conubia nostra.')); ?></p>
                                    </a>
                                    <p class="mb-1 text-muted text-small category w-15 w-sm-100"><?php echo e(__('Design')); ?></p>
                                    <p class="mb-1 text-muted text-small date  w-15 w-sm-100"><?php echo e(__('19.02.2018')); ?></p>
                                    <div class="w-15 w-sm-100">
                                        <span class="badge badge-pill badge-secondary"><?php echo e(__('On Hold')); ?></span>
                                    </div>
                                </div>
                                <div class="list-actions">
                                    <a href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem"><i class="ik ik-eye"></i></a>
                                    <a href="layout-edit-item.html"><i class="ik ik-edit-2"></i></a>
                                    <a href="#" class="list-delete"><i class="ik ik-trash-2"></i></a>
                                </div>
                                <div class="custom-control custom-checkbox pl-1 align-self-center">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label"></span>
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 list-item">
                        <div class="card d-flex flex-row mb-3">
                            <a class="d-flex card-img" href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem">
                                <img src="../img/portfolio-8.jpg" alt="Nullam porttitor elit rhoncus luctus volutpat." class="list-thumbnail responsive border-0">
                                <span class="badge badge-pill badge-primary position-absolute badge-top-left"><?php echo e(__('New')); ?></span>
                                <span class="badge badge-pill badge-secondary position-absolute badge-top-left-2"><?php echo e(__('Trending')); ?></span>
                            </a>
                            <div class="d-flex flex-grow-1 min-width-zero card-content">
                                <div class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                                    <a href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem" class="w-40 w-sm-100">
                                        <p class="list-item-heading mb-1 truncate"><?php echo e(__('Maecenas ut felis iaculis, dapibus mi quis, cursus mi.')); ?></p>
                                    </a>
                                    <p class="mb-1 text-muted text-small category w-15 w-sm-100"><?php echo e(__('Travel')); ?></p>
                                    <p class="mb-1 text-muted text-small date  w-15 w-sm-100"><?php echo e(__('14.02.2018')); ?></p>
                                    <div class="w-15 w-sm-100">
                                        <span class="badge badge-pill badge-primary"><?php echo e(__('Processed')); ?></span>
                                    </div>
                                </div>
                                <div class="list-actions">
                                    <a href="#editLayoutItem" data-toggle="modal" data-target="#editLayoutItem"><i class="ik ik-eye"></i></a>
                                    <a href="layout-edit-item.html"><i class="ik ik-edit-2"></i></a>
                                    <a href="#" class="list-delete"><i class="ik ik-trash-2"></i></a>
                                </div>
                                <div class="custom-control custom-checkbox pl-1 align-self-center">
                                    <label class="custom-control custom-checkbox mb-0">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
                


    <div class="modal fade edit-layout-modal" id="editLayoutItem" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLayoutItemLabel"><?php echo e(__('Sed id mi non quam iaculis pulvinar.')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="lead"><?php echo e(__('Nullam elementum aliquam porta.')); ?></p>
                    <p><?php echo e(__('Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus fermentum imperdiet ligula, et mollis quam sagittis ac. In quis interdum sem. Vivamus blandit fringilla hendrerit. Suspendisse vulputate sapien vitae mi convallis dictum. Sed blandit felis ut quam accumsan, at condimentum nibh varius. Mauris ornare ultricies ipsum.')); ?></p>
                    <div class="row">
                        <div class="col-md-6"><img src="../img/portfolio-1.jpg" class="img-fluid" alt=""></div>
                        <div class="col-md-6"><img src="../img/portfolio-8.jpg" class="img-fluid" alt=""></div>
                    </div>
                    <div class="jumbotron pt-30 pb-30 mt-30">
                        <h2 class="mt-0"><?php echo e(__('Hello, world!')); ?></h2>
                        <p class="lead"><?php echo e(__('This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.')); ?></p>
                    </div>
                    <p><?php echo e(__('Praesent eleifend ac felis dignissim mattis. Suspendisse eget congue enim, ac fermentum risus. Donec eget risus lacus. Nullam nec lectus quis tortor ultrices consectetur. Etiam dui erat, tristique vel quam a, maximus porttitor enim. Ut molestie turpis in est iaculis, ut congue massa porta.')); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <a href="layout-edit-item.html" class="btn btn-primary"><?php echo e(__('Edit')); ?></a>
                    <button type="button" class="btn btn-danger list-delete"><?php echo e(__('Delete')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- push external js -->
    <?php $__env->startPush('script'); ?>

        <script src="<?php echo e(asset('plugins/sweetalert/dist/sweetalert.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/summernote/dist/summernote-bs4.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/layouts.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/pages/layouts.blade.php ENDPATH**/ ?>
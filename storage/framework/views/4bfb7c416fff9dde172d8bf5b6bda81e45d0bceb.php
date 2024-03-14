<!doctype html>
<html class="no-js" lang="en">
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo e(__('Login | Radmin - Laravel Admin Starter')); ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?php echo e(asset('favicon.png')); ?>"/>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap/dist/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/ionicons/dist/css/ionicons.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/icon-kit/dist/css/iconkit.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dist/css/theme.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dist/css/theme-image.css')); ?>">
        <script src="<?php echo e(asset('src/js/vendor/modernizr-2.8.3.min.js')); ?>"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" >
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href=""><img src="<?php echo e(asset('img/logo.png')); ?>" alt=""></a>
                            </div>
                            <h3><?php echo e(__('Sign In to ThemeKit')); ?></h3>
                            <p><?php echo e(__('Happy to see you again!')); ?></p>
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                    <i class="ik ik-user"></i>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                                    <i class="ik ik-lock"></i>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;<?php echo e(__('Remember Me')); ?></span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a class="btn btn-link" href="">
                                            <?php echo e(__('Forgot Your Password?')); ?>

                                        </a>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme"><?php echo e(__('Sign In')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo e(asset('src/js/vendor/jquery-3.3.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/popper.js/dist/umd/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('plugins/screenfull/dist/screenfull.js')); ?>"></script>
        
    </body>
</html>
<?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/pages/login.blade.php ENDPATH**/ ?>
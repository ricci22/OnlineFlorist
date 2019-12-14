<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'OnlineFlorist')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <?php if(\Illuminate\Support\Facades\Auth::check()): ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item m-auto">
                                <a class="nav-link" href="/profile">Profile</a>
                            </li>
                            <?php if(\Illuminate\Support\Facades\Auth::id() == 1): ?>
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" style="cursor: pointer">
                                    Admin Menu
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/users">Manage Users</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/flower_types">Manage Flower Types</a>
                                    <a class="dropdown-item" href="/flowers">Manage Flowers</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/couriers">Manage Couriers</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/transactions">Transaction History</a>
                                </div>
                            </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Live Clock -->
                        <li class="nav-item m-auto">
                            <?php echo $__env->make('inc.clock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </li>

                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/carts">Cart</a>
                                    <a class="dropdown-item" href="/order">Order History</a>

                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php echo $__env->make('inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <main class="py-4">
                <section class="text-center text-primary">
                    <h1><?php echo $__env->yieldContent('title'); ?></h1>
                    <?php echo $__env->yieldContent('callToActionBtn'); ?>
                </section>
                <hr>
                <?php echo $__env->yieldContent('content'); ?>
                <hr>
            </main>
        </div>

    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\florist\resources\views/layouts/app.blade.php ENDPATH**/ ?>
<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>"  data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <?php echo $__env->make('partials.customer.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div id="layout-wrapper">
        <header id="page-topbar">
            <?php echo $__env->make('partials.customer.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </header>
        <?php echo $__env->make('partials.customer.toastr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('partials.customer.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="main-content">
                <?php echo $__env->yieldContent('content'); ?>
                <footer class="footer">
                <?php echo $__env->make('partials.customer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </footer>
            </div>
    </div>
       
        <?php echo $__env->make('partials.customer.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
</body>

</html>
<?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/layouts/customer.blade.php ENDPATH**/ ?>
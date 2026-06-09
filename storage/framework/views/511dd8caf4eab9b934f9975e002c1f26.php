<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
    <?php echo $__env->make('partials.customer.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <?php echo $__env->make('partials.customer.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.customer.toastr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('partials.customer.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main role="main">
			<?php echo $__env->yieldContent('content'); ?>
        </main>
    <?php echo $__env->make('partials.customer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\HP\Desktop\Work\web-billing\billing\resources\views/layouts/customer.blade.php ENDPATH**/ ?>
<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
<?php echo $__env->make('partials.printtemplate.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
   
        <?php echo $__env->yieldContent('content'); ?>
            
    <?php echo $__env->make('partials.printtemplate.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/layouts/print.blade.php ENDPATH**/ ?>
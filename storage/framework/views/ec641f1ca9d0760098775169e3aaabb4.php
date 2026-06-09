<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
    <?php echo $__env->make('partials.auth.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    
  
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('partials.auth.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/layouts/auth.blade.php ENDPATH**/ ?>
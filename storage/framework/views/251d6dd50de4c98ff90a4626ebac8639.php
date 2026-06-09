<?php if(Session::has('message')): ?>
    <?php
        $type =  Session::get('type', 'success') ;
        $message = Session::get('message') ;
        $options    = json_encode(Session::get('toaster_option', 'success'));
    ?>
    <script>
        $(function(){
            toastr.<?php echo e($type); ?>('<?php echo e($message); ?>', null, '<?php echo e($options); ?>');
        });
    </script>
  <?php endif; ?><?php /**PATH C:\Users\HP\Desktop\Work\web-billing\billing\resources\views/partials/customer/toastr.blade.php ENDPATH**/ ?>
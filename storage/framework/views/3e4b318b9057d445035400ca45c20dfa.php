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
  <?php endif; ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/Partials/customer/toastr.blade.php ENDPATH**/ ?>
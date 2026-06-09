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
  <?php endif; ?><?php /**PATH /home/u986104073/domains/bill.dabstersofttech.com/public_html/resources/views/partials/customer/toastr.blade.php ENDPATH**/ ?>
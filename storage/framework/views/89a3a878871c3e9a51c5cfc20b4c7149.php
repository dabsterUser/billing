<?php $__env->startSection('content'); ?>
<div class="container-fluid">
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Payment Receipt</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('dashboard')); ?>"><i class="icon icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('sale-receipt')); ?>">Payment Receipt</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Edit Payment Receipt</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5>Edit Payment Receipt</h5>
            </div>
            <div class="card-body">

              <form action="<?php echo e(url('/purchase-receipt/'.$payment_receipt->id)); ?>" method="post" id="edit-receipt-form">
              <?php echo csrf_field(); ?>
            <?php echo e(method_field('PATCH')); ?>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Receipt Number</label>
                      <p><b><?php echo e($payment_receipt->receipt_no); ?></b></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Company Name</label>
                      <select class="form-control select2" id="customer_vendor_id" disabled name="customer_vendor_id">
                        <option value="<?php echo e($payment_receipt->customer_vendor_id); ?>"><?php echo e($payment_receipt->name); ?></option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Pan Card" class="">Address</label>
                      <div class="controls">
                      <input type="text" name="address" value="<?php echo e($payment_receipt->customer_address); ?>" id="address" class="form-control" placeholder="Enter Address"
                          maxlength="50" disabled>
                        <p><b></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="GST No" class="">GSTIN / PAN</label>
                      <div class="controls">
                        <p><b><?php echo e($payment_receipt->gstin_pan); ?></b></p>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="GST No" class="">Payment Date</label>
                      <div class="controls">
                        <input type="text" class="form-control mb-2 datepicker" value="<?php echo e(\Carbon\Carbon::now()->toDateString($payment_receipt->payment_date,'d-M-Y')); ?>" name="payment_date">
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Payment Type</label>
                      <div class="controls">
                        <select name="payment_type" class="form-control" id="payment_type" required="" aria-required="true">
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque</option>
                            <option value="online_transfer">Online/Transfer</option>
                            <option value="bank_transfer">Bank/Transfer</option>
                            <option value="cash-tds">TDS</option>
                            <option value="cash-bad-debts-kasar">Bad Debts / Kasar</option>
                            <option value="currency-exchange-loss">Currency Exchange Loss</option>
                        </select>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Amount</label>
                      <div class="controls">
                        <p><b><?php echo e($payment_receipt->amount); ?></b></p>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="" class="">Payment Note</label>
                      <div class="controls">
                          <textarea name="payment_note" class="form-control" placeholder="Enter Payment Note "><?php echo e($payment_receipt->payment_note); ?></textarea>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 form-controls my-3 text-right">
                    <a type="button" class="btn mr-3" href="<?php echo e(url('purchase-receipt')); ?>">Cancel</a>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>


    <script>






      $('#edit-receipt-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            payment_date:{
              required:true
            }
        },
        messages: {
        },
        highlight: function(element) {
            $(element).closest('.form-group input').addClass('has-error border-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
        },
        success: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
            $(element).closest('.form-group').children('span.help-block').remove();
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest('.form-group'));
        },
        submitHandler: function(form) {
          var invoice_array = [];
            $('#lstBox2 option').each(function(key){
              var invoice_amount = $(this).data('amount');
              console.log(invoice_amount);
              $(form).append('<input type="hidden" name="invoice_amount[]" value="'+invoice_amount+'" />');
            });
            $('#lstBox2 option').attr('selected',true);
            $(form)[0].submit();
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/purchaseinvoicereceipt/edit.blade.php ENDPATH**/ ?>
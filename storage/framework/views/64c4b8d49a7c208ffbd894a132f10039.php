



<?php $__env->startSection('content'); ?>

<style>
.dataTables_filter{
  display: none;
}
#multiDelete{
  float:right;
}
</style>

<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row d-flex justify-content-end align-items-center">
      <div class="col-4 pl-0">
        <h1>Purchase Invoice List</h1>
      </div>
      <div class="col-8 text-right">
        <a href="<?php echo e(url('/purchase-invoice/create')); ?>" class="btn btn-primary mr-2">Add</a>
        <div class="d-none" id="multiDelete">
          <a href="#" class="btn btn-danger  ml-2 mr-2 ">Delete Inoice</a>
          <a href="#" class="btn btn-primary ml-2 mr-2 ">Print</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid main-container">
  <div class="main-form-container">
    <div class="search-header border-bottom py-4 px-3">
      <div class="form-group row col-sm-6 mb-0">
        <label for="" class="col-sm-2 col-form-label">Search</label>
        <div class="col-sm-10">
          <div class="controls">
            <input type="text" id="searchbox" maxlength="150" class="form-control" placeholder="Search Product"
              aria-required="true">
          </div>
        </div>
      </div>
    </div>
    <div class="total-widget py-4">
      <div class="row mx-0">
        <div class="col-sm-12">
          <div class="">
              <h5><i class="fa fa-info-circle"></i> <span>Total Sales</span></h5>
              <div class="total-counter border-right"><i>Today</i><br><b>Rs. <?php echo e($today_total); ?></b></div>
              <div class="total-counter border-right"><i>This Month</i><br><b>Rs. <?php echo e($month_total); ?></b></div>
              <div class="total-counter border-right"><i>Till date</i><br><b>Rs. <?php echo e($till_date_total); ?></b></div>
            </div>
        </div>
      </div>
    </div>
    <div class="record-table custom-data-table">
      <form id="frm-example" action="javascript:;" method="POST">

        <?php echo csrf_field(); ?>

        <table class="table table-border table-hover" data-footable="" id="purchase-invoice-datatable"
          data-toggle-column="last" style="display: table;">

          <thead>

            <tr class="footable-header">

              <th class="chkbox footable-first-visible">

                <input type="checkbox" class="select-all" onclick="selectall();" name="del">

              </th>

              <th>Invoice No.</th>

              <th><a href="javascript:;">Company Name</a></th>

              <th><a href="javascript:;">Date</a></th>

              <th><a href="javascript:;">Total</a></th>

              <th><a href="javascript:;">Remaining Amount</a></th>

              <th><a href="javascript:;">Edit</a></th>

              <th>

                <a href="javascript:;">Print</a>

              </th>

            </tr>

          </thead>

          <tbody>

            <?php if(count($invoices) > 0): ?>

            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr class="table-bill-detail-rows">

              <td class="footable-first-visible">

                <input type="checkbox" class="single-select" name="invoice_id[]" value="<?php echo e($invoice->id); ?>">

              </td>

              <td><?php echo e($invoice->invoice_number); ?></td>

              <td><?php echo e($invoice->customer_name); ?></td>

              <td><?php echo e($invoice->bill_date); ?></td>

              <td><?php echo e($invoice->grand_total); ?></td>

              <td><?php echo e(number_format($invoice->grand_total - $invoice->payment_received, 2, '.','')); ?></td>

              <td><a href="<?php echo e(url('/purchase-invoice/'.$invoice->id.'/edit')); ?>" class="btn btn-outline-primary"><i
                    class="icon icon-pencil"></i>Edit</a></td>
              <td>
                <p><a href="<?php echo e(url('print-invoice-purchase')); ?>?id=<?php echo e($invoice->id); ?>" class="btn btn-info print-btn"
                    target="_blank" data-link="<?php echo e(url('print-invoice')); ?>?id=<?php echo e($invoice->id); ?>"
                    data-id="<?php echo e($invoice->id); ?>">Print</a></p>

                <a href="javascript:;" class="btn btn-info">Share</a><br>

              </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

          </tbody><!-- /tbody -->

        </table>

      </form>
    </div>
  </div>
</div>
<script>

  // $('#purchase-invoice-datatable').DataTable();

  var product_datatable = $('#purchase-invoice-datatable').DataTable();

  $("#searchbox").keyup(function() {
      filterGlobal();
  }); 

  function filterGlobal () {
      product_datatable.search(
          $('#searchbox').val(),
      ).draw();
  }

  // function selectall(){

  //   $('.single-select').prop('checked', 'checked');

  // }

  function selectall(event) {

    var ischecked = $('.select-all').is(':checked');

    if (ischecked == true) {

      $('.single-select').prop('checked', 'checked');
      $('#multiDelete').removeClass('d-none');
    } else {

      $('.single-select').prop('checked', false);
      $('#multiDelete').addClass('d-none');

    }

  }







  $('.single-select').on('click', function () {

    var totalCheckboxes = $('.single-select').length;

    var numberOfChecked = $('.single-select:checked').length;

    if (numberOfChecked < totalCheckboxes) {

      $('.select-all').prop('checked', false);

    } else {

      $('.select-all').prop('checked', true);

    }

    if(numberOfChecked > 0){
      $('#multiDelete').removeClass('d-none');
    }else{
      $('#multiDelete').addClass('d-none');
    }

  });



  $('#multiDelete').on('click', function (e) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: base_url + '/saleinvoice/multidelete',
          method: 'POST',
          data: $('#frm-example').serialize(),
          success: function (data) {
            if (data == '1') {
              swal.fire({
                'title': 'Invoice Deleted successfully',
                'icon': 'success'
              }).then(function () {
                document.location.href = base_url + '/purchase-invoice';
              });
            } else {
              swal.fire(data);
            }
          }
        });
      }
    })
  });



  $(".print_selector").change(function () {

    // console.log(this);

    UpdatePrintButtonLink($(this));

  });



  function UpdatePrintButtonLink(clickedVar) {

    var ParentRowBillItem;





    ParentRowBillItem = $(clickedVar).parents(".table-bill-detail-rows");

    // console.log(clickedVar);

    // console.log(ParentRowBillItem);





    var LinkForButton = $(ParentRowBillItem).find(".print-btn").attr("data-link");

    if ($(ParentRowBillItem).find("#original").is(":checked")) {

      LinkForButton += "&original=1";

    }

    if ($(ParentRowBillItem).find("#duplicate").is(":checked")) {

      LinkForButton += "&duplicate=1";

    }

    if ($(ParentRowBillItem).find("#transport").is(":checked")) {

      LinkForButton += "&transport=1";

    }

    if ($(ParentRowBillItem).find("#office").is(":checked")) {

      LinkForButton += "&office=1";

    }

    $(ParentRowBillItem).find(".print-btn").attr("href", LinkForButton);

  }



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/purchaseinvoice/index.blade.php ENDPATH**/ ?>
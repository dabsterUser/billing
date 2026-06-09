<?php $__env->startSection('content'); ?>

<style>
.dataTables_filter{
  display: none;
}
#multiDelete{
  float:right;
}
</style>

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Point of Sales</h4>
  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Point of Sales</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
  
            </div>
        </div>
    </div>
    <!-- end page title -->
  
    <div class="row pb-4 gy-3">
        <div class="col-sm-4">
            <a href="<?php echo e(url('/point-of-sale/create')); ?>" class="btn btn-primary addMembers-modal"><i class="las la-plus me-1"></i> Add Invoices</a>
        </div>
  
        <div class="col-sm-auto ms-auto">
           <div class="d-flex gap-3">
            <div class="search-box">
                <input type="text" class="form-control" placeholder="Search for name or designation...">
                <i class="las la-search search-icon"></i>
            </div>
            <div class="">
                <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info btn-icon fs-14"><i class="las la-ellipsis-v fs-18"></i></button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                    <li><a class="dropdown-item" href="#">Print</a></li>
                    <li><a class="dropdown-item" href="#">Export to Excel</a></li>
                </ul>
            </div>
           </div>
        </div>
    </div>
  
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Rs.<span class="counter-value" data-target="<?php echo e($till_date_total); ?>">0</span></h4>
                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Total Sales 
                                <span class="text-success fs-14 mb-0 ms-1">
                                    
                                </span>
                            </p>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded-circle fs-3">
                                <i class="las la-file-alt fs-24 text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <span class="badge bg-primary me-1">2,258</span> <span class="text-muted">Total sales by client</span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
  
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Rs.<span class="counter-value" data-target="<?php echo e($month_total); ?>">0</span></h4>
                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">This Month's
                                <span class="text-danger fs-14 mb-0 ms-1">
                                    
                                </span>
                            </p>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded-circle fs-3">
                                <i class="las la-check-square fs-24 text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <span class="badge bg-danger me-1">1,958</span> <span class="text-muted">This month's by clients</span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
  
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="fs-22 fw-semibold ff-secondary mb-2 text-white">Rs.<span class="counter-value" data-target="<?php echo e($today_total); ?>">0</span></h4>
                            <p class="text-uppercase fw-medium fs-14 text-white-50 mb-0"> Today's
                                <span class="text-danger fs-14 mb-0 ms-1">
                                    
                                </span>
                            </p>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light-subtle text-light  rounded-circle fs-3">
                                <i class="las la-clock fs-24 text-white"></i>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <span class="badge bg-danger me-1">338</span> <span class="text-white">Today's by clients</span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
  
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Rs.<span class="counter-value" data-target="<?php echo e($till_date_total); ?>">0</span></h4>
                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0"> Till date
                                <span class="text-success fs-14 mb-0 ms-1">
                                    
                                </span>
                            </p>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-light rounded-circle fs-3">
                                <i class="las la-times-circle fs-24 text-primary"></i>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <span class="badge bg-primary me-1">502</span> <span class="text-muted">Till date by clients</span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
  
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-hover table-nowrap align-middle mb-0">
                            <thead>
                                <tr class="text-muted text-uppercase">
                                    <th style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th scope="col">Invoice No.</th>
                                    <th scope="col">Client</th>
                                    <th scope="col" style="width: 20%;">Phone</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Billed</th>
                                    <th scope="col" style="width: 16%;">Status</th>
                                    <th scope="col" style="width: 12%;">Action</th>
                                </tr>
                            </thead>
  
                            <tbody>
                              <?php if(count($invoices) > 0): ?>
                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="check1" value="option">
                                        </div>
                                    </td>
                                    <td><p class="fw-medium mb-0"><?php echo e($invoice->invoice_number); ?></p></td>
                                    <td> 
                                      <div class="col-xl-3 col-lg-4 col-sm-6">
                                        
                                        <a href="" class="text-body align-middle fw-medium"><?php echo e($invoice->pos_customerName); ?></a>
                                      </div>
                                      
                                    </td>
                                    <td><?php echo e($invoice->pos_customerPhone); ?></td>
                                    <td><?php echo e($invoice->bill_date); ?></td>
                                    <td><?php echo e($invoice->grand_total); ?></td>
                                    <td>
                                      <?php if( $invoice->payment_type == 'cash'): ?>
                                        <span class="badge bg-success-subtle text-success p-2">Cash</span>                                                                               
                                      <?php elseif($invoice->payment_type == 'cheque'): ?>
                                        <span class="badge bg-warning-subtle text-warning p-2">Cheque</span>
                                      <?php elseif($invoice->payment_type == 'online'): ?>
                                        <span class="badge bg-info-subtle text-info  p-2">Online</span>
                                      <?php elseif($invoice->payment_type == 'credit'): ?>
                                        <span class="badge bg-primary-subtle text-primary p-2">Credit</span>
                                      <?php else: ?>
                                        <span class="badge bg-danger-subtle text-danger p-2">unpaid</span>
                                      <?php endif; ?>
                                    
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="las la-ellipsis-h align-middle fs-18"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="<?php echo e(url('point-of-sale/'.$invoice->id.'/edit')); ?>"><i class="las la-pen fs-18 align-middle me-2 text-muted"></i>
                                                        Edit</a>
                                                </li>
                                                <li>
                                                  <a class="dropdown-item" href="<?php echo e(url('point-of-sale-invoice')); ?>?id=<?php echo e($invoice->id); ?>"><i class="las la-eye fs-18 align-middle me-2 text-muted"></i>
                                                      View & Print</a>
                                                </li>
                                                
                                                <li class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item remove-item-btn" href="#">
                                                        <i class="las la-trash-alt fs-18 align-middle me-2 text-muted"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php endif; ?>
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end table responsive -->
                </div>
            </div>
        </div>
    </div>
  
    <div class="row align-items-center mb-4 gy-3">
        <div class="col-md-5">
            <p class="mb-0 text-muted">Showing <b>1</b> to <b>5</b> of <b>10</b> results</p>
        </div>
        <div class="col-sm-auto ms-auto">
            <nav aria-label="...">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item" aria-current="page">
                    <span class="page-link">2</span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
        </div>
    </div>
  </div>
</div>
<script>

  // $('#sale-invoice-datatable').DataTable();

  var product_datatable = $('#sale-invoice-datatable').DataTable();

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
                document.location.href = base_url + '/sale-invoice';
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
<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/point-of-sale/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

<style>
	div#receipt_datatable_filter {
    display: none;
}
</style>

<div class="page-content">
  <div class="top-stickybar"> 
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Outward Payment</h4>
  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Payment</a></li>
                        <li class="breadcrumb-item active">Outward Payment</li>
                        <a href="javascript:;" id="multiDelete" class="btn btn-danger mr-2 d-none">Remove</a>                    
                    </ol>
                </div>
            </div>
        </div>
      </div>
  
      <div class="row pb-4 gy-3">
        <div class="col-sm-4">
            <a class="btn btn-primary" href="<?php echo e(url('/purchase-receipt/create')); ?>" ><i class="las la-plus me-1"></i>Add Receipt </a>      
        </div>
        
  
        <div class="col-sm-auto ms-auto">
           <div class="d-flex gap-3">
            <div class="search-box">
              <input type="text" value="" name="" maxlength="150" class="form-control" id="searchbox" placeholder="Search for products..."
              required="" aria-required="true">
                
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
    </div>
  </div>


    <div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="record-table custom-data-table mt-3 mb-3 bg-white py-3 px-3">
              <div class="card-block">
                <div class="table-responsive">
                <form id="customer-records" action="javascript:;" method="post">
                <?php echo csrf_field(); ?>
                  <table class="table table-hover" id="receipt_datatable" data-footable="" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        <th class="chkbox footable-first-visible">
                          <input type="checkbox" class="select-all" onclick="selectall();" name="del">
                        </th>
                        <th><a href="#">Receipt No</a></th>
                        <th> <a href="#">Company Name</a></th>
                        <th><a href="#">Payment Date</a></th>
                        <th><a href="#">Payment Note</a></th>
                        <th><a href="#">Amount</a></th>
                        <th>
                          <a href="javascript:;">Edit</a>
                        </th>
                        <th class="footable-last-visible">
                          <a href="#">Print</a>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php if(count($salereceipt)>0): ?>
                      <?php $__currentLoopData = $salereceipt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td class="footable-first-visible">
                              <input type="checkbox" class="single-select" name="id[]" value="<?php echo e($receipt->id); ?>">
                            </td>
                          <td><?php echo e($receipt->receipt_no); ?></td>
                          <td><?php echo e($receipt->name); ?></td>
                          <td><?php echo e(\Carbon\Carbon::now()->toDateString($receipt->payment_date,'d M,Y')); ?></td>
                          <td><?php echo e($receipt->payment_note); ?></td>
                          <td><?php echo e($receipt->amount); ?></td>
                          <td>
                            <a href="<?php echo e(url('/purchase-receipt/'.$receipt->id.'/edit')); ?>" class="btn btn-outline-primary"><i class="las la-pen fs-18 align-middle me-2 text-muted"></i>Edit</a>
                          </td>
                          <td class="footable-last-visible">
                            <!-- <p><a href="javascript:;" href="" class="btn btn-info">Print</a></p> -->
                            <a href="<?php echo e(url('print-purchase-inward')); ?>?id=<?php echo e($receipt->id); ?>" class="btn btn-outline-success print-btn" target="_blank" data-link="<?php echo e(url('print-purchase-inward')); ?>?id=<?php echo e($receipt->id); ?>" data-id="<?php echo e($receipt->id); ?>" ><i class="ri-printer-line fs-18 align-middle me-2 text-muted"></i>Print</a>
                            
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                    </tbody><!-- /tbody -->
                  </table>
                </div>
              </div>
              <div class="card-footer bg-primary">
                <div class="row">
                  <div class="col">
                    <a href="javascript:;" class="btn btn-danger ml-5" id="multiDelete"><i class="icon icon-minus"></i>
                      Delete</a>
                  </div>
                  <div class="col text-right"><a href="<?php echo e(url('/purchase-receipt/create')); ?>" class="btn btn-light mr-3"><i class="icon icon-plus"></i>
                      Add New</a>
                   </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    <script>

		 var product_datatable = $('#receipt_datatable').DataTable();

		 $("#searchbox").keyup(function() {
			  filterGlobal();
		  });

		  function filterGlobal () {
			  product_datatable.search(
				  $('#searchbox').val(),
			  ).draw();
		  }


        $("#receipt_datatable").DataTable();

    function selectall(event){
        var ischecked = $('.select-all').is(':checked');
        if(ischecked == true){
            $('.single-select').prop('checked', 'checked');
        }else{
            $('.single-select').prop('checked', false);
        }
    }

    $('.single-select').on('click',function(){
        var totalCheckboxes = $('.single-select').length;
        var numberOfChecked = $('.single-select:checked').length;
        if(numberOfChecked < totalCheckboxes){
            $('.select-all').prop('checked',false);
        }else{
            $('.select-all').prop('checked',true);
        }
    });

        $('#multiDelete').on('click', function(e){
          $.ajax({
                url:base_url+'/salereceipt/multidelete',
                method:'POST',
                data:$('#customer-records').serialize(),
                success:function(data){
                    if (data == '1') {
                        swal.fire({
                            'title': 'Receipt Deleted successfully',
                            'icon': 'success'
                        }).then(function() {
                            document.location.href = base_url+'/purchase-receipt';
                        });
                    } else {
                        swal.fire(data);
                    }
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/purchaseinvoicereceipt/index.blade.php ENDPATH**/ ?>
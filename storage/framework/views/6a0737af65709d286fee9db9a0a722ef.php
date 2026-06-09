<?php $__env->startSection('content'); ?>


<div class="page-content">
  <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Dashboard</h4>
                
                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                          <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
      <!-- end page title -->

      <div class="row">
        
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">

                            <h4 class="fs-22 fw-semibold ff-secondary mb-2"><span class="counter-value" data-target="<?php echo e($total_customer); ?>">0</span></h4>
                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Total Clients 
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
                             <span class="text-muted">Total added client</span>
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
                            <?php
                            $totalsale = 0;
                            foreach($saleinvoice as $saleinvoices){
                                    $totalsale = $totalsale+number_format($saleinvoices->grand_total - $saleinvoices->payment_received, 2, '.','');
                            }
                            ?>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Rs.<span class="counter-value" data-target="<?php echo e($totalsale); ?>">0</span></h4>
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
                            <span class="text-muted">Total sales by client</span>
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
                            <?php
                            $totalpurchase = 0;
                            foreach($purchaseinvoice as $purchaseinvoices){
                                    $totalpurchase = $totalsale+number_format($purchaseinvoices->grand_total - $purchaseinvoices->payment_received, 2, '.','');
                            }
                            ?>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Rs.<span class="counter-value" data-target="<?php echo e($totalpurchase); ?>">0</span></h4>
                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Total Purchase 
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
                            <span class="text-muted">Total purchase by client</span>
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
                            <h4 class="fs-22 fw-semibold ff-secondary mb-2">Rs.<span class="counter-value" data-target="1224">0</span></h4>
                            <p class="text-uppercase fw-medium fs-14 text-muted mb-0">Total Invoices 
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
                         <span class="text-muted">Total invoices by client</span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
      <!-- end row -->

      <div class="row">
          <div class="col-xl-8">
              <div class="card">
                  <div class="card-header border-0 align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Payment Activity</h4>
                      <div>
                          <button type="button" class="btn btn-info btn-sm">
                              ALL
                          </button>
                      </div>
                  </div>
                  <div class="card-body py-1">
                      <div class="row gy-2">
                          <div class="col-md-4">
                              <h4 class="fs-22 mb-0">$23,590.00</h4>
                          </div>
                          <div class="col-md-8">
                              <div class="d-flex main-chart justify-content-end">
                                  <div class="px-4 border-end">
                                      <h4 class="text-primary fs-22 mb-0">$584k <span class="text-muted d-inline-block fs-17 align-middle ms-0 ms-sm-2">Incomes</span></h4>
                                  </div>
                                  <div class="ps-4">
                                      <h4 class="text-primary fs-22 mb-0">$324k <span class="text-muted d-inline-block fs-17 align-middle ms-0 ms-sm-2">Expenses</span></h4>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div id="stacked-column-chart" class="apex-charts" data-colors='["--in-primary", "--in-light"]' dir="ltr"></div>
                  </div>
              </div>
          </div>

          <div class="col-xl-4">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex align-items-start">
                          <div class="flex-grow-1 overflow-hidden">
                              <h5 class="card-title mb-2 text-truncate">Structure</h5>
                          </div>
                      </div>

                      <div id="structure-widget" data-colors='["--in-primary", "--in-primary-rgb, 0.7", "--in-light"]' class="apex-charts" dir="ltr"></div>


                      <div class="px-2">
                          <div class="structure-list d-flex justify-content-between border-bottom">
                              <p class="mb-0"><i class="las la-dot-circle fs-18 text-primary me-2"></i>Invoiced</p>
                              <div>
                                  <span class="pe-2 pe-sm-5">$56,236</span>
                                  <span class="badge bg-primary"> + 0.2% </span>
                              </div>
                          </div>
                          <div class="structure-list d-flex justify-content-between border-bottom">
                              <p class="mb-0"><i class="las la-dot-circle fs-18 text-primary me-2"></i>Collected</p>
                              <div>
                                  <span class="pe-2 pe-sm-5">$12,596</span>
                                  <span class="badge bg-primary"> - 0.7% </span>
                              </div>
                          </div>
                          <div class="structure-list d-flex justify-content-between pb-0">
                              <p class="mb-0"><i class="las la-dot-circle fs-18 text-primary me-2"></i>Outstanding</p>
                              <div>
                                  <span class="pe-2 pe-sm-5">$1,568</span>
                                  <span class="badge bg-primary"> + 0.4% </span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- end row -->


      <div class="row">

          <div class="col-xl-6">
              <div class="card">
                  <div class="card-header border-0 align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Sales Invoice</h4>
                  </div>
                  <div class="card-body pt-2">
                      <div class="table-responsive table-card">
                          <table class="table table-striped table-nowrap align-middle mb-0" id="customer_datatables">
                              <thead>
                                  <tr class="text-muted text-uppercase">
                                      <th style="width: 50px;">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                          </div>
                                      </th>
                                      <th scope="col">Invoice ID</th>
                                      <th scope="col">Client</th>
                                      <th scope="col">Date</th>
                                      <th scope="col" style="width: 16%;">Remaining Amt. </th>
                                  </tr>
                              </thead>

                              <tbody>
                                <?php $__currentLoopData = $saleinvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleinvoices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td>
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="check1" value="option">
                                          </div>
                                      </td>
                                      <td><p class="mb-0"><?php echo e($saleinvoices->id); ?></p></td>
                                      <td>
                                          <a href="#javascript: void(0);" class="text-body align-middle"><?php echo e($saleinvoices->customer_name); ?></a>
                                      </td>
                                      <td><?php echo e($saleinvoices->bill_date); ?></td>
                                      <td>
                                        <?php echo e(number_format($saleinvoices->grand_total - $saleinvoices->payment_received, 2, '.','')); ?>

                                      </td>

                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody><!-- end tbody -->
                          </table><!-- end table -->
                      </div><!-- end table responsive -->

                  </div>
              </div>
          </div>

          <div class="col-xl-6">
              <div class="card">
                  <div class="card-header border-0 align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Purchase Invoice</h4>
                  </div>
                  <div class="card-body pt-2">
                      <div class="table-responsive table-card">
                          <table class="table table-striped table-nowrap align-middle mb-0" id="customer_datatables">
                              <thead>
                                  <tr class="text-muted text-uppercase">
                                      <th style="width: 50px;">
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                          </div>
                                      </th>
                                      <th scope="col">Invoice ID</th>
                                      <th scope="col">Client</th>
                                      <th scope="col">Date</th>
                                      <th scope="col" style="width: 16%;">Remaining Amt.</th>
                                  </tr>
                              </thead>

                              <tbody>
                                <?php $__currentLoopData = $purchaseinvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchaseinvoicecs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                      <td>
                                          <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="check1" value="option">
                                          </div>
                                      </td>
                                      <td><p class="mb-0"><?php echo e($purchaseinvoicecs->id); ?></p></td>
                                      <td>
                                          <a href="#javascript: void(0);" class="text-body align-middle"><?php echo e($purchaseinvoicecs->customer_name); ?></a>
                                      </td>
                                      <td><?php echo e($purchaseinvoicecs->bill_date); ?></td>
                                      <td><?php echo e(number_format($purchaseinvoicecs->grand_total - $purchaseinvoicecs->payment_received, 2, '.','')); ?></td>
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody><!-- end tbody -->
                          </table><!-- end table -->
                      </div><!-- end table responsive -->

                  </div>
              </div>
          </div>


      </div>
      <!-- end row -->

  </div>
  <!-- container-fluid -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

var dataTable =  $("#customer_datatable").DataTable();

$("#searchbox").keyup(function() {
   filterGlobal();
 });

 function filterGlobal () {
     $('#customer_datatable').DataTable().search(
         $('#searchbox').val(),
     ).draw();
 }

	window.onload = function () {
		var options = {
			data: [
				{
					type: "splineArea",
					dataPoints: [
						{ y: <?php echo e($janamount); ?>, label: "January"},
						{ y: <?php echo e($febamount); ?>, label: "February" },
						{ y: <?php echo e($marchamount); ?>, label: "March" },
						{ y: <?php echo e($aprilamount); ?>, label: "April" },
						{ y: <?php echo e($mayamount); ?>, label: "May" },
						{ y: <?php echo e($juneamount); ?>, label: "June" },
						{ y: <?php echo e($julyamount); ?>, label: "July" },
						{ y: <?php echo e($augustamount); ?>, label: "August" },
						{ y: <?php echo e($septamount); ?>, label: "September" },
						{ y: <?php echo e($octamount); ?>, label: "October" },
						{ y: <?php echo e($noveamount); ?>, label: "November" },
						{ y: <?php echo e($decemamount); ?>, label: "December" },
					]
				}
			]
		};
		$("#chartContainer").CanvasJSChart(options);
	}

	var chart = new CanvasJS.Chart("charddtContainer", {
		data: [{
			dataPoints: [
				{ y: <?php echo e($totaluser); ?>, indexLabel: "\u2605 New", label: "last 30 days"},
				{ y: <?php echo e($returningcustomer); ?>, indexLabel: "\u2691 Return", label: "last 30 days" },

			]
		}]
	});
	chart.render();

</script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/dashboard.blade.php ENDPATH**/ ?>
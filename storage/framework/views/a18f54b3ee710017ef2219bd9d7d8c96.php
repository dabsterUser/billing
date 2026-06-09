<?php $__env->startSection('content'); ?>



<div class="top-stickybar">
  <div class="container-fluid">
    <div class="row d-flex justify-content-end align-items-center">
      <div class="col-12 pl-0">
        <h1>Analytics</h1>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid main-container homepage">
  <div class="homepage-cards">
    <div class="row mx-0">
      <div class="col-sm-8 monthly-salechart bg-white border-radius p-3">
        <h6>Monthly Sales/Purchase</h6>

        <div class="chart-container"></div>
		<div id="chartContainer" style="height: 300px; width: 100%;"></div>

	  </div>
      <div class="col-sm-4 pr-0">
        <div class="thismnthsale analytics-sm-block border-radius mb-3">
          <h6>This month sales</h6>
          <div class="analytics-calc">
            <div class="">
              <h5><i class="fa fa-rupee-sign"></i> <span>
			    <?php
				$amount=0;
				foreach($thismonthsale as $thismonthsales){
					$amount = $amount+$thismonthsales->grand_total;
				}
				echo $amount;
				?>
				</span></h5>
              <div class="total-counter">From <?php echo e($totalcount); ?> Items</div>
            </div>
          </div>
        </div>
        <div class="item-count analytics-sm-block border-radius mb-3">
          <h6>Items Count</h6>
          <div class="analytics-calc">
            <div class="stock-col">
              <h5><span><?php echo e($total_item_instock); ?></span></h5>
              <div class="total-counter">(In stock)</div>
            </div>
            <div class="stock-col analytics-calc-total">
              <h5><span><?php echo e($total_item_products); ?></span></h5>
              <div class="total-counter">(Total)</div>
            </div>
          </div>
        </div>
        <!--<div class="top-buyer analytics-sm-block border-radius mb-3">
          <h6>Top buyer</h6>
          <div class="analytics-calc">
            <div class="">
              <h5><span>Kunal enterprises</span></h5>
              <div class="total-counter">From 18 Items</div>
            </div>
          </div>
        </div>-->
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 my-3 pr-2">
        <div class="monthly-salechart bg-white border-radius p-3">
			<h6>New vs returning customers</h6>
			<span>(Past 30 Days)</span>
			<div id="charddtContainer" style="height: 300px; width: 100%;"></div>
        </div>
      </div>
      <div class="col-sm-6 my-3 pl-2">
        <div class="monthly-salechart bg-white border-radius p-3">
          <h6>Total Outstanding</h6>
          <span>(This month)</span>
          <div class="chart-container">
			<?php
				$totalsale = 0;
				foreach($saleinvoice as $saleinvoices){
						$totalsale = $totalsale+number_format($saleinvoices->grand_total - $saleinvoices->payment_received, 2, '.','');
				}
				echo "<p style='text-align:center;margin-top:5%;'>".$totalsale."</p>";
			?>
		  </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5>Sales Invoice Due</h5>
            </div>
            <!--<div class="col text-right"><a href="#" class="btn btn-outline-primary"><i class="icon icon-list"></i>
                View All</a></div>-->
          </div>
        </div>
        <div class="card-block">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr class="footable-header">
                  <th> Invoice No. </th>
                  <th> Company Name</th>
                  <th> Due Date</th>
                  <th> Remaining Payment</th>
                </tr>
              </thead><!-- /thead -->
              <tbody>
                <?php $__currentLoopData = $saleinvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleinvoices): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($saleinvoices->id); ?></td>
						<td><?php echo e($saleinvoices->customer_name); ?></td>
						<td><?php echo e($saleinvoices->bill_date); ?></td>
						<td><?php echo e(number_format($saleinvoices->grand_total - $saleinvoices->payment_received, 2, '.','')); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody><!-- /tbody -->
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h5>Purchase Invoice Due</h5>
            </div>
            <!--<div class="col text-right"><a href="#" class="btn btn-outline-primary"><i class="icon icon-list"></i>
                View All</a></div>-->
          </div>
        </div>
        <div class="card-block">
          <div class="table-responsive">
            <table class="table table-hover" data-footable="" data-toggle-column="last" style="display: table;">
              <thead>
                <tr class="footable-header">
                  <th> Purchase Invoice No. </th>
                  <th> Company Name</th>
                  <th> Due Date</th>
                  <th> Remaining Payment</th>
                </tr>
              </thead><!-- /thead -->
              <tbody>

                <?php $__currentLoopData = $purchaseinvoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchaseinvoicecs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="footable-empty">
						<td><?php echo e($purchaseinvoicecs->id); ?></td>
						<td><?php echo e($purchaseinvoicecs->customer_name); ?></td>
						<td><?php echo e($purchaseinvoicecs->bill_date); ?></td>
						<td><?php echo e(number_format($purchaseinvoicecs->grand_total - $purchaseinvoicecs->payment_received, 2, '.','')); ?></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody><!-- /tbody -->
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
	<?php ($test=15); ?>



<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

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

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/dashboard.blade.php ENDPATH**/ ?>
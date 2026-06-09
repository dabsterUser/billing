<?php $__env->startSection('content'); ?>
<style>
p {
    margin-bottom: 0px;
}

.ammount-words{
    text-transform: capitalize
}

.col-1,
.col-2,
.col-3,
.col-4,
.col-5,
.col-6,
.col-7,
.col-8,
.col-9,
.col-10,
.col-11,
.col-12,
.col,
.col-auto,
.col-sm-1,
.col-sm-2,
.col-sm-3,
.col-sm-4,
.col-sm-5,
.col-sm-6,
.col-sm-7,
.col-sm-8,
.col-sm-9,
.col-sm-10,
.col-sm-11,
.col-sm-12,
.col-sm,
.col-sm-auto,
.col-md-1,
.col-md-2,
.col-md-3,
.col-md-4,
.col-md-5,
.col-md-6,
.col-md-7,
.col-md-8,
.col-md-9,
.col-md-10,
.col-md-11,
.col-md-12,
.col-md,
.col-md-auto,
.col-lg-1,
.col-lg-2,
.col-lg-3,
.col-lg-4,
.col-lg-5,
.col-lg-6,
.col-lg-7,
.col-lg-8,
.col-lg-9,
.col-lg-10,
.col-lg-11,
.col-lg-12,
.col-lg,
.col-lg-auto,
.col-xl-1,
.col-xl-2,
.col-xl-3,
.col-xl-4,
.col-xl-5,
.col-xl-6,
.col-xl-7,
.col-xl-8,
.col-xl-9,
.col-xl-10,
.col-xl-11,
.col-xl-12,
.col-xl,
.col-xl-auto {
    padding: 0;
}

.table>:not(caption)>*>* {
    background-color: transparent;
}
.main-page{
    margin: 70px 0px 60px;
}
</style>

<div class="main-page p-4">

    <div class="page-content bg-white p-4">

        <div class="container-fluid">
    
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class=" page-title-box d-sm-flex align-items-center justify-content-between">
                    <div class=" pl-0">
                        <h4>Admin Details</h4>
                    </div>
                    <div class="">
                        <!--<a href="#" class="btn btn-light mr-2">Edit</a>-->
                        <?php $url = http_build_query(Request::query()); ?>
                        <a href="<?php echo e(url('print-invoice-downloadpdf?' . $url)); ?>" class="btn btn-primary">Download</a>
                        <!--<button id="" name="" value="" class="btn btn-primary">Print</button>-->

                        <a target="_blank" class="btn btn-primary" href="<?php echo e(url('print-invoice?' . $url . '&download=pdf')); ?>">Print</a>
                    </div>
                </div>          
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row pb-4 gy-3">
            <div class="invoice-printing-opt">
                <h5><i class="fa fa-print mr-2"></i> Invoice printing options</h5>
                <div class="row justify-content-between">
                    <div class="col-lg-4 pl-5">
                        <div class="controls mt-2">
                            <label><input type="checkbox" name="is_same_shipping" value="1" checked=""
                                    id="is_same_shipping"> Original for Recipient</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="controls mt-2">
                            <label><input type="checkbox" name="is_same_shipping" value="1"
                                    id="is_same_shipping">
                                Duplicate for Transporter</label>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="controls mt-2">
                            <label><input type="checkbox" name="is_same_shipping" value="1"
                                    id="is_same_shipping">
                                Duplicate for Supplier</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="invoice-cont" style="font-size: 13px;width:100%">
                <div class="col-md-12">
                    <!-- col-lg-12 start here -->
                    <div class="panel panel-default plain" id="dash_0">
                        <!-- Start .panel -->
                        <div class="panel-body p30">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-items">
                                        <div class="table-responsive" style="overflow: hidden; outline: none;"
                                            tabindex="0">
                                            <table class="table"
                                                style="border: 1px solid #000;margin-bottom:0;">
                                                
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%; padding:0px;">
                                                    <div class="invoice-from"
                                                        style="border-top:0px; border-left:0px; border-bottom:1px solid #000;border-right:1px solid #000;padding:0px 10px; ">
                                                        <ul class="list-unstyled text-left">
                                                            <li
                                                                style="font-weight: bold;font-size: 20px; margin-bottom: 0;">
                                                                <b>
                                                                    <?php if($organization->name): ?>
                                                                    <?php echo e($organization->name); ?>

                                                                    <?php endif; ?>
                                                                </b>

                                                            </li>
                                                            <li>
                                                                <?php if($organization->address1): ?>
                                                                <?php echo e($organization->address1); ?>

                                                                <?php endif; ?>
                                                            </li>
                                                            <li>
                                                                <?php if($organization->city): ?>
                                                                <?php echo e($organization->city); ?>

                                                                <?php endif; ?>
                                                            </li>
                                                            <li>
                                                                <?php if($organization->pincode): ?>
                                                                <?php echo e($organization->state_name . ' - ' . $organization->pincode); ?>

                                                                <?php endif; ?>
                                                            </li>

                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>Phone:</p>
                                                                <p class='col-10'>
                                                                    <?php echo e($invoice->phone ? '+91-' . $invoice->phone : ''); ?>

                                                                </p>
                                                            </li>

                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>
                                                                    GSTIN:</p>
                                                                <p class="col-10">
                                                                    <?php echo e($organization->gstin ? $organization->gstin : ''); ?>

                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="invoice-from"
                                                        style="border-top:0px; border-left:0px; border-bottom:1px solid #000;border-right:1px solid #000;padding:0px 10px; ">
                                                        <ul class="list-unstyled text-left">
                                                            <li>Consignee (Ship to)</li>
                                                            <li
                                                                style="font-weight: bold;font-size: 20px; margin-bottom: 0;">
                                                                <b>
                                                                    <?php echo e($invoice->customer_name); ?>

                                                                </b>

                                                            </li>
                                                            <li>
                                                                <?php echo e($invoice->address1); ?>

                                                                <?php echo e($invoice->states_name); ?>

                                                                - <?php echo e($invoice->pincode); ?>

                                                            </li>
                                                            <?php if($organization->phone): ?>
                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>Phone:</p>
                                                                <p class='col-10'>
                                                                    <?php echo e($organization->phone ? '+91-' . $organization->phone : ''); ?>

                                                                </p>
                                                            </li>
                                                            <?php endif; ?>
                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>
                                                                    GSTIN:</p>
                                                                <p class="col-10">
                                                                    <?php echo e($invoice->gstin ? $invoice->gstin : ''); ?>

                                                                </p>
                                                            </li>
                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>
                                                                    PAN:</p>
                                                                <p class="col-10">
                                                                    <?php echo e($invoice->pan ? $invoice->pan : ''); ?>

                                                                </p>
                                                            </li>
                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>
                                                                    State:</p>
                                                                <p class="col-10">
                                                                    <?php echo e($invoice->states_name); ?>

                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="invoice-from"
                                                        style="border-top:0px; border-left:0px; border-bottom:0px solid #000;border-right:1px solid #000;padding:0px 10px; ">
                                                        <ul class="list-unstyled text-left mb-0 pb-3">
                                                            <li>Buyer (Bill to)</li>
                                                            <li
                                                                style="font-weight: bold;font-size: 20px; margin-bottom: 0;">
                                                                <b>
                                                                    <?php echo e($invoice->customer_name); ?>

                                                                </b>

                                                            </li>
                                                            <li>
                                                                <?php echo e($invoice->address1); ?>

                                                                <?php echo e($invoice->states_name); ?>

                                                                - <?php echo e($invoice->pincode); ?>

                                                            </li>
                                                            <?php if($organization->phone): ?>
                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>Phone:</p>
                                                                <p class='col-10'>
                                                                    <?php echo e($organization->phone ? '+91-' . $organization->phone : ''); ?>

                                                                </p>
                                                            </li>
                                                            <?php endif; ?>
                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>
                                                                    GSTIN:</p>
                                                                <p class="col-10">
                                                                    <?php echo e($invoice->gstin ? $invoice->gstin : ''); ?>

                                                                </p>
                                                            </li>
                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>
                                                                    PAN:</p>
                                                                <p class="col-10">
                                                                    <?php echo e($invoice->pan ? $invoice->pan : ''); ?>

                                                                </p>
                                                            </li>
                                                            <li style="display: flex;align-items:center;">
                                                                <p class='col-2'>
                                                                    State:</p>
                                                                <p class="col-10">
                                                                    <?php echo e($invoice->states_name); ?>

                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="p-0">
                                                    <ul class="list-unstyled">
                                                        <div class="d-flex"
                                                            style=" border-bottom:1px solid #000;padding:0px 10px;">
                                                            <li class="col-6"
                                                                style="border-right: 1px solid #000;">
                                                                <p>Invoice No.</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->invoice_prefix); ?>

                                                                        <?php echo e($invoice->invoice_number); ?>

                                                                        <?php echo e($invoice->invoice_postfix); ?>


                                                                    </b></p>
                                                            </li>
                                                            <li class="col-6 pl-2">
                                                                <p>Date:</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->bill_date ? \Carbon\Carbon::now()->toDateString($invoice->bill_date, 'd-M-Y') : ''); ?>


                                                                    </b></p>

                                                            </li>
                                                        </div>
                                                        <div class="d-flex"
                                                            style=" border-bottom:1px solid #000;padding:0px 10px;">
                                                            <li class="col-6"
                                                                style="border-right: 1px solid #000;">
                                                                <p>Challan Date:</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->challan_date ? \Carbon\Carbon::now()->toDateString($invoice->challan_date, 'd-M-Y') : ''); ?>


                                                                    </b></p>
                                                            </li>
                                                            <li class="col-6 pl-2">
                                                                <p>P.O
                                                                    no.:</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->order_no ? $invoice->order_no : ''); ?>


                                                                    </b></p>

                                                            </li>
                                                        </div>
                                                        <div class="d-flex"
                                                            style=" border-bottom:1px solid #000;padding:0px 10px;">
                                                            <li class="col-6"
                                                                style="border-right: 1px solid #000;">
                                                                <p>L.R no.:</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->lrno ? $invoice->lrno : ''); ?>


                                                                    </b></p>
                                                            </li>
                                                            <li class="col-6 pl-2">
                                                                <p>E-Way
                                                                    no.:</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->eway ? $invoice->eway : ''); ?>


                                                                    </b></p>

                                                            </li>
                                                        </div>
                                                        <div class="d-flex"
                                                            style=" border-bottom:1px solid #000;padding:0px 10px;">
                                                            <li class="col-6"
                                                                style="border-right: 1px solid #000;">
                                                                <p>Transport</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->tranport_name ? $invoice->tranport_name : ''); ?>


                                                                    </b></p>
                                                            </li>
                                                            <li class="col-6 pl-2">
                                                                <p>Trans
                                                                    ID</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->transport_transport_id ? $invoice->transport_transport_id : ''); ?>


                                                                    </b></p>

                                                            </li>
                                                        </div>
                                                        <div class="d-flex"
                                                            style=" border-bottom:1px solid #000;padding:0px 10px;">
                                                            <li class="col-6"
                                                                style="border-right: 1px solid #000;">
                                                                <p>Vehicle
                                                                    no.</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->transport_vehicle_no ? $invoice->transport_vehicle_no : ''); ?>


                                                                    </b></p>
                                                            </li>
                                                            <li class="col-6 pl-2">
                                                                <p>Place
                                                                    of supply</p>
                                                                <p><b>
                                                                        <?php echo e($invoice->states_name ? $invoice->states_name . '(' . $invoice->scode . ')' : ''); ?>


                                                                    </b></p>

                                                            </li>
                                                        </div>
                                    </div>
                                    <div style="padding:0px 10px;">
                                        <li>
                                            <p>Terms of Delivery</p>

                                        </li>

                                    </div>


                                    </ul>
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>

                                    <table style="border: 1px solid #000000; border-top:0px;width:100%;">
                                        <thead class="text-center">
                                            <th style="border:1px solid #000000; padding:5px;border-top:0px">
                                                SI No.</th>
                                            <th colspan="4"
                                                style="border:1px solid #000000; padding:5px;border-top:0px;">
                                                Description of Goods
                                            </th>
                                            <th style="border:1px solid #000000; padding:5px;border-top:0px">
                                                HSN/SAC</th>
                                            <th style="border:1px solid #000000; padding:5px;border-top:0px">
                                                Quantity</th>
                                            <th style="border:1px solid #000000; padding:5px;border-top:0px">
                                                Rate<br>(Incl. of Tax)</th>
                                            <th style="border:1px solid #000000; padding:5px;border-top:0px">
                                                Rate</th>
                                            <th style="border:1px solid #000000; padding:5px;border-top:0px">
                                                per</th>
                                            <th colspan="2"
                                                style="border:1px solid #000000; padding:5px;border-top:0px">
                                                Amount</th>
                                        </thead>
                                        <tbody style="vertical-align: baseline">
                                            <?php if(count($invoice_items) > 0): ?>
                                            <?php
                                                $totalItemsQuantity = 0; 
                                                $ProductName = '';
                                                $ProductTotal = 0;
                                            ?>
                                                <?php $__currentLoopData = $invoice_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $totalItemsQuantity += $item->quantity;
                                                    $ProductName = $item->hidden_item_product_name;
                                                    $ProductTotal += round($item->total);

                                                    $gstRate = $item->gst / 100; 

                                                    $totalExcludingTax = $item->total / (1 + $gstRate);

                                                    $cgst = $totalExcludingTax * ($gstRate / 2);
                                                    $sgst = $totalExcludingTax * ($gstRate / 2);

                                                    $totalWithTax = $item->total;
                                                    $roundoff = round($totalWithTax) - $totalWithTax;

                                                ?>

                                                <tr style="border-bottom: 1px solid #000">
                                                    <td style="border-right:1px solid #000;padding:5px ">
                                                        01
                                                    </td>
                                                    <td colspan="4"
                                                        style="border-right:1px solid #000;padding:5px ">
                                                        <b><?php echo e($item->hidden_item_product_name); ?></b>
                                                        <div
                                                            class="d-flex align-items-center mt-5 justify-content-between">
                                                            <p>Less:</p>
                                                            <div>
                                                                <p><b>CGST</b></p>
                                                                <p><b>SGST</b></p>
                                                                <p><b>R OFF</b></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td style="border-right:1px solid #000;padding:5px ">
                                                        <p><?php echo e($item->hsncode); ?></p>
                                                    </td>
                                                    <td style="border-right:1px solid #000;padding:5px ">
                                                        <b><?php echo e($item->quantity); ?> </b>
                                                    </td>
                                                    <td style="border-right:1px solid #000;padding:5px ">
                                                        <p></p>
                                                    </td>
                                                    <td style="border-right:1px solid #000;padding:5px ">
                                                        <p><?php echo e($item->price); ?></p>
                                                    </td>
                                                    <td style="border-right:1px solid #000;padding:5px ">
                                                        <p>Beg</p>
                                                    </td>
                                                    <td class="text-right"
                                                        style="border-right:1px solid #000;padding:5px">
                                                        <b><?php echo e(number_format(round($item->total), 2)); ?></b>
                                                        <div class=" mt-5 ">
                                                            <div>
                                                                <p><b><?php echo e(number_format($cgst, 2)); ?></b></p>
                                                                <p><b><?php echo e(number_format($sgst, 2)); ?></b></p>
                                                                
                                                                <p><b><?php echo e(number_format($roundoff, 2)); ?></b></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>


                                        </tbody>
                                        <tfoot class="text-center" style="border-top:1px solid #000 ">
                                            <td style="border-right:1px solid #000;padding:5px"></td>
                                            <td class="text-right" colspan="4"
                                                style="border-right:1px solid #000;padding:5px;">
                                                Total
                                            </td>
                                            <td style="border-right:1px solid #000;padding:5px"></td>
                                            <td style="border-right:1px solid #000;padding:5px">
                                                <b><?php echo e($totalItemsQuantity); ?> </b>
                                            </td>
                                            <td style="border-right:1px solid #000;padding:5px">

                                            </td>
                                            <td style="border-right:1px solid #000;padding:5px">

                                            </td>
                                            <td style="border-right:1px solid #000;padding:5px">

                                            </td>
                                            <td class="text-right"
                                                style="border-right:1px solid #000;padding:5px">
                                                <b>₹ <?php echo e(number_format(round($ProductTotal), 2)); ?></b>
                                            </td>

                                        </tfoot>
                                    </table>
                                    <div class="word_price p-3" style="border:1px solid #000;border-top:0px;">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p>Amount Chargeable (in words)</p>
                                            <p>E. & O.E</p>
                                        </div>
                                        <?php
                                            function numberToWords($number)
                                            {
                                                $fmt = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                                                return ucfirst($fmt->format($number)); // ucfirst to capitalize the first letter
                                            }

                                            // Assuming $ProductTotal contains the total value
                                            $ProductTotal = $ProductTotal;

                                            // Convert the total to words
                                            $totalInWords = numberToWords($ProductTotal);
                                        ?>
                                        <h6 class="mt-2 ammount-words" ><b>INR <?php echo e($totalInWords); ?> Only</b></h6>
                                    </div>
                                    <table lass="table"
                                        style="border: 1px solid #000;margin-bottom:0; border-top:0px;width:100%;">
                                        <thead>
                                            <th colspan="4" class="text-center"
                                                style="border-right:1px solid #000;padding:5px">HSN/SAC</th>
                                            <th class="text-center"
                                                style="border-right:1px solid #000;padding:5px">
                                                Taxable<br>Value</th>
                                            <th colspan="3" class="text-center"
                                                style="border-right:1px solid #000;padding:0;">CGST
                                                <div class="anount d-flex justify-content-between text-center"
                                                    style="border-top:1px solid #000; ">
                                                    <p class="col-6 " style='border-right:1px solid #000;'>Rate
                                                    </p>
                                                    <p class="col-6 pl-2">Amount</p>
                                                </div>
                                            </th>
                                            <th colspan="3" class="text-center"
                                                style="border-right:1px solid #000;padding:0;">SGST/UTGST
                                                <div class="anount d-flex justify-content-between text-center"
                                                    style="border-top:1px solid #000; ">
                                                    <p class="col-6" style='border-right:1px solid #000;'>
                                                        Rate</p>
                                                    <p class="col-6 pl-2">Amount</p>
                                                </div>
                                            </th>
                                            <th colspan="4" class="text-center"
                                                style="border-right:1px solid #000;padding:5px">Total<br>Tax
                                                Amoun</th>
                                        </thead>
                                        <tbody class="text-center" style="border-top:1px solid #000; ">
                                            <?php if(count($invoice_items) > 0): ?>
                                                <?php
                                                    $totalItemsPrice = 0; 
                                                    $ProductName = '';
                                                    $ProductTotal = 0;
                                                    $TotalCgst = 0;
                                                    $TotalSgst = 0;
                                                ?>
                                                
                                                <?php $__currentLoopData = $invoice_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php
                                                    $totalItemsPrice += $item->price;
                                                    $ProductTotal += round($item->total);

                                                    $gstRate = $item->gst / 100; 

                                                    $totalExcludingTax = $item->total / (1 + $gstRate);

                                                    $second_cgst = $totalExcludingTax * ($gstRate / 2);
                                                    $second_sgst = $totalExcludingTax * ($gstRate / 2);

                                                    $TotalCgst +=  $second_cgst;
                                                    $TotalSgst +=  $second_sgst;

                                                    $totalWithTax = $item->total;
                                                    $roundoff = round($totalWithTax) - $totalWithTax;

                                                ?>
                                                <tr>
                                                    <td colspan="4" style="border-right:1px solid #000;padding:5px">
                                                        <?php echo e($item->hsncode); ?>

                                                    </td>
                                                    <td style="border-right:1px solid #000;padding:5px"><?php echo e(number_format(round($item->price), 2)); ?>

                                                    </td>
                                                    <td colspan="3" style='border-right:1px solid #000;padding:0;'>
                                                        <div
                                                            class="anount_rate d-flex justify-content-between text-center">
                                                            <p class="col-6" style='border-right:1px solid #000;'>
                                                                <?php echo e($item->gst/2); ?>%</p>
                                                            <p class="col-6 pl-2"><?php echo e(number_format($second_cgst, 2)); ?></p>
                                                        </div>
                                                    </td>
                                                    <td colspan="3" style='border-right:1px solid #000;padding:0px'>
                                                        <div
                                                            class="anount_rate d-flex justify-content-between text-center">
                                                            <p class="col-6" style='border-right:1px solid #000;'>
                                                                <?php echo e($item->gst/2); ?>%</p>
                                                            <p class="col-6 pl-2"><?php echo e(number_format($second_sgst, 2)); ?></p>
                                                        </div>
                                                    </td>
                                                    <td style="border-right:1px solid #000;padding:5px">
                                                        <?php echo e(number_format(round($item->total), 2)); ?>

                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <tr style="border-top: 1px solid #000;">
                                                <td class="text-right" colspan="4"
                                                    style="border-right:1px solid #000;padding:5px">
                                                    <b>Total</b>
                                                </td>
                                                <td style="border-right:1px solid #000;padding:5px">
                                                    <b><?php echo e(number_format(round($totalItemsPrice), 2)); ?></b>
                                                </td>
                                                <td colspan="3" style='border-right:1px solid #000;padding:0;'>
                                                    <div
                                                        class="anount_rate d-flex justify-content-between text-center">
                                                        <p class="col-6" style='border-right:1px solid #000;'>
                                                        </p>
                                                        <p class="col-6 pl-2"><b><?php echo e(number_format($TotalCgst,2)); ?></b></p>
                                                    </div>
                                                </td>
                                                <td colspan="3" style='border-right:1px solid #000;padding:0;'>
                                                    <div
                                                        class="anount_rate d-flex justify-content-between text-center">
                                                        <p class="col-6" style='border-right:1px solid #000;'>
                                                        </p>
                                                        <p class="col-6 pl-2"><b><?php echo e(number_format($TotalSgst,2)); ?></b></p>
                                                    </div>
                                                </td>
                                                <td style="border-right:1px solid #000;padding:5px">
                                                    <b ><?php echo e(number_format(round($ProductTotal), 2)); ?></b>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <div class="decs "
                                        style="border: 1px solid #000;border-top:0;padding:5px 0px 0px 5px;">
                                        <div class="amt d-flex ">
                                            <p>Tax Amount (in words)</p>
                                            <h6 class="ammount-words"><b>: INR <?php echo e($totalInWords); ?> Only</b></h6>

                                        </div>
                                        <div class="sign d-flex mt-5">
                                            <div class="col-6">
                                                <p style="text-decoration: underline">Declaration</p>
                                                <p>We declare that this invoice shows the actual price of the
                                                    goods described and that all particulars are true and
                                                    correct.</p>
                                            </div>
                                            <div class="col-6 sin text-right"
                                                style="border: 1px solid #000;border-bottom:0;border-right:0;">
                                                <h6>
                                                    <b>for 
                                                        <?php if($organization->name): ?>
                                                            <span class="text-uppercase"><?php echo e($organization->name); ?></span>
                                                        <?php endif; ?>
                                                    </b>
                                                </h6>
                                                <p class="mt-4">Authorised Signatory</p>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- col-lg-12 end here -->
                    </div>
                    <!-- End .row -->
                </div>
            </div>
        </div>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/saleinvoice/print.blade.php ENDPATH**/ ?>
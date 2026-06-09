<?php $__env->startSection('content'); ?>
<div class="top-stickybar">
    <div class="container-fluid">
        <div class="row d-flex justify-content-end align-items-center">
            <div class="col-4 pl-0">
                <h1>Admin Details</h1>
            </div>
            <div class="col-8 text-right">
                <!--<a href="#" class="btn btn-light mr-2">Edit</a>-->
                <?php  $url = http_build_query(Request::query());   ?>
				<a href="<?php echo e(url('point-of-sale-download?'.$url)); ?>" class="btn btn-light mr-2">Download PDF</a>
                <!--<button id="" name="" value="" class="btn btn-primary">Print</button>-->

                <a target="_blank" href="<?php echo e(url('print-invoice-purchase?'.$url.'&download=pdf')); ?>">Print</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid main-container">
    <div class="inoice-page-container">
        <div class="container bootdey">
            <div class="row invoice row-printable">
                <div class="invoice-printing-opt">
                    <h5><i class="fa fa-print mr-2"></i> Invoice printing options</h5>
                    <div class="row">
                        <div class="col-lg-3 pl-5">
                            <div class="controls mt-2">
                                <label><input type="checkbox" name="is_same_shipping" value="1" checked=""
                                        id="is_same_shipping"> Original for Recipient</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="controls mt-2">
                                <label><input type="checkbox" name="is_same_shipping" value="1" id="is_same_shipping">
                                    Duplicate for Transporter</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="controls mt-2">
                                <label><input type="checkbox" name="is_same_shipping" value="1" id="is_same_shipping">
                                    Duplicate for Supplier</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-cont" style="font-size: 13px;">
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
                                                <table>
                                                    <thead>
                                                        <th>
                                                            <div class="invoice-logo">
                                                                <?php if($organization->logo_image): ?>
                                                                <!-- <img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"> -->
                                                                <img width="100" src="<?php echo e(asset('org_logos/'.$organization->logo_image)); ?>" alt="Invoice logo">
                                                                <?php endif; ?>
                                                            </div>
                                                        </th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="invoice-from">
                                                                    <ul class="list-unstyled text-left">
                                                                        <li style="font-weight: bold;font-size: 20px; margin-bottom: 0;">
                                                                            <?php if($organization->name): ?>
                                                                            <?php echo e($organization->name); ?>

                                                                            <?php endif; ?>
                                                                        </li>
                                                                        <li><?php if($organization->address1): ?>
                                                                            <?php echo e($organization->address1); ?>

                                                                            <?php endif; ?></li>
                                                                        <li><?php if($organization->city): ?>
                                                                            <?php echo e($organization->city); ?>

                                                                            <?php endif; ?></li>
                                                                        <li><?php if($organization->pincode): ?>
                                                                            <?php echo e($organization->state_name .' - '. $organization->pincode); ?>

                                                                            <?php endif; ?></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <ul class="list-unstyled text-right">
                                                                    <li style="display: inline-block; min-width: 51%;width: auto;margin-bottom: 5px;">
                                                                        Original for receipient
																	</li>
                                                                    <li style="display: inline-block; min-width: 51%;width: auto;border-bottom: 2px solid #000;margin-bottom: 10px;padding-bottom: 5px;">
                                                                        <b>Date:</b> <?php echo e($invoice->bill_date ? \Carbon\Carbon::now()->toDateString($invoice->bill_date,'d-M-Y') : ''); ?>

                                                                    </li>
                                                                    <?php if($organization->phone): ?>
                                                                    <li style="display: inline-block; min-width: 51%;width: auto;margin-bottom: 0px;">
                                                                        <b>Phone:</b>  <?php echo e($organization->phone ? '+91-' .$organization->phone : ''); ?>

                                                                    </li>
                                                                    <?php endif; ?>
                                                                    <li style="display: inline-block; min-width: 51%;width: auto;margin-bottom: 5px;">
                                                                        <b style="font-size: 18px;">GSTIN:</b>  <?php echo e($organization->gstin ? $organization->gstin : ''); ?>

                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table" style="border: 1px solid #000;margin-bottom:0;">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="6" style="text-align: left;"><b>TAX INVOICE</b>
                                                            </th>
                                                            <th colspan="6" style="text-align: right;"><b>Invoice no.
                                                                    <span><?php echo e($invoice->invoice_prefix); ?> <?php echo e($invoice->invoice_number); ?> <?php echo e($invoice->invoice_postfix); ?> </span></b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="6" style="width: 50%;">
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">Bill
                                                                        to</b> <span
                                                                        style="display: inline-block;vertical-align: top;"><?php echo e($invoice->customer_name); ?></span>
                                                                </p>
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">Address</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;"><?php echo e($invoice->address); ?><br /></span>
                                                                </p>
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">Phone</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">
                                                                        <?php echo e($invoice->phone ? '+91-'.$invoice->phone : ''); ?>

                                                                    </span>
                                                                </p>
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">GSTIN</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;"> <?php echo e($invoice->gst_number ? $invoice->gst_number : ''); ?></span>
                                                                </p>
                                                                <p><b
                                                                        style="display: inline-block;vertical-align: top;width:80px">PAN</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;"> <?php echo e($invoice->pan_number ? $invoice->pan_number : ''); ?></span>
                                                                </p>
                                                            </td>
                                                            <td colspan="6"
                                                                style="width: 50%;border-left: 1px solid #000;">
                                                                <div style="width: 100%;float: left;">
                                                                    <div style="width:50%;float:left;"><b
                                                                            style="display: inline-block;vertical-align: top;width:105px">Challan
                                                                            Date:</b> <span
                                                                            style="display: inline-block;vertical-align: top;"><?php echo e($invoice->challan_date ? \Carbon\Carbon::now()->toDateString($invoice->challan_date,'d-M-Y') : ''); ?></span>
                                                                    </div>
                                                                    <div style="width:50%;float:left;"><b
                                                                            style="display: inline-block;vertical-align: top;width:95px">P.O
                                                                            no.:</b> <span
                                                                            style="display: inline-block;vertical-align: top;"><?php echo e($invoice->order_no ? $invoice->order_no : ''); ?></span>
                                                                    </div>
                                                                    <div style="width:50%;float:left;"><b
                                                                            style="display: inline-block;vertical-align: top;width:105px">L.R
                                                                            no.:</b> <span
                                                                            style="display: inline-block;vertical-align: top;"><?php echo e($invoice->lrno ? $invoice->lrno : ''); ?></span>
                                                                    </div>
                                                                    <div style="width:50%;float:left;"><b
                                                                            style="display: inline-block;vertical-align: top;width:95px">E-Way
                                                                            no.:</b> <span
                                                                            style="display: inline-block;vertical-align: top;"><?php echo e($invoice->eway ? $invoice->eway : ''); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div style="width: 100%;float: left; margin-top: 10px;">
                                                                    <b
                                                                        style="display: inline-block;vertical-align: top;width:105px">Transport</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;"><?php echo e($invoice->tranport_name ? $invoice->tranport_name : ''); ?></span>
                                                                </div>
                                                                <div style="width: 100%;float: left; margin-top: 10px;">
                                                                    <b
                                                                        style="display: inline-block;vertical-align: top;width:105px">Trans
                                                                        ID</b> <span
                                                                        style="display: inline-block;vertical-align: top;"><?php echo e($invoice->transport_transport_id ? $invoice->transport_transport_id : ''); ?></span>
                                                                </div>
                                                                <div style="width: 100%;float: left; margin-top: 10px;">
                                                                    <b
                                                                        style="display: inline-block;vertical-align: top;width:105px">Vehicle
                                                                        no.</b> <span
                                                                        style="display: inline-block;vertical-align: top;"><?php echo e($invoice->transport_vehicle_no ? $invoice->transport_vehicle_no : ''); ?></span>
                                                                </div>
                                                                <div style="width: 100%;float: left; margin-top: 10px;">
                                                                    <b
                                                                        style="display: inline-block;vertical-align: top;width:105px">Place
                                                                        of supply</b> <span
                                                                        style="display: inline-block;vertical-align: top;"><?php echo e($invoice->states_name ? $invoice->states_name .'('.$invoice->scode.')' : ''); ?></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table style="border: 1px solid #000000;">
                                                    <thead>
                                                        <th style="border:1px solid #000000; padding:5px">No.</th>
                                                        <th style="border:1px solid #000000; padding:5px">Product/Item
                                                        </th>
                                                        <th style="border:1px solid #000000; padding:5px">HSN Code</th>
                                                        <th style="border:1px solid #000000; padding:5px">Qty</th>
                                                        <th style="border:1px solid #000000; padding:5px">Price</th>
                                                        <th style="border:1px solid #000000; padding:5px">Discount</th>
                                                        <th style="border:1px solid #000000; padding:5px">GST</th>
                                                        <th style="border:1px solid #000000; padding:5px">Cess</th>
                                                        <th style="border:1px solid #000000; padding:5px">Amount</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php if( count($invoice_items) > 0  ): ?>
                                                            <?php $__currentLoopData = $invoice_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <tr>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($key +1); ?></td>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($item->hidden_item_product_name); ?></td>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($item->hsncode); ?>

                                                                    </td>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($item->quantity); ?></td>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($item->price); ?>

                                                                    </td>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($item->discount); ?></td>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($item->gst); ?></td>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($item->cessrate); ?></td>
                                                                    <td style="border:1px solid #000000; padding:5px"><?php echo e($item->total); ?>

                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="6"
                                                                style="width: 50%;padding: 10px; vertical-align: top;"
                                                                rowspan="2">
                                                                <p style="font-size: 16px;font-weight: 700;">Our bank
                                                                    details</p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Bank
                                                                        name</b> <span
                                                                        style="display: inline-block;vertical-align: top;"><?php if($banks!=""): ?><?php echo e($banks->bank_name); ?><?php endif; ?></span>
                                                                </p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Account
                                                                        no.</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;"><?php if($banks!=""): ?><?php echo e($banks->account_no); ?><?php endif; ?></span>
                                                                </p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Branch
                                                                        & IFSC</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;"><?php if($banks!=""): ?><?php echo e($banks->branch_name); ?> <?php echo e($banks->ifsc_code ? '& '.$banks->ifsc_code : ''); ?><?php endif; ?></span>
                                                                </p>
                                                            </td>
                                                            <td colspan="6"
                                                                style="width: 50%;border-left: 1px solid #000;padding:10px">
                                                                <div style="width: 100%;float: left;">
                                                                    <div style="width:100%;float:left;"><span
                                                                            style="display: inline-block;vertical-align: top;text-align:left;">Total
                                                                            Taxable Amount</span> <span
                                                                            style="display: inline-block;text-align: right;float:right;"><?php echo e($invoice->total_taxable); ?></span>
                                                                    </div>
                                                                    <div style="width:100%;float:left;"><span
                                                                            style="display: inline-block;vertical-align: top;text-align:left;">Total
                                                                            Tax</span> <span
                                                                            style="display: inline-block;text-align: right;float:right;"><?php echo e($invoice->total_tax); ?></span>
                                                                    </div>
                                                                    <div style="width:100%;float:left;"><span
                                                                            style="display: inline-block;vertical-align: top;text-align:left;">Additional
                                                                            Charge</span> <span
                                                                            style="display: inline-block;text-align: right;float:right;"><?php echo e($invoice->other_charges); ?></span>
                                                                    </div>
                                                                    <div style="width:100%;float:left;"><span
                                                                            style="display: inline-block;vertical-align: top;text-align:left;">Discount</span>
                                                                        <span
                                                                            style="display: inline-block;text-align: right;float:right;"><?php echo e($invoice->total_discount_in_amount); ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="6"
                                                                style="width: 50%;border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                <div style="width: 100%;float: left;">
                                                                    <div style="width:100%;float:left;"><b
                                                                            style="vertical-align: top;float:left">Total
                                                                            Amount (E. & O.E)</b> <span
                                                                            style="vertical-align: top;text-align:right;float:right;">Rs.
                                                                            <?php echo e($invoice->grand_total); ?></span>
                                                                    </div>
                                                                </div>
                                                                <p style="text-align:right"><?php echo e($invoice->hidden_grandtotalwords); ?></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6"
                                                                style="width: 50%;border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                <p style="text-align:left;margin-bottom:0;">Due date:
                                                                    <span>25-May-2021</span>
                                                                </p>
                                                            </td>
                                                            <td colspan="6"
                                                                style="width: 50%;border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                <p style="margin-bottom:0;">Tax payable on Reverse
                                                                    Charge <span
                                                                        style="vertical-align: top;text-align:right;float:right;"><?php echo e($invoice->reverse_charge == 'yes' ? 'YES' :'NO'); ?></span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <table class="table" style="width: 100%;border:1px solid #000000;">
                                                    <thead>
                                                        <!-- <tr>
                                                            <th rowspan="2" colspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                HSN Code</th>
                                                            <th rowspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Taxable value</th>
                                                            <th colspan="3"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                CGST</th>
                                                            <th colspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                SGST</th>
                                                            <th rowspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Cess</th>
                                                            <th rowspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Total</th>
                                                        </tr> -->
                                                        <!-- <tr style="border-bottom: 1px solid #000;">
                                                            <th colspan="1"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Rate</th>
                                                            <th colspan="2"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Amount</th>
                                                            <th colspan="1"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Rate</th>
                                                            <th colspan="1"
                                                                style="border-top: 1px solid #000;border-left: 1px solid #000;padding:10px">
                                                                Amount</th>
                                                        </tr> -->
                                                    </thead>
                                                    <!-- <tbody>

                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                55555</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                1098.00</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                9%</td>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                198</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                9%</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                98</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                50</td>
                                                            <td
                                                                style="padding:5px 10px;border-top: 0;border-left: 1px solid #000;">
                                                                247</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                55555</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                1098.00</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                9%</td>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                198</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                9%</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                98</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;border-top: 0;">
                                                                50</td>
                                                            <td
                                                                style="padding:5px 10px;border-top: 0;border-left: 1px solid #000;">
                                                                247</td>
                                                        </tr>
                                                    </tbody> -->
                                                    <tfoot>
                                                        <!-- <tr>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                Total</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                1098.00</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                            </td>
                                                            <td colspan="2"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                198</td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                            </td>
                                                            <td colspan="1"
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                98</td>
                                                            <td
                                                                style="padding:5px 10px;border-left: 1px solid #000;font-weight: bold;">
                                                                50</td>
                                                            <td
                                                                style="padding:5px 10px;font-weight: bold;border-left: 1px solid #000;">
                                                                247</td>
                                                        </tr> -->
                                                        <tr>
                                                            <td colspan="6" style="width: 50%;">
                                                                <p style="font-size: 16px;font-weight: 700;"><?php echo e($invoice_option->term_condition_title); ?></p>
                                                                <ul>
                                                                    <li>
                                                                        <?php echo e($invoice_option->term_condition); ?>

                                                                    </li>
                                                                    <!-- <li>Good once sold will not be taken back or
                                                                        returned</li>
                                                                    <li>Our responsibility Ceases as soon as goods
                                                                        leaves our Premises</li>
                                                                    <li>If payment is not mad ewithin 10 days, interest
                                                                        will be charged @2% P.M.</li> -->
                                                                </ul>
                                                            </td>
                                                            <td colspan="6"
                                                                style="width: 50%;border-left: 1px solid #000000;">
                                                                <p style="font-size: 16px;">For  <?php echo e($organization->name); ?></p>
                                                                <p style="margin-top: 90px;text-align: right;">
                                                                    Authorised Signatory</p>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col-lg-12 end here -->
                                </div>
                                <!-- End .row -->
                            </div>
                        </div>
                        <!-- End .panel -->
                    </div>
                </div>
                <!-- col-lg-12 end here -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/point-of-sale/print.blade.php ENDPATH**/ ?>
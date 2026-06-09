<?php $__env->startSection('content'); ?>

<div class="page-content">
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h4>Sales Inward Report</h4>
                </div>
                <div class="col-8 text-right">
                    
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid ">
        <div class="main-form-container mt-4 bg-white">
            <div class="container">
                
                <div class="form_body mt-4 px-2 py-4">
                    <form action="<?php echo e(url('/sales-inward-invoice')); ?>" id="sale_form">
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="form_filed mb-4 col-2">
                                <label for="name-f">Customer/Vendor:</label>
                                <select id="customers" class="custom-select" name="customer_vendor_id[]" multiple>
                                    <option value="">Select Customer</option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <p class="error mb-0 mt-1 text-danger"></p>
                            </div>
                            <div class="form_filed mb-4 col-3">
                                <label for="name-f">Payment Type:</label>
                                <select class="custom-select" id="payment_type" name="payment_type">
                                    <option selected value="">---All Payment---</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="online_transfer">Online/Transfer</option>
                                    <option value="bank_transfer">Bank/Transfer</option>
                                    <option value="cash-tds">TDS</option>
                                    <option value="cash-bad-debts-kasar">Bad Debts / Kasar</option>
                                    <option value="currency-exchange-loss">Currency Exchange Loss</option>
                                </select>
                                <p class="error mb-0 mt-1 text-danger"></p>
                            </div>
                            <div class="form_filed mb-4 col-2">
                                <label for="name-f">Form Date:</label>
                                <input type="date" name="fromdate" id="fromdate" class="form-control">
                                <p class="error mb-0 mt-1 text-danger"></p>
                            </div>
                            <div class="form_filed mb-4 col-2">
                                <label for="name-f">To Date:</label>
                                <input type="date" name="todate" id="todate" class="form-control">
                                <p class="error mb-0 mt-1 text-danger"></p>
                            </div>
                        </div>
                        <div class="search_btn text-right">
                            <button class="btn btn-primary" type="submit"> <i class="fal fa-search"></i>Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php if($salesInward): ?>
    <div class="container-fluid  ">
        <div class="main-form-container mt-4 mb-4 bg-white">
                <div id="sales-data">
                    <div class="card border-0">
                        <div class="card-header bg-white border-0">
                            <div class="row justify-content-between">
                                <?php $__currentLoopData = $customerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-6">
                                        <h3 class="customer_name text-capitalize"><?php echo e($customer->name); ?></h3>
                                        <p class="customer_address"><?php echo e($customer->address1); ?></p>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <div class="sale_register d-flex justify-content-center flex-column align-items-center">
                                <h4 class="sale_info text-capitalize">Sales Inward Report</h4>
                                <p class="date_info"><?php echo e($from_date); ?> to <?php echo e($to_date); ?></p>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive table-card">
                                                <table class="table table-hover table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr class="text-muted text-uppercase">
                                                            <th style="width: 2%;"></th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Invoice ID</th>
                                                            <th scope="col">Client</th>
                                                            <th scope="col">Billed</th>
                                                            <th scope="col" style="width: 16%;">Payment Type</th>
                                                        </tr>
                                                    </thead>
                
                                                    <tbody>
                                                        <?php
                                                            $totalPrice = 0;
                                                        ?>
                                                        <?php $__currentLoopData = $salesInward; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo e($inward->payment_date); ?></td>
                                                            <td><p class="fw-medium mb-0"><?php echo e($inward->receipt_no); ?></p></td>
                                                            <td>
                                                                <a href="#javascript: void(0);" class="text-body align-middle fw-medium"><?php echo e($inward->name); ?></a>
                                                            </td>
                                                            <td><?php echo e($inward->amount); ?></td>
                                                            <td><span class="badge bg-success-subtle text-success p-2 text-capitalize"><?php echo e($inward->payment_type); ?></span></td>
                                                        </tr>
                                                        <?php
                                                            $totalPrice += $inward->amount;
                                                        ?>        
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody><!-- end tbody -->

                                                    <tfoot>
                                                        <td scope="col"></td>
                                                        <td scope="col"></td>
                                                        <td scope="col" class="text-bold">Total</td>
                                                        <td scope="col"></td>
                                                        <td scope="col"><?php echo e(number_format($totalPrice, 2, '.', '')); ?></td>
                                                        <td scope="col"></td>
                                                    </tfoot>
                                                </table><!-- end table -->
                                            </div><!-- end table responsive -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end py-4 gap-2 ">
                                <a href="#" class="btn btn-success mr-4">Print</a>
                                <a href="<?php echo e(url('export-inward-sales-report')); ?>" class="btn btn-success mr-4">Export</a>
                                <a href="#" class="btn btn-success mr-4">Download PDF</a>
                                <a href="#" class="btn btn-success">Send Mail</a>
                            </div>
        
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php endif; ?>

</div>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

    <script src="<?php echo e(asset('public/js/general.js')); ?>"></script>

    <script src="<?php echo e(asset('public/js/customer.js')); ?>"></script>

    <script src="<?php echo e(asset('public/js/create_customer.js')); ?>"></script>

    <script>
        var show_export_fields_for_all = false;

        var SaleInvoiceWithoutPriceChange = '';

        var price_from_last_invoice = false;

        var productAllowed = true;

        var document_item_allowed = 25;

        var default_product_note = "";

        var quantity_decimal_rounding = 100;

        var price_decimal_rounding = 100;

        var gst_decimal_rounding = 100;

        var gst_rate_decimal_rounding = 100;

        var taxable_decimal_rounding = 100;

        var gst_decimal_rounding_by = 2;

        var gst_rate_decimal_rounding_by = 2;

        var quantity_decimal_rounding_by = 2;

        var price_decimal_rounding_by = 2;

        var inventory_enable = true;

        var allow_oversell = false;

        var discount_in = 'percentage';

        var discount_per_item = 0;

        var enable_round_off = 1;



        $(document).ready(function() {







            get_invoice_number();

            $("#customers,#PlaceofSupply,#selecttransport,.select2").select2({

                width: 'resolve'

            });



            $('#customers').on('change', function() {

                var customer = $(this).val();

                console.log(customer)

                var type = "customer";

                updateAddressData(customer, type);

            });



            $('#selecttransport').on('change', function() {

                var transport = $(this).val();

                // console.log(transport);

                updateTransport(transport);

            })



            $('.btn-add-row').on('click', function() {

                if (validateCurrentRows()) {

                    clonerow(this);
                    var row = $('.product-item-row');
                    var siblings = row.siblings();
                    siblings.each(function(index) {
                        $(this).children('td').first().find('.product-item-row-number').text(index +
                            1);
                    });

                }

            });



            $('.btn-remove-row').on('click', function() {
                if ($('.product-item-row').length > 1) {
                    $(this).parent().closest('.product-item-row').remove();
                    var row = $('.product-item-row');
                    var siblings = row.siblings();
                    siblings.each(function(index) {
                        $(this).children('td').first().find('.product-item-row-number').text(index +
                            1);
                    });
                }

                UpdateCalculations();

            });



            $(document).on("change", "#invoicetype", function() {

                SetIGTS();

            });



            $(document).on("change", "#reverse_Charge", function() {

                UpdateCalculations();

            });



            $(document).on("change", ".product_id", function() {

                // console.log('product_id');

                var product = $(this).val();

                var current = $(this);

                // console.log(product);

                if (product) {

                    get_product_by_id(product, current);

                }

            });



            if ($("#datepicker_lr").val() == "" && $("#datepicker_lr").attr("data-default-due") != "") {

                var ddd = $("#datepicker_lr").attr("data-default-due");

                $("#datepicker_lr").datepicker("setDate", "+" + ddd);

            }





        });



        $('#add-saleinvoice-form').validate({

            errorElement: 'span',

            errorClass: 'text-danger text-right',

            rules: {

                PlaceofSupply: {

                    required: true,

                },

                customer_vendor_id: {

                    required: true,

                },

                invoice_number: {

                    required: true

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

                if (validateCurrentRows()) {

                    $('input,select').prop('disabled', false);

                    $(form)[0].submit();

                }



            }

        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/reports/sales-inward-reports.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h1>Sales Reports</h1>
                </div>
                <div class="col-8 text-right">
                    
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid main-container">
        <div class="main-form-container">
            <div class="container">
                <div class="top_header">
                    <div class="row align-items-center justify-content-between pt-5 pb-4 border-bottom">
                        <div class="left_side">
                            <h5>Sales Report</h5>
                        </div>
                        <div class="rgt_side">
                            <a href="#" class="btn btn-light">Customize Report</a>
                        </div>
                    </div>
                </div>
                <div class="form_body mt-5">
                    <form action="<?php echo e(url('/sales-report-invoices')); ?>" id='sale_form'>
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
                                <label for="name-f">Product Group:</label>
                                <select class="custom-select" id="gender2">
                                    <option selected>---All Product Group---</option>
                                </select>
                            </div>
                            <div class="form_filed mb-4 col-3">
                                <label for="name-f">Products:</label>

                                <select name="product_id[]" class="product_id custom-select product-item select2"
                                    style="width:200px;" multiple>

                                    <option value="">Select Product</option>

                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                            <div class="form_filed mb-4 col-3">
                                <label for="name-f">Invoice Number:</label>
                                <input type="text" class="form-control" name="invoice-num" id="invoice_num">
                            </div>
                        </div>
                        <div class="search_btn text-right">
                            <button class="btn btn-info" type="submit"> <i class="fal fa-search"></i>Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php if($saleReportsData): ?>
        <div class="card border-0">
            <div class="card-header bg-white border-0">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h3 class="customer_name text-capitalize">Raman Enterprises</h3>
                        <p class="customer_address">3100,sector 71</p>
                        <p class="customer_distt">Mohali</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <?php $__currentLoopData = $customerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h3 class="owner_name text-capitalize"><?php echo e($data->name); ?></h3>
                            <p class="owner_address"><?php echo e($data->address1); ?> </p>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
                <div class="sale_register d-flex justify-content-center flex-column align-items-center">
                    <h4 class="sale_info text-capitalize">Sale register</h4>
                    <p class="mb-0">for product</p>
                    <p class="item text-capitalize">
                        <?php if($productNames->count() > 0): ?>
                            <?php echo e(implode(', ', $productNames->toArray())); ?>

                        <?php endif; ?>
                    </p>
                    <p class="date_info"><?php echo e($from_date); ?> to <?php echo e($to_date); ?></p>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Invoice Date</th>
                                <th scope="col">Company Name</th>
                                <th></th>
                                <th scope="col">Vch Type</th>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Taxable Value Total</th>
                                <th scope="col"></th>
                                <th scope="col">Grand Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $totalTaxablePrice = 0;
                                $grandTotal = 0;
                            ?>
                            <?php $__currentLoopData = $saleReportsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->bill_date); ?></td>
                                    <td><?php echo e($data->customer_vendor_id); ?></td>
                                    <td></td>
                                    <td><?php echo e($data->type); ?></td>
                                    <td><?php echo e($data->invoice_number); ?></td>
                                    <td><?php echo e($data->total_taxable); ?></td>
                                    <td></td>
                                    <td><?php echo e($data->item_total); ?></td>
                                </tr>
                                <?php
                                    $totalTaxablePrice += $data->total_taxable;
                                    $grandTotal += $data->item_total;
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td scope="row">Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo e($totalTaxablePrice); ?></td>
                                <td></td>
                                <td><?php echo e($grandTotal); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="button_grp mt-4">
            <a href="#" class="btn btn-success mr-4">Print</a>
            <a href="/export-sales-report" class="btn btn-success mr-4">Export</a>
            <a href="#" class="btn btn-success mr-4">Download PDF</a>
            <a href="#" class="btn btn-success">Send Mail</a>
        </div>
    <?php endif; ?>

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


        $('#sale_form').submit(function(e) {
            if ($.trim($("#customers").val()) === "" || $.trim($(".product_id").val()) === "" || $.trim($(
                    " #fromdate ").val()) === "" || $.trim($(" #todate ").val()) === "") {
                e.preventDefault();
                let error_msg = $('.error');
                error_msg.text('Please Select') ;
                //You can return false here as well
            }

        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\web-billing\billing\resources\views/reports/sales-report.blade.php ENDPATH**/ ?>
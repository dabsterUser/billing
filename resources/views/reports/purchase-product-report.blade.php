@extends('layouts.customer')



@section('content')

<div class="page-content">
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h4>Purchase Product Report</h4>
                </div>
                <div class="col-8 text-right">
                    {{-- <a href="{{ url('/sale-invoice/create')}}" class="btn btn-primary mr-2">Add</a>
          <div class="d-none" id="multiDelete">
            <a href="#" class="btn btn-danger  ml-2 mr-2 ">Delete Inoice</a>
            <a href="#" class="btn btn-primary ml-2 mr-2 ">Print</a>
          </div> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid ">
        <div class="main-form-container mt-4 bg-white">
            <div class="container">
                <div class="form_body mt-4 px-2 py-4">
                    <form action="{{ url('/purchase-product-invoice') }}" id="sale_form">
                        @csrf
                        <div class="row">

                            <div class="form_filed mb-4 col-2">
                                <label for="name-f">Customer/Vendor:</label>
                                <select id="customers" class="custom-select" name="customer_vendor_id[]" multiple>
                                    <option value="">Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                <p class="error mb-0 mt-1 text-danger"></p>
                            </div>
                            <div class="form_filed mb-4 col-3">
                                <label for="name-f">Product Group:</label>
                                <select class="custom-select" id="gender2">
                                    <option selected>---All Product Group---</option>
                                </select>
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
                            <div class="form_filed mb-4 col-2">
                                <label for="name-f">Invoice Number:</label>
                                <input type="text" class="form-control" name="invoice-num" id="invoice_num">
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
    @if ($purchaseProducts)
    <div class="container-fluid main-container">
        <div class="main-form-container mt-4 mb-4 bg-white">
                <div id="sales-data">
                    <div class="card border-0">
                        <div class="card-header bg-white border-0">
                            <div class="row justify-content-between">
                                @foreach ($customerData as $customer)
                                    <div class="col-sm-6">
                                        <h3 class="customer_name text-capitalize">{{ $customer->name }}</h3>
                                        <p class="customer_address">{{ $customer->address1 }}</p>
                                    </div>
                                @endforeach

                            </div>
                            <div class="sale_register d-flex justify-content-center flex-column align-items-center">
                                <h4 class="sale_info text-capitalize">Purchase Product Report</h4>
                                <p class="date_info">{{ $from_date }} to {{ $to_date }}</p>
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
                                                            <th scope="col">Product Title</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Amount(Exclu. Tax)</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                    </thead>
                
                                                    <tbody>
                                                        @php
                                                            $totalPrice = 0;
                                                        @endphp
                                                        @foreach ($purchaseProducts as $product)
                                                        <tr>
                                                            <td></td>
                                                            <td> {{ $product->hidden_item_product_name }} </td>
                                                            <td><p class="fw-medium mb-0"> {{ $product->total_quantity }} </p></td>
                                                            <td> {{ $product->total_price }} </td>
                                                            <td>{{ $product->total_price }}</td>
                                                        </tr>
                                                        @php
                                                            $totalPrice += $product->total_price;
                                                        @endphp        
                                                        @endforeach
                                                    </tbody><!-- end tbody -->

                                                    <tfoot>
                                                        <td scope="col"></td>
                                                        <td scope="col"></td>
                                                        <td scope="col" >Total</td>
                                                        <td scope="col">{{ number_format($totalPrice, 2, '.', '') }}</td>
                                                        <td scope="col">{{ $totalPrice }}</td>
                                                    </tfoot>
                                                </table><!-- end table -->
                                            </div><!-- end table responsive -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end py-4 gap-2 ">
                                <a href="#" class="btn btn-success mr-4">Print</a>
                                <a href="{{ url('/export-purchase-products-report') }}" class="btn btn-success mr-4">Export</a>
                                <a href="#" class="btn btn-success mr-4">Download PDF</a>
                                <a href="#" class="btn btn-success">Send Mail</a>
                            </div>
                        </div>
                    </div>

                </div>
        </div>

    </div>
    @endif
</div>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

    <script src="{{ asset('public/js/general.js') }}"></script>

    <script src="{{ asset('public/js/customer.js') }}"></script>

    <script src="{{ asset('public/js/create_customer.js') }}"></script>

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


@endsection

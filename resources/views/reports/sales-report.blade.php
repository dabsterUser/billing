@extends('layouts.customer')



@section('content')

<div class="page-content">

    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-4 pl-0">
                    <h4>Sales Reports</h4>
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
                    <form action="{{ url('/sales-report-invoices') }}" id="sale_form">
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
                            {{-- <div class="form_filed mb-4 col-3">
                                <label for="name-f">Product Group:</label>
                                <select class="custom-select" id="gender2">
                                    <option selected>---All Product Group---</option>
                                </select>
                            </div> --}}
                            <div class="form_filed mb-4 col-3">
                                <label for="name-f">Products:</label>

                                <select name="product_id[]" class="product_id custom-select product-item select2"
                                    style="width:200px;" multiple>

                                    <option value="">Select Product</option>

                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach

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
                            <button class="btn btn-primary" type="submit"> <i class="fal fa-search"></i>Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @if ($saleReportsData)
    <div class="container-fluid main-container">
        <div class="main-form-container mt-4 mb-4 bg-white">
                <div id="sales-data">
                    <div class="card border-0">
                        <div class="card-header bg-white border-0">
                            <div class="row justify-content-between">
                                <div class="col-sm-6">
                                    <h3 class="customer_name text-capitalize">Raman Enterprises</h3>
                                    <p class="customer_address">3100,sector 71</p>
                                    <p class="customer_distt">Mohali</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    @foreach ($customerData as $data)
                                        <h3 class="owner_name text-capitalize">{{ $data->name }}</h3>
                                        <p class="owner_address">{{ $data->address1 }} </p>
                                        {{-- <p class="owner_shop">Mohali</p> --}}
                                    @endforeach
                                </div>
            
                            </div>
                            <div class="sale_register d-flex justify-content-center flex-column align-items-center">
                                <h4 class="sale_info text-capitalize">Sales Report</h4>
                                <p class="mb-0">for product</p>
                                <p class="item text-capitalize">
                                    @if ($productNames->count() > 0)
                                        {{ implode(', ', $productNames->toArray()) }}
                                    @endif
                                </p>
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
                                                            <th scope="col">Invoice Date</th>
                                                            <th scope="col">Company Name</th>
                                                            <th scope="col">Vch Type</th>
                                                            <th scope="col">Invoice No</th>
                                                            <th scope="col">Taxable Value Total</th>
                                                            <th scope="col">Grand Total</th>
                                                        </tr>
                                                    </thead>
                
                                                    <tbody>
                                                        @php
                                                            $totalTaxablePrice = 0;
                                                            $grandTotal = 0;
                                                        @endphp
                                                        @foreach ($saleReportsData as $data)

                                                        <tr>
                                                            <td></td>
                                                            <td> {{ $data->bill_date }} </td>
                                                            <td><p class="fw-medium mb-0 text-capitalize"> {{ $data->name }}</p> </td>
                                                            <td><p class="fw-medium mb-0 text-capitalize"> {{ $data->type }} </p></td>
                                                            <td> {{ $data->invoice_number }} </td>
                                                            <td>{{ $data->total_taxable }}</td>
                                                            <td>{{ $data->item_total }}</td>
                                                        </tr>
                                                        @php
                                                            $totalTaxablePrice += $data->total_taxable;
                                                            $grandTotal += $data->item_total;
                                                        @endphp        
                                                        @endforeach
                                                    </tbody><!-- end tbody -->

                                                    <tfoot>
                                                        <td scope="col"></td>
                                                        <td scope="col"></td>
                                                        <td scope="col" ></td>
                                                        <td scope="col">Total</td>
                                                        <td scope="col"></td>
                                                        <td scope="col">{{ number_format($totalTaxablePrice, 2, '.', '') }}</td>
                                                        <td scope="col">{{ number_format($grandTotal, 2, '.', '') }}</td>
                                                    </tfoot>
                                                </table><!-- end table -->
                                            </div><!-- end table responsive -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end py-4 gap-2 ">
                                <a href="{{ url('/print-sales-report') }}" target="_blank" class="btn btn-success mr-4">Print</a>
                                <a href="{{url('/export-sales-report')}}" class="btn btn-success mr-4">Export</a>
                                <a href="#" class="btn btn-success mr-4">Download PDF</a>
                                <a href="#" class="btn btn-success">Send Mail</a>
                            </div>
                        </div>
                    </div>

                </div>
        </div>

    </div>    @endif
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


@endsection

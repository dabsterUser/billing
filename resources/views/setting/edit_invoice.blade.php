@extends('layouts.customer')

@section('content')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css" integrity="sha512-FEQLazq9ecqLN5T6wWq26hCZf7kPqUbFC9vsHNbXMJtSZZWAcbJspT+/NEAQkBfFReZ8r9QlA9JHaAuo28MTJA==" crossorigin="anonymous" /> -->
<div class="container-fluid">
    <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h5>Edit Invoice Option</h5>
                </div>
                <div class="card-body">
                    <form method="post"  novalidate action="{{ url('/edit-invoice')}}" id="edit-invoic1e-setting" enctype="multipart/form-data">
                    @csrf
                        <div id="accordion" class="accordion">
                            <div class="card mb-0">
                                <!-- First Div -->
                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                                    <span class="card-title">
                                    1. General Options
                                    </span>
                                </div>
                                <div id="collapseOne" class="card-body" data-parent="#accordion" >
                                    <div class="panel-body pt-4">
                                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="exampleFormControlFile1">Logo</label>
                                                        <input type="file" name="logo_image" class="form-control-file" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="">Enable Product Note</label>
                                                        <div class="controls mt-2">
                                                            <label><input type="checkbox" name="enable_product_note"  value="1" {{$settings->enable_product_note == '1'? 'checked': ''}} > Enable Note for each product in Invoice. (ex: to write product serial number) </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Enable Rounding</label>
                                                    <div class="controls mt-2">
                                                        <label><input type="checkbox" name="enable_round_off" {{$settings->enable_round_off == '1'? 'checked': ''}}  value="1" > Enable rounding of Grand Total in Invoice.</label>
                                                    </div>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Show Round Off Value</label>
                                                    <div class="controls mt-2">
                                                        <label><input type="checkbox" name="enable_round_off_value"  value="1"  {{$settings->enable_round_off_value == '1'? 'checked': ''}}> Show round off Value in Invoice.</label>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Allow Oversell?</label>
                                                    <div class="controls mt-2">
                                                        <label><input type="checkbox" name="allow_oversell"  value="1" {{$settings->allow_oversell == '1'? 'checked': ''}}> Allow to Create Sales Invoice, if stock not available.</label>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Default Product Note</label>
                                                    <textarea cols="2" class="form-control" name="default_product_note" placeholder="Enter Product Note">{{$settings->default_product_note}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Default Payment Type</label>
                                                    <select name="default_payment_type" id="default_payment_type" class="form-control">
														<option value="">NONE</option>
														<option value="CREDIT" {{$settings->default_payment_type == 'CREDIT' ? 'selected' : ''}}>CREDIT</option>
														<option value="CASH" {{$settings->default_payment_type == 'CASH' ? 'selected' : ''}}>CASH</option>
														<option value="CHECK" {{$settings->default_payment_type == 'CHECK' ? 'selected' : ''}}>CHEQUE</option>
														<option value="ONLINE" {{$settings->default_payment_type == 'ONLINE' ? 'selected' : ''}}>ONLINE</option>
													</select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Default Due Date</label>
                                                    <input type="text" value="{{$settings->default_due_date}}" name="default_due_date" id="default_due_date" class="form-control" >
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Enable Discount</label>
                                                    <div class="controls mt-2">
                                                        <label><input type="checkbox" name="enable_discount" {{$settings->enable_discount == '1'? 'checked': ''}} value="1" > Show Discount Field in Invoice.</label>
                                                    </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Product Type *</label>
                                                    <select name="discount_in" class="form-control">
														<option value="percentage" {{$settings->default_payment_type == 'percentage' ? 'selected' : ''}}>Percentage ( % )</option>
														<option value="rupee" {{$settings->default_payment_type == 'rupee' ? 'selected' : ''}}>Rupee ( Rs )</option>
													</select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Enable Discount</label>
                                                        <div class="controls mt-2">
                                                            <label><input type="checkbox" name="disc_per_item" {{$settings->disc_per_item == '1'? 'checked': ''}}  value="1" >Disc. Per Item</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Always Show Discount Column</label>
                                                    <div class="controls mt-2">
                                                        <label><input type="checkbox" name="always_show_discount_column"  value="1" {{$settings->always_show_discount_column == '1'? 'checked': ''}}>Check this opton to show discount column on all invoice.	</label>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="">Quantity Decimal Value</label>
                                                        <select name="quantity_decimal_value" id="quantity_decimal_value" class="form-control">
                                                            <option value="0" {{$settings->quantity_decimal_value == '0' ? 'selected' : ''}}>0</option>
                                                            <option value="1" {{$settings->quantity_decimal_value == '1' ? 'selected' : ''}}>1</option>
                                                            <option value="2"  {{$settings->quantity_decimal_value == '2' ? 'selected' : ''}}selected="">2</option>
                                                            <option value="3" {{$settings->quantity_decimal_value == '3' ? 'selected' : ''}}>3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="">Price Decimal Value</label>
                                                        <select name="price_decimal_value" id="price_decimal_value" class="form-control">
                                                            <option value="0" {{$settings->price_decimal_value == '0' ? 'selected' : ''}}>0</option>
                                                            <option value="1" {{$settings->price_decimal_value == '1' ? 'selected' : ''}}>1</option>
                                                            <option value="2" {{$settings->price_decimal_value == '2' ? 'selected' : ''}} selected="">2</option>
                                                            <option value="3" {{$settings->price_decimal_value == '3' ? 'selected' : ''}}>3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="">Taxable Decimal Value</label>
                                                        <select name="taxable_decimal_value" id="taxable_decimal_value" class="form-control">
                                                            <option value="2" {{$settings->taxable_decimal_value == '2' ? 'selected' : ''}} selected="">2</option>
                                                            <option value="3" {{$settings->taxable_decimal_value == '3' ? 'selected' : ''}}>3</option>
                                                            <option value="4" {{$settings->taxable_decimal_value == '4' ? 'selected' : ''}}>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="">GST Rate(%) Decimal Value</label>
                                                        <select name="gst_rate_decimal_value" id="gst_rate_decimal_value" class="form-control">
                                                            <option value="2" {{$settings->default_payment_type == '2' ? 'selected' : ''}} selected="">2</option>
                                                            <option value="3" {{$settings->default_payment_type == '3' ? 'selected' : ''}}>3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="">GST Decimal Value</label>
                                                        <select name="gst_decimal_value" id="gst_decimal_value" class="form-control">
                                                            <option value="2" {{$settings->gst_decimal_value == '2' ? 'selected' : ''}} selected="">2</option>
                                                            <option value="3" {{$settings->gst_decimal_value == '3' ? 'selected' : ''}}>3</option>
                                                            <option value="4" {{$settings->gst_decimal_value == '4' ? 'selected' : ''}}>4</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label class="">Signature Image</label>
                                                        <div class="controls mt-2">
                                                            <label><input type="checkbox" name="enable_signature_img" id="enable_signature_img"  value="1" {{$settings->enable_signature_img == '1'? 'checked': ''}}> Enable Signature Image.</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="exampleFormControlFile1">Signature Image</label>
                                                        <input type="file" name="signature_image" class="form-control-file" >
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="exampleFormControlFile1">Invoice Background Image</label>
                                                        <input type="file" name="invoice_background_img" class="form-control-file" >
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="exampleFormControlFile1">Invoice Footer Image</label>
                                                        <input type="file" name="invoice_footer_img" class="form-control-file" >
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="" class="">Other TAX Label</label>
                                                        <div class="controls">
                                                            <input type="text" name="other_tax_label_op" value=" {{$settings->other_tax_label_op}}" class="form-control" 
                                                            id="other_tax_label_op" maxlength="50" required="" aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                        <label for="" class="">Total Discount Label</label>
                                                        <div class="controls">
                                                            <input type="text" name="total_discount_label_op" value=" {{$settings->total_discount_label_op}}" class="form-control" 
                                                            id="total_discount_label_op" maxlength="50" required="" aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <!-- Second Div -->
                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo">
                                    <span class="card-title">
                                    2. Bank Options
                                    </span>
                                </div>
                                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                                    <div class="panel-body pt-4">
                                            <h3>Bank Detail 1</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" name="bank_name[]" id="bank_name" class="form-control"  aria-describedby="" value="{{ isset($banks[0]) ? $banks[0]->bank_name : ''}}"
                                                        placeholder="Enter Bank Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Bank IFSC</label>
                                                    <input type="text" name="ifsc_code[]" id="ifsc_code" class="form-control"  aria-describedby="" value="{{isset($banks[0]) ? $banks[0]->ifsc_code : ''}}"
                                                        placeholder="Enter Bank IFSC Code">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Swift Code</label>
                                                    <input type="text" name="swift_code[]" id="swift_code" class="form-control"  aria-describedby="" value="{{ isset($banks[0]) ? $banks[0]->swift_code : ''}}"
                                                        placeholder="Enter Swift Code">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Account Number</label>
                                                    <input type="text" name="account_no[]" id="account_no" class="form-control"  aria-describedby="" value="{{ isset($banks[0]) ? $banks[0]->account_no : ''}}"
                                                        placeholder="Enter Account Number">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Branch Name</label>
                                                    <input type="text" name="branch_name[]" id="branch_name" class="form-control"  aria-describedby="" value="{{isset($banks[0]) ? $banks[0]->branch_name : ''}}"
                                                        placeholder="Enter Branch Name">
                                                    </div>
                                                </div>
                                            </div>

                                            <h3>Bank Detail 2</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Bank Name</label>
                                                    <input type="text" name="bank_name[]" id="bank_name" class="form-control"  aria-describedby="" value="{{ isset($banks[1]) ? $banks[1]->bank_name :''}}"
                                                        placeholder="Enter Bank Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Bank IFSC</label>
                                                    <input type="text" name="ifsc_code[]" id="ifsc_code" class="form-control"  aria-describedby="" value="{{ isset($banks[1]) ? $banks[1]->ifsc_code :''}}"
                                                        placeholder="Enter Bank IFSC Code">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Swift Code</label>
                                                    <input type="text" name="swift_code[]" id="swift_code" class="form-control"  aria-describedby="" value="{{ isset($banks[1]) ? $banks[1]->swift_code :''}}"
                                                        placeholder="Enter Swift Code">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Account Number</label>
                                                    <input type="text" name="account_no[]" id="account_no" class="form-control"  aria-describedby="" value="{{ isset($banks[1]) ? $banks[1]->account_no :''}}"
                                                        placeholder="Enter Account Number">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group border-bottom pb-3">
                                                    <label for="">Branch Name</label>
                                                    <input type="text" name="branch_name[]" id="branch_name" class="form-control"  aria-describedby="" value="{{ isset($banks[1]) ? $banks[1]->branch_name :''}}"
                                                        placeholder="Enter Branch Name">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>


                                <!-- Fourth Option -->
                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseFour">
                                    <span class="card-title">
                                    3. Invoice Options
                                    </span>
                                </div>
                                <div id="collapseFour" class="card-body collapse" data-parent="#accordion" >
                                    <div class="panel-body pt-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group border-bottom pb-3">
                                                    <label class="control-label">Invoice Title</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->invoice_title}}" name="invoice_title" id="invoice_title" class="form-control" placeholder="Enter invoice title" maxlength="30">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
                                        
                                        


											<div class="col-md-12 option-number-2">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Address" class="control-label">Invoice Prefix</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->invoice_title}}" name="invoice_prefix" id="invoice_prefix" class="form-control" placeholder="Enter your invoice prefix" maxlength="20">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-3">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Address" class="control-label">Invoice Postfix</label>
                                                    <div class="controls">
                                                        <input type="text" name="invoice_postfix" id="invoice_postfix" class="form-control" placeholder="Enter your invoice postfix" maxlength="20">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-4">
                                                <div class="form-group border-bottom pb-3">
                                                    <label class="control-label">Use Different invoice series</label>
                                                    <div class="controls">
                                                        <label class="checkbox inline">
                                                            <input type="checkbox" id="diffrent_invoice_series_for_export" name="diffrent_invoice_series_for_export" value="1" {{$settings->diffrent_invoice_series_for_export == '1'? 'checked': ''}}>Use Different invoice series for export invoice.
                                                        </label>
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->

											<div class="col-md-12 option-number-5">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Address" class="control-label">Export Prefix</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->export_prefix}}" name="export_prefix" id="export_prefix" class="form-control" placeholder="Enter your export prefix" maxlength="20">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-6">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Address" class="control-label">Export Postfix</label>
                                                    <div class="controls">
                                                        <input type="text" value=" {{$settings->export_postfix}}" name="export_postfix" id="export_postfix" class="form-control" placeholder="Enter your export postfix" maxlength="20">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->

											<div class="col-md-12 option-number-7">
                                                <div class="form-group border-bottom pb-3">
                                                    <label class="control-label">Enable Challan No</label>
                                                    <div class="controls">
                                                        <label class="checkbox inline">
                                                        <input type="checkbox" id="enable_challan" name="enable_challan" checked="" value="1" {{$settings->enable_challan == '1'? 'checked': ''}}>Show Challan No Field in Invoice.
                                                        </label>
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-8">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Address" class="control-label">Challan No Label </label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->export_prefix}}" name="challan_no_lable" id="challan_no_lable" class="form-control" placeholder="Enter Challan no Label" maxlength="20">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-9">
                                                <div class="form-group border-bottom pb-3">
                                                    <label class="control-label">Enable Challan Date</label>
                                                    <div class="controls">
                                                        <label class="checkbox inline">
                                                        <input type="checkbox" id="enable_challan_date" name="enable_challan_date"  value="1" {{$settings->enable_challan_date == '1'? 'checked': ''}}>Show Challan Date Field in Invoice.
                                                        </label>
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-10">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Address" class="control-label">Challan Date Label </label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->challan_date_lable}}" name="challan_date_lable" id="challan_date_lable" class="form-control" placeholder="Enter Challan Date Label" maxlength="20">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<hr>



											
											<div class="col-md-12 option-number-16">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Address" class="control-label">Eway-Bill Label </label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->ewaybill_no_lable}}" name="ewaybill_no_lable" id="ewaybill_no_lable" class="form-control" placeholder="Enter Eway-bill Label" maxlength="20">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<hr>
											
                                            <div class="col-md-12">
											    <h4>Invoice Copy Title <i class="fa fa-caret-down" aria-hidden="true"></i></h4>
                                            </div>
											<hr>
											<div class="col-md-12 option-number-20">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Original" class="control-label">Original</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->original_copy_name}}" name="original_copy_name" id="original_copy_name" class="form-control" placeholder="Enter your original text" maxlength="30">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-21">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Duplicate" class="control-label">Duplicate</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->duplicate_copy_name}}"  name="duplicate_copy_name" id="duplicate_copy_name" class="form-control" placeholder="Enter your duplicate text" maxlength="30">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-22">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Transport" class="control-label">Transport</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->transport_copy_name}}"  name="transport_copy_name" id="transport_copy_name" class="form-control" placeholder="Enter your transport text" maxlength="30">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-23">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Office" class="control-label">Office</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->office_copy_name}}" name="office_copy_name" id="office_copy_name" class="form-control" placeholder="Enter your office text" maxlength="30">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<hr>
                                            <div class="col-md-12">
											    <h4>T&amp;C <i class="fa fa-caret-down" aria-hidden="true"></i></h4>
                                            </div>
											<hr>
											<div class="col-md-12 option-number-24">
                                                <div class="form-group border-bottom pb-3">
                                                    <label class="control-label">T&amp;C Title</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{$settings->term_title}}"  name="term_title" id="term_title" class="form-control" placeholder="Enter t &amp; c title" maxlength="50">
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-25">
                                                <div class="form-group border-bottom pb-3">
                                                    <label for="Address" class="control-label">Terms &amp; Condition</label>
                                                    <div class="controls">
                                                        <textarea name="banktc"  id="banktc" class="form-control" placeholder="Enter your terms &amp; condition">{{$settings->banktc}}
                                                        </textarea>
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
                                            <br>
											<hr>
                                            <div class="col-md-12">
                                            <h4>Default Sort Option </i></h4>
                                            </div>
											
											<hr>
											<div class="col-md-12 option-number-26">
                                                <div class="form-group border-bottom pb-3">
                                                    <label class="control-label">Default Sort by</label>
                                                    <div class="controls">
                                                        <select name="sales_invoice_default_sort" class="form-control">
                                                            <option value="invoice_no_desc"  {{$settings->sales_invoice_default_sort == 'invoice_no_desc' ? 'selected' : ''}}>Invoice No ( Descending )</option>
                                                            <option value="invoice_no_asc" {{$settings->sales_invoice_default_sort == 'invoice_no_asc' ? 'selected' : ''}}>Invoice No ( Ascending )</option>
                                                            <option value="comapany_name_desc" {{$settings->sales_invoice_default_sort == 'comapany_name_desc' ? 'selected' : ''}}>Company Name ( Descending )</option>
                                                            <option value="comapany_name_asc" {{$settings->sales_invoice_default_sort == 'comapany_name_asc' ? 'selected' : ''}}>Company Name ( Ascending )</option>
                                                            <option value="invoice_date_desc" {{$settings->sales_invoice_default_sort == 'invoice_date_desc' ? 'selected' : ''}}>Invoice Date ( Descending )</option>
                                                            <option value="invoice_date_asc" {{$settings->sales_invoice_default_sort == 'invoice_date_asc' ? 'selected' : ''}}>Invoice Date ( Ascending )</option>
                                                            <option value="create_date_desc" {{$settings->sales_invoice_default_sort == 'create_date_desc' ? 'selected' : ''}}>Create Date ( Descending )</option>
                                                            <option value="create_date_asc" {{$settings->sales_invoice_default_sort == 'create_date_asc' ? 'selected' : ''}}>Create Date ( Ascending )</option>
                                                        </select>
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-27">
                                                <div class="form-group border-bottom pb-3">
                                                    <label class="control-label">Default Invoice Type</label>
                                                    <div class="controls">
                                                        <select class="form-control" name="default_invoice_type" id="default_invoice_type" >
                                                            <option value="" selected="" data-select2-id="2">No default invoice type</option>
                                                            <option value="TaxInvoice" {{$settings->default_invoice_type == 'TaxInvoice' ? 'selected' : ''}}>Regular</option>
                                                            <option value="BillofSupply" {{$settings->default_invoice_type == 'BillofSupply' ? 'selected' : ''}}>Bill of Supply</option>
                                                            <option value="SEZInvoice" {{$settings->default_invoice_type == 'SEZInvoice' ? 'selected' : ''}}>Sez Invoice (With IGST)</option>
                                                            <option value="SEZInvoiceWithoutIGST" {{$settings->default_invoice_type == 'SEZInvoiceWithoutIGST' ? 'selected' : ''}}>Sez Invoice (Without IGST)</option>

                                                        </select>
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
											<div class="col-md-12 option-number-28">
                                                <div class="form-group border-bottom pb-3">
                                                    <label class="control-label">Default Customer</label>
                                                    <div class="controls">
                                                        <select name="default_customer" id="default_customer" class="form-control  select2">
                                                        @foreach($customers as $customer)
                                                        <option value="{{ $customer->id}}" {{$settings->default_customer ==  $customer->id ? 'selected' : ''}}>{{ $customer->name}} {{ $customer->phone ?  (- $customer->phone ) : '' }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div><!-- /controls -->
                                                </div>
											</div><!-- /control-group -->
                                        </div>
                                            			
											
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-12 form-controls my-3 text-right">
                            <button type="button" class="btn mr-3">Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".select2").select2({
        width: 'resolve'
    });
</script>
@endsection



<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('/sale-invoice')); ?>" method="post" id="add-saleinvoice-form">
  <div class="top-stickybar">
    <div class="container-fluid">
      <div class="row d-flex justify-content-end align-items-center">
        <div class="col-4 pl-0">
          <h1>Create New Invoice</h1>
        </div>
        <div class="col-8 text-right">
          <a href="<?php echo e(url('/sale-invoice')); ?>" class="btn btn-light mr-2">Cancel</a>
          <button type="submit"  name="" class="btn btn-light mr-2">Save & New</button>
          <button  name="" value="" class="btn btn-primary">Save & Preview</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid main-container">
    <?php echo csrf_field(); ?>
    <div class="main-form-container">
      <div class="row mx-0">
        <div class="col-6">
          <div class="row">
            <div class="col text-right">
              <a href="#" class="btn btn-link" data-toggle="modal" data-target="#customerModal">Add New Customer</a>
            </div>
          </div>
          <div class="customer-information-invoice">
            <div class="form-group row">
              <label for="" class="control-label col-sm-3">Bill to</label>
              <div class="col-sm-9">
                <div class="controls " id="companybilling" data-select2-id="companybilling">
                  <select id="customers" class="form-control" name="customer_vendor_id">
                    <option value="">Select Customer</option>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <input type="hidden" value="<?php echo e($organization->state_name); ?>" id="business_state" name="business_state">
                  <input type="hidden" value="<?php echo e($organization->gstin); ?>" id="business_gstno" name="business_gstno">
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-sm-3">Address</div>
              <div class="col-sm-9 customer-address-label"></div>
              <input type="hidden" name="address"  class="address" readonly="true">
            </div>
            <div class="row mt-2">
              <div class="col-sm-3">Phone</div>
              <div class="col-sm-9 customer-phone-label"></div>
              <input type="hidden" name="phone"  class="phone" readonly="true">
            </div>

            <div class="form-group PlaceofSupply d-none">
              <label for="" class="control-label ">Place of Supply</label>
              <select class="form-control" id="PlaceofSupply" name="PlaceofSupply" required >
                <option value="">Select State</option>
                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?> (<?php echo e($state->state_code); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <?php if($general_settings->pan_no == 1): ?>
            <div class="row mt-2">
              <div class="col-sm-3">Pan</div>
              <div class="col-sm-9 customer-pan-label"></div>
              <input type="hidden" name="customer_pan"  class="customer_pan" readonly="true">
            </div>
            <?php endif; ?>
            <div class="row mt-2">
              <div class="col-sm-3">GSTIN</div>
              <div class="col-sm-9 customer-gstin-label"></div>
              <input type="hidden" name="customer_gstno"  class="customer_gstno" readonly="true">
            </div>
          

            <div class="form-group row">
              <label class="col-sm-3">Shipping Addr.</label>
              <div class="col-sm-9">
                <div class="controls mt-2">
                  <label><input type="checkbox" name="is_same_shipping" value="1" checked id="is_same_shipping_invoice"> Use
                    Same Shipping Address</label>
                </div>
              </div>
            </div>
            <div id="shipping_detail_drawer" class="d-none">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. NAME</label>
                    <div class="controls ">
                      <input type="text" value="" class="form-control" name="shippingName" id="shippingName"
                        placeholder="Enter Shipping Name" maxlength="100">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="shippingAddress" class="control-label">SHIP. ADD.</label>
                    <div class="controls ">
                      <textarea name="shippingAddress" id="shippingAddress" rows="3" cols="2"
                        placeholder="Enter Shipping Address" maxlength="500" class="form-control shippingAddress"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. PHONE</label>
                    <div class="controls ">
                      <input type="text" value="" name="shippingPhone" id="shippingPhone"
                        placeholder="Enter Shipping Phone" maxlength="30" class="form-control shippingPhone">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. State</label>
                    <div class="controls ">
                      <select type="list" data-value="" name="shippingState" class="form-control shippingState" id="shippingState">
                        <option value="">Select State</option>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?> (<?php echo e($state->state_code); ?>)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. Country</label>
                    <div class="controls">
                      <input type="text" name="shippingCountry" id="shippingCountry" class="form-control shippingCountry" placeholder="Enter Country">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. GSTIN</label>
                    <div class="controls ">
                      <input type="text" value="" name="shippingGSTIN" id="shippingGSTIN" placeholder="Enter Shipping GSTIN" class="form-control shippingGSTIN" maxlength="30">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. PAN</label>
                    <div class="controls ">
                      <input type="text" value="" name="shippingpan" id="shippingPAN" placeholder="Enter Shipping PAN shippingpan" class="form-control" maxlength="30">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>

        <div class="col-6 bg-grey pb-5">
          <div class="row mt-2">
            <div class="col-md-12 mt-1">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">Invoice No.</label>
                    <div class="controls col-sm-7">
                      <input id="invoiceNumber" name="invoice_number" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">DATE</label>
                    <div class="controls col-sm-7">
                      <input type="text" name="bill_date" id="datepicker_bill" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php if($general_settings->challan_date_no == 1): ?>
            <div class="col-md-12">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">Challan Date</label>
                    <div class="controls col-sm-7">
                      <input name="challan_date" type="text"  class="form-control datepicker">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">Challan No.  </label>
                    <div class="controls col-sm-7">
                      <input name="challan_number" type="text"  class="form-control challan_number">
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <?php endif; ?>

            <div class="col-md-12">
              <div class="row">
              <?php if($invoice_option->po_no == 1): ?>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">P.O. No.</label>
                    <div class="controls col-sm-7">
                      <input name="order_no" type="text"  class="form-control">
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php if($invoice_option->po_no == 1): ?>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">L.R. No.</label>
                    <div class="controls col-sm-7">
                      <input name="lrno"  type="text" class="form-control">
                    </div>
                  </div>

                </div>
                <?php endif; ?>
                <?php if($general_settings->e_way_no == 1): ?>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">E-Way No.</label>
                    <div class="controls col-sm-7">
                      <input name="eway"  class="form-control">
                    </div>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <?php if($general_settings->transport == 1): ?>
            <div class="col-sm-12 text-right"><a href="#" class="btn btn-link" data-toggle="modal"
                data-target="#transportModal">Create New Transport</a>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label for="" class="control-label col-sm-3">Transport</label>
                <div class="controls col-sm-9">
                  <select class="select2 form-control" id="selecttransport" name="tranport_name">
                    <option></option>
                    <?php $__currentLoopData = $transports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($transport->id); ?>"><?php echo e($transport->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="transport_transport_id" class="transport_transport_id">
            <input type="hidden" name="transport_id" class="transport_id">
            <input type="hidden" name="transport_vehicle_no" class="transport_vehicle_no">
            <div class="col-md-12 mt-2">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-6">TRANS. ID</label>
                    <div class="controls col-sm-6">
                      <input name="transport_id_label" value="" disabled id="transport_id_label" class="form-control transport_id_label">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">VEHICLE NO.</label>
                    <div class="controls col-sm-7">
                      <input name="vehicle_no_label" value="" id="vehicle_no_label" class="form-control vehicle_no_label">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <table class="table table-bordered addinvoice-table mb-0" id="document-item-list">
            <thead>
              <tr>
                <th>No.</th>
                <th colspan="5" style="width:39%;">Product / Item</th>
                <th>HSN Code</th>
                <th>Qty.</th>
                <th>Price W/o Tax</th>
                <th class="discount_field"  style="width: 105px;">Discount</th>
                <th>GST</th>
                <th style="width: 105px;">Cess</th>
                <th>Price With Tax</th>
                <th style="width: 60px;"></th>
              </tr>
            </thead>
            <tbody class="ui-sortable product-list-row">
              <tr class="product-item-row">
                <td>
                  <label class="product-item-row-number">1</label>
                </td>
                <td colspan="5">
                  <a href="#" class="btn-link w-100 text-right d-block mb-2" data-toggle="modal" data-target="#productModal">Create New Product/Item</a>
                  <span role="status" aria-live="polite" class=""></span>
                  <select name="product_id[]"  class="product_id form-control product-item select2"
                    style="width:200px;">

                    <option value="">Select Product</option>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </select>
                  <input class="hidden-item-product-id" name="hidden_item_product_id[]" type="hidden">
                  <input class="hidden-item-product-name" name="hidden_item_product_name[]" type="hidden" value="Pens">
                  <input class="hidden-item-product-uom" name="hidden_item_product_uom[]" type="hidden" value="UNT">
                  <input class="hidden-item-product-is_transport" name="hidden_item_product_is_transport[]"
                    type="hidden" value="0">
                  <input class="hidden-item-product-gst" name="hidden_item_product_gst[]" type="hidden" value="">

                  <textarea class="form-control" placeholder="Item Note..." name="product_note[]"
                    maxlength="800"></textarea>
                </td>

                <td>
                  <input type="text" name="hsncode[]" class="form-control hsccode" placeholder="HSN/SAC"
                    style="width:60px;" maxlength="20">
                </td>

                <td>
                  <input type="text" name="quantity[]" class="form-control quantity" placeholder="Qty."
                    style="width:50px;" maxlength="10">
                  <label class="product-quantity-available"></label>
                </td>

                <td>
                  <center>
                    <input type="text" name="price[]" class="form-control rate" placeholder="Price" style="width:100px;"
                      maxlength="10">
                  </center>
                </td>

                <td class="discount_field">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">%</div>
                    </div>
                    <input type="text" name="discount[]" class="form-control disc"  value="0"
                    maxlength="10">
                  </div>
                  <div class="input-group mt-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rs</div>
                    </div>
                    <input type="text" name="discount_rupee[]" class="form-control disc_in_rupee"  value="0"
                    maxlength="10">
                  </div>
                  <input type="hidden" name="taxable_line_value[]" class="taxable_line_value" value="0">
                </td>

                <td>
                  <input type="text" name="gst[]" readonly="true" class="form-control gst" placeholder="%" style="width:50px;"
                    maxlength="5" >
                </td>

                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">%</div>
                    </div>
                    <input type="text" name="cess[]" class="form-control cess" placeholder="%">
                  </div>
                  <div class="input-group mt-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rs</div>
                    </div>
                    <input type="text" name="cess_amount[]" class="form-control cess_amount" placeholder="Rs">
                  </div>
                  <input value="" type="hidden" name="cessrate[]" class="cessrate">
                </td>

                <td style="width:90px;">
                  <center>
                    <input type="text" name="total[]" class="form-control line_total" placeholder="Total"
                      style="width:80px;">
                  </center>
                </td>

                <td>
                  <center>
                    <button type="button" value="" class="btn btn-remove-row btn-lg"><i
                        class="fa fa-times"></i></button>
                  </center>
                </td>

              </tr>
              
             
            </tbody>

            <tfoot>
              <tr class="">
                <td colspan="6">
                  <center>
                    Total Inv. Val
                  </center>
                </td>
                <td>
                  
                </td>

                <td>
                    <input type="hidden" name="total_qty" id="total_qty" value="0">
                    <label type="text" name="" id="total_qty_label" class="">0</label>
                </td>

                <td>
                    <input type="hidden" name="total_price" id="total_price" value="0">
                    <label type="text" name="" id="total_price_lable" class="">0</label>
                </td>

                <td class="discount_field">
                    <input type="hidden" name="total_discount" id="total_discount" value="0">
                    <label type="text" name="" id="total_discount_label" class="">0</label>
                </td>

                <td>
                    <input type="hidden" name="total_gst_rate" id="total_cgst_rate" value="0">
                    <label type="text" name="" id="total_gst_rate_label" class="">0</label>
                </td>

                <td>
                      <input type="hidden" name="total_cess_rate" id="total_cess_rate" value="0">
                      <label type="text" name="" id="total_cess_rate_label" class="">0</label>
                </td>

                

                <td style="width:90px;">
                  <center>
                  
                    <input type="hidden" name="item_total" id="item_total" value="0">
                    <label type="text" name="" id="item_total_label" class="">0</label>
                          
                  </center>
                </td>

                <td>
                  
                </td>

              </tr>

              <tr>
                <td colspan="14"><a href="javascript:;" class="btn btn-light btn-block btn-add-row ">Add more
                    product/Item</a>
                </td>
              </tr>
            </tfoot>
           

          </table>
        </div>
      </div>
      <div class="row mx-0">
        <div class="col-sm-6 border-right py-3">
          <div class="form-group">
            <label>Notes for personal records (If any)</label>
            <textarea class="form-control" name="payment_note"  placeholder="These notes not to be printed on invoice"
              rows="4"></textarea>
          </div>
          <?php if($general_settings->due_date == 1): ?>
          <div class="form-group">
            <label for="labelDueDate">Due Date</label>
            <input type="text" name="due_date" class="form-control datepicker">
          </div>
          <?php endif; ?>
        </div>
        <div class="col-sm-6 py-3">
          <div class="row mt-2">
            <div class="col-sm-7">Total Taxable Amount</div>
            <input type="hidden" name="total_taxable" id="total_taxable" value="0">
            <div class="col-sm-5 text-right total_taxable_label" >0.00</div>
          </div>
          <div class="row mt-2">
            <div class="col-sm-7">Total GST </div>
            <input type="hidden" name="total_tax" id="total_tax" value="0">
            <div class="col-sm-5 text-right total_tax_lable">0.00</div>
          </div>
          <div class="row mt-2">
            <div class="col-sm-5">Additional Charge</div>

            <div class="col-sm-7 d-flex justify-content-end"><input type="text" class="form-control w-50" id="other_charges" name="other_charges" /></div>
          </div>

          <?php if($general_settings->discount_box == 1): ?>
          <div class="row mt-2">
            <div class="col-sm-6">Discount</div>
            <div class="col-sm-6 text-right">
              <div class="row">
                <div class="col-sm-4">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">%</div>
                    </div>
                    <input type="text" class="form-control total_discount_in_percentage" name="total_discount_in_percentage"  placeholder="00">
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rs</div>
                    </div>
                    <input type="text" class="form-control total_discount_in_amount" name="total_discount_in_amount"  placeholder="00">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <div class="row mt-2 mb-3">
            <div class="col-sm-8">Tax collectable under Reverse Charge</div>
            <div class="col-sm-4  d-flex justify-content-end">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="reverse_charge" value="no" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">No</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="reverse_charge" value="yes" class="custom-control-input"
                  checked="">
                <label class="custom-control-label" for="customRadioInline1">Yes</label>
              </div>
            </div>
          </div>
          <div class="row border-top pt-4">
          <div class="col-sm-6"><h5 class="font-italic font-weight-bold">Total Amount</h5></div>
            <div class="col-sm-6 text-right"><h5 class="font-weight-bold grand_total"  id="grand_total_label">0</h5></div>
            <input type="hidden" name="grand_total" id="grand_total" value="0">
            <p class="text-right mt-4 px-3 w-100 grandtotalwords">Zero Rupees only.</p>
            <input type="hidden" name="hidden_round_off_value" id="hidden_round_off_value" value="">
                        <input type="hidden" name="hidden_grandtotalwords" id="hidden_grandtotalwords" value="">
          </div>
        </div>
      </div>
    </div>

</form>



<?php echo $__env->make('partials.modal.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

<script src="<?php echo e(asset('/js/general.js')); ?>"></script>

<script src="<?php echo e(asset('/js/customer.js')); ?>"></script>

<script src="<?php echo e(asset('/js/create_customer.js')); ?>"></script>

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



  $(document).ready(function () {







    get_invoice_number();

    $("#customers,#PlaceofSupply,#selecttransport,.select2").select2({

      width: 'resolve'

    });



    $('#customers').on('change', function () {

      var customer = $(this).val();

      var type = "customer";

      updateAddressData(customer, type);

    });



    $('#selecttransport').on('change', function () {

      var transport = $(this).val();

      // console.log(transport);

      updateTransport(transport);

    })



    $('.btn-add-row').on('click', function () {

      if (validateCurrentRows()) {

        clonerow(this);
        var row = $('.product-item-row'); 
        var siblings = row.siblings(); 
        siblings.each(function(index) {
            $(this).children('td').first().find('.product-item-row-number').text(index + 1);
        });

      }

    });



    $('.btn-remove-row').on('click', function () {
      if($('.product-item-row').length > 1){
        $(this).parent().closest('.product-item-row').remove();
        var row = $('.product-item-row'); 
        var siblings = row.siblings(); 
        siblings.each(function(index) {
            $(this).children('td').first().find('.product-item-row-number').text(index + 1);
        });
      }

      UpdateCalculations();

    });



    $(document).on("change", "#invoicetype", function () {

      SetIGTS();

    });



    $(document).on("change", "#reverse_Charge", function () {

      UpdateCalculations();

    });



    $(document).on("change", ".product_id", function () {

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

    highlight: function (element) {

      $(element).closest('.form-group input').addClass('has-error border-danger');

    },

    unhighlight: function (element) {

      $(element).closest('.form-group input').removeClass('has-error border-danger');

    },

    success: function (element) {

      $(element).closest('.form-group input').removeClass('has-error border-danger');

      $(element).closest('.form-group').children('span.help-block').remove();

    },

    errorPlacement: function (error, element) {

      error.appendTo(element.closest('.form-group'));

    },

    submitHandler: function (form) {

      if (validateCurrentRows()) {

        $('input,select').prop('disabled', false);

        $(form)[0].submit();

      }



    }

  });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\Work\NewBilling\resources\views/saleinvoice/create.blade.php ENDPATH**/ ?>
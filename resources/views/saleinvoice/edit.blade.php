@extends('layouts.customer')

@section('content')
<form action="{{ url('/sale-invoice/'.$invoice->id) }}"  method="post" id="add-saleinvoice-form">
  <div class="page-content">
  <div class="top-stickybar">   
    <div class="container-fluid">
      <div class="row d-flex justify-content-end align-items-center">
        <div class="col-4 pl-0">
          <h4>Edit Invoice</h4>
        </div>
        <div class="col-8 d-flex justify-content-end">
          <a href="{{url('/sale-invoice')}}" class="btn btn-light mr-2">Cancel</a>
          <button type="submit"  name="" class="btn btn-primary mr-2">Update</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid main-container ">
    @csrf
    <div class="main-form-container mt-4 mb-4 ">
    {{ method_field('PATCH')}}
      <div class="row mx-0 mb-4">
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
                  <select id="customers" class="form-control" name="customer_vendor_id" readonly="true" disabled>
                    <option >Select Customer</option>
                    @foreach($customers as $customer)
                      <option value="{{ $customer->id }}" {{ $invoice->customer_vendor_id == $customer->id ? 'selected':'' }}>{{ $customer->name }}</option>
                    @endforeach
                  </select>
                  <input type="hidden" value="{{$organization->state_name}}" id="business_state" name="business_state">
                  <input type="hidden" value="{{$organization->gstin}}" id="business_gstno" name="business_gstno">
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-sm-3">Address</div>
              <div class="col-sm-9 customer-address-label">{{$invoice->address}}</div>
              <input type="hidden" name="address" value="{{$invoice->address}}" class="address" readonly="true">
            </div>
            <div class="row mt-2">
              <div class="col-sm-3">Phone</div>
              <div class="col-sm-9 customer-phone-label">{{$invoice->phone}}</div>
              <input type="hidden" name="phone" value="{{$invoice->phone}}"  class="phone" readonly="true">
            </div>

            <div class="form-group PlaceofSupply d-none">
              <label for="" class="control-label ">Place of Supply</label>
              <select class="form-control" id="PlaceofSupply" name="PlaceofSupply" required >
                <option >Select State</option>
                @foreach($states as $state)
                <option value="{{$state->id}}" {{ $invoice->place_supply == $state->id ? 'selected' : ''}}>{{$state->name}} ({{$state->state_code}})</option>
                @endforeach
              </select>
            </div>
            @if($general_settings->pan_no == 1)
            <div class="row mt-2">
              <div class="col-sm-3">Pan</div>
              <div class="col-sm-9 customer-pan-label">{{$invoice->customer_pan}}</div>
              <input type="hidden" name="customer_pan" value="{{$invoice->customer_pan}}"  class="customer_pan" readonly="true">
            </div>
            @endif
            <div class="row mt-2">
              <div class="col-sm-3">GSTIN</div>
              <div class="col-sm-9 customer-gstin-label">{{$invoice->customer_gstno}}</div>
              <input type="hidden" name="customer_gstno" value="{{$invoice->customer_gstno}}"  class="customer_gstno" readonly="true">
            </div>


            <div class="form-group row">
              <label class="col-sm-3">Shipping Addr.</label>
              <div class="col-sm-9">
                <div class="controls mt-2">
                  <label><input type="checkbox" name="is_same_shipping" value="1"  id="is_same_shipping_invoice" {{$invoice->is_same_shipping == 'yes'? 'checked': ''}}> Use
                    Same Shipping Address</label>
                </div>
              </div>
            </div>
            <div id="shipping_detail_drawer" class="{{$invoice->is_same_shipping == 'yes' ? 'd-none' : '' }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. NAME</label>
                    <div class="controls ">
                      <input type="text" value="{{$invoice->shipping_name}}" class="form-control" name="shippingName" id="shippingName"
                        placeholder="Enter Shipping Name" maxlength="100">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="shippingAddress" class="control-label">SHIP. ADD.</label>
                    <div class="controls ">
                      <textarea name="shippingAddress" id="shippingAddress" rows="3" cols="2"
                        placeholder="Enter Shipping Address" maxlength="500" class="form-control shippingAddress">{{$invoice->shipping_address}}</textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. PHONE</label>
                    <div class="controls ">
                      <input type="text" value="{{$invoice->shipping_phone}}" name="shippingPhone" id="shippingPhone"
                        placeholder="Enter Shipping Phone" maxlength="30" class="form-control shippingPhone">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. State</label>
                    <div class="controls ">
                      <select type="list" data- name="shippingState" class="form-control shippingState" id="shippingState">
                        <option >Select State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}" {{ $invoice->shipping_state == $state->id ? 'selected' : ''}} >{{$state->name}} ({{$state->state_code}})</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. Country</label>
                    <div class="controls">
                      <input type="text" name="shippingCountry" value="{{$invoice->shipping_country}}" id="shippingCountry" class="form-control shippingCountry" placeholder="Enter Country">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. GSTIN</label>
                    <div class="controls ">
                      <input type="text"  name="shippingGSTIN" value="{{$invoice->shipping_gstin}}" id="shippingGSTIN" placeholder="Enter Shipping GSTIN" class="form-control shippingGSTIN" maxlength="30">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="control-label ">SHIP. PAN</label>
                    <div class="controls ">
                      <input type="text"  name="shippingpan" value="{{$invoice->shippingpan}}" id="shippingPAN" placeholder="Enter Shipping PAN shippingpan" class="form-control" maxlength="30">
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
                      <input id="invoiceNumber" name="invoice_number" value="{{$invoice->invoice_number}}" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">DATE</label>
                    <div class="controls col-sm-7">
                      <input type="text" value="{{ $invoice->bill_date ? \Carbon\Carbon::now()->toDateString($invoice->bill_date,'d-M-Y') : ''}}" name="bill_date" id="datepicker_bill" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @if($general_settings->challan_date_no == 1)
            <div class="col-md-12">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">Challan Date</label>
                    <div class="controls col-sm-7">
                      <input name="challan_date" type="text" value="{{ $invoice->challan_date != '' ? \Carbon\Carbon::now()->toDateString($invoice->challan_date,'d-M-Y') : ''}}"   class="form-control datepicker">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">Challan No.  </label>
                    <div class="controls col-sm-7">
                      <input name="challan_number"  value="{{$invoice->challan_no}}" type="text"  class="form-control challan_number">
                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endif

            <div class="col-md-12">
              <div class="row">
              @if($invoice_option->po_no == 1)
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">P.O. No.</label>
                    <div class="controls col-sm-7">
                      <input name="order_no" value="{{$invoice->order_no}}" type="text"  class="form-control">
                    </div>
                  </div>
                </div>
                @endif
                @if($invoice_option->po_no == 1)
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">L.R. No.</label>
                    <div class="controls col-sm-7">
                      <input name="lrno"  value="{{$invoice->lrno}}"  type="text" class="form-control">
                    </div>
                  </div>

                </div>
                @endif
                @if($general_settings->e_way_no == 1)
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">E-Way No.</label>
                    <div class="controls col-sm-7">
                      <input name="eway" value="{{$invoice->eway}}"  class="form-control">
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </div>
            @if($general_settings->transport == 1)
            <div class="col-sm-12 text-right"><a href="#" class="btn btn-link" data-toggle="modal"
                data-target="#transportModal">Create New Transport</a>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label for="" class="control-label col-sm-3">Transport</label>
                <div class="controls col-sm-9">
                  <select class="select2 form-control" id="selecttransport" name="tranport_name">
                    <option></option>
                    @foreach($transports as $transport)
                    <option value="{{ $transport->id}}"  {{ ($invoice->tranport_name !='' && $invoice->tranport_name == $transport->id) ? 'selected':'' }}>{{ $transport->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <input type="hidden" name="transport_transport_id" value="{{$invoice->transport_transport_id}}" class="transport_transport_id">
            <input type="hidden" name="transport_id" value="{{$invoice->transport_id}}" class="transport_id">
            <input type="hidden" name="transport_vehicle_no" value="{{$invoice->transport_vehicle_no}}" class="transport_vehicle_no">
            <div class="col-md-12 mt-2">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-6">TRANS. ID</label>
                    <div class="controls col-sm-6">
                      <input name="transport_id_label" value="{{$invoice->transport_id_label}}"   disabled id="transport_id_label" class="form-control transport_id_label">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="" class="control-label col-sm-5">VEHICLE NO.</label>
                    <div class="controls col-sm-7">
                      <input name="vehicle_no_label" value="{{$invoice->vehicle_no_label}}"  id="vehicle_no_label" class="form-control vehicle_no_label">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="row bg-white">
        <div class="col-12">
          <table class="table table-bordered addinvoice-table mb-0" id="document-item-list">
            <thead>
              <tr>
                <th>No.</th>
                <th colspan="5" style="width:39%;">Product / Item</th>
                <th>HSN Code</th>
                <th>Qty.</th>
                <th>Price</th>
                <th class="discount_field"  style="width: 105px;">Discount</th>
                <th>GST</th>
                <th style="width: 105px;">Cess</th>
                <th>Amount</th>
                <th style="width: 60px;"></th>
              </tr>
            </thead>
            <tbody class="ui-sortable product-list-row">
            <tr class="product-item-row1">

                        <td colspan="6">
                            <a href="#" class="btn-link w-100 text-right d-block mb-2" data-toggle="modal" data-target="#productModal">Create New Product/Item</a>
                            <span role="status" aria-live="polite" class=""></span>
                        </td>
            </tr>
                @if(count($invoice_items)>0)
                    @foreach($invoice_items as $key => $item)
                    <tr class="product-item-row">
                        <td>
                            <label class="product-item-row-number">1</label>
                        </td>
                        <td colspan="5">

                            <span role="status" aria-live="polite" class=""></span>
                            <select name="product_id[]"  class="product_id form-control product-item select2"
                            style="width:200px;">
                                <option >Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id}}"  {{$product->id == $item->product_id ?'selected' : ''}}>{{ $product->name}}</option>
                                @endforeach

                            </select>
                            <input class="hidden-item-product-id" name="hidden_item_product_id[]" type="hidden" value="{{$item->hidden_item_product_id}}">
                            <input class="hidden-item-product-name" name="hidden_item_product_name[]" type="hidden" value="{{$item->hidden_item_product_name}}">
                            <input class="hidden-item-product-uom" name="hidden_item_product_uom[]" type="hidden" value="{{$item->hidden_item_product_uom}}">
                            <input class="hidden-item-product-is_transport" name="hidden_item_product_is_transport[]"
                            type="hidden" value="{{$item->hidden_item_product_is_transport}}">
                            <input class="hidden-item-product-gst" name="hidden_item_product_gst[]" type="hidden" value="{{$item->hidden_item_product_gst}}" >

                            <textarea class="form-control" placeholder="Item Note..." name="product_note[]"
                            maxlength="800">{{$item->product_note}}</textarea>
                        </td>

                        <td>
                            <input type="text" name="hsncode[]" class="form-control hsccode" placeholder="HSN/SAC"
                            style="width:60px;" maxlength="20" value="{{$item->hsncode}}">
                        </td>

                        <td>
                            <input type="text" name="quantity[]" class="form-control quantity" placeholder="Qty."
                            style="width:50px;" maxlength="10" value="{{$item->quantity}}">
                            <label class="product-quantity-available"></label>
                        </td>

                        <td>
                            <center>
                            <input type="text" name="price[]" class="form-control rate" placeholder="Price" style="width:100px;"
                                maxlength="10" value="{{$item->price}}">
                            </center>
                        </td>

                        <td class="discount_field">
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                </div>
                                <input type="text" name="discount[]" style="width:60px" value="{{$item->discount}}" class="form-control disc"  value="0"
                                maxlength="10">
                            </div>
                            <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rs</div>
                                </div>
                                <input type="text" name="discount_rupee[]" style="width:60px" class="form-control disc_in_rupee"  value="0"
                                maxlength="10">
                            </div>
                            <input type="hidden" name="taxable_line_value[]" class="taxable_line_value" value="0">
                        </td>

                        <td class="gst_field">
                          <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                              <div class="input-group-text">%</div>
                            </div>
                            <input type="text" name="gst[]" class="form-control gst"  value="0" style="width:60px" maxlength="10">
                          </div>
                          <div class="input-group mt-2 flex-nowrap">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Rs</div>
                            </div>
                            <input type="text" style="width:60px" name="total_gst_rate[]" class="form-control gst_amount"  value="0"
                            maxlength="10">
                          </div>
                          <input type="hidden" name="gst_amount[]" class="gst_amount" value="0">
                          <input type="hidden" name="sell_price_with_tax[]" class="sell_price_with_tax" value="0">

                          <input type="hidden" name="igst_rate[]" class="igst_rate" value="0">
                        </td>


                        {{-- <td>
                            <input type="text" name="gst[]" value="{{$item->gst}}" readonly="true" class="form-control gst" placeholder="%" style="width:50px;"
                            maxlength="5" >
                        </td> --}}

                        <td>
                            <div class="input-group flex-nowrap">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                </div>
                                <input type="text" name="cess[]" value="{{$item->cess}}" style="width:60px" class="form-control cess" placeholder="%">
                            </div>
                            <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rs</div>
                                </div>
                                <input type="text" name="cess_amount[]"  style="width:60px" value="{{$item->cessrate}}"  class="form-control cess_amount" placeholder="Rs">
                            </div>
                            <input  type="hidden" name="cessrate[]" value="{{$item->cessrate}}" class="cessrate">
                        </td>

                        <td style="width:90px;">
                            <center>
                            <input type="text" name="total[]" value="{{$item->total}}" class="form-control line_total" placeholder="Total"
                                style="width:80px;">
                            </center>
                        </td>

                        <td>
                            <center>
                            <button type="button"  class="btn btn-remove-row btn-lg"><i
                                class="fa fa-times"></i></button>
                            </center>
                        </td>
                    </tr>
                    @endforeach
                @endif



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
                    <input type="hidden" name="total_qty" id="total_qty" value="{{$invoice->total_qty}}" value="0">
                    <label type="text" name="" id="total_qty_label" class="">{{$invoice->total_qty}}</label>
                </td>

                <td>
                    <input type="hidden" name="total_price" id="total_price" value="{{$invoice->total_price}}">
                    <label type="text" name="" id="total_price_lable" class="">{{$invoice->total_price}}</label>
                </td>

                <td class="discount_field">
                    <input type="hidden" name="total_discount" id="total_discount" value="{{$invoice->total_discount}}">
                    <label type="text" name="" id="total_discount_label" class="">{{$invoice->total_discount}}</label>
                </td>

                <td>
                    <input type="hidden" name="total_gst_rate" id="total_cgst_rate" value="{{$invoice->total_gst_rate}}">
                    <label type="text" name="" id="total_gst_rate_label" class="">{{$invoice->total_gst_rate}}</label>
                </td>

                <td>
                      <input type="hidden" name="total_cess_rate" id="total_cess_rate" value="{{$invoice->total_cess_rate}}">
                      <label type="text" name="" id="total_cess_rate_label" class="">{{$invoice->total_cess_rate}}</label>
                </td>



                <td style="width:90px;">
                  <center>

                    <input type="hidden" name="item_total" id="item_total" value="{{$invoice->item_total}}">
                    <label type="text" name="" id="item_total_label" class="">{{$invoice->item_total}}</label>

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
      <div class="row mx-0  bg-white mt-4">
        <div class="col-sm-6 border-right py-3">
          <div class="form-group">
            <label>Notes for personal records (If any)</label>
            <textarea class="form-control" name="payment_note"  placeholder="These notes not to be printed on invoice"
              rows="4">{{$invoice->payment_note}}</textarea>
          </div>
          @if($general_settings->due_date == 1)
          <div class="form-group m-3">
            <label for="labelDueDate">Due Date</label>
            <input type="text" name="due_date" value="{{ $invoice->due_date ?  \Carbon\Carbon::now()->toDateString($invoice->due_date,'d-M-Y'): '' }}" class="form-control datepicker">
          </div>
          @endif
        </div>
        <div class="col-sm-6 py-3">
          <div class="row mt-2">
            <div class="col-sm-7">Total Taxable Amount</div>
            <input type="hidden" name="total_taxable" id="total_taxable" value="{{$invoice->total_taxable}}">
            <div class="col-sm-5 text-right total_taxable_label" >{{$invoice->total_taxable}}</div>
          </div>
          <div class="row mt-2">
            <div class="col-sm-7">Total GST </div>
            <input type="hidden" name="total_tax" id="total_tax" value="{{$invoice->total_tax}}">
            <div class="col-sm-5 text-right total_tax_lable">{{$invoice->total_tax}}</div>
          </div>
          <div class="row mt-2">
            <div class="col-sm-5">Additional Charge</div>

            <div class="col-sm-7 d-flex justify-content-end"><input type="text" class="form-control w-50" id="other_charges" name="other_charges" value="{{$invoice->other_charges}}" /></div>
          </div>

          @if($general_settings->discount_box == 1)
          <div class="row mt-2">
            <div class="col-sm-6">Discount</div>
            <div class="col-sm-6 text-right">
              <div class="row">
                <div class="col-sm-4">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">%</div>
                    </div>
                    <input type="text" class="form-control total_discount_in_percentage" value="{{$invoice->total_discount_in_percentage}}" name="total_discount_in_percentage"  placeholder="00">
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Rs</div>
                    </div>
                    <input type="text" class="form-control total_discount_in_amount" value="{{$invoice->total_discount_in_amount}}" name="total_discount_in_amount"  placeholder="00">
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif

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
            <div class="col-sm-6 text-right"><h5 class="font-weight-bold grand_total"  id="grand_total_label">{{$invoice->grand_total}}</h5></div>
            <input type="hidden" name="grand_total" id="grand_total" value="0" value="{{$invoice->grand_total}}">
            <p class="text-right mt-4 px-3 w-100 grandtotalwords">{{$invoice->hidden_grandtotalwords}}.</p>
            <input type="hidden" name="hidden_round_off_value" id="hidden_round_off_value" value="{{$invoice->hidden_round_off_value}}" >
                        <input type="hidden" name="hidden_grandtotalwords" id="hidden_grandtotalwords" value="{{$invoice->hidden_grandtotalwords}}" >
          </div>
        </div>
      </div>
    </div>
    </div>

</form>



@include('partials.modal.customer')





<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

<script src="{{asset('public/js/general.js')}}"></script>

<script src="{{asset('public/js/customer.js')}}"></script>

<script src="{{asset('public/js/create_customer.js')}}"></script>

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







    // get_invoice_number();

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

@endsection

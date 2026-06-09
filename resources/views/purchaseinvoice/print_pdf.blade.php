@extends('layouts.print')

@section('content')
<style>
 *{
  box-sizing: border-box;
 }
  ul li{
    list-style: none;
  }
  
  ul{
    padding: 0;
    margin: 0;
  }
  li{
    font-size: 16px;
  }
  .invoice-cont {
  background: #fff;
}
p{
  margin:0;
  display: inline-block;
  font-size: 15px;
}
.d-flex{
  display: flex;
}
.d-flex li{
  display: inline-flex;
 padding:10px 0px 0px 4px ;
 align-items: flex-start;
 width: 45%;
  vertical-align: baseline;
}
.d-flex li p{
  margin-bottom: 0px;
  display: block;
}
b{
  padding: 0;
  margin: 0;
}
tbody,td,tr{
  vertical-align: baseline;
  padding: 0;
}
.invoice-from{
  padding-left: 4px;
}
.p-0{
  padding: 0px;
}
.table_2 td{
  border-bottom: 1px solid #000;
  padding-bottom: 2px;
  padding-left: 4px;
}

.table_2 td p{
  display: block;
}
table{
  border-spacing: 0px;
}
</style>

<div class="" >
  <div class="" >
      <div class="container" >
          <div class="row ">

              <div class="invoice-cont" style="font-size: 13px;">
                  <div class="col-md-12" style="position:relative;">
                      <!-- col-lg-12 start here -->
                      <div class="invoice-cont" style="font-size: 13px;width:100%">
                        <div class="col-md-12">
                            <!-- col-lg-12 start here -->
                            <div class="panel panel-default plain" id="dash_0">
                                <!-- Start .panel -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="invoice-items">
                                              <div class="logo">
                                                <div class="invoice-logo" style="display: inline-block;width:50%">
                                                  @if($organization->logo_image)
                                                  <!-- <img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"> -->
                                                  <img width="70" src="file:///{{ public_path().'/storage/'.$organization->logo_image }}" alt="Invoice logo">
                                                  @endif
                                                </div>
                                                <h2 style="display: inline-block;text-align:right;width:49%">Invoice</h2>

                                              </div>
                                                <div class="table-responsive">
                                                    <table class="table" style="border: 1px solid #000;margin-bottom:0;width:100%;padding:0px;">                                                        
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 50%; padding:0px;">
                                                                    <div class="invoice-from"
                                                                        style="border-top:0px; border-left:0px; border-bottom:1px solid #000;border-right:1px solid #000;padding-bottom:10px; ">
                                                                        <ul class="list-unstyled text-left">
                                                                            <li
                                                                                style="font-weight: bold;font-size: 20px; margin-bottom: 0;">
                                                                                <b>
                                                                                    @if ($organization->name)
                                                                                        {{ $organization->name }}
                                                                                    @endif
                                                                                </b>

                                                                            </li>
                                                                            <li>
                                                                                @if ($organization->address1)
                                                                                    {{ $organization->address1 }}
                                                                                @endif
                                                                            </li>
                                                                            <li>
                                                                                @if ($organization->city)
                                                                                    {{ $organization->city }}
                                                                                @endif
                                                                            </li>
                                                                            <li>
                                                                                @if ($organization->pincode)
                                                                                    {{ $organization->state_name . ' - ' . $organization->pincode }}
                                                                                @endif
                                                                            </li>

                                                                            <li class="d-flex">
                                                                                <p class='col-2'><b>Phone:</b></p>
                                                                                <p class='col-10'>
                                                                                    {{ $invoice->phone ? '+91-' . $invoice->phone : '' }}
                                                                                </p>
                                                                            </li>

                                                                            <li class="d-flex">
                                                                                <p class='col-2'>
                                                                                    <b>GSTIN:</b></p>
                                                                                <p class="col-10">
                                                                                    {{ $organization->gstin ? $organization->gstin : '' }}
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="invoice-from"
                                                                    style="border-top:0px; border-left:0px;border-right:1px solid #000;padding:4px 4px 20px; ">
                                                                      <ul class="list-unstyled text-left mb-0">
                                                                          <p><b
                                                                              style="display: inline-block;vertical-align: top;width:80px">Bill
                                                                              From</b> <span
                                                                              style="font-size: 16px; font-weight:bolder; display: inline-block;vertical-align: top;">{{$invoice->customer_name}}</span>
                                                                          </p>
                                                                          <p style="display: block"><b
                                                                                  style="display: inline-block;vertical-align: top;width:80px">Address</b>
                                                                              <span
                                                                                  style="display: inline-block;vertical-align: top;">{{$invoice->address1}}</span>
                                                                          </p>
                                                                          <p><b
                                                                                  style="display: inline-block;vertical-align: top;width:80px">State</b>
                                                                              <span
                                                                                  style="display: inline-block;vertical-align: top;">{{$invoice->states_name}} - {{$invoice->pincode}}</span>
                                                                          </p>
                                                                          <p><b
                                                                                  style="display: inline-block;vertical-align: top;width:80px">Phone</b>
                                                                              <span
                                                                                  style="display: inline-block;vertical-align: top;">
                                                                                  {{$invoice->phone ? '+91-'.$invoice->phone : ''}}
                                                                              </span>
                                                                          </p>
                                                                          <p style="display: block"><b
                                                                                  style="display: inline-block;vertical-align: top;width:80px">GSTIN</b>
                                                                              <span
                                                                                  style="display: inline-block;vertical-align: top;"> {{$invoice->gstin ? $invoice->gstin : ''}}</span>
                                                                          </p>
                                                                          <p><b
                                                                                  style="display: inline-block;vertical-align: top;width:80px">PAN</b>
                                                                              <span
                                                                                  style="display: inline-block;vertical-align: top;"> {{$invoice->pan ? $invoice->pan : ''}}</span>
                                                                          </p>
                                                                      </ul>
                                                              </div>
                                                                   
                                                                    
                                                                </td>
                                                                <td class="p-0">
                                                                  <table style="width: 100%" class="table_2">  
                                                                    <tr style="border-bottom: 1px solid #000;padding-bottom:10px;">
                                                                        <td style="border-right: 1px solid #000;width:50%">
                                                                          <p>Invoice No.</p>
                                                                          <p><b>{{ $invoice->invoice_prefix }}
                                                                            {{ $invoice->invoice_number }}
                                                                            {{ $invoice->invoice_postfix }}</b></p>
                                                                        </td>
                                                                        <td>
                                                                          <p>Date:</p>
                                                                          <p><b>{{ $invoice->bill_date ? \Carbon\Carbon::now()->toDateString($invoice->bill_date, 'd-M-Y') : '' }}</b></p>
                                                                        </td>
                                                                      </tr> 
                                                                    <tr style="border-bottom: 1px solid #000">
                                                                        <td style="border-right: 1px solid #000;width:50%">
                                                                          <p>Challan Date:</p>
                                                                          <p><b>{{ $invoice->challan_date ? \Carbon\Carbon::now()->toDateString($invoice->challan_date, 'd-M-Y') : '' }}</b></p>
                                                                        </td>
                                                                        <td>
                                                                          <p>P.O
                                                                            no.</p>
                                                                          <p><b> {{ $invoice->order_no ? $invoice->order_no : '' }}</b></p>
                                                                        </td>
                                                                      </tr> 
                                                                    <tr style="border-bottom: 1px solid #000">
                                                                        <td style="border-right: 1px solid #000;width:50%">
                                                                          <p>L.R no.</p>
                                                                          <p><b>{{ $invoice->lrno ? $invoice->lrno : '' }}</b></p>
                                                                        </td>
                                                                        <td>
                                                                          <p>E-Way
                                                                            no.</p>
                                                                          <p><b>{{ $invoice->eway ? $invoice->eway : '' }}</b></p>
                                                                        </td>
                                                                      </tr> 
                                                                    <tr style="border-bottom: 1px solid #000">
                                                                        <td style="border-right: 1px solid #000;width:50%">
                                                                          <p>Transport:</p>
                                                                          <p><b>{{ $invoice->tranport_name ? $invoice->tranport_name : '' }}</b></p>
                                                                        </td>
                                                                        <td>
                                                                          <p>Trans
                                                                            ID:</p>
                                                                          <p><b>{{ $invoice->transport_transport_id ? $invoice->transport_transport_id : '' }}
                                                                          </b></p>
                                                                        </td>
                                                                      </tr> 
                                                                    
                                                                    <tr style="border-bottom: 1px solid #000">
                                                                        <td style="border-right: 1px solid #000;width:50%">
                                                                          <p>Vehicle
                                                                            no.</p>
                                                                          <p><b> {{ $invoice->transport_vehicle_no ? $invoice->transport_vehicle_no : '' }}</b></p>
                                                                        </td>
                                                                        <td>
                                                                          <p>Place
                                                                            of supply:</p>
                                                                          <p><b>{{ $invoice->states_name ? $invoice->states_name . '(' . $invoice->scode . ')' : '' }}
                                                                          </b></p>
                                                                        </td>
                                                                      </tr> 
                                                                    <tr>
                                                                      <td style="border-bottom: none;">                                                        <p style="padding-top:5px; ">Terms of Delivery</p></td>
                                                                    </tr>
                                                                  </table>

                                                </td>
                                                </tr>
                                                </tbody>
                                                </table>

                                                <table style="border: 1px solid #000000; border-top:0px;width:100%;">
                                                    <thead class="text-center">
                                                        <th style="border-right:1px solid #000000;border-bottom:1px solid #000; padding:5px;">
                                                            SI<br> No.</th>
                                                        <th
                                                            style="border-right:1px solid #000000;border-bottom:1px solid #000; padding:5px;;">
                                                            Description of Goods
                                                        </th>
                                                        <th  style="border-right:1px solid #000000;border-bottom:1px solid #000; padding:5px;">
                                                            HSN/SAC</th>
                                                        <th  style="border-right:1px solid #000000;border-bottom:1px solid #000; padding:5px;">
                                                              Quantity</th>
                                                        <th  style="border-right:1px solid #000000;border-bottom:1px solid #000; padding:5px;">
                                                            Rate<br>(Incl. of Tax)</th>
                                                        <th  style="border-right:1px solid #000000;border-bottom:1px solid #000; padding:5px;">
                                                            Rate</th>
                                                        <th style="border-right:1px solid #000000;border-bottom:1px solid #000; padding:5px;">
                                                            per</th>
                                                        <th 
                                                            style="border-right:1px solid #000000;border-bottom:1px solid #000; padding:5px;">
                                                            Amount</th>
                                                    </thead>
                                                    <tbody style="vertical-align: baseline">
                                                        <td style="border-right:1px solid #000;padding:5px ">
                                                            01
                                                        </td>
                                                        <td
                                                            style="border-right:1px solid #000;padding:5px ">
                                                            <p><b>Bag</b></p>
                                                            <table style="width: 100%; margin:50px 0px 90px;" class="tax">
                                                              <tr>  
                                                                <td></td>                                                              
                                                                 <td><p style="display:block;text-align:right;"> <b>CGST</b></p> </td>                                                              
                                                              </tr>
                                                              <tr>                                                               
                                                                 <td></td>  
                                                                 <td><p style="display:block;text-align:right;"> <b>SGST</b></p> </td>                                                            
                                                              </tr>
                                                              <tr>
                                                                <td >
                                                                  <p>Less:</p>
                                                                </td>
                                                                <td style="text-align: right">
                                                                  <p><b>R OFF</b></p>
                                                                </td>
                                                              </tr>
                                                            </table>
                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px ">
                                                            <p>2523</p>
                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px ">
                                                            <p><b>132.000 BAG</b></p>
                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px ">
                                                            <p></p>
                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px ">
                                                            <p>295.00</p>
                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px ">
                                                            <p>Beg</p>
                                                        </td>
                                                        <td  class="text-right"
                                                            style="padding:5px">
                                                            <p style="display:block;text-align:right;"><b>38,940.00</b></p>
                                                            <table style="width:100%;margin:50px 0px 90px;">
                                                            <tr>
                                                              <td><p style="display:block;text-align:right;"><b>5,451.60</b></p></td>
                                                            </tr>
                                                            <tr>
                                                              <td><p style="display:block;text-align:right;"><b>5,451.60</b></p></td>
                                                            </tr>
                                                            <tr>
                                                              <td><p style="display:block;text-align:right;"><b>(-)0.20</b></p></td>
                                                            </tr>
                                                            </table>
                                                            
                                                        </td>

                                                    </tbody>
                                                    <tfoot class="text-center" style="border-top:1px solid #000 ">
                                                        <td style="border-right:1px solid #000;padding:5px"></td>
                                                        <td class="text-right"
                                                            style="border-right:1px solid #000;padding:5px;">
                                                            <p style="display: block;text-align:right;">Total</p>
                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px"></td>
                                                        <td style="border-right:1px solid #000;padding:5px">
                                                            <b>132.000 BAG</b>
                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px">

                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px">

                                                        </td>
                                                        <td style="border-right:1px solid #000;padding:5px">

                                                        </td>
                                                        <td  class="text-right"
                                                            style="padding:5px">
                                                            <p style="display: block;text-align:right;"><b>₹ 49,843.00</b></p>
                                                        </td>

                                                    </tfoot>
                                                </table>
                                                <div class="word_price" style="border:1px solid #000;border-top:0px;padding:4px">
                                                    <div>
                                                        <p style="width: 50%">Amount Chargeable (in words)</p>
                                                        <p style="width:49%; text-align:right;">E. & O.E</p>
                                                    </div>
                                                    <p style="font-weight:700;margin-top:5px;">INR Forty Nine Thousand
                                                        Eight Hundred Forty Three Only</p>
                                                </div>
                                                <table class="table"
                                                    style="border: 1px solid #000;margin-bottom:0; border-top:0px;width:100%;">
                                                    <thead style="vertical-align: baseline;">
                                                        <th></th>
                                                        <th class="text-center"
                                                            >HSN/SAC</th>
                                                            <th style="border-right:1px solid #000;
                                                            "></th>
                                                        <th class="text-center"
                                                            style="border-right:1px solid #000;
                                                            ">
                                                            Taxable<br>Value</th>
                                                        <th  class="text-center"
                                                            style="border-right:1px solid #000;padding:0;">CGST
                                                            <table style="width:100%;border-top:1px solid #000; ">
                                                            <tr>
                                                                <td style='border-right:1px solid #000;width:50%;text-align:right;padding-right:5px'><p>Rate
                                                                </p></td>
                                                                <td style="padding-left: 4px"><p >Amount</p></td>
                                                            </tr>
                                                            </table>
                                                        </th>
                                                        <th  class="text-center"
                                                            style="border-right:1px solid #000;padding:0;">SGST/UTGST
                                                            <table style="width:100%;border-top:1px solid #000; ">
                                                                <tr>
                                                                    <td style='border-right:1px solid #000;width:50%;text-align:right;padding-right:5px'><p>Rate
                                                                    </p></td>
                                                                    <td style="padding-left: 4px"><p >Amount</p></td>
                                                                </tr>
                                                                </table>
                                                        </th>
                                                        <th class="text-center"
                                                            style="border-right:1px solid #000;
                                                            ">Total<br>Tax
                                                            Amount</th>
                                                    </thead>
                                                    <tbody class="text-center" style="border-top:1px solid #000; ">
                                                        <tr>
                                                            <td
                                                                style="border-bottom:1px solid #000;
                                                                ">2523</td>
                                                                <td style="border-bottom:1px solid #000;
                                                                "></td>
                                                                <td style="border-bottom:1px solid #000; border-right:1px solid #000;
                                                                "></td>
                                                            <td style="border-bottom:1px solid #000; border-right:1px solid #000;
                                                            ">38,940.00
                                                            </td>
                                                            <td 
                                                                style='border-bottom:1px solid #000; border-right:1px solid #000;padding:0;'>
                                                                <table style="width:100%;">
                                                                    <tr>
                                                                        <td style='border-right:1px solid #000;width:50%;text-align:right;padding-right:5px'><p>14%
                                                                        </p></td>
                                                                        <td style="padding-left: 4px"><p >5,451.60 </p></td>
                                                                    </tr>
                                                                    </table>
                                                            </td>
                                                            <td 
                                                                style='border-bottom:1px solid #000; border-right:1px solid #000;padding:0px'>
                                                                <table style="width:100%;">
                                                                    <tr>
                                                                        <td style='border-right:1px solid #000;width:50%;text-align:right;padding-right:5px'><p>14%
                                                                        </p></td>
                                                                        <td style="padding-left: 4px"><p >5,451.60 </p></td>
                                                                    </tr>
                                                                    </table>
                                                            </td>
                                                            <td style="border-bottom:1px solid #000; border-right:1px solid #000;padding:5px">
                                                                10,903.20
                                                            </td>
                                                        </tr>

                                                        <tr style="border-top: 1px solid #000;">
                                                            <td></td>
                                                            <td></td>
                                                            <td                                                                 style="border-right:1px solid #000;padding:5px;text-align:right">
                                                                <b>Total</b>
                                                            </td>
                                                            <td style="border-right:1px solid #000;padding:5px">
                                                                <b>38,940.00</b>
                                                            </td>
                                                            <td 
                                                                style='border-right:1px solid #000;padding:0;'>
                                                                <table style="width:100%;padding:0px;">
                                                                    <tr>
                                                                        <td style='border-right:1px solid #000;width:50%;text-align:right;padding-right:5px'><p>
                                                                        </p></td>
                                                                        <td style="padding-left: 4px"><p ><b>5,451.60</b></p></td>
                                                                    </tr>
                                                                    </table>
                                                                
                                                            </td>
                                                            <td 
                                                                style='border-right:1px solid #000;padding:0;'>
                                                                <table style="width:100%;">
                                                                    <tr>
                                                                        <td style='border-right:1px solid #000;width:50%;text-align:right;padding-right:5px'><p>
                                                                        </p></td>
                                                                        <td style="padding-left: 4px"><p ><b>5,451.60</b></p></td>
                                                                    </tr>
                                                                    </table>
                                                            </td>
                                                            <td   style="border-right:1px solid #000;padding:5px">
                                                                <b>10,903.20</b>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                                <div class="decs "
                                                    style="border: 1px solid #000;border-top:0;padding:5px 0px 0px 5px;">
                                                    <div class="amt d-flex ">
                                                        <p style="font-size: 14px: display:inline-block;">Tax Amount (in words)</p>
                                                        <p style="font-size: 16px; display:inline-block;"><b>: INR Ten Thousand Nine Hundred Three and Twenty paise
                                                                Only</b></p>

                                                    </div>
                                                    <table style="width: 100%;margin-top:20px;">
                                                        <tr>
                                                            <td style="width: 50%">
                                                                <p style="text-decoration: underline;display:block">Declaration</p>
                                                                <p style="display: block">We declare that this invoice shows the actual price of the
                                                                    goods described and that all particulars are true and
                                                                    correct.</p>
                                                            </td>
                                                            <td style="text-align: right;border: 1px solid #000;border-bottom:0;border-right:0;">
                                                                <p style="font-size: 16px;display:block"><b>for NEW BHARAT CEMENT STORE</b></p>
                                                                <p style="margin-top: 20px;display:block;">Authorised Signatory</p>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>


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
                      <!-- End .panel -->
                  </div>
              </div>
              <!-- col-lg-12 end here -->
          </div>
      </div>
  </div>
</div>
@endsection
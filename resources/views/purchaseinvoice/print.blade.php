@extends('layouts.customer')

@section('content')
<style>
p {
    margin-bottom: 0px;
}

li {
    list-style: none;
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
</style>
<div class="page-content">
    <div class="top-stickybar">
        <div class="container-fluid">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <div class=" pl-0">
                    <h4>Admin Details</h4>
                </div>
                <div class="">
                    <!--<a href="#" class="btn btn-light mr-2">Edit</a>-->
                    <?php $url = http_build_query(Request::query()); ?>
                    <a href="{{ url('print-invoice-purchase-downloadpdf?'.$url) }}" class="btn btn-light mr-2">Download
                        PDF</a>
                    <!--<button id="" name="" value="" class="btn btn-primary">Print</button>-->

                    <a target="_blank" href="{{ url('print-invoice-purchase?'.$url.'&download=pdf') }}">Print</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid main-container mb-5">
        <div class="inoice-page-container">
            <div class="container bootdey">
                <div class="row invoice row-printable">
                    <div class="invoice-printing-opt">
                        <h5><i class="fa fa-print mr-2"></i> Invoice printing options</h5>
                        <div class="row justify-content-between">
                            <div class=" col-lg-4 pl-5">
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
                    <div class="invoice-cont" style="font-size: 13px;">
                        <div class="col-md-12">
                            <!-- col-lg-12 start here -->
                            <div class="panel panel-default plain" id="dash_0">
                                <!-- Start .panel -->
                                <div class="panel-body p30">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="invoice-items">
                                                <div class="logos">
                                                    <div class="invoice-logo mb-5">
                                                        @if($organization->logo_image)
                                                        <!-- <img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"> -->
                                                        <img width="100"
                                                            src="{{ asset('org_logos/'.$organization->logo_image) }}"
                                                            alt="Invoice logo">
                                                        @endif
                                                    </div>

                                                </div>
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
                                                                                {{ $organization->state_name . ' - ' .
                                                                                $organization->pincode }}
                                                                                @endif
                                                                            </li>

                                                                            <li
                                                                                style="display: flex;align-items:center;">
                                                                                <p class='col-2'><b>Phone:</b></p>

                                                                                <p class='col-10'>
                                                                                    {{ $invoice->phone ? '+91-' .
                                                                                    $invoice->phone : '' }}
                                                                                </p>
                                                                            </li>

                                                                            <li
                                                                                style="display: flex;align-items:center;">
                                                                                <p class='col-2'>
                                                                                    <b> GSTIN:</b>
                                                                                </p>
                                                                                <p class="col-10">
                                                                                    {{ $organization->gstin ?
                                                                                    $organization->gstin : '' }}
                                                                                </p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="invoice-from"
                                                                        style="border-top:0px; border-left:0px;border-right:1px solid #000;padding:0px 10px;padding-bottom:16px; ">
                                                                        <ul class="list-unstyled text-left mb-0">
                                                                            <p><b
                                                                                    style="display: inline-block;vertical-align: top;width:80px">Bill
                                                                                    From</b> <span
                                                                                    style="font-size: 16px; font-weight:bolder; display: inline-block;vertical-align: top;">{{$invoice->customer_name}}</span>
                                                                            </p>
                                                                            <p><b
                                                                                    style="display: inline-block;vertical-align: top;width:80px">Address</b>
                                                                                <span
                                                                                    style="display: inline-block;vertical-align: top;">{{$invoice->address1}}</span>
                                                                            </p>
                                                                            <p><b
                                                                                    style="display: inline-block;vertical-align: top;width:80px">State</b>
                                                                                <span
                                                                                    style="display: inline-block;vertical-align: top;">{{$invoice->states_name}}
                                                                                    - {{$invoice->pincode}}</span>
                                                                            </p>
                                                                            <p><b
                                                                                    style="display: inline-block;vertical-align: top;width:80px">Phone</b>
                                                                                <span
                                                                                    style="display: inline-block;vertical-align: top;">
                                                                                    {{$invoice->phone ?
                                                                                    '+91-'.$invoice->phone : ''}}
                                                                                </span>
                                                                            </p>
                                                                            <p><b
                                                                                    style="display: inline-block;vertical-align: top;width:80px">GSTIN</b>
                                                                                <span
                                                                                    style="display: inline-block;vertical-align: top;">
                                                                                    {{$invoice->gstin ? $invoice->gstin
                                                                                    : ''}}</span>
                                                                            </p>
                                                                            <p><b
                                                                                    style="display: inline-block;vertical-align: top;width:80px">PAN</b>
                                                                                <span
                                                                                    style="display: inline-block;vertical-align: top;">
                                                                                    {{$invoice->pan ? $invoice->pan :
                                                                                    ''}}</span>
                                                                            </p>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                                <td style="padding: 0">
                                                                    <p style="padding: 5px">Original for receipien</p>

                                                                    <div class="d-flex"
                                                                        style=" border-bottom:1px solid #000;padding:0px 10px;border-top: 1px solid #000;">
                                                                        <li class="col-6"
                                                                            style="border-right: 1px solid #000;">
                                                                            <p>Invoice No.</p>
                                                                            <p><b>
                                                                                    {{ $invoice->invoice_prefix }}
                                                                                    {{ $invoice->invoice_number }}
                                                                                    {{ $invoice->invoice_postfix }}

                                                                                </b></p>
                                                                        </li>
                                                                        <li class="col-6 pl-2">
                                                                            <p>Date:</p>
                                                                            <p><b>
                                                                                    {{ $invoice->bill_date ?
                                                                                    \Carbon\Carbon::now()->toDateString($invoice->bill_date,
                                                                                    'd-M-Y') : '' }}

                                                                                </b></p>

                                                                        </li>
                                                                    </div>
                                                                    <div class="d-flex"
                                                                        style=" border-bottom:1px solid #000;padding:0px 10px;">
                                                                        <li class="col-6"
                                                                            style="border-right: 1px solid #000;">
                                                                            <p>Challan Date:</p>
                                                                            <p><b>
                                                                                    {{ $invoice->challan_date ?
                                                                                    \Carbon\Carbon::now()->toDateString($invoice->challan_date,
                                                                                    'd-M-Y') : '' }}

                                                                                </b></p>
                                                                        </li>
                                                                        <li class="col-6 pl-2">
                                                                            <p>P.O
                                                                                no.:</p>
                                                                            <p><b>
                                                                                    {{ $invoice->order_no ?
                                                                                    $invoice->order_no : '' }}

                                                                                </b></p>

                                                                        </li>
                                                                    </div>
                                                                    <div class="d-flex"
                                                                        style=" border-bottom:1px solid #000;padding:0px 10px;">
                                                                        <li class="col-6"
                                                                            style="border-right: 1px solid #000;">
                                                                            <p>L.R no.:</p>
                                                                            <p><b>
                                                                                    {{ $invoice->lrno ? $invoice->lrno :
                                                                                    '' }}

                                                                                </b></p>
                                                                        </li>
                                                                        <li class="col-6 pl-2">
                                                                            <p>E-Way
                                                                                no.:</p>
                                                                            <p><b>
                                                                                    {{ $invoice->eway ? $invoice->eway :
                                                                                    '' }}

                                                                                </b></p>

                                                                        </li>
                                                                    </div>
                                                                    <div class="d-flex"
                                                                        style=" border-bottom:1px solid #000;padding:0px 10px;">
                                                                        <li class="col-6"
                                                                            style="border-right: 1px solid #000;">
                                                                            <p>Transport</p>
                                                                            <p><b>
                                                                                    {{ $invoice->tranport_name ?
                                                                                    $invoice->tranport_name : '' }}

                                                                                </b></p>
                                                                        </li>
                                                                        <li class="col-6 pl-2">
                                                                            <p>Trans
                                                                                ID</p>
                                                                            <p><b>
                                                                                    {{ $invoice->transport_transport_id
                                                                                    ? $invoice->transport_transport_id :
                                                                                    '' }}

                                                                                </b></p>

                                                                        </li>
                                                                    </div>
                                                                    <div class="d-flex" style="padding:0px 10px;">
                                                                        <li class="col-6"
                                                                            style="border-right: 1px solid #000;">
                                                                            <p>Vehicle
                                                                                no.</p>
                                                                            <p><b>
                                                                                    {{ $invoice->transport_vehicle_no ?
                                                                                    $invoice->transport_vehicle_no : ''
                                                                                    }}

                                                                                </b></p>
                                                                        </li>
                                                                        <li class="col-6 pl-2">
                                                                            <p>Place
                                                                                of supply</p>
                                                                            <p><b>
                                                                                    {{ $invoice->states_name ?
                                                                                    $invoice->states_name . '(' .
                                                                                    $invoice->scode . ')' : '' }}

                                                                                </b></p>

                                                                        </li>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <table
                                                        style="border: 1px solid #000000; border-top:0px;width:100%;">
                                                        <thead class="text-center">
                                                            <th
                                                                style="border:1px solid #000000; padding:5px;border-top:0px">
                                                                SI No.</th>
                                                            <th colspan="4"
                                                                style="border:1px solid #000000; padding:5px;border-top:0px;">
                                                                Description of Goods
                                                            </th>
                                                            <th
                                                                style="border:1px solid #000000; padding:5px;border-top:0px">
                                                                HSN/SAC</th>
                                                            <th
                                                                style="border:1px solid #000000; padding:5px;border-top:0px">
                                                                Quantity</th>
                                                            <th
                                                                style="border:1px solid #000000; padding:5px;border-top:0px">
                                                                Rate<br>(Incl. of Tax)</th>
                                                            <th
                                                                style="border:1px solid #000000; padding:5px;border-top:0px">
                                                                Rate</th>
                                                            <th
                                                                style="border:1px solid #000000; padding:5px;border-top:0px">
                                                                per</th>
                                                            <th colspan="2"
                                                                style="border:1px solid #000000; padding:5px;border-top:0px">
                                                                Amount</th>
                                                        </thead>
                                                        <tbody style="vertical-align: baseline">
                                                            @if (count($invoice_items) > 0)
                                                            @foreach ($invoice_items as $key => $item)

                                                            {{-- {{ $item }} --}}
                                                            <tr style="border-bottom: 1px solid #000">
                                                                <td style="border-right:1px solid #000;padding:5px ">
                                                                    01
                                                                </td>
                                                                <td colspan="4"
                                                                    style="border-right:1px solid #000;padding:5px ">
                                                                    <b>{{ $item->hidden_item_product_name }}</b>
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
                                                                    <p>{{ $item->hsncode }}</p>
                                                                </td>
                                                                <td style="border-right:1px solid #000;padding:5px ">
                                                                    <b>{{$item->quantity}}</b>
                                                                </td>
                                                                <td style="border-right:1px solid #000;padding:5px ">
                                                                    <p></p>
                                                                </td>
                                                                <td style="border-right:1px solid #000;padding:5px ">
                                                                    <p>{{$item->price}}</p>
                                                                </td>
                                                                <td style="border-right:1px solid #000;padding:5px ">
                                                                    <p>Beg</p>
                                                                </td>
                                                                <td class="text-right"
                                                                    style="border-right:1px solid #000;padding:5px">
                                                                    <b>{{$item->total}}</b>
                                                                    <div class=" mt-5 ">
                                                                        <div>
                                                                            <p><b>5,451.60</b></p>
                                                                            <p><b>5,451.60</b></p>
                                                                            <p><b>(-)0.20</b></p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @endif


                                                        </tbody>
                                                        <tfoot class="text-center" style="border-top:1px solid #000 ">
                                                            <td style="border-right:1px solid #000;padding:5px"></td>
                                                            <td class="text-right" colspan="4"
                                                                style="border-right:1px solid #000;padding:5px;">
                                                                Total
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
                                                            <td class="text-right"
                                                                style="border-right:1px solid #000;padding:5px">
                                                                <b>₹ 49,843.00</b>
                                                            </td>

                                                        </tfoot>
                                                    </table>
                                                    <div class="word_price"
                                                        style="border:1px solid #000;border-top:0px;">
                                                        <div class="d-flex">
                                                            <div class="bank col-5 p-4">
                                                                <p style="font-size: 16px;font-weight: 700;">Saller bank
                                                                    details</p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Bank
                                                                        name</b> <span
                                                                        style="display: inline-block;vertical-align: top;">@if($banks!=""){{$banks->bank_name}}@endif</span>
                                                                </p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Account
                                                                        no.</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">@if($banks!=""){{$banks->account_no}}@endif</span>
                                                                </p>
                                                                <p style="margin-bottom:3px"><b
                                                                        style="display: inline-block;vertical-align: top;width:110px">Branch
                                                                        & IFSC</b>
                                                                    <span
                                                                        style="display: inline-block;vertical-align: top;">@if($banks!=""){{$banks->branch_name}}
                                                                        {{$banks->ifsc_code ? '& '.$banks->ifsc_code :
                                                                        ''}}@endif</span>
                                                                </p>
                                                            </div>
                                                            <div class="chares col-7 p-4"
                                                                style="border-left: 1px solid #000;">

                                                                <div
                                                                    class="d-flex align-items-center justify-content-between">
                                                                    <p>Amount Chargeable (in words)</p>
                                                                    <p>E. & O.E</p>
                                                                </div>
                                                                <p class="mt-2" style="font-weight:700;font-size:16px;">
                                                                    INR Forty Nine Thousand
                                                                    Eight Hundred Forty Three Only</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table lass="table"
                                                        style="border: 1px solid #000;margin-bottom:0; border-top:0px;width:100%;">
                                                        <thead class="text-center">
                                                            <th></th>
                                                            <th class="text-center" style="">HSN/SAC</th>
                                                            <th style="border-right:1px solid #000;"></th>
                                                            <th class="text-center"
                                                                style="border-right:1px solid #000;">
                                                                Taxable</th>
                                                            <th colspan="2" class="text-center"
                                                                style="border-right:1px solid #000;padding:0;">CGST

                                                            </th>
                                                            <th colspan="2" class="text-center"
                                                                style="border-right:1px solid #000;padding:0;">
                                                                SGST/UTGST

                                                            </th>
                                                            <th class="text-center"
                                                                style="border-right:1px solid #000;">
                                                                Total</th>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th style="border-right:1px solid"></th>
                                                                <th style="border-right:1px solid">Value</th>
                                                                <th
                                                                    style="border-right:1px solid;border-top:1px solid #000;">
                                                                    Rate</th>
                                                                <th
                                                                    style="border-right:1px solid;border-top:1px solid #000;">
                                                                    Amount</th>
                                                                <th
                                                                    style="border-right:1px solid;border-top:1px solid #000;">
                                                                    Rate</th>
                                                                <th
                                                                    style="border-right:1px solid;border-top:1px solid #000;">
                                                                    Amount</th>
                                                                <th>Tax Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center" style="border-top:1px solid #000; ">
                                                            <tr>
                                                                <td>2523</td>
                                                                <td></td>
                                                                <td style="border-right:1px solid #000;"></td>
                                                                <td style="border-right:1px solid #000;">38,940.00
                                                                </td>
                                                                <td style='border-right:1px solid #000;padding:0;'>14%
                                                                </td>
                                                                <td style='border-right:1px solid #000;padding:0;'>
                                                                    5,451.60
                                                                </td>
                                                                <td style='border-right:1px solid #000;padding:0;'>14%
                                                                </td>
                                                                <td style='border-right:1px solid #000;padding:0;'>
                                                                    5,451.60
                                                                </td>


                                                                <td>
                                                                    10,903.20
                                                                </td>
                                                            </tr>
                                                            <tr style="border-top: 1px solid #000;">
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-right"
                                                                    style="border-right:1px solid #000;">
                                                                    <b>Total</b>
                                                                </td>
                                                                <td style="border-right:1px solid #000;">
                                                                    <b>38,940.00</b>
                                                                </td>
                                                                <td style='border-right:1px solid #000;'></td>
                                                                <td style='border-right:1px solid #000;'><b>5,451.60</b>
                                                                </td>
                                                                <td style='border-right:1px solid #000;'></td>
                                                                <td style='border-right:1px solid #000;'><b>5,451.60</b>
                                                                </td>

                                                                <td>
                                                                    <b>10,903.20</b>
                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                    <div class="decs "
                                                        style="border: 1px solid #000;border-top:0;padding:5px 0px 0px 5px;">
                                                        <div class="amt d-flex ">
                                                            <p>Tax Amount (in words)</p>
                                                            <h6><b>: INR Ten Thousand Nine Hundred Three and Twenty
                                                                    paise
                                                                    Only</b></h6>

                                                        </div>
                                                        <div class="sign d-flex mt-5">
                                                            <div class="col-6">
                                                                <p style="text-decoration: underline">Declaration</p>
                                                                <p>We declare that this invoice shows the actual price
                                                                    of the
                                                                    goods described and that all particulars are true
                                                                    and
                                                                    correct.</p>
                                                            </div>
                                                            <div class="col-6 sin text-right"
                                                                style="border: 1px solid #000;border-bottom:0;border-right:0;">
                                                                <h6><b>for NEW BHARAT CEMENT STORE</b></h6>
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
                            <!-- End .panel -->
                        </div>
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PointOfsale;
use App\Models\Banks;
use App\Models\Customers;
use App\Models\GeneralSettings;
use App\Models\GstRate;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\InvoiceItems;
use App\Models\InvoiceOptions;
use App\Models\Organization;
use App\Models\Products;
use App\Models\State;
use App\Models\Transport;
use App\Models\Units;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Nullable;
use Validator;
use PDF;
use File;
use Spatie\Browsershot\Browsershot;

class PointOfSaleController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        // $invoices = PointOfsale::where('point_ofsales.user_id', $user->id)->where('point_ofsales.status', '!=', 'cancel')->orderBy('point_ofsales.id', 'desc')->get();
        // $dateS = Carbon::now()->startOfMonth();
        // $dateE = Carbon::now();
        // $today_total = PointOfsale::whereDate('created_at', Carbon::today())->where('user_id',$user->id)->sum('grand_total');
        // $month_total = PointOfsale::whereBetween('created_at', [$dateS, $dateE])->where('user_id',$user->id)->sum('grand_total');
        // $till_date_total = PointOfsale::where('user_id',$user->id)->sum('grand_total');

        $invoices = Invoice::where('user_id',$user->id)->where('type','pos')->where('status','!=','cancel')->orderBy('id','desc')->get();

        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now();
        $today_total = Invoice::whereDate('created_at', Carbon::today())->where('user_id',$user->id)->where('type', 'pos')->sum('grand_total');
        $month_total = Invoice::whereBetween('created_at', [$dateS, $dateE])->where('user_id',$user->id)->where('type', 'pos')->sum('grand_total');
        $till_date_total = Invoice:: where('type', 'pos')->where('user_id',$user->id)->sum('grand_total');

        return view('point-of-sale.index',compact('invoices', 'today_total', 'month_total', 'till_date_total'));

    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        // dd($products);
        $transports = Transport::where('user_id', '=', $user_id)->orderBy('id', 'desc')->get();
        $banks = Banks::where('user_id', '=', $user_id)->orderBy('id', 'desc')->get();
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $states = State::where('status', 'active')->where('country_id', 1)->get();
        $organization = Organization::select('organizations.*', 'states.id as state_name')->join('states', 'states.id', '=', 'organizations.state_id')->where('user_id', '=', $user_id)->orderBy('id', 'desc')->first();
        $general_settings = GeneralSettings::where('user_id', $user_id)->get()->first();
        $invoice_option = InvoiceOptions::where(array('user_id' => $user_id, 'type' => 'invoice'))->get()->first();
        $units = Units::all();
        $gstrate = GstRate::all();
        return view('point-of-sale.create', compact('products', 'transports', 'customers', 'states', 'organization', 'banks', 'gstrate', 'units', 'general_settings', 'invoice_option'));
    }

    public function store(Request $request)
    {
        if ($request->method() == "POST") {

            $rules = array(
                "customer_vendor_id" => "nullable",
                // "PlaceofSupply" => "required",
                "invoice_number" => "required",
                "due_date" => "nullable",
                "other_tax_in_rupee" => "nullable",
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                try {
                    $user = Auth::user();
                    $invoice = new Invoice();
                    $invoice->user_id = $user->id;
                    $invoice->pos_customerName = $request->customer_name;
                    $invoice->pos_customerPhone = $request->customer_phone;
                    $invoice->pos_customerAddress = $request->customer_address;
                    $invoice->pos_customerPan = $request->customer_pan;
                    $invoice->pos_customerGst = $request->customer_gstno;

                    $min = 1000;
                    $max = 9999;
                    $randomId = rand($min, $max);
                    $invoice->customer_vendor_id = $randomId;
                    $invoice->invoice_type = '';
                    $invoice->invoice_prefix = '';
                    $invoice->invoice_postfix = '';
                    $invoice->invoice_number = $request->invoice_number;
                    $invoice->bill_date = $request->bill_date ? Carbon::now()->toDateString($request->bill_date, 'Y-m-d') : '';
                    $invoice->challan_no = $request->challan_no ? $request->challan_no : '';
                    $invoice->challan_date = $request->challan_date ? Carbon::now()->toDateString($request->challan_date, 'Y-m-d') : null;
                    $invoice->order_no = $request->order_no ? $request->order_no : '';
                    $invoice->order_no_date = $request->order_no_date ? Carbon::now()->toDateString($request->order_no_date, 'Y-m-d') : null;
                    $invoice->lrno = $request->lrno ? $request->lrno : '';
                    $invoice->eway = $request->eway ? $request->eway : '';
                    $invoice->due_date = $request->due_date ? Carbon::now()->toDateString($request->due_date, 'Y-m-d') : null;
                    $invoice->bank = '';
                    $invoice->payment_type = $request->payment_type;
                    $invoice->document_note = $request->document_note ? $request->document_note : '';
                    $invoice->payment_note = $request->payment_note ? $request->payment_note : '';
                    $invoice->bank_term_condition = $request->bank_term_condition ? $request->bank_term_condition : '';
                    // if($request->payment != 'CREDIT'){
                    //     $invoice->payment_received =  $request->payment_received ? $request->payment_received : '';
                    // }else{
                    $invoice->payment_received = $request->payment_recieved ? $request->payment_recieved : 0;
                    // $invoice->payment_received = 0;
                    // }

                    $invoice->total_qty = $request->total_qty ? $request->total_qty : 0;
                    $invoice->total_price = $request->total_price ? $request->total_price : 0;
                    $invoice->total_discount = $request->total_discount ? $request->total_discount : 0;
                    $invoice->total_gst_rate = $request->total_gst_rate ? $request->total_gst_rate : 0;
                    // $invoice->total_sgst_rate =  $request->total_sgst_rate ? $request->total_sgst_rate : 0;
                    // $invoice->total_igst_rate =  $request->total_igst_rate ? $request->total_igst_rate : 0;
                    $invoice->total_cess_rate = $request->total_cess_rate ? $request->total_cess_rate : 0;
                    $invoice->item_total = $request->item_total ? $request->item_total : 0;
                    $invoice->total_taxable = $request->total_taxable ? $request->total_taxable : 0;
                    $invoice->total_tax = $request->total_tax ? $request->total_tax : 0;
                    $invoice->other_charges = $request->other_charges ? $request->other_charges : 0;
                    // $invoice->other_tax_in_rupee =  $request->other_tax_in_rupee ;
                    // $invoice->other_tax_value =  $request->other_tax_value ? $request->other_tax_value : 0;
                    // $invoice->other_tax_amount =  $request->other_tax_amount ? $request->other_tax_amount : 0;
                    // $invoice->total_discount_type_minus =  $request->total_discount_type_minus ;
                    // $invoice->total_discount_in_rupee =  $request->total_discount_in_rupee ;
                    // $invoice->total_discount_value =  $request->total_discount_value ? $request->total_discount_value : 0;
                    $invoice->total_discount_in_amount = $request->total_discount_in_amount ? $request->total_discount_in_amount : 0;
                    $invoice->total_discount_in_percentage = $request->total_discount_in_percentage ? $request->total_discount_in_percentage : 0;
                    $invoice->hidden_round_off_value = $request->hidden_round_off_value ? $request->hidden_round_off_value : 0;
                    $invoice->hidden_grandtotalwords = $request->hidden_grandtotalwords ? $request->hidden_grandtotalwords : '';
                    $invoice->sale_receipt_amount = "";
                    $invoice->sale_receipt_id = "";
                    $invoice->grand_total = $request->grand_total ? $request->grand_total : 0;
                    $invoice->type = 'pos';
                    $invoice->status = 'active';

                    // dd($invoice);
                    $invoice->save();

                    $invoice_id = $invoice->id;
                    if ($invoice_id > 0) {
                        $invoiceDetail = new InvoiceDetails();
                        $invoiceDetail->invoice_id = $invoice_id;
                        $invoiceDetail->user_id = $user->id;
                        $invoiceDetail->business_state = $request->business_state ? $request->business_state : '';
                        $invoiceDetail->business_gstno = $request->business_gstno ? $request->business_gstno : '';
                        $invoiceDetail->customer_gstno = $request->customer_gstno ? $request->customer_gstno : '';
                        $invoiceDetail->customer_pan = $request->customer_pan ? $request->customer_pan : '';
                        $invoiceDetail->phone = $request->customer_phone ? $request->customer_phone : '';
                        $invoiceDetail->address = $request->customer_address ? $request->customer_address : '';
                        $invoiceDetail->reverse_charge = $request->reverse_charge == 'yes' ? 'yes' : 'no';
                        $invoiceDetail->is_same_shipping = $request->is_same_shipping ? 'yes' : 'no';
                        $invoiceDetail->shipping_name = $request->shippingName ? $request->shippingName : '';
                        $invoiceDetail->shipping_address = $request->shippingAddress ? $request->shippingAddress : '';
                        $invoiceDetail->shipping_phone = $request->shippingPhone ? $request->shippingPhone : '';
                        $invoiceDetail->shipping_state = $request->shippingState ? $request->shippingState : 0;
                        $invoiceDetail->shipping_country = $request->shippingCountry ? $request->shippingCountry : '';
                        $invoiceDetail->shipping_gstin = $request->shippingGSTIN ? $request->shippingGSTIN : '';
                        $invoiceDetail->shipping_pan = $request->shippingpan ? $request->shippingpan : '';
                        $invoiceDetail->place_supply = $request->PlaceofSupply ? $request->PlaceofSupply : 0;
                        $invoiceDetail->transport_id = $request->transport_id ? $request->transport_id : 0;
                        $invoiceDetail->tranport_name = $request->tranport_name ? $request->tranport_name : '';
                        $invoiceDetail->transport_transport_id = $request->transport_transport_id ? $request->transport_transport_id : '';
                        $invoiceDetail->transport_vehicle_no = $request->transport_vehicle_no ? $request->transport_vehicle_no : '';
                        $invoiceDetail->transport_id_label = $request->transport_id_label ? $request->transport_id_label : '';
                        $invoiceDetail->vehicle_no_label = $request->vehicle_no_label ? $request->vehicle_no_label : '';
                        $invoiceDetail->save();

                        // Insert Invoice Items
                        foreach ($request->product_id as $key => $value) {
                            $invoice_item = new InvoiceItems();
                            $invoice_item->invoice_id = $invoice_id;
                            $invoice_item->product_id = $request->product_id[$key];
                            $invoice_item->hsncode = $request->hsncode[$key] ? $request->hsncode[$key] : '';
                            $invoice_item->product_note = $request->product_note[$key] ? $request->product_note[$key] : '';
                            $invoice_item->hidden_item_product_id = $request->hidden_item_product_id[$key] ? $request->hidden_item_product_id[$key] : 0;
                            $invoice_item->hidden_item_product_name = $request->hidden_item_product_name[$key] ? $request->hidden_item_product_name[$key] : '';
                            $invoice_item->hidden_item_product_uom = $request->hidden_item_product_uom[$key] ? $request->hidden_item_product_uom[$key] : '';
                            $invoice_item->hidden_item_product_is_transport = $request->hidden_item_product_is_transport[$key] ? $request->hidden_item_product_is_transport[$key] : '';
                            $invoice_item->hidden_item_product_gst = $request->hidden_item_product_gst[$key] ? $request->hidden_item_product_gst[$key] : '';
                            // $invoice_item->hidden_item_product_sgst = $request->hidden_item_product_sgst[$key] ? $request->hidden_item_product_sgst[$key] : '';
                            // $invoice_item->hidden_item_product_igst = $request->hidden_item_product_igst[$key] ? $request->hidden_item_product_igst[$key] : '' ;
                            // $invoice_item->hidden_item_product_cess = $request->hidden_item_product_cess[$key] ? $request->hidden_item_product_cess[$key] : '';
                            // $invoice_item->hidden_item_product_cess_amount = $request->hidden_item_product_cess_amount[$key] ? $request->hidden_item_product_cess_amount[$key] : '';
                            $invoice_item->quantity = $request->quantity[$key] ? $request->quantity[$key] : '';
                            $invoice_item->price = $request->price[$key] ? $request->price[$key] : '';
                            $invoice_item->discount = $request->discount[$key] ? $request->discount[$key] : 0;
                            $invoice_item->taxable_line_value = $request->taxable_line_value[$key] ? $request->taxable_line_value[$key] : 0;
                            $invoice_item->gst = $request->gst[$key] ? $request->gst[$key] : 0;
                            // $invoice_item->cgst_rate = $request->cgst_rate[$key] ? $request->cgst_rate[$key] : 0 ;
                            // $invoice_item->sgst = $request->sgst[$key] ? $request->sgst[$key] : 0 ;
                            // $invoice_item->sgst_rate = $request->sgst_rate[$key] ? $request->sgst_rate[$key] : 0 ;
                            // $invoice_item->igst = $request->igst[$key] ? $request->igst[$key] : 0;
                            // $invoice_item->igst_rate = $request->igst_rate[$key] ? $request->igst_rate[$key] : 0;
                            $invoice_item->cess = $request->cess[$key] ? $request->cess[$key] : 0;
                            $invoice_item->cessrate = $request->cessrate[$key] ? $request->cessrate[$key] : 0;
                            // $invoice_item->cess_amount = $request->cess_amount[$key] ? $request->cess_amount[$key]: 0;
                            $invoice_item->total = $request->total[$key] ? $request->total[$key] : 0;
                            $invoice_item->status = 'active';
                            $invoice_item->save();
                        }


                        foreach ($request->product_id as $key => $quantity) {

                            $qt = Products::find($request->product_id[$key]);

                            $qt->stock = $qt->stock - $request->quantity[$key];

                            $qt->update();

                        }

                        $notification = array(
                            'message' => 'Invoice Created Successfully'
                        );
                        return redirect('/point-of-sale')->with($notification)->withinput();
                    }
                } catch (Exception $e) {
                    $notification = array('type' => 'warning', 'message' => $e->getMessage());
                    return redirect()->back()->with($notification)->withinput();
                }

            } else {
                $message = $validator->messages()->first();
                $notification = array(
                    'message' => $message,
                    'type' => 'warning'
                );
                return redirect()->back()->with($notification)->withinput();
            }
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        // $invoice = Invoice::select('point_ofsales.*', 'invoice_details.*', 'point_ofsales.id as id', 'invoice_details.id as invoice_detail_id')->join('invoice_details', 'invoice_details.invoice_id', '=', 'point_ofsales.id')->where(array('point_ofsales.user_id' => $user->id, 'point_ofsales.id' => $id))->where('point_ofsales.status', '!=', 'cancel')->orderBy('point_ofsales.id', 'desc')->get();

        $invoice = Invoice::select('invoices.*', 'invoice_details.*', 'invoices.id as id', 'invoice_details.id as invoice_detail_id')->join('invoice_details', 'invoice_details.invoice_id', '=', 'invoices.id')->where(array('invoices.user_id' => $user->id, 'invoices.id' => $id))->where('invoices.type', 'pos')->where('invoices.status', '!=', 'cancel')->orderBy('invoices.id', 'desc')->get();

        // dd($invoice);

        $invoice_items = [];
        if ($invoice->count() == 1) {
            $invoice = $invoice[0];
            $invoice_items = InvoiceItems::where('invoice_id', $id)->get();
            $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
            $transports = Transport::where('user_id', '=', $user_id)->orderBy('id', 'desc')->get();
            $banks = Banks::where('user_id', '=', $user_id)->orderBy('id', 'desc')->get();
            $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
            $states = State::where('status', 'active')->where('country_id', 1)->get();
            $organization = Organization::select('organizations.*', 'states.id as state_name')->join('states', 'states.id', '=', 'organizations.state_id')->where('user_id', '=', $user_id)->orderBy('id', 'desc')->first();
            $general_settings = GeneralSettings::where('user_id', $user_id)->get()->first();
            $invoice_option = InvoiceOptions::where(array('user_id' => $user_id, 'type' => 'invoice'))->get()->first();
            $units = Units::all();
            $gstrate = GstRate::all();
            return view('point-of-sale.edit', compact('invoice', 'invoice_items', 'products', 'transports', 'customers', 'states', 'organization', 'banks', 'general_settings', 'invoice_option', 'units', 'gstrate'));
        } else {
            $notification = array(
                'message' => 'No Invoice Found',
                'type' => 'warning'
            );
            return redirect('point-of-sale')->with($notification);
        }
    }


    public function update(Request $request, $id)
    {

        $rules = array(
            // "PlaceofSupply" => "required",
            "invoice_number" => "required"
        );
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            try {
                $user = Auth::user();
                $invoice = Invoice::find($id);
                $invoice->user_id = $user->id;
                $invoice->pos_customerName = $request->customer_name;
                $invoice->pos_customerPhone = $request->customer_phone;
                $invoice->pos_customerAddress = $request->customer_address;
                $invoice->pos_customerPan = $request->customer_pan;
                $invoice->pos_customerGst = $request->customer_gstno;

                $invoice->customer_vendor_id = $request->customer_vendor_id;
                $invoice->invoice_type = '';
                $invoice->invoice_prefix = '';
                $invoice->invoice_postfix = '';
                $invoice->invoice_number = $request->invoice_number;
                $invoice->bill_date = $request->bill_date ? Carbon::now()->toDateString($request->bill_date, 'Y-m-d') : null;
                $invoice->challan_no = $request->challan_no ? $request->challan_no : '';
                $invoice->challan_date = $request->challan_date ? Carbon::now()->toDateString($request->challan_date, 'Y-m-d') : null;
                $invoice->order_no = $request->order_no ? $request->order_no : '';
                // $invoice->order_no_date =  $request->order_no_date ? change_date_format($request->order_no_date,'Y-m-d') : null;
                $invoice->lrno = $request->lrno ? $request->lrno : '';
                $invoice->eway = $request->eway ? $request->eway : '';
                $invoice->due_date = $request->due_date ? Carbon::now()->toDateString($request->due_date, 'Y-m-d') : null;
                $invoice->bank = '';
                $invoice->payment_type = '';

                $invoice->payment_note = $request->payment_note ? $request->payment_note : '';
                $invoice->bank_term_condition = $request->bank_term_condition ? $request->bank_term_condition : '';
                $invoice->payment_received = 0;
                $invoice->total_qty = $request->total_qty ? $request->total_qty : 0;
                $invoice->total_price = $request->total_price ? $request->total_price : 0;
                $invoice->total_discount = $request->total_discount ? $request->total_discount : 0;
                $invoice->total_gst_rate = $request->total_gst_rate ? $request->total_gst_rate : 0;

                $invoice->total_cess_rate = $request->total_cess_rate ? $request->total_cess_rate : 0;
                $invoice->item_total = $request->item_total ? $request->item_total : 0;
                $invoice->total_taxable = $request->total_taxable ? $request->total_taxable : 0;
                $invoice->total_tax = $request->total_tax ? $request->total_tax : 0;
                $invoice->other_charges = $request->other_charges ? $request->other_charges : 0;

                $invoice->total_discount_in_amount = $request->total_discount_in_amount ? $request->total_discount_in_amount : 0;
                $invoice->total_discount_in_percentage = $request->total_discount_in_percentage ? $request->total_discount_in_percentage : 0;
                $invoice->hidden_round_off_value = $request->hidden_round_off_value ? $request->hidden_round_off_value : 0;
                $invoice->hidden_grandtotalwords = $request->hidden_grandtotalwords ? $request->hidden_grandtotalwords : '';
                $invoice->sale_receipt_amount = "";
                $invoice->sale_receipt_id = "";
                $invoice->grand_total = $request->grand_total ? $request->grand_total : 0;
                $invoice->type = 'pos';
                $invoice->status = 'active';

                // dd($invoice);
                $invoice->save();

                $invoice_id = $invoice->id;
                if ($invoice_id > 0) {
                    $invoiceDetail = InvoiceDetails::where('invoice_id', $id)->first();
                    $invoiceDetail->invoice_id = $invoice_id;
                    $invoiceDetail->business_state = $request->business_state ? $request->business_state : '';
                    $invoiceDetail->business_gstno = $request->business_gstno ? $request->business_gstno : '';
                    $invoiceDetail->customer_gstno = $request->customer_gstno ? $request->customer_gstno : '';
                    $invoiceDetail->customer_pan = $request->customer_pan ? $request->customer_pan : '';
                    $invoiceDetail->phone = $request->customer_phone ? $request->customer_phone : '';
                    $invoiceDetail->address = $request->customer_address ? $request->customer_address : '';
                    $invoiceDetail->reverse_charge = $request->reverse_charge == 'yes' ? 'yes' : 'no';
                    $invoiceDetail->is_same_shipping = $request->is_same_shipping ? 'yes' : 'no';
                    $invoiceDetail->shipping_name = $request->shippingName ? $request->shippingName : '';
                    $invoiceDetail->shipping_address = $request->shippingAddress ? $request->shippingAddress : '';
                    $invoiceDetail->shipping_phone = $request->shippingPhone ? $request->shippingPhone : '';
                    $invoiceDetail->shipping_state = $request->shippingState ? $request->shippingState : 0;
                    $invoiceDetail->shipping_country = $request->shippingCountry ? $request->shippingCountry : '';
                    $invoiceDetail->shipping_gstin = $request->shippingGSTIN ? $request->shippingGSTIN : '';
                    $invoiceDetail->shipping_pan = $request->shippingpan ? $request->shippingpan : '';
                    $invoiceDetail->place_supply = $request->PlaceofSupply ? $request->PlaceofSupply : 0;
                    $invoiceDetail->transport_id = $request->transport_id ? $request->transport_id : 0;
                    $invoiceDetail->tranport_name = $request->tranport_name ? $request->tranport_name : '';
                    $invoiceDetail->transport_transport_id = $request->transport_transport_id ? $request->transport_transport_id : '';
                    $invoiceDetail->transport_vehicle_no = $request->transport_vehicle_no ? $request->transport_vehicle_no : '';
                    $invoiceDetail->transport_id_label = $request->transport_id_label ? $request->transport_id_label : '';
                    $invoiceDetail->vehicle_no_label = $request->vehicle_no_label ? $request->vehicle_no_label : '';
                    $invoiceDetail->save();

                    // Insert Invoice Items
                    InvoiceItems::where('invoice_id', $id)->delete();
                    foreach ($request->product_id as $key => $value) {
                        $invoice_item = new InvoiceItems();
                        $invoice_item->invoice_id = $invoice_id;
                        $invoice_item->product_id = $request->product_id[$key];
                        $invoice_item->hsncode = $request->hsncode[$key] ? $request->hsncode[$key] : '';
                        $invoice_item->product_note = $request->product_note[$key] ? $request->product_note[$key] : '';
                        $invoice_item->hidden_item_product_id = $request->hidden_item_product_id[$key] ? $request->hidden_item_product_id[$key] : 0;
                        $invoice_item->hidden_item_product_name = $request->hidden_item_product_name[$key] ? $request->hidden_item_product_name[$key] : '';
                        $invoice_item->hidden_item_product_uom = $request->hidden_item_product_uom[$key] ? $request->hidden_item_product_uom[$key] : '';
                        $invoice_item->hidden_item_product_is_transport = $request->hidden_item_product_is_transport[$key] ? $request->hidden_item_product_is_transport[$key] : '';
                        $invoice_item->hidden_item_product_gst = $request->hidden_item_product_gst[$key] ? $request->hidden_item_product_gst[$key] : '';

                        $invoice_item->quantity = $request->quantity[$key] ? $request->quantity[$key] : '';
                        $invoice_item->price = $request->price[$key] ? $request->price[$key] : '';
                        $invoice_item->discount = $request->discount[$key] ? $request->discount[$key] : 0;
                        $invoice_item->taxable_line_value = $request->taxable_line_value[$key] ? $request->taxable_line_value[$key] : 0;
                        $invoice_item->gst = $request->gst[$key] ? $request->gst[$key] : 0;
                        $invoice_item->cess = $request->cess[$key] ? $request->cess[$key] : 0;
                        $invoice_item->cessrate = $request->cessrate[$key] ? $request->cessrate[$key] : 0;
                        $invoice_item->total = $request->total[$key] ? $request->total[$key] : 0;
                        $invoice_item->status = 'active';
                        $invoice_item->save();
                    }


                    foreach ($request->product_id as $key => $quantity) {

                        $qt = Products::find($request->product_id[$key]);

                        $qt->stock = $qt->stock - $request->quantity[$key];

                        $qt->update();

                    }

                    $notification = array(
                        'message' => 'Invoice Updated Successfully'
                    );
                    return redirect('/point-of-sale')->with($notification)->withinput();
                }
            } catch (Exception $e) {
                $notification = array('type' => 'warning', 'message' => $e->getMessage());
                return redirect()->back()->with($notification)->withinput();
            }
        } else {
            $message = $validator->messages()->first();
            $notification = array(
                'message' => $message,
                'type' => 'warning'
            );
            return redirect()->back()->with($notification)->withinput();
        }
    }

    public function print(Request $request)
    {

        $id = $request->id;

        $original = $request->original ? $request->original : 0;

        if ($original == 1) {
            $count_loop['original'] = 'ORIGINAL FOR RECIPIENT';
        }


        $user = Auth::user();
        // dd($user);
        $user_id = $user->id;

        // $invoice = PointOfsale::select('point_ofsales.*', 'invoice_details.*', 'point_ofsales.id as id', 'invoice_details.id as invoice_detail_id')->join('invoice_details', 'invoice_details.invoice_id', '=', 'point_ofsales.id')->where(array('point_ofsales.user_id' => $user_id, 'point_ofsales.id' => $id))->where('point_ofsales.status', '!=', 'cancel')->orderBy('point_ofsales.id', 'desc')->get();
        $invoice = Invoice::select('invoices.*', 'invoice_details.*', 'invoices.id as id', 'invoice_details.id as invoice_detail_id')->join('invoice_details', 'invoice_details.invoice_id', '=', 'invoices.id')->where(array('invoices.user_id' => $user_id, 'invoices.id' => $id))->where('invoices.type', 'pos')->where('invoices.status', '!=', 'cancel')->get();

        // dd($invoice);

        $invoice_items = [];
        //dd($invoice);
        if ($invoice->count() == 1) {
            //dd($invoice);
            $invoice = $invoice[0];
            $invoice_items = InvoiceItems::where('invoice_id', $id)->get();
            $organization = Organization::select('organizations.*', 'states.name as state_name', 'states.state_code')->join('states', 'states.id', '=', 'organizations.state_id')->where('user_id', '=', $user_id)->orderBy('id', 'desc')->first();
            $banks = Banks::where('user_id', $user_id)->get()->first();
            $invoice_option = InvoiceOptions::where(array('user_id' => $user_id, 'type' => 'invoice'))->get()->first();
            $user = Auth::user();

            if ($request->has('download')) {
                $html = view('point-of-sale.print_pdf', compact('organization', 'invoice', 'invoice_items', 'banks', 'invoice_option'))->render();

                // $pdf = App::make('snappy.pdf.wrapper');
                $pdf = PDF::loadHTML($html)->setPaper('a4','portrait')->setOption('encoding', 'utf-8');
                // $pdf = PDF::loadHTML($html)->setPaper('a4')->setOrientation('portrait')->setOption('encoding', 'utf-8');
                //$file_name = $invoice->invoice_prefix.''.$invoice->invoice_number.''. $invoice->invoice_prefix.'.pdf';
                $file_name = "Hlello test user";
                return $pdf->inline($file_name);
            }

            return view('point-of-sale.print', ['invoice' => $invoice, 'user_details' => $user, 'invoice_items' => $invoice_items, 'organization' => $organization, 'banks' => $banks, 'invoice_option' => $invoice_option]);
        } else {
            $notification = array(
                'message' => 'No Invoice Found',
                'type' => 'warning'
            );
            return redirect('point-of-sale')->with($notification);
        }
    }


    public function downloadprint(Request $request)
    {

        $id = $request->id;

        $original = $request->original ? $request->original : 0;

        if ($original == 1) {
            $count_loop['original'] = 'ORIGINAL FOR RECIPIENT';
        }

        $user = Auth::user();
        $user_id = $user->id;

        $invoice = Invoice::select('invoices.*', 'invoice_details.*', 'invoices.id as id', 'invoice_details.id as invoice_detail_id')->join('invoice_details', 'invoice_details.invoice_id', '=', 'invoices.id')->where(array('invoices.user_id' => $user_id, 'invoices.id' => $id))->where('invoices.type', 'pos')->where('invoices.status', '!=', 'cancel')->get();


        $invoice_items = [];
        //dd($invoice);
        if ($invoice->count() == 1) {
            //dd($invoice);
            $invoice = $invoice[0];
            $invoice_items = InvoiceItems::where('invoice_id', $id)->get();
            $organization = Organization::select('organizations.*', 'states.name as state_name', 'states.state_code')->join('states', 'states.id', '=', 'organizations.state_id')->where('user_id', '=', $user_id)->orderBy('id', 'desc')->first();
            $banks = Banks::where('user_id', $user_id)->get()->first();
            $invoice_option = InvoiceOptions::where(array('user_id' => $user_id, 'type' => 'invoice'))->get()->first();
            $user = Auth::user();

            $html = view('point-of-sale.print_pdf', compact('organization', 'invoice', 'invoice_items', 'banks', 'invoice_option'))->render();
            // $pdf = App::make('snappy.pdf.wrapper');
            $pdf = PDF::loadHTML($html)->setPaper('a4','portrait')->setOption('encoding', 'utf-8');
            // $pdf = PDF::loadHTML($html)->setPaper('a4')->setOrientation('portrait')->setOption('encoding', 'utf-8');
            //$file_name = $invoice->invoice_prefix.''.$invoice->invoice_number.''. $invoice->invoice_prefix.'.pdf';
            //$file_name = "Hlello test user";
            return $pdf->download('Point-of-Sale Invoice.pdf');
        }
    }

}

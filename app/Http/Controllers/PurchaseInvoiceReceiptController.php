<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Invoice;
use App\Models\PaymentReceipt;
use App\Models\Organization;

use Carbon\Carbon;
use Auth;
use Exception;
use Illuminate\Support\Facades\Validator;
use PDF;

class PurchaseInvoiceReceiptController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $salereceipt = PaymentReceipt::select('payment_receipts.*', 'customers.name')->join('customers', 'customers.id', '=', 'payment_receipts.customer_vendor_id')->where('payment_receipts.user_id', $user->id)->where('payment_receipts.type', 'purchase')->orderBy('id', 'desc')->get();
        $totalpurchasereceipt = PaymentReceipt::where('type', 'purchase')->where('user_id', $user_id)->sum('amount');
        // dd($salereceipt);
        return view('purchaseinvoicereceipt.index', compact('salereceipt', 'totalpurchasereceipt'));
    }

    public function create()
    {
        //
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        // dd($customers);
        return view('purchaseinvoicereceipt.create', compact('customers'));
    }

    public function store(Request $request)
    {
        //

        if ($request->method() == "POST") {
            $rules = array(
                "customer_vendor_id" => "required",
                // "receipt_no" => "required|unique:payment_receipts",
                "receipt_no" => "required",
                "amount" => "required",
                "payment_date" => "required"
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                try {
                    // dd($request->all());
                    $user = Auth::user();
                    $salereceipt = new PaymentReceipt();
                    $salereceipt->user_id = $user->id;
                    $salereceipt->customer_vendor_id = $request->customer_vendor_id;
                    $salereceipt->receipt_no = $request->receipt_no;
                    $salereceipt->address = $request->address ? $request->address : '';
                    $salereceipt->gstin_pan = $request->gstin_pan ? $request->gstin_pan : '';
                    $salereceipt->payment_date = $request->payment_date ? Carbon::now()->toDateString($request->payment_date, 'Y-m-d') : '';
                    $salereceipt->payment_option = $request->payment_option ? $request->payment_option : 1;

                    $salereceipt->payment_type = $request->payment_type ? $request->payment_type : '';
                    $salereceipt->invoice_no = $request->invoice_no ? implode(",", $request->invoice_no) : '';
                    $salereceipt->invoice_amount = $request->invoice_amount ? implode(",", $request->invoice_amount) : '';
                    $salereceipt->amount = $request->amount ? $request->amount : '';
                    $salereceipt->payment_note = $request->payment_note ? $request->payment_note : '';
                    $salereceipt->advanced_amount = 0;
                    $salereceipt->type = 'purchase';
                    $salereceipt->save();
                    if ($salereceipt->id > 0) {
                        $receipt_id = $salereceipt->id;
                        $amount = $request->amount;
                        foreach ($request->invoice_no as $invoice_no) {
                            $invoice_detail = Invoice::find($invoice_no);
                            // dd($invoice_detail);
                            $pending_amount = $invoice_detail->grand_total - $invoice_detail->payment_received;
                            if ($amount > $pending_amount) {
                                $invoice_detail->payment_received = $invoice_detail->payment_received + $pending_amount;
                                if ($invoice_detail->sale_receipt_amount == '') {
                                    $invoice_detail->sale_receipt_amount = $pending_amount;
                                    $invoice_detail->sale_receipt_id = $receipt_id;
                                } else {
                                    $invoice_detail->sale_receipt_amount = $invoice_detail->sale_receipt_amount . "," . $pending_amount;
                                    $invoice_detail->sale_receipt_id = $invoice_detail->sale_receipt_id . "," . $receipt_id;
                                }
                                $amount = $amount - $pending_amount;
                            } else {
                                $invoice_detail->payment_received = $invoice_detail->payment_received + $amount;
                                if ($invoice_detail->sale_receipt_amount == '') {
                                    $invoice_detail->sale_receipt_amount = $amount;
                                    $invoice_detail->sale_receipt_id = $receipt_id;
                                } else {
                                    $invoice_detail->sale_receipt_amount = $invoice_detail->sale_receipt_amount . "," . $amount;
                                    $invoice_detail->sale_receipt_id = $invoice_detail->sale_receipt_id . "," . $receipt_id;
                                }
                                $amount = 0;
                            }
                            $invoice_detail->save();
                            if ($amount == 0) {
                                break;
                            }
                        }
                        $notification = array('type' => 'success', 'message' => 'Receipt added Successfully');
                        return redirect('purchase-receipt')->with($notification)->withinput();

                    }
                } catch (Exception $e) {
                    $notification = array('type' => 'warning', 'message' => $e->getMessage());
                    return redirect('purchase-receipt')->with($notification)->withinput();
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
        //
        //$payment_receipt = PaymentReceipt::select('payment_receipts.*','customers.name','customers.address1 as customer_address','customers.gstin_pan as customer_gstin')->join('customers','customers.id','=','payment_receipts.customer_vendor_id')->where('payment_receipts.id',$id)->where('payment_receipts.type','purchase')->first();
        $payment_receipt = PaymentReceipt::select('payment_receipts.*', 'customers.name', 'customers.address1 as customer_address')->join('customers', 'customers.id', '=', 'payment_receipts.customer_vendor_id')->where('payment_receipts.id', $id)->where('payment_receipts.type', 'purchase')->first();
        // dd($payment_receipt);
        return view('purchaseinvoicereceipt.edit', compact('payment_receipt'));

    }

    public function update(Request $request, $id)
    {
        try {
            $payment_receipt = PaymentReceipt::find($id);
            $payment_receipt->payment_date = $request->payment_date ? Carbon::now()->toDateString($request->payment_date, 'Y-m-d') : '';
            $payment_receipt->payment_type = $request->payment_type;
            $payment_receipt->payment_note = $request->payment_note ? $request->payment_note : '';
            $payment_receipt->save();
            $notification = array('type' => 'success', 'message' => 'Receipt Updated Successfully');
            return redirect('purchase-receipt')->with($notification)->withinput();
        } catch (Exception $e) {
            $notification = array('type' => 'warning', 'message' => $e->getMessage());
            return redirect()->back()->with($notification)->withinput();
        }
    }

    public function multidelete(Request $request)
    {
        // dd($request->all());
        // if ($request->method() == "POST") {
        $rules = array(
            "id" => "required"
        );
        // die('123');
        // dd()
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $receipt_id = $request->id;
            // dd($invoices);
            foreach ($receipt_id as $receipt) {
                // echo $invoice;
                $payment_receipt = PaymentReceipt::find($receipt);
                $invoices = Invoice::whereIn('id', explode(',', $payment_receipt->invoice_no))->get();
                // dd($invoices->count());
                foreach ($invoices as $invoice) {

                    if ($invoice->sale_receipt_id != '') {
                        $sale_receipt_id_array = explode(',', $invoice->sale_receipt_id);
                        $sale_receipt_amount_array = explode(',', $invoice->sale_receipt_amount);
                        // dd($sale_receipt_id_array);
                        $key = array_search($receipt, $sale_receipt_id_array);
                        $invoice->payment_received = $invoice->payment_received - $sale_receipt_amount_array[$key];
                        unset($sale_receipt_id_array[$key]);
                        unset($sale_receipt_amount_array[$key]);
                        $invoice->sale_receipt_id = implode(',', $sale_receipt_id_array);
                        $invoice->sale_receipt_amount = implode(',', $sale_receipt_amount_array);
                        $invoice->save();
                    }
                }

                PaymentReceipt::where('id', $receipt)->delete();
            }
            return 1;

        } else {
            echo $validator->errors()->first();
            die;
        }
        // }
    }

    public function print(Request $request)
    {
        $id = $request->id;
        $original = $request->original ? $request->original : 0;
        if ($original == 1) {
            $count_loop['original'] = 'ORIGINAL FOR RECIPIENT';
        }
        $user = Auth::user();
        $user_id = $user->id;
        $payment_receipt = PaymentReceipt::select('payment_receipts.*', 'payment_receipts.id as receipt_id', 'customers.*', 'states.name as state_name', 'states.state_code')->join('customers', 'customers.id', '=', 'payment_receipts.customer_vendor_id')->join('states', 'states.id', '=', 'customers.state_id')->where('payment_receipts.id', $id)->first();


        $organization = Organization::select('organizations.*', 'states.name as state_name')->join('states', 'states.id', '=', 'organizations.state_id')->where('user_id', '=', $user->id)->orderBy('id', 'desc')->first();
        if (count(array($payment_receipt)) > 0) {
            $user = Auth::user();

            if ($request->has('download')) {
                $html = view('purchaseinvoicereceipt.print_pdf', ['payment_receipt' => $payment_receipt, 'user_details' => $user, 'organization' => $organization])->render();
                $pdf = PDF::loadHTML($html)->setPaper('a4')->setOrientation('portrait')->setOption('encoding', 'utf-8');
                //$file_name = $invoice->invoice_prefix.''.$invoice->invoice_number.''. $invoice->invoice_prefix.'.pdf';
                $file_name = "hello";
                return $pdf->inline($file_name);
            }
            return view('purchaseinvoicereceipt.print', ['payment_receipt' => $payment_receipt, 'user_details' => $user, 'organization' => $organization]);
        } else {
            $notification = array(
                'message' => 'No Invoice Found',
                'type' => 'warning'
            );
            return redirect('sale-receipt')->with($notification);
        }
    }


    public function pdfdownload(Request $request)
    {
        $id = $request->id;
        //echo $id;
        $original = $request->original ? $request->original : 0;
        if ($original == 1) {
            $count_loop['original'] = 'ORIGINAL FOR RECIPIENT';
        }
        $user = Auth::user();
        $user_id = $user->id;
        $payment_receipt = PaymentReceipt::select('payment_receipts.*', 'payment_receipts.id as receipt_id', 'customers.*', 'states.name as state_name', 'states.state_code')->join('customers', 'customers.id', '=', 'payment_receipts.customer_vendor_id')->join('states', 'states.id', '=', 'customers.state_id')->where('payment_receipts.id', $id)->first();


        $organization = Organization::select('organizations.*', 'states.name as state_name')->join('states', 'states.id', '=', 'organizations.state_id')->where('user_id', '=', $user->id)->orderBy('id', 'desc')->first();
        if (count(array($payment_receipt)) > 0) {
            $user = Auth::user();
            $html = view('purchaseinvoicereceipt.print_pdf', ['payment_receipt' => $payment_receipt, 'user_details' => $user, 'organization' => $organization])->render();
            $pdf = PDF::loadHTML($html)->setPaper('a4')->setOrientation('portrait')->setOption('encoding', 'utf-8');
            //$file_name = $invoice->invoice_prefix.''.$invoice->invoice_number.''. $invoice->invoice_prefix.'.pdf';
            $file_name = "hello";
            //return $pdf->inline($file_name);
            return $pdf->download('purchase-receipt.pdf');
        }
    }
}

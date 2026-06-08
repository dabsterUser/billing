<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentReceipt;

class InvoiceReceiptHistoryController extends Controller
{
    public function index ()
    {
        $user = auth()->user();

        $payments = PaymentReceipt::select('payment_receipts.*', 'customers.name')->join('customers', 'customers.id', '=', 'payment_receipts.customer_vendor_id')->orderBy('id', 'desc')->get();

        $receiptNumber = PaymentReceipt::select('payment_receipts.*', 'invoices.invoice_number')->join('invoices', 'invoices.customer_vendor_id', '=', 'payment_receipts.customer_vendor_id')->get();

        // dd($receiptNumber);

        return view('receipt-history.index', compact('payments', 'receiptNumber'));
    }
}

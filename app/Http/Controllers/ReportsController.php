<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Customers;
use App\Models\Products;
use App\Models\Invoice;
use App\Models\InvoiceItems;
use App\Models\PaymentReceipt;
use App\Models\Expense;
use App\Models\InventoryHistory;

use App\Exports\SalesReportsExport;
use App\Exports\SalesOutstandingsExport;
use App\Exports\SalesInwardExport;
use App\Exports\SalesProductsExport;
use App\Exports\PurchaseReportsExport;
use App\Exports\PurchaseOutstandingsExport;
use App\Exports\PurchaseInwardExport;
use App\Exports\PurchaseProductsExport;

use Maatwebsite\Excel\Facades\Excel;

use DB;
use PDF;
use File;
use Carbon\Carbon;


class ReportsController extends Controller
{
    // Sales Reports
    public function sales_report(Request $request)
    {

        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $saleReportsData = '';
        return view('reports.sales-report',compact('customers','products','saleReportsData'));

    }

    public function sales_report_invoices(Request $request){
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();

        $customerIds = $request->input('customer_vendor_id');
        $productIds = $request->input('product_id');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');
        $invoiceNumber = $request->input('invoice-num');

        $customerData = Customers :: where('id', $customerIds)->get();
        $productNames = Products::where('user_id',$user_id)->whereIn('id', $productIds)->pluck('name');

        $saleReportsDataQuery  = Invoice::join('invoice_items', 'invoices.id', '=', 'invoice_items.invoice_id')
                ->join('customers', 'invoices.customer_vendor_id', '=', 'customers.id')
                ->where('invoices.user_id', auth()->user()->id)
                ->whereIn('invoices.customer_vendor_id', $customerIds)
                ->whereIn('invoice_items.product_id', $productIds)
                ->whereBetween('invoices.bill_date', [$from_date, $to_date])
                ->where('invoices.type', ['sale', 'pos']);
                if (!empty($invoiceNumber)) {
                    $saleReportsDataQuery->where(function($query) use ($invoiceNumber) {
                        $query->where('invoices.invoice_number', $invoiceNumber);
                    });
                }
        $saleReportsData = $saleReportsDataQuery->get(['invoices.*', 'invoice_items.*','customers.*']);

        dd($saleReportsData);

        // $saleReportsData = Invoice::
        //                     where('user_id',auth()->user()->id)
        //                     ->whereIn('customer_vendor_id', $customerIds)
        //                     ->whereBetween('bill_date', [$from_date, $to_date])
        //                     ->where('type','sale')
        //                     ->get();

        session(['saleReportsData' => $saleReportsData]);

        return view('reports.sales-report',[
            'saleReportsData' => $saleReportsData,
            'customers' => $customers,
            'products' => $products,
            'customerData' => $customerData,
            'productNames'=>$productNames,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function sales_outstandings()
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $salesOutstandings = '';
        return view('reports.sales-outstandings-report',compact('customers','products','salesOutstandings'));
    }

    public function sales_outstandings_invoices(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();

        $customerIds = $request->input('customer_vendor_id');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');
        $invoiceNumber = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();

        $salesOutstandings = Invoice::join('customers', 'invoices.customer_vendor_id', '=', 'customers.id')
                            ->where('invoices.user_id', auth()->user()->id)
                            ->whereIn('invoices.customer_vendor_id', $customerIds)
                            ->whereBetween('invoices.bill_date', [$from_date, $to_date])
                            // ->where('invoices.payment_received', '!=', '0.00') // Uncomment if needed
                            ->where('invoices.type', ['sale', 'pos'])
                            ->get(['invoices.*', 'customers.*']);
        
        session(['salesOutstandings' => $salesOutstandings]);

        return view('reports.sales-outstandings-report',[
            'salesOutstandings' => $salesOutstandings,
            'customers' => $customers,  
            'products' => $products,
            'customerData' => $customerData,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);

    }

    public function sales_products()
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $salesProducts = '';
        return view('reports.sales-product-report',compact('customers','products','salesProducts'));
    }

    public function sales_products_invoices(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();

        $customerIds = $request->input('customer_vendor_id');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');
        $invoiceNumber = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();

        $salesProducts = DB::table('invoices')
                        ->select(
                            'invoice_items.hidden_item_product_name',
                            'invoice_items.hsncode',
                            // 'invoices.customer_vendor_id',
                            DB::raw('SUM(invoice_items.quantity) as total_quantity'),
                            DB::raw('SUM(invoice_items.total) as total_price')
                        )
                        ->join('invoice_items', 'invoice_items.invoice_id', '=', 'invoices.id')
                        ->where('invoices.type', '=', ['sale', 'pos'])
                        ->whereIn('invoices.customer_vendor_id', $customerIds)
                        ->whereBetween('invoices.bill_date', [$from_date, $to_date])
                        ->groupBy('invoice_items.hidden_item_product_name', 'invoice_items.hsncode')
                        ->get();

        // dd($salesProducts);
                        
        session(['salesProducts' => $salesProducts]);

        return view('reports.sales-product-report',[
            'salesProducts' => $salesProducts,
            'customers' => $customers,
            'products' => $products,
            'customerData' => $customerData,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function sales_inward()

    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $salesInward = '';
        return view ('reports.sales-inward-reports',compact('customers','products','salesInward'));
    }

    public function sales_inward_invoices(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();

        $customerIds = $request->input('customer_vendor_id');
        $paymentType = $request->input('payment_type');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');
        $invoiceNumber = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();

        // $salesInwardQuery  = PaymentReceipt:: where('user_id',$user_id)
        //                                 ->where('type','sale')
        //                                 ->whereIn('customer_vendor_id', $customerIds)
        //                                 ->whereBetween('payment_date', [$from_date, $to_date]);
        //                                 if (!empty($paymentType)) {
        //                                     $salesInwardQuery->where('payment_type', $paymentType);
        //                                 }
        //                                 $salesInward= $salesInwardQuery ->get();

        $salesInwardQuery = PaymentReceipt::where('payment_receipts.user_id', $user_id)
                    ->where('payment_receipts.type', 'sale')
                    ->whereBetween('payment_receipts.payment_date', [$from_date, $to_date]);

                if (!empty($paymentType)) {
                    $salesInwardQuery->where('payment_receipts.payment_type', $paymentType);
                }

                $salesInward = $salesInwardQuery
                    ->whereIn('payment_receipts.customer_vendor_id', $customerIds)
                    ->join('customers', 'payment_receipts.customer_vendor_id', '=', 'customers.id')
                    ->select('payment_receipts.*', 'customers.name')
                    ->get();
        
        session(['salesInward' => $salesInward]);

        return view ('reports.sales-inward-reports',[
            'salesInward' => $salesInward,
            'customers' => $customers,
            'products' => $products,
            'customerData' => $customerData,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }


    // Product Reports
    public function purchase_report()
    {

        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $purchaseReportsData = '';
        return view('reports.purchase-report',compact('customers','products','purchaseReportsData'));

    }

    public function purchase_report_invoices(Request $request){

        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();

        $customerIds = $request->input('customer_vendor_id');
        $productIds = $request->input('product_id');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');
        $invoiceNumber = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();
        $productNames = Products::where('user_id',$user_id)->whereIn('id', $productIds)->pluck('name');

        $purchaseReportsData = Invoice::join('invoice_items', 'invoices.id', '=', 'invoice_items.invoice_id')
                ->join('customers', 'invoices.customer_vendor_id', '=', 'customers.id')
                ->where('invoices.user_id', auth()->user()->id)
                ->whereIn('invoices.customer_vendor_id', $customerIds)
                ->whereIn('invoice_items.product_id', $productIds)
                ->whereBetween('invoices.bill_date', [$from_date, $to_date])
                ->where('invoices.type', 'purchase')
                ->get(['invoices.*', 'invoice_items.*','customers.*']);

        session(['purchaseReportsData' => $purchaseReportsData]);

        return view('reports.purchase-report',[
            'purchaseReportsData' => $purchaseReportsData,
            'customers' => $customers,
            'products' => $products,
            'customerData' => $customerData,
            'productNames'=>$productNames,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function purchase_outstandings()
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $purchaseOutstandings = '';
        return view('reports.purchase-outstandings-report',compact('customers','products','purchaseOutstandings'));
    }

    public function purchase_outstandings_invoices(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();

        $customerIds = $request->input('customer_vendor_id');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');
        $invoiceNumber = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();

        $purchaseOutstandings = Invoice::join('customers', 'invoices.customer_vendor_id', '=', 'customers.id')
                            ->where('invoices.user_id', auth()->user()->id)
                            ->whereIn('invoices.customer_vendor_id', $customerIds)
                            ->whereBetween('invoices.bill_date', [$from_date, $to_date])
                            // ->where('invoices.payment_received', '!=', '0.00') // Uncomment if needed
                            ->where('invoices.type', 'purchase')
                            ->get(['invoices.*', 'customers.*']);
                 
        session(['purchaseOutstandings' => $purchaseOutstandings]);

        return view('reports.purchase-outstandings-report',[
            'purchaseOutstandings' => $purchaseOutstandings,
            'customers' => $customers,
            'products' => $products,
            'customerData' => $customerData,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);

    }

    public function purchase_products()
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $purchaseProducts = '';
        return view('reports.purchase-product-report',compact('customers','products','purchaseProducts'));
    }

    public function purchase_products_invoices(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();

        $customerIds = $request->input('customer_vendor_id');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');
        $invoiceNumber = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();

        $purchaseProducts = DB::table('invoices')
                        ->select(
                            'invoice_items.hidden_item_product_name',
                            'invoice_items.hsncode',
                            // 'invoices.customer_vendor_id',
                            DB::raw('SUM(invoice_items.quantity) as total_quantity'),
                            DB::raw('SUM(invoice_items.total) as total_price')
                        )
                        ->join('invoice_items', 'invoice_items.invoice_id', '=', 'invoices.id')
                        ->where('invoices.type', '=', 'purchase')
                        ->whereIn('invoices.customer_vendor_id', $customerIds)
                        ->whereBetween('invoices.bill_date', [$from_date, $to_date])
                        ->groupBy('invoice_items.hidden_item_product_name', 'invoice_items.hsncode')
                        ->get();
                    
        session(['purchaseProducts' => $purchaseProducts]);

        return view('reports.purchase-product-report',[
            'purchaseProducts' => $purchaseProducts,
            'customers' => $customers,
            'products' => $products,
            'customerData' => $customerData,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function purchase_inward()

    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $purchaseInward = '';
        return view ('reports.purchase-inward-reports',compact('customers','products','purchaseInward'));
    }

    public function purchase_inward_invoices(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();

        $customerIds = $request->input('customer_vendor_id');
        $paymentType = $request->input('payment_type');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');
        $invoiceNumber = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();

        $purchaseInwardQuery = PaymentReceipt::where('payment_receipts.user_id', $user_id)
                    ->where('payment_receipts.type', 'purchase')
                    ->whereBetween('payment_receipts.payment_date', [$from_date, $to_date]);

                if (!empty($paymentType)) {
                    $purchaseInwardQuery->where('payment_receipts.payment_type', $paymentType);
                }

                $purchaseInward = $purchaseInwardQuery
                    ->whereIn('payment_receipts.customer_vendor_id', $customerIds)
                    ->join('customers', 'payment_receipts.customer_vendor_id', '=', 'customers.id')
                    ->select('payment_receipts.*', 'customers.name')
                    ->get();

        session(['purchaseInward' => $purchaseInward]);

        return view ('reports.purchase-inward-reports',[
            'purchaseInward' => $purchaseInward,
            'customers' => $customers,
            'products' => $products,
            'customerData' => $customerData,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    // Other Reports

    public function company_ledger_report()
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer','vendor','customer-vendor'))->get();
        $companyLedger = '';
        return view('reports.other-reports.company-ledger-report',compact('customers','companyLedger'));
    }

    public function company_ledger_report_invoice(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer','vendor','customer-vendor'))->get();

        $customerIds = $request->input('customer_vendor_id');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();

        // $companyLedger =  DB::table('invoices')
        //                 ->join('payment_receipts', 'invoices.customer_vendor_id', '=', 'payment_receipts.customer_vendor_id')
        //                 ->select('invoices.*', 'payment_receipts.*')
        //                 ->where('invoices.customer_vendor_id', $customerIds)
        //                 ->whereBetween('invoices.bill_date', [$from_date, $to_date])
        //                 ->groupBy('invoices.id')
        //                 ->get();

        $companyLedger =  DB::table('invoices')
                        ->join('payment_receipts', 'invoices.customer_vendor_id', '=', 'payment_receipts.customer_vendor_id')
                        ->select('invoices.id', 'invoices.bill_date', 'invoices.item_total', 'payment_receipts.invoice_amount')
                        ->where('invoices.customer_vendor_id', $customerIds)
                        ->whereBetween('invoices.bill_date', [$from_date, $to_date])
                        ->groupBy('invoices.id', 'invoices.bill_date', 'invoices.item_total', 'payment_receipts.invoice_amount')
                        ->get();

        dd($companyLedger);
        session(['companyLedger' => $companyLedger]);

        return view ('reports.other-reports.company-ledger-report',[
            'companyLedger' => $companyLedger,
            'customers' => $customers,
            'customerData' => $customerData,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    public function company_outstandings_report()
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer','vendor', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $companyOutstandings = '';
        return view('reports.other-reports.company-outstandings-report',compact('customers','products','companyOutstandings'));
    }

    public function company_outstandings_report_invoice(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer','vendor','customer-vendor'))->get();

        $customerIds = $request->input('customer_vendor_id');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');

        $customerData = Customers :: where('id', $customerIds)->get();

        $companyOutstandings =  DB::table('invoices')
                        ->join('payment_receipts', 'invoices.customer_vendor_id', '=', 'payment_receipts.customer_vendor_id')
                        ->select('invoices.*', 'payment_receipts.*')
                        ->where('invoices.customer_vendor_id', $customerIds)
                        ->whereBetween('invoices.bill_date', [$from_date, $to_date])
                        ->get();
        $debitAmount  = $companyOutstandings->sum('item_total');
        $creditAmount = $companyOutstandings->sum('payment_received');

        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        $lastMonthOutstandings = DB::table('invoices')
            ->join('payment_receipts', 'invoices.customer_vendor_id', '=', 'payment_receipts.customer_vendor_id')
            ->select('invoices.*', 'payment_receipts.*')
            ->where('invoices.customer_vendor_id', $customerIds)
            ->whereBetween('invoices.bill_date', [$lastMonthStart, $lastMonthEnd])
            ->get();

        $totalLastMonthOutstandings = $lastMonthOutstandings->sum('item_total');

        // dd($totalLastMonthOutstandings);

        return view('reports.other-reports.company-outstandings-report',compact('customers','from_date','to_date','customerData','companyOutstandings','debitAmount','creditAmount','totalLastMonthOutstandings'));

    }

    public function company_profit_loss_report()
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer', 'customer-vendor'))->get();
        $products = Products::where('user_id', '=', $user_id)->where('is_visible_all', 1)->orderBy('id', 'desc')->get();
        $companyProfitLoss = '';
        return view('reports.other-reports.company-profit_loss-report',compact('customers','products','companyProfitLoss'));
    }

    public function company_profit_loss_report_invoice(Request $request)
    {
        $user_id = Auth::user()->id;
        $customers = Customers::where('user_id', $user_id)->whereIN('type', array('customer','vendor','customer-vendor'))->get();

        $from_date = Carbon::createFromFormat('Y-m-d', $request->input('fromdate'));
        $to_date = Carbon::createFromFormat('Y-m-d', $request->input('todate'));

        $products = Products::where('user_id',auth()->user()->id)->get();

        // Opening Stock Values
        $openingStockValues = [];
        foreach ($products as $product) {
            $earliestHistory = InventoryHistory::where('product_id', $product->id)
                ->whereBetween('change_date', [$from_date, $to_date])
                ->orderBy('change_date')
                ->first();

            if ($earliestHistory) {
                $openingStockValue = $earliestHistory->previous_stock * $product->purchase_price;
                $openingStockValues[$product->id] = $openingStockValue;
            }
        }
        $totalOpeningStockValue = array_sum($openingStockValues);

        // Closing Stock Values
        $closingStockValues = [];
        foreach ($products as $product) {
            $latestHistory = InventoryHistory::where('product_id', $product->id)
                ->where('change_date', '<=', $to_date)
                ->orderBy('change_date', 'desc')
                ->first();

            if ($latestHistory) {
                $closingStockValue = $latestHistory->previous_stock * $product->purchase_price;
                $closingStockValues[$product->id] = $closingStockValue;
            }
        }
        $totalClosingStockValue = array_sum($closingStockValues);

        // Total Selling Price
        $totalSellingPrice = [];
        foreach ($products as $product) {
            $totalPurchaseCost = InvoiceItems::where('product_id', $product->id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->sum(DB::raw('quantity * price'));

            $totalSellingPrice[$product->id] = $totalPurchaseCost;
        }

        $TotalSellingPrice = array_sum($totalSellingPrice);

        //Company Net Profit

        // Expenses
        $Expense = Expense::where('user_id',auth()->user()->id)->sum('amount');

        foreach ($products as $product) {
            $totalPurchaseQuantity = InvoiceItems::where('product_id', $product->id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->sum('quantity');

            $TotalPurchaseQuantity[$product->id] = $totalPurchaseQuantity * $product->purchase_price;

            $netProfitPrice = array_sum($TotalPurchaseQuantity);

            // $netProfitPrice = $TotalPurchaseQuantity * $product->purchase_price;

        }

        // dd($TotalPurchaseQuantity);

        $totalNetProfit = $TotalSellingPrice - $netProfitPrice ;

        $companyProfitLoss = 'abcd';

        return view('reports.other-reports.company-profit_loss-report',[
            'totalClosingStockValue' => $totalClosingStockValue,
            'totalOpeningStockValue' => $totalOpeningStockValue,
            'TotalSellingPrice' => $TotalSellingPrice,
            'totalNetProfit' => $totalNetProfit,
            'Expense' => $Expense,
            'companyProfitLoss' => $companyProfitLoss,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);

    }

    public function daily_expenses()
    {
        return view ('reports.expenses.daily-expenses');
    }

    public function daily_expenses_invoice(Request $request)
    {
        $expense_title = $request->input('expense_title');
        $from_date = $request->input('fromdate');
        $to_date = $request->input('todate');

        $query = Expense::where('user_id', auth()->user()->id)
        ->whereBetween('date', [$from_date, $to_date]);

        if ($request->has('expense-title')) {
            $title = $request->input('expense-title');

            $query->where('title', 'like', '%' . $title . '%');
        }

        $expenses = $query->get();


        return view ('reports.expenses.daily-expenses',[
            'expenses' => $expenses,
            'from_date' => $from_date,
            'to_date' => $to_date
        ]);
    }

    // ExcelReports

    public function export_sales_report(){

        $saleReportsData = session('saleReportsData');

        return Excel::download(new SalesReportsExport($saleReportsData),'sales-report.xls');

    }
    
    public function export_outstandings_sales_report(){

        $salesOutstandings = session('salesOutstandings');

        return Excel::download(new SalesOutstandingsExport($salesOutstandings),'sales-outstandings-report.xls');

    }

    public function export_product_sales_report(){

        $salesProducts = session('salesProducts');

        return Excel::download(new SalesProductsExport($salesProducts),'sales-products-reports.xls');

    }

    public function export_inward_sales_report(){

        $salesInward = session('salesInward');

        return Excel::download(new SalesInwardExport($salesInward),'sales-inward-report.xls');

    }

    
    public function export_purchase_report(){

        $purchaseReportsData = session('purchaseReportsData');

        return Excel::download(new PurchaseReportsExport($purchaseReportsData),'purchase-report.xls');

    }
    
    public function export_purhcase_outstandings_report(){

        $purchaseOutstandings = session('purchaseOutstandings');

        return Excel::download(new PurchaseOutstandingsExport($purchaseOutstandings),'purchase-outstandings-report.xls');

    }

    public function export_purchase_products_report(){

        $purchaseProducts = session('purchaseProducts');

        return Excel::download(new PurchaseProductsExport($purchaseProducts),'purchase-products-reports.xls');

    }

    public function export_purhcase_inward_report(){

        $purchaseInward = session('purchaseInward');

        return Excel::download(new PurchaseInwardExport($purchaseInward),'purchase-inward-report.xls');

    }

    
    // PDF Reports

    public function print_sales_report() {
       
        $saleReportsData = session('saleReportsData');

        $html = view('reports.print.sales-reports',['saleReportsData' => $saleReportsData])->render();
        $pdf = PDF::loadHTML($html)->setPaper('a4','portrait')->setOption('encoding', 'utf-8');
        $file_name = 'sales-report.pdf';
        return $pdf->stream($file_name);

    }

    public function print_sales_outstandings() {
       
        $salesOutstandingsData = session('salesOutstandings');

        $html = view('reports.print.sales-outstandings',['salesOutstandings' => $salesOutstandingsData])->render();
        $pdf = PDF::loadHTML($html)->setPaper('a4','portrait')->setOption('encoding', 'utf-8');
        $file_name = 'sales-outstandings-report.pdf';
        return $pdf->stream($file_name);

    }

}

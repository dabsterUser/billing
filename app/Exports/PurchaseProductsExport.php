<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchaseProductsExport implements FromView
{
    public function __construct($purchaseProducts) {
        $this->purchaseProducts = $purchaseProducts;
    }

    public function view(): View
    {
        return view('reports.Excel.purchase-products-reports',[
            'purchaseProducts' => $this->purchaseProducts
        ]);
    }
}

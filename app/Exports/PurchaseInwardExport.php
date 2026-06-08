<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchaseInwardExport implements FromView
{
    public function __construct($purchaseInward) {
        $this->purchaseInward = $purchaseInward;
    }

    public function view(): View
    {
        return view('reports.Excel.purchase-inward-reports',[
            'purchaseInward' => $this->purchaseInward
        ]);
    }
}

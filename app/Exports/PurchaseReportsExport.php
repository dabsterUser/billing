<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchaseReportsExport implements FromView
{
    public function __construct($purchaseReportsData) {
        $this->purchaseReportsData = $purchaseReportsData;
    }

    public function view(): View
    {
        return view('reports.Excel.purchase-reports',[
            'purchaseReportsData' => $this->purchaseReportsData
        ]);
    }
}

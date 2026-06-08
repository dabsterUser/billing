<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchaseOutstandingsExport implements FromView
{
    public function __construct($purchaseOutstandings) {
        $this->purchaseOutstandings = $purchaseOutstandings;
    }

    public function view(): View
    {
        return view('reports.Excel.purchase-outstandings-reports',[
            'purchaseOutstandings' => $this->purchaseOutstandings
        ]);
    }
}

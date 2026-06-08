<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesReportsExport implements FromView
{
    public function __construct($saleReportsData) {
        $this->saleReportsData = $saleReportsData;
    }

    public function view(): View
    {
        return view('reports.Excel.sales-reports',[
            'saleReportsData' => $this->saleReportsData
        ]);
    }
}

<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesInwardExport implements FromView
{
    public function __construct($salesInward) {
        $this->salesInward = $salesInward;
    }

    public function view(): View
    {
        return view('reports.Excel.sales-inward-reports',[
            'salesInward' => $this->salesInward
        ]);
    }
}

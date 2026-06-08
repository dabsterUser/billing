<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesOutstandingsExport implements FromView
{
    public function __construct($salesOutstandings) {
        $this->salesOutstandings = $salesOutstandings;
    }

    public function view(): View
    {
        return view('reports.Excel.sales-outstandings-reports',[
            'salesOutstandings' => $this->salesOutstandings
        ]);
    }
}

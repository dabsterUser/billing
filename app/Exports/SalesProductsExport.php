<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesProductsExport implements FromView
{
    public function __construct($salesProducts) {
        $this->salesProducts = $salesProducts;
    }

    public function view(): View
    {
        return view('reports.Excel.sales-products-reports',[
            'salesProducts' => $this->salesProducts
        ]);
    }
}

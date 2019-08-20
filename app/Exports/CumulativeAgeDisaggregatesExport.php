<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class CumulativeAgeDisaggregatesExport implements FromView
{

    use Exportable;

    protected  $data;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.cumulative-age-disaggregates', [
            'data' => $this->data
        ]);
    }

}

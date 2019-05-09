<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class PatientsExport implements FromView
{

    use Exportable;

    protected  $patients;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($patients)
    {
        $this->patients = $patients;
    }

    public function view(): View
    {
        return view('exports.patients', [
            'patients' => $this->patients->all()
        ]);
    }

}

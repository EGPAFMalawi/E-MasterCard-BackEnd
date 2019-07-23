<?php

namespace App\Modules\Priority\Reports\Clients\API\Controllers;

use App\Exports\HTSExport;
use App\Exports\PatientsExport;
use App\Http\Controllers\Controller;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Actions\GetHTSReportAction;
use App\Modules\Priority\Reports\Processing\Actions\GetReportAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class ReportAPIController extends Controller
{
    public function getCounts(Request $request)
    {
        $data = [
            'code' => $request->code,
            'type' => $request->type
        ];

        $report = App::make(GetReportAction::class)->run($data);

        $reportPayload = $report->count();

        return response()->json(
            [
                'data' => [
                    'counts' => $reportPayload,
                ]
            ]
        );
    }

    public function getPatients(Request $request)
    {
        $data = [
            'code' => $request->code,
            'type' => $request->type
        ];

        $report = App::make(GetReportAction::class)->run($data);

        $reportPayload = Patients::resourceCollection($report);

        return response()->json(
            [
                'data' => [
                    'patients' => $reportPayload,
                ]
            ]
        );
    }

    public function exportPatients(Request $request)
    {
        $data = [
            'code' => $request->code,
            'type' => $request->type
        ];

        $report = App::make(GetReportAction::class)->run($data);

        return Excel::download(new PatientsExport($report),'patient-report.xlsx');
    }

    public function getHTS(Request $request)
    {
        $data = [
            'code' => $request->code,
            'type' => $request->type
        ];

        $report = App::make(GetHTSReportAction::class)->run($data);

        return response()->json(
            [
                'data' => [
                    'hts' => $report,
                ]
            ]
        );
    }

    public function exportHTS(Request $request)
    {
        $data = [
            'code' => $request->code,
            'type' => $request->type
        ];

        $report = App::make(GetHTSReportAction::class)->run($data);

        return Excel::download(new HTSExport($report),'hts-report.xlsx');
    }
}

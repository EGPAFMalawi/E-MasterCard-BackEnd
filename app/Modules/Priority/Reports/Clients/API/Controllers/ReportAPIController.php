<?php

namespace App\Modules\Priority\Reports\Clients\API\Controllers;

use App\Exports\CumulativeAgeDisaggregatesExport;
use App\Exports\HTSExport;
use App\Exports\PatientsExport;
use App\Exports\QuarterlyAgeDisaggregatesExport;
use App\Http\Controllers\Controller;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Actions\GetDisaggregatedReportAction;
use App\Modules\Priority\Reports\Processing\Actions\GetHTSReportAction;
use App\Modules\Priority\Reports\Processing\Actions\GetReportAction;
use App\Modules\Priority\Reports\Processing\Actions\GetTestReportAction;
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

        $report = App::make(GetTestReportAction::class)->run($data);

        $reportPayload = $report->count();

        return response()->json(
            [
                'data' => [
                    'counts' => $reportPayload,
                ]
            ]
        );
    }

    public function test(Request $request)
    {
        $data = [
            'code' => $request->code,
            'type' => $request->type
        ];

        $report = App::make(GetTestReportAction::class)->run($data);

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

        $report = App::make(GetTestReportAction::class)->run($data);

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

        $report = App::make(GetTestReportAction::class)->run($data);

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

    public function getAgeDisaggregates(Request $request)
    {
        $data = [
            'code' => $request->code,
            'type' => $request->type,
            'reportStartDate' => $request->reportStartDate,
            'reportEndDate' => $request->reportEndDate
        ];

        if (is_null($data['type']))
            $report = App::make(GetDisaggregatedReportAction::class)->run2($data);
        else
            $report = App::make(GetDisaggregatedReportAction::class)->run($data);

        return response()->json(
            [
                'data' => $report
            ]
        );
    }

    public function exportAgeDisaggregates(Request $request)
    {
        $data = [
            'code' => $request->code,
            'reportStartDate' => $request->reportStartDate,
            'reportEndDate' => $request->reportEndDate
        ];

        if ($data['code'] == 1){
            $report = App::make(GetDisaggregatedReportAction::class)->run2($data);
            return Excel::download(new CumulativeAgeDisaggregatesExport($report), 'cumulative-age-disaggregates.xlsx');
        } else {
            $report = App::make(GetDisaggregatedReportAction::class)->run2($data);
            return Excel::download(new QuarterlyAgeDisaggregatesExport($report), 'quarterly-age-disaggregates.xlsx');
        }
    }
}

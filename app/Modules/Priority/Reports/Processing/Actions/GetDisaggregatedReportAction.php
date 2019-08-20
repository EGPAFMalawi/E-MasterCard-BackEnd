<?php

namespace App\Modules\Priority\Reports\Processing\Actions;

use App\Modules\Priority\Reports\Processing\SubActions\DisaggregatedReports\GetAdverseOutcomeDisAggReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\DisaggregatedReports\GetDefaultersDisAggReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\DisaggregatedReports\GetNewEnrollmentsDisAggReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\DisaggregatedReports\GetTxCurrentDisAggReportSubAction;
use Illuminate\Support\Facades\App;

class GetDisaggregatedReportAction
{
    public function run($data)
    {
        $reportPayload = null;

        if ($data['code'] == 1)
        {
            if ($data['type'] == 'TXCurrent')
                $disaggregatedReportPayload = App::make(GetTxCurrentDisAggReportSubAction::class)->run($data['reportEndDate']);
            elseif ($data['type'] == 'defaulted1Month')
                $disaggregatedReportPayload = App::make(GetDefaultersDisAggReportSubAction::class)->run($data['reportEndDate'],'defaulted1Month');
            elseif($data['type'] == 'defaulted2Months')
                $disaggregatedReportPayload = App::make(GetDefaultersDisAggReportSubAction::class)->run($data['reportEndDate'],'defaulted2Months');
            elseif($data['type'] == 'defaulted3MonthsPlus')
                $disaggregatedReportPayload = App::make(GetDefaultersDisAggReportSubAction::class)->run($data['reportEndDate'],'defaulted3MonthsPlus');
            elseif($data['type'] == 'stopped')
                $disaggregatedReportPayload = App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run($data['reportEndDate'], 'stopped');
            elseif($data['type'] == 'transferredOut')
                $disaggregatedReportPayload = App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run($data['reportEndDate'], 'transferredOut');
            elseif($data['type'] == 'totalRegistered')
                $disaggregatedReportPayload = App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run($data['reportEndDate'], 'totalRegistered');
            else
                $disaggregatedReportPayload = App::make(GetTxCurrentDisAggReportSubAction::class)->run($data['reportEndDate']);

        }else
        {
            if ($data['type'] == 'TXNew')
                $disaggregatedReportPayload = App::make(GetNewEnrollmentsDisAggReportSubAction::class)->run($data['reportStartDate'], $data['reportEndDate'], 'TXNew');
            elseif ($data['type'] == 'reInitiated')
                $disaggregatedReportPayload = App::make(GetNewEnrollmentsDisAggReportSubAction::class)->run($data['reportStartDate'], $data['reportEndDate'], 'reInitiated');
            elseif($data['type'] == 'transferredIn')
                $disaggregatedReportPayload = App::make(GetNewEnrollmentsDisAggReportSubAction::class)->run($data['reportStartDate'], $data['reportEndDate'], 'transferredIn');
            elseif($data['type'] == 'defaulted1MonthPlus')
                $disaggregatedReportPayload = App::make(GetDefaultersDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'defaulted1MonthPlus');
            elseif($data['type'] == 'defaulted2MonthsPlus')
                $disaggregatedReportPayload = App::make(GetDefaultersDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'defaulted2MonthsPlus');
            elseif($data['type'] == 'defaulted3MonthsPlus')
                $disaggregatedReportPayload = App::make(GetDefaultersDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'defaulted3MonthsPlus');
            elseif($data['type'] == 'stopped')
                $disaggregatedReportPayload = App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'stopped');
            elseif($data['type'] == 'died')
                $disaggregatedReportPayload = App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'died');
            elseif($data['type'] == 'transferredOut')
                $disaggregatedReportPayload = App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'transferredOut');
            else
                $disaggregatedReportPayload = App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'transferredOut');
        }

        return $disaggregatedReportPayload;
    }

    public function run2($data)
    {
        $disaggregatedReportPayload = [];

        if ($data['code'] == 1)
        {
            $disaggregatedReportPayload = [
                'txCurrent' => App::make(GetTxCurrentDisAggReportSubAction::class)->run($data['reportEndDate']),
                'defaulted1Month' => App::make(GetDefaultersDisAggReportSubAction::class)->run($data['reportEndDate'],'defaulted1Month'),
                'defaulted2Months' => App::make(GetDefaultersDisAggReportSubAction::class)->run($data['reportEndDate'],'defaulted2Months'),
                'defaulted3MonthsPlus' => App::make(GetDefaultersDisAggReportSubAction::class)->run($data['reportEndDate'],'defaulted3MonthsPlus'),
                'stopped' => App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run($data['reportEndDate'], 'stopped'),
                'died' => App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run($data['reportEndDate'], 'died'),
                'transferredOut' => App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run($data['reportEndDate'], 'transferredOut'),
            ];

        }elseif($data['code'] == 2)
        {
            $disaggregatedReportPayload = [
                'txNew' => App::make(GetNewEnrollmentsDisAggReportSubAction::class)->run($data['reportStartDate'], $data['reportEndDate'], 'TXNew'),
                'reInitiated' => App::make(GetNewEnrollmentsDisAggReportSubAction::class)->run($data['reportStartDate'], $data['reportEndDate'], 'reInitiated'),
                'transferredIn' => App::make(GetNewEnrollmentsDisAggReportSubAction::class)->run($data['reportStartDate'], $data['reportEndDate'], 'transferredIn'),
                'defaulted1MonthPlus' => App::make(GetDefaultersDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'],'defaulted1MonthsPlus'),
                'defaulted2MonthsPlus' => App::make(GetDefaultersDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'],'defaulted2MonthsPlus'),
                'defaulted3MonthsPlus' => App::make(GetDefaultersDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'],'defaulted3MonthsPlus'),
                'stopped' => App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'stopped'),
                'died' => App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'died'),
                'transferredOut' => App::make(GetAdverseOutcomeDisAggReportSubAction::class)->run2($data['reportStartDate'], $data['reportEndDate'], 'transferredOut'),
            ];
        }

        return $disaggregatedReportPayload;
    }
}

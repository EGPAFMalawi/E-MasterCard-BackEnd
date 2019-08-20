<table>
    <thead>
    <tr>
        <th></th>
        <th></th>
        <th colspan="3">New Enrollments</th>
        <th colspan="6">Adverse Outcomes</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th>New on ART</th>
        <th>Re-Initiated</th>
        <th>Transferred-In</th>
        <th colspan="3">Defaulted</th>
        <th>Stopped</th>
        <th>Died</th>
        <th>Transferred Out</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th>(TX_NEW)</th>
        <th></th>
        <th></th>
        <th>&gt; 1 Month</th>
        <th>&gt; 2 Months</th>
        <th>&gt; 3 Months</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>TOTAL</th>
        <th></th>
        <th>{{$data['txNew']['total']}}</th>
        <th>{{$data['reInitiated']['total']}}</th>
        <th>{{$data['transferredIn']['total']}}</th>
        <th>{{$data['defaulted1MonthPlus']['total']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['total']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['total']}}</th>
        <th>{{$data['stopped']['total']}}</th>
        <th>{{$data['died']['total']}}</th>
        <th>{{$data['transferredOut']['total']}}</th>
{{--        <th>{{$data['txCurrent']['total']+$data['defaulted1MonthPlus']['total']+$data['defaulted2MonthsPlus']['total']+$data['defaulted3MonthsPlus']['total']+$data['stopped']['total']+$data['died']['total']+$data['transferredOut']['total']}}</th>--}}
    </tr>
    <tr>
        <th>Adults</th>
        <th></th>
        <th>{{$data['txNew']['adults']['count']}}</th>
        <th>{{$data['reInitiated']['adults']['count']}}</th>
        <th>{{$data['transferredIn']['adults']['count']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['count']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['count']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['count']}}</th>
        <th>{{$data['stopped']['adults']['count']}}</th>
        <th>{{$data['died']['adults']['count']}}</th>
        <th>{{$data['transferredOut']['adults']['count']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['count']+$data['defaulted1MonthPlus']['adults']['count']+$data['defaulted2MonthsPlus']['adults']['count']+$data['defaulted3MonthsPlus']['adults']['count']+$data['stopped']['adults']['count']+$data['died']['adults']['count']+$data['transferredOut']['adults']['count']}}</th>--}}
    </tr>
    <tr>
        <th>Males</th>
        <th></th>
        <th>{{$data['txNew']['adults']['males']['count']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['count']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['count']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['count']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['count']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['count']}}</th>
        <th>{{$data['stopped']['adults']['males']['count']}}</th>
        <th>{{$data['died']['adults']['males']['count']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['count']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['count']+$data['defaulted1MonthPlus']['adults']['males']['count']+$data['defaulted2MonthsPlus']['adults']['males']['count']+$data['defaulted3MonthsPlus']['adults']['males']['count']+$data['stopped']['adults']['males']['count']+$data['died']['adults']['males']['count']+$data['transferredOut']['adults']['males']['count']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>15-19</th>
        <th>{{$data['txNew']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['stopped']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['died']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['disaggregatedByAge']['15-19']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['disaggregatedByAge']['15-19']+$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['15-19']+$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['15-19']+$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['15-19']+$data['stopped']['adults']['males']['disaggregatedByAge']['15-19']+$data['died']['adults']['males']['disaggregatedByAge']['15-19']+$data['transferredOut']['adults']['males']['disaggregatedByAge']['15-19']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>20-24</th>
        <th>{{$data['txNew']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['stopped']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['died']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['disaggregatedByAge']['20-24']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['disaggregatedByAge']['20-24']+$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['20-24']+$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['20-24']+$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['20-24']+$data['stopped']['adults']['males']['disaggregatedByAge']['20-24']+$data['died']['adults']['males']['disaggregatedByAge']['20-24']+$data['transferredOut']['adults']['males']['disaggregatedByAge']['20-24']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>25-29</th>
        <th>{{$data['txNew']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['stopped']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['died']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['disaggregatedByAge']['25-29']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['disaggregatedByAge']['25-29']+$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['25-29']+$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['25-29']+$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['25-29']+$data['stopped']['adults']['males']['disaggregatedByAge']['25-29']+$data['died']['adults']['males']['disaggregatedByAge']['25-29']+$data['transferredOut']['adults']['males']['disaggregatedByAge']['25-29']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>30-34</th>
        <th>{{$data['txNew']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['stopped']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['died']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['disaggregatedByAge']['30-34']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['disaggregatedByAge']['30-34']+$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['30-34']+$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['30-34']+$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['30-34']+$data['stopped']['adults']['males']['disaggregatedByAge']['30-34']+$data['died']['adults']['males']['disaggregatedByAge']['30-34']+$data['transferredOut']['adults']['males']['disaggregatedByAge']['30-34']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>35-39</th>
        <th>{{$data['txNew']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['stopped']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['died']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['disaggregatedByAge']['35-39']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['disaggregatedByAge']['35-39']+$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['35-39']+$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['35-39']+$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['35-39']+$data['stopped']['adults']['males']['disaggregatedByAge']['35-39']+$data['died']['adults']['males']['disaggregatedByAge']['35-39']+$data['transferredOut']['adults']['males']['disaggregatedByAge']['35-39']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>40-44</th>
        <th>{{$data['txNew']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['stopped']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['died']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['disaggregatedByAge']['40-44']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['disaggregatedByAge']['40-44']+$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['40-44']+$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['40-44']+$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['40-44']+$data['stopped']['adults']['males']['disaggregatedByAge']['40-44']+$data['died']['adults']['males']['disaggregatedByAge']['40-44']+$data['transferredOut']['adults']['males']['disaggregatedByAge']['40-44']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>45-49</th>
        <th>{{$data['txNew']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['stopped']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['died']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['disaggregatedByAge']['45-49']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['disaggregatedByAge']['45-49']+$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['45-49']+$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['45-49']+$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['45-49']+$data['stopped']['adults']['males']['disaggregatedByAge']['45-49']+$data['died']['adults']['males']['disaggregatedByAge']['45-49']+$data['transferredOut']['adults']['males']['disaggregatedByAge']['45-49']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>50+</th>
        <th>{{$data['txNew']['adults']['males']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['reInitiated']['adults']['males']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['transferredIn']['adults']['males']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['stopped']['adults']['males']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['died']['adults']['males']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['transferredOut']['adults']['males']['disaggregatedByAge']['50+']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['males']['disaggregatedByAge']['50+']+$data['defaulted1MonthPlus']['adults']['males']['disaggregatedByAge']['50+']+$data['defaulted2MonthsPlus']['adults']['males']['disaggregatedByAge']['50+']+$data['defaulted3MonthsPlus']['adults']['males']['disaggregatedByAge']['50+']+$data['stopped']['adults']['males']['disaggregatedByAge']['50+']+$data['died']['adults']['males']['disaggregatedByAge']['50+']+$data['transferredOut']['adults']['males']['disaggregatedByAge']['50+']}}</th>--}}
    </tr>

    <tr>
        <th>Females</th>
        <th></th>
        <th>{{$data['txNew']['adults']['females']['count']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['count']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['count']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['count']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['count']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['count']}}</th>
        <th>{{$data['stopped']['adults']['females']['count']}}</th>
        <th>{{$data['died']['adults']['females']['count']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['count']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['count']+$data['defaulted1MonthPlus']['adults']['females']['count']+$data['defaulted2MonthsPlus']['adults']['females']['count']+$data['defaulted3MonthsPlus']['adults']['females']['count']+$data['stopped']['adults']['females']['count']+$data['died']['adults']['females']['count']+$data['transferredOut']['adults']['females']['count']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>15-19</th>
        <th>{{$data['txNew']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['stopped']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['died']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['disaggregatedByAge']['15-19']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['disaggregatedByAge']['15-19']+$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['15-19']+$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['15-19']+$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['15-19']+$data['stopped']['adults']['females']['disaggregatedByAge']['15-19']+$data['died']['adults']['females']['disaggregatedByAge']['15-19']+$data['transferredOut']['adults']['females']['disaggregatedByAge']['15-19']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>20-24</th>
        <th>{{$data['txNew']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['stopped']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['died']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['disaggregatedByAge']['20-24']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['disaggregatedByAge']['20-24']+$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['20-24']+$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['20-24']+$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['20-24']+$data['stopped']['adults']['females']['disaggregatedByAge']['20-24']+$data['died']['adults']['females']['disaggregatedByAge']['20-24']+$data['transferredOut']['adults']['females']['disaggregatedByAge']['20-24']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>25-29</th>
        <th>{{$data['txNew']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['stopped']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['died']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['disaggregatedByAge']['25-29']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['disaggregatedByAge']['25-29']+$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['25-29']+$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['25-29']+$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['25-29']+$data['stopped']['adults']['females']['disaggregatedByAge']['25-29']+$data['died']['adults']['females']['disaggregatedByAge']['25-29']+$data['transferredOut']['adults']['females']['disaggregatedByAge']['25-29']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>30-34</th>
        <th>{{$data['txNew']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['stopped']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['died']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['disaggregatedByAge']['30-34']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['disaggregatedByAge']['30-34']+$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['30-34']+$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['30-34']+$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['30-34']+$data['stopped']['adults']['females']['disaggregatedByAge']['30-34']+$data['died']['adults']['females']['disaggregatedByAge']['30-34']+$data['transferredOut']['adults']['females']['disaggregatedByAge']['30-34']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>35-39</th>
        <th>{{$data['txNew']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['stopped']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['died']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['disaggregatedByAge']['35-39']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['disaggregatedByAge']['35-39']+$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['35-39']+$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['35-39']+$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['35-39']+$data['stopped']['adults']['females']['disaggregatedByAge']['35-39']+$data['died']['adults']['females']['disaggregatedByAge']['35-39']+$data['transferredOut']['adults']['females']['disaggregatedByAge']['35-39']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>40-44</th>
        <th>{{$data['txNew']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['stopped']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['died']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['disaggregatedByAge']['40-44']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['disaggregatedByAge']['40-44']+$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['40-44']+$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['40-44']+$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['40-44']+$data['stopped']['adults']['females']['disaggregatedByAge']['40-44']+$data['died']['adults']['females']['disaggregatedByAge']['40-44']+$data['transferredOut']['adults']['females']['disaggregatedByAge']['40-44']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>45-49</th>
        <th>{{$data['txNew']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['stopped']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['died']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['disaggregatedByAge']['45-49']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['disaggregatedByAge']['45-49']+$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['45-49']+$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['45-49']+$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['45-49']+$data['stopped']['adults']['females']['disaggregatedByAge']['45-49']+$data['died']['adults']['females']['disaggregatedByAge']['45-49']+$data['transferredOut']['adults']['females']['disaggregatedByAge']['45-49']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>50+</th>
        <th>{{$data['txNew']['adults']['females']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['reInitiated']['adults']['females']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['transferredIn']['adults']['females']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['stopped']['adults']['females']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['died']['adults']['females']['disaggregatedByAge']['50+']}}</th>
        <th>{{$data['transferredOut']['adults']['females']['disaggregatedByAge']['50+']}}</th>
{{--        <th>{{$data['txCurrent']['adults']['females']['disaggregatedByAge']['50+']+$data['defaulted1MonthPlus']['adults']['females']['disaggregatedByAge']['50+']+$data['defaulted2MonthsPlus']['adults']['females']['disaggregatedByAge']['50+']+$data['defaulted3MonthsPlus']['adults']['females']['disaggregatedByAge']['50+']+$data['stopped']['adults']['females']['disaggregatedByAge']['50+']+$data['died']['adults']['females']['disaggregatedByAge']['50+']+$data['transferredOut']['adults']['females']['disaggregatedByAge']['50+']}}</th>--}}
    </tr>

    <tr>
        <th>Pediatrics</th>
        <th></th>
        <th>{{$data['txNew']['pediatrics']['count']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['count']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['count']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['count']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['count']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['count']}}</th>
        <th>{{$data['stopped']['pediatrics']['count']}}</th>
        <th>{{$data['died']['pediatrics']['count']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['count']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['count']+$data['defaulted1MonthPlus']['pediatrics']['count']+$data['defaulted2MonthsPlus']['pediatrics']['count']+$data['defaulted3MonthsPlus']['pediatrics']['count']+$data['stopped']['pediatrics']['count']+$data['died']['pediatrics']['count']+$data['transferredOut']['pediatrics']['count']}}</th>--}}
    </tr>
    <tr>
        <th>Males</th>
        <th></th>
        <th>{{$data['txNew']['pediatrics']['males']['count']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['males']['count']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['males']['count']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['males']['count']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['males']['count']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['males']['count']}}</th>
        <th>{{$data['stopped']['pediatrics']['males']['count']}}</th>
        <th>{{$data['died']['pediatrics']['males']['count']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['males']['count']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['males']['count']+$data['defaulted1MonthPlus']['pediatrics']['males']['count']+$data['defaulted2MonthsPlus']['pediatrics']['males']['count']+$data['defaulted3MonthsPlus']['pediatrics']['males']['count']+$data['stopped']['pediatrics']['males']['count']+$data['died']['pediatrics']['males']['count']+$data['transferredOut']['pediatrics']['males']['count']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>&lt;1</th>
        <th>{{$data['txNew']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['stopped']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['died']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['males']['disaggregatedByAge']['<1']+$data['defaulted1MonthPlus']['pediatrics']['males']['disaggregatedByAge']['<1']+$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['<1']+$data['defaulted3MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['<1']+$data['stopped']['pediatrics']['males']['disaggregatedByAge']['<1']+$data['died']['pediatrics']['males']['disaggregatedByAge']['<1']+$data['transferredOut']['pediatrics']['males']['disaggregatedByAge']['<1']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>1-4</th>
        <th>{{$data['txNew']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['stopped']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['died']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['males']['disaggregatedByAge']['1-4']+$data['defaulted1MonthPlus']['pediatrics']['males']['disaggregatedByAge']['1-4']+$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['1-4']+$data['defaulted3MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['1-4']+$data['stopped']['pediatrics']['males']['disaggregatedByAge']['1-4']+$data['died']['pediatrics']['males']['disaggregatedByAge']['1-4']+$data['transferredOut']['pediatrics']['males']['disaggregatedByAge']['1-4']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>5-9</th>
        <th>{{$data['txNew']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['stopped']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['died']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['males']['disaggregatedByAge']['5-9']+$data['defaulted1MonthPlus']['pediatrics']['males']['disaggregatedByAge']['5-9']+$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['5-9']+$data['defaulted3MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['5-9']+$data['stopped']['pediatrics']['males']['disaggregatedByAge']['5-9']+$data['died']['pediatrics']['males']['disaggregatedByAge']['5-9']+$data['transferredOut']['pediatrics']['males']['disaggregatedByAge']['5-9']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>10-14</th>
        <th>{{$data['txNew']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['stopped']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['died']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['males']['disaggregatedByAge']['10-14']+$data['defaulted1MonthPlus']['pediatrics']['males']['disaggregatedByAge']['10-14']+$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['10-14']+$data['defaulted3MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['10-14']+$data['stopped']['pediatrics']['males']['disaggregatedByAge']['10-14']+$data['died']['pediatrics']['males']['disaggregatedByAge']['10-14']+$data['transferredOut']['pediatrics']['males']['disaggregatedByAge']['10-14']}}</th>--}}
    </tr>

    <tr>
        <th>Females</th>
        <th></th>
        <th>{{$data['txNew']['pediatrics']['females']['count']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['females']['count']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['females']['count']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['females']['count']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['females']['count']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['females']['count']}}</th>
        <th>{{$data['stopped']['pediatrics']['females']['count']}}</th>
        <th>{{$data['died']['pediatrics']['females']['count']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['females']['count']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['females']['count']+$data['defaulted1MonthPlus']['pediatrics']['females']['count']+$data['defaulted2MonthsPlus']['pediatrics']['females']['count']+$data['defaulted3MonthsPlus']['pediatrics']['females']['count']+$data['stopped']['pediatrics']['females']['count']+$data['died']['pediatrics']['count']+$data['transferredOut']['pediatrics']['count']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>&lt;1</th>
        <th>{{$data['txNew']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['stopped']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['died']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['females']['disaggregatedByAge']['<1']+$data['defaulted1MonthPlus']['pediatrics']['females']['disaggregatedByAge']['<1']+$data['defaulted2MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['<1']+$data['defaulted3MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['<1']+$data['stopped']['pediatrics']['females']['disaggregatedByAge']['<1']+$data['died']['pediatrics']['females']['disaggregatedByAge']['<1']+$data['transferredOut']['pediatrics']['females']['disaggregatedByAge']['<1']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>1-4</th>
        <th>{{$data['txNew']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['stopped']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['died']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['females']['disaggregatedByAge']['1-4']+$data['defaulted1MonthPlus']['pediatrics']['females']['disaggregatedByAge']['1-4']+$data['defaulted2MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['1-4']+$data['defaulted3MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['1-4']+$data['stopped']['pediatrics']['females']['disaggregatedByAge']['1-4']+$data['died']['pediatrics']['females']['disaggregatedByAge']['1-4']+$data['transferredOut']['pediatrics']['females']['disaggregatedByAge']['1-4']}}</th>--}}
    </tr>
    <tr>
        <th></th>
        <th>5-9</th>
        <th>{{$data['txNew']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['stopped']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['died']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['females']['disaggregatedByAge']['5-9']+$data['defaulted1MonthPlus']['pediatrics']['females']['disaggregatedByAge']['5-9']+$data['defaulted2MonthsPlus']['pediatrics']['males']['disaggregatedByAge']['5-9']+$data['defaulted3MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['5-9']+$data['stopped']['pediatrics']['females']['disaggregatedByAge']['5-9']+$data['died']['pediatrics']['females']['disaggregatedByAge']['5-9']+$data['transferredOut']['pediatrics']['females']['disaggregatedByAge']['5-9']}}</th>--}}
    </tr>

    <tr>
        <th></th>
        <th>10-14</th>
        <th>{{$data['txNew']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['reInitiated']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['transferredIn']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['defaulted1MonthPlus']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['stopped']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['died']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
        <th>{{$data['transferredOut']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>
{{--        <th>{{$data['txCurrent']['pediatrics']['females']['disaggregatedByAge']['10-14']+$data['defaulted1MonthPlus']['pediatrics']['females']['disaggregatedByAge']['10-14']+$data['defaulted2MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['10-14']+$data['defaulted3MonthsPlus']['pediatrics']['females']['disaggregatedByAge']['10-14']+$data['stopped']['pediatrics']['females']['disaggregatedByAge']['10-14']+$data['died']['pediatrics']['females']['disaggregatedByAge']['10-14']+$data['transferredOut']['pediatrics']['females']['disaggregatedByAge']['10-14']}}</th>--}}
    </tr>
    <tr>
        <th>Unknown Age</th>
        <th></th>
        <th>{{$data['txNew']['unknownAge']['count']}}</th>
        <th>{{$data['reInitiated']['unknownAge']['count']}}</th>
        <th>{{$data['transferredIn']['unknownAge']['count']}}</th>
        <th>{{$data['defaulted1MonthPlus']['unknownAge']['count']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['unknownAge']['count']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['unknownAge']['count']}}</th>
        <th>{{$data['stopped']['unknownAge']['count']}}</th>
        <th>{{$data['died']['unknownAge']['count']}}</th>
        <th>{{$data['transferredOut']['unknownAge']['count']}}</th>
{{--        <th>{{$data['txCurrent']['unknownAge']['count']+$data['defaulted1MonthPlus']['unknownAge']['count']+$data['defaulted2MonthsPlus']['unknownAge']['count']+$data['defaulted3MonthsPlus']['unknownAge']['count']+$data['stopped']['unknownAge']['count']+$data['died']['unknownAge']['count']+$data['transferredOut']['unknownAge']['count']}}</th>--}}
    </tr>
    <tr>
        <th>Males</th>
        <th></th>
        <th>{{$data['txNew']['unknownAge']['males']}}</th>
        <th>{{$data['reInitiated']['unknownAge']['males']}}</th>
        <th>{{$data['transferredIn']['unknownAge']['males']}}</th>
        <th>{{$data['defaulted1MonthPlus']['unknownAge']['males']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['unknownAge']['males']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['unknownAge']['males']}}</th>
        <th>{{$data['stopped']['unknownAge']['males']}}</th>
        <th>{{$data['died']['unknownAge']['males']}}</th>
        <th>{{$data['transferredOut']['unknownAge']['males']}}</th>
{{--        <th>{{$data['txCurrent']['unknownAge']['males']+$data['defaulted1MonthPlus']['unknownAge']['males']+$data['defaulted2MonthsPlus']['unknownAge']['males']+$data['defaulted3MonthsPlus']['unknownAge']['males']+$data['stopped']['unknownAge']['males']+$data['died']['unknownAge']['males']+$data['transferredOut']['unknownAge']['males']}}</th>--}}
    </tr>
    <tr>
        <th>Females</th>
        <th></th>
        <th>{{$data['txNew']['unknownAge']['females']}}</th>
        <th>{{$data['reInitiated']['unknownAge']['females']}}</th>
        <th>{{$data['transferredIn']['unknownAge']['females']}}</th>
        <th>{{$data['defaulted1MonthPlus']['unknownAge']['females']}}</th>
        <th>{{$data['defaulted2MonthsPlus']['unknownAge']['females']}}</th>
        <th>{{$data['defaulted3MonthsPlus']['unknownAge']['females']}}</th>
        <th>{{$data['stopped']['unknownAge']['females']}}</th>
        <th>{{$data['died']['unknownAge']['females']}}</th>
        <th>{{$data['transferredOut']['unknownAge']['females']}}</th>
{{--        <th>{{$data['txCurrent']['unknownAge']['females']+$data['defaulted1MonthPlus']['unknownAge']['females']+$data['defaulted2MonthsPlus']['unknownAge']['females']+$data['defaulted3MonthsPlus']['unknownAge']['females']+$data['stopped']['unknownAge']['females']+$data['died']['unknownAge']['females']+$data['transferredOut']['unknownAge']['females']}}</th>--}}
    </tr>
    </tbody>
</table>
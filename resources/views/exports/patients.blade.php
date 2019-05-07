<table>
    <thead>
    <tr>
        <th>ARTNo</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Family Name</th>
        <th>Guardian Name</th>
        <th>Gender</th>
        <th>TA</th>
        <th>Village</th>
        <th>Patient Phone</th>
        <th>Guardian Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->artNumber }}</td>
            <td>{{ $patient->person->preferredName->given_name }}</td>
            <td>{{ $patient->person->preferredName->middle_name }}</td>
            <td>{{ $patient->person->preferredName->family_name }}</td>
            <td>{{ $patient->guardian_name }}</td>
            <td>{{ $patient->person->gender }}</td>
            <td>{{ $patient->person->preferredAddress->township_division }}</td>
            <td>{{ $patient->person->preferredAddress->city_village }}</td>
            <td>{{ $patient->patient_phone }}</td>
            <td>{{ $patient->guardian_phone }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
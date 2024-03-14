<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Attendance Report</title>
</head>

<body>
    @php
    $currentDate = \Carbon\Carbon::now();
    $daysInMonth = $currentDate->daysInMonth;
    @endphp
    <table class="table text-nowrap text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>

                @for ($day = 1; $day <= $daysInMonth; $day++)
                    <th>{{ $currentDate->setDay($day)->format('Y/n/j') }}</th>
                @endfor

            </tr>
        </thead>
        <tbody>
            @foreach ($attendances->unique('student_id') as $studentAttendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $studentAttendance->student->user->name }}</td>

                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        @php
                            $attendanceOfDay = $attendances->where('student_id', $studentAttendance->student_id)
                                ->where('date', $currentDate->setDay($day)->toDateString())
                                ->first();
                            $status = $attendanceOfDay ? ($attendanceOfDay->status == 1 ? 'Present' : 'Absent') : 'NT';
                        @endphp
                        <td>{{ $status }}</td>
                    @endfor

                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>

@extends('backend.layouts.main')
@section('content-title', 'Attendance ')
@section('page-title', 'view attendance')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="col-md-12">
                <div class="py-2">
                    <a href="{{ route('attendance.create') }}" class="btn btn-primary"> <i
                            class="far fa-plus px-1"></i>create</a>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">View ATTENDANCE</h3>
                    </div>
                    <!-- /.card-header -->
                    @php
                        $currentDate = \Carbon\Carbon::now();
                        $daysInMonth = $currentDate->daysInMonth;
                    @endphp
                    <div class="card-body table-responsive p-0">
                        <table class="table text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>

                                    @for ($day = 1; $day <= $daysInMonth; $day++)
                                        <td>{{ $currentDate->setDay($day)->format('Y/n/j') }}</td>
                                        <!-- Other table cells if any -->
                                    @endfor

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $attendance->student->user->name }}</td>




                                        <!-- Add other columns as needed -->
                                    </tr>
                                @endforeach


                                <!-- Adjust colspan based on the number of columns in your table -->


                            </tbody>
                        </table>

                    </div>

                </div>

                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </section>



@endsection

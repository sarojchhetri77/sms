@extends('backend.layouts.main')
@section('content-title', 'Attendance create')
@section('page-title', 'create attendance')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="col-md-12">
                <div class="py-2">
                    <a href="{{ route('attendance.index') }}" class="btn btn-primary"> <i class="far fa-eye"></i> view</a>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">TAKE ATTENDANCE</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{route('attendance.store')}}" method="POST">
                                    @csrf
                                @foreach ($students as $enrollment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $enrollment->student->user->name }}</td>
                                        <td>
                                            <label>
                                                <input name="attendences[{{ $enrollment->student->id }}]" type="radio" value="present">
                                                <span class="text-sm">Present</span>
                                            </label>
                                            <label>
                                                <input name="attendences[{{ $enrollment->student->id }}]" type="radio" value="absent">
                                                <span class="text-sm">Absent</span>
                                            </label>
                                        </td>
                                        <!-- Add other columns as needed -->
                                    </tr>
                                @endforeach
                           


                                <!-- Adjust colspan based on the number of columns in your table -->


                            </tbody>
                        </table>

                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Submit Attendance</button>
            </form>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </section>



@endsection

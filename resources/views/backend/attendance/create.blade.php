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
                    <a href="{{ route('attendance.records') }}" class="btn btn-primary"> <i class="far fa-eye px-1"></i>view
                        report</a>

                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">TAKE ATTENDANCE</h3>
                    </div>
                    <!-- /.card-header -->


                    <table class="table text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('attendance.store') }}" method="POST">
                                @csrf
                                @foreach ($students as $enrollment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $enrollment->student->user->name }}</td>
                                        <td>
                                            <label>
                                                <input name="attendences[{{ $enrollment->student->id }}]" type="radio"
                                                    value="present">
                                                <span class="text-sm">Present</span>
                                            </label>
                                            <label>
                                                <input name="attendences[{{ $enrollment->student->id }}]" type="radio"
                                                    value="absent">
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
            <button type="submit" class="btn text-white" style="background-color:#0d6efd">Submit Attendance</button>
            </form>
            <!-- /.card -->
        </div>
        </div><!-- /.container-fluid -->
    </section>



@endsection

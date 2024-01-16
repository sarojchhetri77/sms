@extends('backend.layouts.main')
@section('content-title', 'Attendance ')
@section('page-title', 'view attendance')
@section('content')

    
            <!-- left column -->
            <div class="col-md-12">
                <div class="py-2">
                    <form action="" class="d-inline">
                        <div class="input-group input-group-sm" style="width: 300px;">

                            @csrf
                                
                           
                            <input type="search" name="search" value="{{$search? $search : ""}}" class="form-control float-right text-secondary"
                                placeholder="2023-11-29">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    Generate
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
               @if(auth()->user()->role=="admin")
                @foreach ($classes as $classId=> $class)
                <?php
                $classs = $class->first()->grade;
                // $class_name = $classs ? $classs->name : 'Unknown';
              ?> 
             
                <div class="card card-primary">
                    <div class="card-header">
                      
                          
                      <h3 class="card-title">{{$classs->name}}</h3>
                      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Teacher</th>
                                    <th>class</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($class as $attendance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $attendance->student->user->name }}</td>
                                        <td>{{$attendance->teacher->user->name}}</td>
                                        <td>{{$attendance->grade->name }}</td>
                                        <td>
                                            {{ $attendance->status == '1' ? 'present' : 'absent' }}
                                        </td>

                                        <!-- Add other columns as needed -->
                                    </tr>
                                @endforeach


                                <!-- Adjust colspan based on the number of columns in your table -->


                            </tbody>
                        </table>

                    </div>

                </div>
                @endforeach
                @endif
                <!-- /.card -->
                <!-- if the user is teacher -->
                @if(auth()->user()->role=="teacher")
                <div class="card card-primary">
                    <div class="card-header">
                      
                          
                      <h3 class="card-title">VIEW ATTENDANCE</h3>
                      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Teacher</th>
                                    <th>class</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $attendance->student->user->name }}</td>
                                        <td>{{$attendance->teacher->user->name}}</td>
                                        <td>{{$attendance->grade->name }}</td>
                                        <td>
                                            {{ $attendance->status == '1' ? 'present' : 'absent' }}
                                        </td>

                                        <!-- Add other columns as needed -->
                                    </tr>
                                @endforeach


                                <!-- Adjust colspan based on the number of columns in your table -->


                            </tbody>
                        </table>

                    </div>

                </div>
                @endif
            </div>
      



@endsection

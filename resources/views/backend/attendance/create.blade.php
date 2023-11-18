{{-- {{-- @extends('backend.layouts.main')
@section('content-title', 'Grade create')
@section('page-title', 'create grade') --}}
{{-- @section('content') --}}


<!-- left column -->
{{-- <div class="col-md-12">
            <div class="py-2">
                <a href="" class="btn btn-primary"> <i class="far fa-eye"></i> view</a>
            </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ADD GRADES</h3>
            </div> --}}
<!-- /.card-header -->
<!-- form start -->
{{-- <div class="w-full px-6 py-6">
                <div class="flex items-center bg-gray-600 rounded-tl rounded-tr">
                    <div class="w-4/12 text-left text-white py-2 px-4 font-semibold">Student</div>
                    <div class="w-3/12 text-left text-white py-2 px-4 font-semibold">Roll</div>
                    <div class="w-5/12 text-right text-white py-2 px-4 font-semibold">Actions</div>
                </div>
                <form action="" method="POST">
                    
                        <div class="flex items-center justify-between border border-gray-200">
                            @csrf
                            <div class="w-4/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">hello</div>
                            <div class="w-3/12 text-sm text-left text-gray-600 py-2 px-4 font-semibold">world</div>
                            <div class="w-5/12 text-sm text-right py-2 px-4 flex items-center justify-end">
                                <label class="block text-green-500 font-semibold sm:border-r sm:pr-4">
                                    <input name="attendences[]" class="leading-tight" type="radio" value="present">
                                    <span class="text-sm">Present</span>
                                </label>
                                <label class="ml-4 block text-red-500 font-semibold">
                                    <input name="attendences[]" class="leading-tight" type="radio" value="absent">
                                    <span class="text-sm">Absent</span>
                                </label>
                            </div>
                            <input type="hidden" name="class_id" value="">
                            <input type="hidden" name="teacher_id" value="">
                        </div>
                    <div class="mt-6">
                        <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Submit Attendance
                        </button>
                    </div>
                </form>
            </div>
          </div>
          <!-- /.card -->
          </div>
    </div><!-- /.container-fluid --> --}}





@extends('backend.layouts.main')
@section('content-title', 'Grade create')
@section('page-title', 'create grade')
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
                                @foreach ($students as $enrollment)
                                    <tr>
                                        <td>{{ $enrollment->student->id }}</td>
                                        <td>{{ $enrollment->student->user->name }}</td>
                                        <td>
                                            <button class="btn-primary btn btn-sm" value="1" type="button">Present</button>
                                            <button class="btn-danger btn btn-sm" value="0" type="button">Absent</button>
                                        </td>
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

@extends('backend.layouts.main')
@section('content-title', 'Student')
@section('page-title', 'view student')
@section('content')
    <div class="col-12">
        <div class="py-2">

            <a href="{{ route('result.index') }}" class="btn btn-primary btn-sm"> <i
                    class="fa-solid fa-plus px-1"></i>view</a>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">VIEW STUDENTS</h3>

                <div class="card-tools">
                <form action="{{ route('result.store') }}" method="POST">
                                @csrf
                        <div class="input-group input-group-sm" style="width: 250px;">

                        
                            <select name="subject" id="" class="form-control">
                                @foreach($books as $book)
                                <option value="{{$book->id}}">{{$book->name}}</option>
                                @endforeach
                            </select>


                        </div>
                </div>
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $enrollment->student->user->name }}</td>
                                        <td>
                                        
                                        <input type="number" name="marks[{{ $enrollment->student->id }}]" value="{{$enrollment->student->id}}" required>
                                        </td>
                                        
                                        <!-- Add other columns as needed -->
                                    </tr>
                                @endforeach



                                <!-- Adjust colspan based on the number of columns in your table -->


                        </tbody>
                    </table>

                </div>

            </div>
            <button type="submit" class="btn text-white" style="background-color:#0d6efd">Submit Marks</button>
            </form>
            <!-- /.card -->
        </div>
    


@endsection

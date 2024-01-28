@extends('backend.layouts.main')
@section('content-title', 'Add marks')
@section('page-title', 'ADD MARKS')
@section('content')
    <div class="col-12">
        <div class="py-2">

            <form action="{{ route('result.store') }}" method="POST">
                @csrf
                <div class="d-flex p-1">

                    <div class="input-group input-group-sm p-1" style="width: 250px;">

                        <label for="" class=" me-2">Select exam:</label>
                        <select name="exam" id="" class="form-control">

                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="input-group input-group-sm" style="width: 250px;">

                        <label for="" class=" me-2">Select subject:</label>
                        <select name="subject" id="" class="form-control">

                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>


                    </div>
                </div>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">ADD MARKS</h3>

                <div class="card-tools">
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

                                    <input type="number" name="marks[{{ $enrollment->student->id }}]" required>
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

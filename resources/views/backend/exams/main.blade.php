@extends('backend.layouts.main')
@section('content-title', 'EXAM')
@section('page-title', 'view exam')
@section('content')
<div class="col-12">
    <div class="py-2">

        <a href="{{ route('exam.create') }}" class="btn btn-primary btn-sm"> <i class="fa-solid fa-plus px-1"></i>Add</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">VIEW EXAMS</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table text-nowrap text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        @if(auth()->user()->role == "admin")
                        <th>Status</th>

                        <th>Action</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @if (count($exams) > 0)
                    @foreach ($exams as $exam)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $exam->name }}</td>
                        <td>{{ $exam->date }}
                            @if($exam->status == 1 && auth()->user()->role !== "admin" )
                            <a href="{{route('results',$exam->id)}}" class="btn-sm btn btn-secondary ms-1"><i class="fa fa-eye px-1"></i> result</a>
                            @endif
                        </td>
                        @if(auth()->user()->role == "admin")

                        <td> {{ $exam->status == '0' ? 'unpublished' : 'published' }}</td>


                        <td>
                            <a href="#" class="btn-sm btn btn-success" data-bs-toggle="modal" data-bs-target="#studentModalEdit_{{ $exam->id }}"><i class="fa fa-edit px-1"></i></a>


                            <!-- Modal -->
                            <div class="modal fade" id="studentModalEdit_{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel_{{ $exam->id }}" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                Edit exam
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('exam.update',$exam->id)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">
                                                        Name:</label>
                                                    <input type="text" class="form-control" value="{{$exam->name}}" name="name" id="name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">
                                                        Date:</label>
                                                    <input type="date" class="form-control" value="{{$exam->date}}" name="date" id="date">
                                                </div>
                                                <div class="form-group">
                                                    <label>Select Exam Status</label>
                                                    <select class="form-control" name="status" style="width: 100%;">

                                                        <option value="0" {{ $exam->status == 0 ? 'selected' : '' }}>unpublished</option>
                                                        <option value="1" {{ $exam->status == 1 ? 'selected' : '' }}>published</option>


                                                    </select>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn-sm btn btn-secondary" data-bs-toggle="modal" data-bs-target="#studentModalView_{{ $exam->id }}"><i class="fa fa-eye px-1"></i></a>


                            <!-- Modal -->
                            <div class="modal fade" id="studentModalView_{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel_{{ $exam->id }}" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                View Teacher
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group text-start">
                                                <label for="name">Name</label>
                                                <input type="text" value="{{$exam->name}}" class="form-control" id="name" disabled>
                                            </div>
                                            <div class="form-group text-start">
                                                <label for="address">Address</label>
                                                <input type="text" value="{{$exam->address}}" class="form-control" id="address" disabled>
                                            </div>
                                            <div class="form-group text-start">
                                                <label for="phone">Phone</label>
                                                <input type="text" value="{{$exam->phone}} " class="form-control" id="phone" disabled>
                                            </div>
                                            <div class="form-group text-start">
                                                <label for="dob">Date Of Birth</label>
                                                <input type="text" value="{{$exam->dob}}" class="form-control" id="dob" disabled>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
        </div>
        <form action="{{ route('exam.destroy', $exam->id) }}" class="d-inline" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete')"><i class="fa-solid fa-trash"></i></button>
        </form>
        @endif
        <!-- @if($exam->status == 1 )
        <a href="{{route('result.index')}}" class="btn-sm btn btn-secondary ms-1"><i class="fa fa-eye px-1"></i> result</a>
        @endif -->

        </td>

        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">
                <h3> No Exams are added</h3>
            </td>
            <!-- Adjust colspan based on the number of columns in your table -->
        </tr>
        @endif
        </tbody>
        </table>

    </div>


    <!-- /.card-body -->
</div>
@if ($exams->count() > 0)
{{ $exams->links() }} <!-- Pagination links, if using paginate() -->
@endif



</div>







@endsection
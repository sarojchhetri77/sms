@extends('backend.layouts.main')
@section('content-title', 'Books')
@section('page-title', 'view Books')
@section('content')
    <div class="col-12">
        <div class="py-2">

            <a href="{{ route('book.create') }}" class="btn btn-primary btn-sm"> <i
                    class="fa-solid fa-plus px-1"></i>Add</a>
                    @if ($search)
                        
                    <a href="{{ route('book.index') }}" class="btn btn-primary btn-sm"> <i
                            class="fa-solid fa-arrow-left px-1"></i>Go Back</a>
                    @endif
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">VIEW BOOKS</h3>

                <div class="card-tools">
                    <form action="" class="d-inline">
                        <div class="input-group input-group-sm" style="width: 250px;">

                            @csrf
                            <input type="search" name="search" class="form-control float-right text-secondary"
                                placeholder="Search with name" value="{{ $search }}">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($books) > 0)
   -                         @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->grades->name }}</td>
                                   
                                    <td>
                                        <a href="#" class="btn-sm btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#studentModalEdit_{{ $book->id }}"><i
                                                class="fa fa-edit px-1"></i></a>


                                        <!-- Modal -->
                                        <div class="modal fade" id="studentModalEdit_{{ $book->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="studentModalLabel_{{ $book->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            Edit book
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('book.update', $book->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Student
                                                                    Name:</label>
                                                                <input type="text" class="form-control" value=""
                                                                    name="name" id="name">
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary"
                                                                    data-bs-dismiss="modal">Submit</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn-sm btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#studentModalView_{{ $book->id }}"><i
                                                class="fa fa-eye px-1"></i></a>


                                        <!-- Modal -->
                                        <div class="modal fade" id="studentModalView_{{ $book->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="studentModalLabel_{{ $book->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            View Teacher
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                      <div class="card-body">
                                                        <div class="form-group text-start">
                                                          <label for="name">Name</label>
                                                          <input type="text" value="{{$book->name}}"  class="form-control" id="name" disabled>
                                                        </div>
                                                        <div class="form-group text-start">
                                                          <label for="address">Address</label>
                                                          <input type="text" value="{{$book->address}}"  class="form-control" id="address" disabled>
                                                        </div>
                                                        <div class="form-group text-start">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" value="{{$book->phone}} "  class="form-control" id="phone" disabled>
                                                          </div>
                                                        <div class="form-group text-start">
                                                          <label for="dob">Date Of Birth</label>
                                                          <input type="text" value="{{$book->dob}}" class="form-control" id="dob" disabled>
                                                        </div>
                                                      
                                                      </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('book.destroy', $book->id) }}" class="d-inline"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you want to delete')"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">
                                    <h3> No Books are added</h3>
                                </td>
                                <!-- Adjust colspan based on the number of columns in your table -->
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>


            <!-- /.card-body -->
        </div>
        @if ($books->count() > 0)
            {{ $books->links() }} <!-- Pagination links, if using paginate() -->
        @endif



    </div>







@endsection

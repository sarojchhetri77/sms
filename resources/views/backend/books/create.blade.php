@extends('backend.layouts.main')
@section('content-title', 'Books Add')
@section('page-title', 'Add Books')
@section('content')

    <section class="content">
        <div class="container-fluid">
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif

            @if (session('bsuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('bsuccess') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <!-- left column -->
            <div class="col-md-12">
                <div class="py-2">
                    <a href="{{ route('book.index') }}" class="btn btn-primary"> <i class="far fa-eye"></i> view</a>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ADD GRADES</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('book.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter name of book">
                            </div>
                            <div class="form-group">
                                <label>Select Class</label>
                                <select class="form-control" name="class_id" style="width: 100%;">
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach



                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </section>



@endsection

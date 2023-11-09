@extends('backend.layouts.main')
@section('content-title', 'Teacher')
@section('page-title', 'view teacher')
@section('content')
<div class="col-12">
      <div class="py-2">
      
        <a href="{{route('teacher.create')}}" class="btn btn-primary btn-sm"> <i class="fa-solid fa-plus px-1"></i>Add</a>
      </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">VIEW TEACHERS</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
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
                            <th>Date Of Birth</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Hired At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>183</td>
                            <td>John Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-success">Approved</span></td>
                            <td>Bacon ipsum </td>
                            <td>Bacon ipsum </td>
                            <td>
                              <a href="" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a>
                              <a href="" class="btn btn-secondary btn-sm"><i class="far fa-eye"></i> </a>
                              <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>






@endsection

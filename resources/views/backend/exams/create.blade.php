@extends('backend.layouts.main')
@section('content-title','Exam create')
@section('page-title','create Exam')
@section('content')
 
<section class="content">
    <div class="container-fluid">
        <!-- left column -->
        <div class="col-md-12">
            <div class="py-2">
                <a href="" class="btn btn-primary"> <i class="far fa-eye"></i> view</a>
            </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ADD GRADES</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{route('exam.store')}}" method="POST" >
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name of exam</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter name of exam">
                </div>
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" name="date" class="form-control" id="date" placeholder="Enter date of exam">
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

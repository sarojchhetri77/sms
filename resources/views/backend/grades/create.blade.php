@extends('backend.layouts.main')
@section('content-title','Grade create')
@section('page-title','create grade')
@section('content')
 
<section class="content">
    <div class="container-fluid">
      @if($errors->has('name'))
    <div class="alert alert-danger">
        {{ $errors->first('name') }}
    </div>
@endif
      @if($errors->has('section'))
    <div class="alert alert-danger">
        {{ $errors->first('section') }}
    </div>
@endif
        <!-- left column -->
        <div class="col-md-12">
            <div class="py-2">
                <a href="{{route('grade.index')}}" class="btn btn-primary"> <i class="far fa-eye"></i> view</a>
            </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ADD GRADES</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{route('grade.store')}}" method="POST" >
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter name of class">
                </div>
                <div class="form-group">
                  <label for="section">Section</label>
                  <input type="text" name="section" class="form-control" id="section" placeholder="Enter class section">
                </div>
                <div class="form-group">
                  <label>Select Class Teacher</label>
                  <select class="form-control" name="teacher_id" style="width: 100%;">
                    @foreach ($teachers as $teacher)
                        
                    <option value="{{$teacher->id}}" >{{$teacher->user->name}}</option>
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

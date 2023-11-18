@extends('backend.layouts.main')
@section('content-title','Student')
@section('page-title','create student')
@section('content')
 
<section class="content">
    <div class="container-fluid">
        <!-- left column -->
        <div class="col-md-12">
            <div class="py-2">
                <a href="{{route('student.index')}}" class="btn btn-primary"> <i class="far fa-eye"></i> view</a>
            </div>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">CREATE STUDENT</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="{{route('student.store')}}" method="POST" >
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" class="form-control" id="address" placeholder="Enter address">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone">
                  </div>
                <div class="form-group">
                  <label for="dob">Date Of Birth</label>
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Select Class</label>
                  <select class="form-control" name="grade_id" style="width: 100%;">
                    @foreach ($classes as $grade)
                        
                    <option value="{{$grade->id}}" >{{$grade->name}} {{$grade->section}}</option>
                    @endforeach
                    
                  </select>
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="cpassword">Confirm Password</label>
                  <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Password">
                </div>
                <div class="form-group mb-0">
                  <label for="gender">Select Gender</label>
                  <div class="custom-control custom-radio">
                    <input type="radio" name="gender" value="male" class="custom-control-input" id="male">
                    <label class="custom-control-label" for="male">male</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" name="gender" value="female" class="custom-control-input" id="female">
                    <label class="custom-control-label" for="female">female</label>
                  </div>
                </div>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
    </div><!-- /.container-fluid -->
  </section>

  
    
@endsection

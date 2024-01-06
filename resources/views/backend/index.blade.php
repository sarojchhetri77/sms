@extends('backend.layouts.main')
@section('content-title','dashboard')
@section('page-title','dashboard')
@section('content')
<div class="row">
  @if (auth()->user()->role == "admin")
  <div class="col-lg-3 col-6">
    <!-- small box -->
        

    <div class="small-box bg-info">
      <div class="inner">
        <h3>150</h3>

        <p>Students</p>
      </div>
      <div class="icon">
        <i class="ion  fa-solid fa-user"></i>
      </div>
      <a href="{{route('student.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success ">
      <div class="inner">
        <h3>53<sup style="font-size: 20px">%</sup></h3>

        <p>Teacher</p>
      </div>
      <div class="icon">
        <i class="ion  fa-solid fa-user"></i>
      </div>
      <a href="{{route('teacher.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>44</h3>

        <p>Class</p>
      </div>
      <div class="icon">
        <i class="ion fa-solid fa-house"></i>
      </div>
      <a href="{{route('grade.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>65</h3>

        <p>Books</p>
      </div>
      <div class="icon">
        <i class="ion fa-solid fa-book"></i>
      </div>
      <a href="{{route('book.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>65</h3>

        <p>Exam</p>
      </div>
      <div class="icon">
        <i class="ion fa-solid fa-book"></i>
      </div>
      <a href="{{route('exam.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>65</h3>

        <p>attendance</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{route('attendance.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
    @endif
    @if (auth()->user()->role == "teacher")
        
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>15</h3>
  
          <p> Take Attendence</p>
        </div>
        <div class="icon">
          <i class="ion fa-solid fa-book"></i>
        </div>
        <a href="{{route('attendance.create')}}" class="small-box-footer">Take Attendence<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>15</h3>
  
          <p>prepare result</p>
        </div>
        <div class="icon">
          <i class="ion fa-solid fa-book"></i>
        </div>
        <a href="{{route('result.create')}}" class="small-box-footer">Prepare Result<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endif

  </div>
  <!-- ./col -->
</div>
@endsection



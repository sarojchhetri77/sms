@extends('backend.layouts.main')
@section('content-title', 'Result ')
@section('page-title', 'view result')
@section('content')


<!-- left column -->
<div class="col-md-12">
    <div class="py-2">
        <form action="" class="d-inline">
            <div class="input-group input-group-sm" style="width: 300px;">
                @csrf
                <div class="d-flex p-1">

                    <div class="input-group input-group-sm p-1" style="width: 250px;">

                        <label for="" class=" me-2">Select exam:</label>
                        <select name="exam" id="" class="form-control">

                            <option value="">hello</option>

                        </select>


                    </div>
                    <div class="input-group input-group-sm p1" style="width: 250px;">

                        <label for="exampleInputText1" class=" my-1">Name:</label>
                        <input type="text" class="form-control ms-1" id="exampleInputText1" aria-describedby="textHelp">
                    </div>
                    <div class="ps-1">
                        <button type="submit" class="btn btn-sm btn-primary">
                            Generate
                        </button>
                    </div>
                </div>




            </div>
        </form>

    </div>


    <div class="card card-primary">
        <div class="card-header">


            <h3 class="card-title">VIEW RESULT</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table text-nowrap text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Marks</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($results as $result)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $result->books->name}}</td>
                        <td>{{$result->marks}}</td>
                        

                        <!-- Add other columns as needed -->
                    </tr>
                    @endforeach



                    <!-- Adjust colspan based on the number of columns in your table -->


                </tbody>
            </table>

        </div>

    </div>

    <!-- /.card -->
</div>




@endsection
@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('/addModule/add')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="courseDetail">
                <h5 style="width: 30%;float:left; margin-top:5px;">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left;  margin-top:5px;">Course</h5>
                <select name="course" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                    <option selected>{{$chosenCourse->name}}</option>
                    @foreach ($courseList as $course)
                    <option>{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left; margin-top:5px;">Description</h5>
                <input style="width:70%; float: right;" type="text" name="description"
                    class="form-control text-truncate" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left; margin-top:5px;">Minimal Grade</h5>
                <input style="width:70%; float: right;" type="number" name="kkm" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left; margin-top:5px;">Learning Material</h5>
                <div class="custom-file" style="width: 70%">
                    <input class="form-control" type="file" id="formFile" name="file">
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary"
                    style="margin-top: 35px; background-color: #27353F; width: 150px;">
                    Submit
                </button>
            </center>
        </form>
    </div>
</div>
@if(count($errors) > 0)
<div class="alert alert-danger" style="margin-top:10px">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
</main>
</div>
</div>
</div>
@endsection

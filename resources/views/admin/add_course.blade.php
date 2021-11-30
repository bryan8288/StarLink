@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('/addCourse/add')}}" method="post">
            {{csrf_field()}}
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Category</h5>
                <select name="category" class="form-control input-sm"
                    style="margin-bottom: 5px; float :right;width:70%">
                    <option>Curriculum</option>
                    <option>E-Learning</option>
                </select>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Description</h5>
                <input style="width:70%; float: right;" type="text" name="description"
                    class="form-control text-truncate" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Price</h5>
                <input style="width:70%; float: right;" type="text" name="price" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Weeks</h5>
                <input style="width:70%; float: right;" type="number" name="weeks" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Minimal Grade</h5>
                <input style="width:70%; float: right;" type="number" name="kkm" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left;  margin-top:5px;">Exam Time</h5>
                <input style="width:70%; float: right;" type="time" name="time" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <center>
                <button type="submit" class="btn btn-primary"
                    style="margin-top: 25px; background-color: #27353F; width: 150px;">
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

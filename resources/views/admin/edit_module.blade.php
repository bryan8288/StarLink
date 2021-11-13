@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role != 'admin')
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">Name</h5>
            <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                value="{{$moduleDetail->name}}" style="margin-bottom: 5px" readonly>
        </div>
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">Course</h5>
            <select class="form-control input-sm" style="margin-bottom: 5px; float :right;width:70%" disabled
                name="course">
                <option selected>{{$course[0]->name}}</option>
                @foreach ($courseList as $course)
                <option>{{$course->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">Description</h5>
            <textarea class="form-control" style="width:70%; float: right;" name="description"
                placeholder="{{$moduleDetail->description}}" rows="5" readonly></textarea>
        </div>
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">KKM</h5>
            <input style="width:70%; float: right;" type="text" name="kkm" class="form-control"
                value="{{$moduleDetail->kkm}}" style="margin-bottom: 5px" readonly>
        </div>
        @else
        <form action="{{url('editModule/update/'.$moduleDetail->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                    value="{{$moduleDetail->name}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Course</h5>
                <select class="form-control input-sm" style="margin-bottom: 5px; float :right;width:70%" name="course">
                    <option selected>{{$course[0]->name}}</option>
                    @foreach ($courseList as $course)
                    <option>{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Description</h5>
                <textarea class="form-control" style="width:70%; float: right;" name="description"
                    placeholder="{{$moduleDetail->description}}" rows="5"></textarea>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">KKM</h5>
                <input style="width:70%; float: right;" type="text" name="kkm" class="form-control"
                    value="{{$moduleDetail->kkm}}" style="margin-bottom: 5px">
            </div>
            <center>
                <button type="submit" class="btn btn-primary"
                    style="margin-top: 55px; background-color: #27353F; width: 150px">
                    Edit
                </button>
            </center>
        </form>
        <center>
            <form action="{{'/editModule/delete/'.$moduleDetail->id}}" method="post">
                {{csrf_field()}}
                {{method_field('post')}}
                <button type="submit" onclick="return confirm('Are you sure to Delete this Module?')"
                    class="btn btn-danger" style="margin-top: 15px; width: 150px">
                    Delete
                </button>
            </form>
        </center>
        @endif

        <center>
            <a href="{{'/moduleDetailLearning/'.$moduleDetail->id}}">
                <button type="button" class="btn btn-primary" style="margin-top: 15px; width: 150px">
                    See Module Detail
                </button>
            </a>
        </center>
    </div>
</div>
@if(count($errors) > 0)
<div class="alert alert-danger" style="margin-top:20px">
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

@extends('layout.layout')
@section('content')
<div class="col-md-12">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('layout.sidebar')
            <main class="col ps-md-2 pt-2">
                <div class="col-md-12" style="display: flex; margin-top:10px">
                    <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse"
                        class="border rounded-3 p-1 text-decoration-none" style="display: table;"><i class="fa fa-bars"
                            aria-hidden="true"></i>
                        Menu</a>
                    <div class="col-md-10">
                        <center>
                            <h4 style="margin-top: 2px;text-align: center"><a class="title" href="{{'/'}}">Starlink</a>
                            </h4>
                        </center>
                    </div>
                </div>
                <div class="col-md-2" style="display: flex; position: absolute;right: 0;top: 0; padding-left: 64px">
                    <img src="{{url('storage/'.$userData[0]->profile_picture)}}"
                        style="height:60px; border-radius: 50%; border: 6px solid #218EED;margin-top:10px; width: 50px;">
                    <div class="dropdown" style="margin-top: 20px">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="margin-left: 20px; color: black; background-color: white">{{$userData[0]->username}}</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/dashboard/logout">Logout</a>
                            <a class="dropdown-item" href="/home/logout">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="background">
                    <div class="container-fluid" style="padding-top: 50px">
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
                                <select class="form-control input-sm" style="margin-bottom: 5px; float :right;width:70%"
                                    name="course">
                                    <option selected>{{$course[0]->name}}</option>
                                    @foreach ($courseList as $course)
                                    <option>{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Description</h5>
                                <input style="width:70%; float: right;" type="text" name="description"
                                    class="form-control text-truncate" value="{{$moduleDetail->description}}"
                                    style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Exam Time</h5>
                                <input style="width:70%; float: right;" type="text" name="time"
                                    class="form-control text-truncate" value="{{$moduleDetail->exam_time}}"
                                    style="margin-bottom: 5px">
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
                        <center>
                            <a href="{{'/moduleDetailLearning/'.$moduleDetail->id}}">
                                <button type="button"
                                class="btn btn-primary" style="margin-top: 15px; width: 150px">
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

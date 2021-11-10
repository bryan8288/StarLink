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
                            <a class="dropdown-item" href="{{'/profile/'.$userData[0]->id}}">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="background">
                    <div class="container-fluid" style="padding-top: 50px">
                        <form action="{{url('/addClass/add')}}" method="post">
                            {{csrf_field()}}
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Name</h5>
                                <input style="width:70%; float: right;" type="text" name="name" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Course</h5>
                                <select name="course" class="form-control input-sm" style="margin-bottom: 5px; float :right;width:70%">
                                    @foreach ($courseList as $course)
                                        <option>{{$course->name}}</option>
                                    @endforeach                                
                                </select>                            
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Mentor</h5>
                                <select name="mentor" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                                    @foreach ($mentorList as $mentor)
                                        <option>{{$mentor->name}}</option>
                                    @endforeach
                                </select>   
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Day of Week</h5>
                                <select name="day" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                                    @foreach ($mapDay as $day)
                                        <option>{{$day}}</option>
                                    @endforeach
                                </select>   
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Start Time</h5>
                                <input style="width:70%; float: right;" type="time" name="start_time" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">End Time</h5>
                                <input style="width:70%; float: right;" type="time" name="end_time" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Link</h5>
                                <input style="width:70%; float: right;" type="text" name="link" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div style="margin-top: 30px">
                                <center>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 25px; background-color: #27353F; width: 150px;">
                                        Submit
                                    </button>
                                </center>
                            </div>
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
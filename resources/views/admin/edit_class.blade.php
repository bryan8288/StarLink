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
                <div class="col-md-12" id="background2">
                    <div class="container-fluid" style="padding-top: 50px">
                        <form action="{{url('editClass/update/'.$class->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Name</h5>
                                <input style="width:70%; float: right;" type="text" name="name" class="form-control" value="{{$class->name}}" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Course</h5>
                                <select name="course" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                                    <option selected>{{$courseName}}</option>
                                    @foreach ($courseList as $course)
                                        <option>{{$course->name}}</option>
                                    @endforeach
                                </select>   
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Mentor</h5>
                                <select name="mentor" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                                    <option selected>{{$mentorName->name}}</option>
                                    @foreach ($mentorList as $mentor)
                                        <option>{{$mentor->name}}</option>
                                    @endforeach
                                </select>   
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Day Of Week</h5>
                                <select name="day" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                                    <option selected>{{$class->day_of_week}}</option>
                                    @foreach ($mapDay as $day)
                                        <option>{{$day}}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Start Time</h5>
                                <input style="width:70%; float: right;" type="time" name="start_time" class="form-control" value="{{$class->start_time}}" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">End Time</h5>
                                <input style="width:70%; float: right;" type="time" name="end_time" class="form-control" value="{{$class->end_time}}" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Link</h5>
                                <input style="width:70%; float: right;" type="text" name="link" class="form-control" value="{{$class->link}}" style="margin-bottom: 5px">
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary" style="margin-top: 55px; background-color: #27353F; width: 150px">
                                    Submit
                                </button>
                            </center>
                        </form>

                            <div style="margin-top: 30px">
                                <h4>Mentee List</h4>
                                <div class="modules">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr style="text-align: center">
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody style="text-align: center">
                                            <?php $i=1;?>
                                            @foreach ($menteeList as $mentee)
                                                <tr class="table-info">
                                                    <th scope="row">{{$i}}</th>
                                                    <td>{{$mentee->name}}</td>
                                                    <td>
                                                        <form action="{{'/deleteMenteeFromClass/'.$mentee->id}}" method="post">
                                                            {{csrf_field()}}
                                                            <button type="submit"class="btn btn-danger" onclick="return confirm('Are you sure to Delete this Mentee?')">DELETE</button>    
                                                        </form>
                                                    <td>
                                                </tr>
                                                <?php $i++;?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                    </ul> 
                                </div>
                            @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
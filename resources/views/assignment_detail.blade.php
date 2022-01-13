@extends('layout.layoutUser')
@section('content')
@if(session('status'))
   <div class="alert alert-success alert-dismissible" role="alert" style="margin-top :10px;">
        {{session('status')}}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="col-md-12" id="background2">
    <div class="container-fluid" style="padding-top: 50px">
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role != 'admin')
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">Title</h5>
            <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                value="{{$assignmentDetail->title}}" style="margin-bottom: 5px" readonly>
        </div>
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">Description</h5>
            <textarea style="width:70%; float: right;" type="text" name="description" class="form-control"
            style="margin-bottom: 5px" readonly>{{$assignmentDetail->description}}</textarea>
        </div>
        
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">Start Date</h5>
            <input style="width:70%; float: right;" type="date" name="start_time" readonly class="form-control"
                value="{{$assignmentDetail->start_date}}" style="margin-bottom: 5px">
        </div>
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">End Date</h5>
            <input style="width:70%; float: right;" type="date" name="end_time" class="form-control"
                value="{{$assignmentDetail->end_date}}" style="margin-bottom: 5px" readonly>
        </div>
        <div class="courseDetail">
            <h5 style="width: 30%;float:left">File</h5>
            <a href="{{asset('storage/'.$assignmentDetail->assignment_file)}}">
                <button type="button" class="btn btn-primary" style="background-color: #27353F;">
                    <i class="fa fa-cloud-download"></i>
                    Download
                </button>
            </a>
        </div>
        <div style="margin-top: 30px">
            <h4>Submitted Assignment Mentee List</h4>
            <div class="modules" style="margin-top:10px">
                <table class="table table-striped">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Score</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <?php $i=1;?>
                        @foreach ($completedMenteeList as $mentee)
                        <tr class="table-info">
                            <th scope="row">{{$i}}</th>
                            <td>{{$mentee->name}}</td>
                            <td>{{$mentee->score}}</td>
                            <td>
                                <a href="{{asset('storage/'.$mentee->file)}}">
                                    <button type="button" class="btn btn-primary" style="background-color: #27353F;">
                                        <i class="fa fa-cloud-download"></i>
                                        Download
                                    </button>
                                </a>
                            </td>
                            <td>
                                @if($mentee->score == null)
                                <form action="{{url('/rateAssignment/'.$mentee->id)}}" method="post">
                                    {{csrf_field()}}
                                    <div style="display: flex; justify-content: center">
                                        <input style="width:20%" type="number" name="score" class="form-control"
                                        style="margin-bottom: 5px">
                                        <button class="btn btn-primary" style="width:80px; margin-left:20px">Rate</button>
                                    </div>
                                </form>
                                @else
                                <form action="{{url('/editRateAssignment/'.$mentee->id)}}" method="post">
                                    {{csrf_field()}}
                                    <div style="display: flex; justify-content: center">
                                        <input style="width:20%" type="number" name="score" class="form-control"
                                        style="margin-bottom: 5px">
                                        <button class="btn btn-primary" style="width:80px; margin-left:20px">Edit</button>
                                    </div>
                                </form>                                
                                @endif
                            </td>
                        </tr>
                        <?php $i++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="popupmodel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="popupmodel">Add Mentee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col"></th>
                                        <th scope="col">Name</th>
                                    </tr>
                                </thead>
                                <form action="{{url('addMenteeToClass/')}}" method="post">
                                    <tbody style="text-align: center">
                                        {{csrf_field()}}
                                        {{method_field('put')}}
                                        {{-- <tr class="table-info">
                                            <th scope="row">
                                                <input name="menteeId[]" class="form-check-input" type="checkbox"
                                                    id="flexCheckDefault" value="{{$mentee->id}}" />
                                            </th>
                                            <td>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{$mentee->name}}
                                                </label>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @else
        <form action="{{url('editClass/update/'.$class->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                    value="{{$class->name}}" style="margin-bottom: 5px">
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
                <input style="width:70%; float: right;" type="time" name="start_time" class="form-control"
                    value="{{$class->start_time}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">End Time</h5>
                <input style="width:70%; float: right;" type="time" name="end_time" class="form-control"
                    value="{{$class->end_time}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Link</h5>
                <input style="width:70%; float: right;" type="text" name="link" class="form-control"
                    value="{{$class->link}}" style="margin-bottom: 5px">
            </div>
            <center>
                <button type="submit" class="btn btn-primary"
                    style="margin-top: 55px; background-color: #27353F; width: 150px">
                    Submit
                </button>
            </center>
        </form>

        <div style="margin-top: 30px">
            <h4>Mentee List</h4>
            <button style="margin-top: 5px; width: 150px;background-color: #27353F" type="button"
                class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Mentee
            </button>
            <div class="modules" style="margin-top:10px">
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
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to Delete this Mentee?')">DELETE</button>
                                </form>
                            <td>
                        </tr>
                        <?php $i++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="popupmodel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="popupmodel">Add Mentee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col"></th>
                                        <th scope="col">Name</th>
                                    </tr>
                                </thead>
                                <form action="{{url('addMenteeToClass/'.$id)}}" method="post">
                                    @foreach ($newMenteeList as $mentee)
                                    <tbody style="text-align: center">
                                        {{csrf_field()}}
                                        {{method_field('put')}}
                                        <tr class="table-info">
                                            <th scope="row">
                                                <input name="menteeId[]" class="form-check-input" type="checkbox"
                                                    id="flexCheckDefault" value="{{$mentee->id}}" />
                                            </th>
                                            <td>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{$mentee->name}}
                                                </label>
                                            </td>
                                        </tr>
                                        {{-- <div class="form-check">
                                                    </div> --}}
                                        @endforeach
                                    </tbody>
                            </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
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
        @endif
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

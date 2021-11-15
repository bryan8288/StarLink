@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" style="width: 100%">
                <a style="width: 30%; text-align:center" class="nav-item nav-link"
                    href="{{'/moduleDetailLearning/'.$id}}">Learning </a>
                <div style="border-left: 3px solid;"></div>
                <a style="width: 30%; text-align:center" class="nav-item nav-link"
                    href="{{'/moduleDetailVideo/'.$id}}">Video</a>
                <div style="border-left: 3px solid;"></div>
                <a style="width: 30%; text-align:center" class="nav-item nav-link active"
                    href="{{'/moduleDetailAssignment/'.$id}}">Assignment</a>
            </div>
        </div>
    </nav>
    <div>
        <h5 style="color: white; margin-top:30px; font-size:30px;margin-left:2.5%">Assignment</h5>
        <hr style="border-top: 5px solid #ffffff; opacity:1;margin-left:2.5%;width:95%">
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentor')
        <button type="button" class="btn btn-primary" style="background-color: #27353F; margin-left:2.5%"
            data-bs-toggle="modal" data-bs-target="#uploadAssignment">
            <i class="fa fa-cloud-upload"></i>
            Upload New Assignment
        </button>
        @endif
        @foreach ($assignmentList as $assignment)
        <div style="display: flex">
            
                <h4 style="margin-top:30px; margin-left:2.5%; width: 80%;float:left"><a style="text-decoration: none; color:black" href="{{'/assignmentDetail/'.$assignment->id}}">{{$assignment->title}}</a></h4>
            
            <div style="width:20%; float: right; display: flex;">
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editAssignment"
                    style="height: 40px; margin-top: 30px; background-color: #27353F">Edit</button>
                <form action="{{'/deleteAssignment/'.$assignment->id}}" method="post">
                    {{csrf_field()}}
                    {{method_field('post')}}
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure to Delete this Assignment?')"
                        style="height: 40px; margin-left: 20px; margin-top: 30px">Delete</button>
                </form>

                <div class="modal fade" id="editAssignment" tabindex="-1" aria-labelledby="popupmodel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="popupmodel">Assignment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{url('/editAssignment/'.$assignment->id.'/'.$id)}}" method="post"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="modal-body">
                                    <div class="courseDetail">
                                        <h5 style="width: 30%;float:left">Title</h5>
                                        <input style="width:70%; float: right;" type="text" name="title"
                                            class="form-control" style="margin-bottom: 5px"
                                            value="{{$assignment->title}}">
                                    </div>
                                    <div class="courseDetail">
                                        <h5 style="width: 30%;float:left">Description</h5>
                                        <textarea class="form-control" style="width:70%; float: right;"
                                            name="description" rows="5">{{$assignment->description}}</textarea>
                                    </div>
                                    <div class="courseDetail">
                                        <h5 style="width: 30%;float:left">Start Date</h5>
                                        <input style="width:70%; float: right;" type="date" name="start_date"
                                            class="form-control" style="margin-bottom: 5px"
                                            value="{{$assignment->start_date}}">
                                    </div>
                                    <div class="courseDetail">
                                        <h5 style="width: 30%;float:left">End Date</h5>
                                        <input style="width:70%; float: right;" type="date" name="end_date"
                                            class="form-control" style="margin-bottom: 5px"
                                            value="{{$assignment->end_date}}">
                                    </div>
                                    <div class="companyDetail">
                                        <h5 style="width: 30%;float:left">File</h5>
                                        <input type="file" id="file" hidden name="file"  value="{{$assignment->assignment_file}}"/>
                                        <label style="color: white; font-size:16px; width: 200px; text-align:center"
                                            class="upload bg-dark" for="file">
                                            <i class="fa fa-cloud-upload"></i>
                                            Upload</label><br>
                                        <p style="font-size: 1px"> </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p style="margin-left:2.5%">{{$assignment->description}}</p>
        <h4 style="margin-left:2.5%">Deadline : {{$assignment->end_date}}</h4>
        <a href="{{asset('storage/'.$assignment->assignment_file)}}">
            <button type="button" class="btn btn-primary" style="background-color: #27353F; margin-left:2.5%">
                <i class="fa fa-cloud-download"></i>
                Download
            </button>
        </a>
        <hr>
        @endforeach
        <div class="modal fade" id="uploadAssignment" tabindex="-1" aria-labelledby="popupmodel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupmodel">Assignment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{url('/addAssignment/'.$id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Title</h5>
                                <input style="width:70%; float: right;" type="text" name="title" class="form-control"
                                    style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Description</h5>
                                <textarea class="form-control" style="width:70%; float: right;" name="description"
                                    placeholder="" rows="5"></textarea>
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Start Date</h5>
                                <input style="width:70%; float: right;" type="date" name="start_date"
                                    class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">End Date</h5>
                                <input style="width:70%; float: right;" type="date" name="end_date" class="form-control"
                                    style="margin-bottom: 5px">
                            </div>
                            <div class="companyDetail">
                                <h5 style="width: 30%;float:left">File</h5>
                                <input type="file" id="assignment_file" hidden name="assignment_file" />
                                <label style="color: white; font-size:16px; width: 200px; text-align:center"
                                    class="upload bg-dark" for="assignment_file">
                                    <i class="fa fa-cloud-upload"></i>
                                    Upload</label><br>
                                <p style="font-size: 1px"> </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(count($errors) > 0)
<div class="alert alert-danger" style="margin-top : 20px">
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

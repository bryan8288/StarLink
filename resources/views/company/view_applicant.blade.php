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
                <div class="col-md-12" id="background" style="display: flex">
                    <div style="margin-left: 50px;text-align: center;">
                        <img src="{{url('storage/'.$userData[0]->profile_picture)}}" 
                        style="width: 150px; height: 150px; margin-top:80px">
                        <h3 style="margin-top:10px; color: white"><b>{{$userData[0]->companyName}}</b></h3>
                        <h3 style="color:white;margin-top: 40px">Job List</h3>
                        <div style="">
                            @foreach ($jobList as $job)
                                <a href="{{'/applicantList/'.$job->id}}">
                                    <h5 style="color: white">{{$job->name}} ({{$job->totalApplicant}}/{{$job->capacity}})</h5>
                                </a>
                                <hr style="width: 200px; border-bottom: solid 2px">
                            @endforeach
                        </div>
                    </div>
                    <div class="container-fluid" style="padding-top: 50px">
                        <form action="{{'/applicantList/'}}">
                            <div style="display:flex;">
                                <h5 style="color: white; margin-left: 30px; margin-top:5px">Applicant List</h5>
                                <input type="text" name="keyword" class="form-control" placeholder="Search for Product"
                                    style="width: 500px; margin-left: 40px; padding-bottom: 5px; position: absolute; right: 140px;">
                                <input type="submit" class="btn btn-primary" value="Search"
                                    style="margin-left: 10px; margin-bottom: 5px; position: absolute; right: 50px; background-color: #27353F">
                            </div>
                        </form>
                        <hr style="color: #FFFFFF;height: 3px">

                        <div style="display: flex; margin-top :20px">
                            @foreach ($applicantList as $item)
                            <div class="col-md-2 card3">
                                <div style="margin-top: 20px">
                                    <div>
                                        @if ($item->profile_picture == null)
                                        <i class="fa fa-user-circle-o" style="margin-top:10px; font-size: 100px;"></i>
                                        @else
                                        <img class="" src="{{url('storage/'.$item->profile_picture)}}"
                                            style="height:100px; border-radius: 50%; border: 6px solid #218EED;margin-top:10px; width: 100px;">
                                        @endif
                                    </div>
                                    <h6><b>{{$item->name}}</b></h6>
                                    <h6>{{$item->phone}}<i class="fa fa-phone-square" style="margin-left: 5px"></i>
                                    </h6>
                                    <center>
                                        <hr style="width: 200px; border-bottom: solid 2px">
                                    </center>
                                    <h6>{{$item->email}}<i class="fa fa-envelope" style="margin-left: 5px"></i></h6>
                                    @if($item->cv != null)
                                    <h6>CV <i class="fa fa-check" style="margin-left: 10px"></i></h6>
                                    @else
                                    <h6>CV<i class="fa fa-close" style="margin-left: 10px"></i></h6>
                                    @endif

                                    @if($item->portofolio != null)
                                    <h6>Portofolio<i class="fa fa-check" style="margin-left: 10px"></i></h6>
                                    @else
                                    <h6>Portofolio<i class="fa fa-close" style="margin-left: 10px"></i></h6>
                                    @endif
                                    <a href="{{'/editClass/'.$item->id}}">
                                        <button class="btn btn-primary"
                                            style="background-color: #FF8C00; width:200px; margin-top: 10px; border-color: white">See
                                            Detail</button>
                                    </a>
                                    @if ($item->status == 'In Progress')
                                    <div style="display: flex; margin-top: 10px; justify-content: center">
                                        <form action="{{'/applicantList/approve/'.$item->applicantId}}" method="post">
                                            {{csrf_field()}}
                                            <button class="btn btn-primary" style="width:95px">Accept</button>
                                        </form>
                                        <form action="{{'/applicantList/reject/'.$item->applicantId}}" method="post">
                                            {{csrf_field()}}
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to Reject This Applicant?')"
                                                style="margin-left: 10px; width:95px">Reject</button>
                                        </form>
                                    </div>
                                    @elseif ($item->status == 'Accepted')
                                    <button class="btn btn-primary" style="width:200px; margin-top: 10px"
                                        disabled>Accepted</button>
                                    @elseif ($item->status == 'Rejected')
                                    <button class="btn btn-danger" style="width:200px; margin-top: 10px"
                                        disabled>Rejected</button>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div style="margin-left: 30px; margin-top:20px">
                            {{$applicantList->links()}}
                        </div>
                    </div>
                </div>
        </div>

        @if(session('status'))
        <div class="alert alert-success" style="margin-top :20px;">
            {{session('status')}}
        </div>
        @endif
        </main>
    </div>
</div>

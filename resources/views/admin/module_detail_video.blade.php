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
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav" style="width: 100%">
                                <a style="width: 30%; text-align:center" class="nav-item nav-link"
                                    href="{{'/moduleDetailLearning/'.$id}}">Learning </a>
                                <div style="border-left: 3px solid;"></div>
                                <a style="width: 30%; text-align:center" class="nav-item nav-link active" href="{{'/moduleDetailVideo/'.$id}}">Video</a>
                                <div style="border-left: 3px solid;"></div>
                                <a style="width: 30%; text-align:center" class="nav-item nav-link"
                                    href="{{'/moduleDetailAssignment/'.$id}}">Assignment</a>
                            </div>
                        </div>
                    </nav>
                    <div>
                        <h5 style="color: white; margin-top:30px; font-size:30px;margin-left:2.5%">Video</h5>
                        <hr style="border-top: 5px solid #ffffff; opacity:1;margin-left:2.5%;width:95%">
                        @foreach ($videoList as $video)
                        <h4 style="margin-top:30px; margin-left:2.5%">{{$video->name}}</h4>
                        <p style="margin-left:2.5%">{{$video->description}}</p>
                        <h4 style="margin-left:2.5%">Other Reference: {{$video->other_reference}}</h4>
                        @if(empty($video->video_file))
                            <h4 style="margin-left:2.5%">There is no Video</h4>
                        @else
                        <a href="{{asset('storage/'.$video->video_file)}}">
                            <button type="button" class="btn btn-primary"
                                style="background-color: #27353F; margin-left:2.5%">
                                <i class="fa fa-cloud-download"></i>
                                Download
                            </button>
                        </a>
                        @endif
                        <hr>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection

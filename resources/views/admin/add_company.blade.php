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
                        <form action="{{url('/addCompany/add')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="companyDetail">
                                <h5 style="width: 30%; float: left">Username</h5>
                                <input style="width: 70%; float: right" type="text" name="username" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="companyDetail">
                                <h5 style="width: 30%;float:left">Password</h5>
                                <input style="width:70%; float: right;" type="password" name="password" class="form-control text-truncate" style="margin-bottom: 5px">
                            </div>
                            <div class="companyDetail">
                                <h5 style="width: 30%; float: left">Email</h5>
                                <input style="width: 70%; float: right" type="text" name="email" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="companyDetail">
                                <h5 style="width: 30%; float: left">Name</h5>
                                <input style="width: 70%; float: right" type="text" name="name" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="companyDetail">
                                <h5 style="width: 30%; float: left">Address</h5>
                                <input style="width:70%; float: right" type="text" name="address" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="companyDetail">
                                <h5 style="width: 30%; float: left">Phone</h5>
                                <input style="width: 70%; float: right" type="text" name="phone" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="companyDetail">
                                <h5 style="width: 30%;float:left">Profile Picture</h5>
                                <input type="file" class="upload" id="upload" hidden name="profile_picture" />
                                <label style="color: white; font-size:16px; width: 200px; text-align:center"
                                    class="upload bg-dark" for="upload">Upload Profile Picture</label><br>
                                <p style="font-size: 1px"> </p>
                            </div>
                            <center>
                                <button class="btn btn-primary" style="margin-top: 25px; background-color: #27353F; width: 150px;">
                                    Submit
                                </button>
                            </center>
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection

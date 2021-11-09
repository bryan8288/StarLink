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
                <div class="col-md-2" style="display: flex; position: absolute;right: 0;top: 0; padding-left: 50px">
                    <img src="{{url('storage/'.$userData[0]->profile_picture)}}"
                        style="height:60px; border-radius: 40%; border: 6px solid #218EED;margin-top:10px; width: 50px;">
                    <div class="dropdown" style="margin-top: 20px">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="margin-left: 20px; color: black; background-color: white">{{$userData[0]->name}}</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/dashboard/logout">Logout</a>
                            @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                            <a class="dropdown-item" href="{{'/profile/'.$userData[0]->id}}">View Profile</a>
                            @endif
                            @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentor')
                            <a class="dropdown-item" href="{{'/profile/'.$userData[0]->id}}">View Profile</a>
                            @endif
                            @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                            <a class="dropdown-item" href="{{'/profile/'.$userData[0]->id}}">View Profile</a>
                            @endif
                            @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'company')
                            <a class="dropdown-item" href="{{'/companyprofile/'.$userData[0]->id}}">View Profile</a>
                            @endif
                        </div>
                    </div>
                </div>

                <section class="section about-section gray-bg" id="background">
                    <div class="container">
                        <form action="{{url('profile/update/'.$userData[0]->id)}}" enctype="multipart/form-data"
                            method="post">
                            {{ csrf_field() }}
                            {{method_field('put')}}
                            <div class="row">
                                <div class="col-lg-3" style="text-align: left; margin-top:150px">
                                    <div class="about-avatar">
                                        <img src="{{url('storage/'.$userData[0]->profile_picture)}}" width="200px"
                                            height="200px" style="border-radius:25px">
                                    </div>
                                    <br>

                                    <input type="file" name="profile_picture" class="profile_picture"
                                        id="profile_picture" hidden />
                                    <label style="color: white; font-size:16px; width: 200px; text-align:center"
                                        class="upload bg-dark" name="profile_picture" for="profile_picture">Change Picture</label><br>
                                    <p style="font-size: 1px"> </p>
                                    <a href="{{'/changePassword/'.$userData[0]->id}}"><button type="button" class="btn btn-dark " style="text-align: center;width:200px">Change Password</button></a>
                                </div>
                                <div class="col-lg-9">
                                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentor')
                                    <h5 style="color: white; margin-top:30px; font-size:30px;margin-left:2.5%">Mentor</h5>
                                    @endif
                                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                                    <h5 style="color: white; margin-top:30px; font-size:30px;margin-left:2.5%">Mentee</h5>
                                    @endif
                                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                    <h5 style="color: white; margin-top:30px; font-size:30px;margin-left:2.5%">Admin
                                    </h5>
                                    @endif
                                    <hr style="border-top: 5px solid #ffffff; opacity:1;margin-left:2.5%;width:95%">
                                    <div class="about-text go-to">
                                        <div class="row about-list">
                                            <div class="col-md-6">
                                                <div class="media">
                                                    <label>Fullname</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="inputAddress" value="{{$userData[0]->name}}">
                                                </div>
                                                <div class="media">
                                                    <label>Birth Place</label>
                                                    <input type="text" name="birth_place" class="form-control"
                                                        id="inputAddress" value="{{$userData[0]->birth_place}}">
                                                </div>
                                                <div class="media">
                                                    <label>Birth Date</label>
                                                    <input type="date" name="birth_date" class="form-control"
                                                        id="inputAddress" value="{{$userData[0]->birth_date}}">
                                                </div>
                                                <div class="media">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control" id="inputlg"
                                                        value="{{$userData[0]->address}}">
                                                </div>


                                                @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                                                <div class="media" style="display:inline-block">
                                                    <label>CV</label><br>
                                                    <input type="file" name="cv" class="cv upload" hidden id="formFile"/>
                                                    <label style="color: white;font-size:15px;width: 100px;"
                                                        class="upload bg-dark" name="cv" for="formFile">Upload CV</label>
                                                </div>
                                                
                                                <div class="media" style="display:inline-block">
                                                    <label>Portofolio</label><br>
                                                    <input type="file" name="portofolio" class="portofolio upload" id="upload" hidden />
                                                    <label style="color: white; font-size:15px; width: 150px;"
                                                        class="upload bg-dark" name="portofolio" for="upload">Upload Portofolio</label>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="media">
                                                    <label>Age</label>
                                                    <input type="text" disabled="true" name="age" class="form-control"
                                                        id="inputAge" value="{{$age}}">
                                                </div>
                                                <div class="media">
                                                    <label>Gender</label>
                                                    <input type="text" name="gender" class="form-control"
                                                        id="inputGender" value="{{$userData[0]->gender}}">
                                                </div>
                                                <div class="media">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="inputEmail" value="{{$userData[0]->email}}">
                                                </div>
                                                <div class="media">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        id="inputPhone" value="{{$userData[0]->phone}}">
                                                </div>
                                            </div>
                                        </div>                   
                                    </div>
                                </div>
                            </div>
                            <div class="media" style="margin-left: 55%;">
                                <button type="submit" class="btn btn-dark"
                                    style="width:150px;">Submit</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </form>
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
                </section>
                
            </main>
        </div>
    </div>
</div>

@endsection

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
                            style="margin-left: 20px; color: black; background-color: white">{{$userData[0]->name   }}</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/dashboard/logout">Logout</a>
                            <a class="dropdown-item" href="{{'/profile/'.$userData[0]->id}}">View Profile</a>
                        </div>
                    </div>
                </div>

                <section class="" id="background">
                    <div class="container row" style="margin: auto">
                        <div style="text-align: center; margin-top:50px">
                        <h5 style="margin:auto;font-weight: 500;font-family: 'Inter-Medium', 'Inter', sans-serif;color: #ffffff;font-size: 50px;line-height: 1.2;">Change Password</h5>
                        <hr style="border-top: 5px solid #ffffff; opacity:1;margin:50px auto;width:95%">
                        </div>
                        <div class="col-12" style="text-align:center; width:30%; margin:auto">
                            <div class="card-body">
                                <form method="POST" action="{{url('changePassword/change/'.$userData[0]->user_id)}}">
                                    @csrf      
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right" style="font-size: 25px; line-height:1.2em">Current Password</label>
              
                                        <div class="">
                                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                        </div>
                                    </div>
              
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right" style="font-size: 25px; line-height:1.2em">New Password</label>
              
                                        <div class="">
                                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                        </div>
                                    </div>
              
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right" style="font-size: 25px; line-height:1.2em">Confirm New Password</label>
                
                                        <div class="">
                                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="UpdateBtn" style="text-align: center">
                                            <button type="submit" class="btn btn-dark">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                     @endforeach 
                                </form>
                            </div>
                        </div>


                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

@endsection
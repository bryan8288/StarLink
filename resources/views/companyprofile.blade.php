@extends('layout.layoutUser')
@section('content')
<section class="section about-section gray-bg" id="background">
    <div class="container">
        <form action="{{url('companyprofile/update/'.$userData[0]->id)}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            {{method_field('put')}}
            <div class="row">
                <div class="col-lg-12">
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
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'company')
                    <h5 style="color: white; margin-top:30px; font-size:30px; margin-left:19%">Company
                    </h5>
                    @endif
                    <hr style="border-top: 5px solid #ffffff; opacity:1;margin:auto;width:62.5%">
                    <div class="" style="text-align: center; margin-top:10px">
                        <div class="about-avatar">
                            <img src="{{url('storage/'.$userData[0]->profile_picture)}}" width="200px" height="200px"
                                style="border-radius:25px">
                        </div>
                        <br>
                        <input type="file" name="profile_picture" class="profile_picture" id="profile_picture" hidden />
                        <label style="color: white; font-size:16px; width: 200px; text-align:center"
                            class="upload bg-dark" name="profile_picture" for="profile_picture">Change
                            Picture</label><br>

                        <a href="{{'/changePassword/'.$userData[0]->id}}"><button type="button" class="btn btn-dark "
                                style="text-align: center;width:200px; margin-top:10px">Change Password</button></a>
                    </div>
                    <div class="about-text go-to">
                        <div class="row about-list" style="display: flex; justify-content: center;">
                            <div class="col-md-4">
                                <div class="media">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName"
                                        value="{{$userData[0]->name}}">
                                </div>
                                <div class="media">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" id="inputPhone"
                                        value="{{$userData[0]->phone}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="media">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" id="inputEmail"
                                        value="{{$userData[0]->email}}">
                                </div>
                                <div class="media">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" id="inputAddress"
                                        value="{{$userData[0]->address}}">
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="media" style="text-align:center">
                <button type="submit" class="btn btn-dark" style="width:150px;">Submit</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </form>
    </div>

</section>
@if(count($errors) > 0)
<div class="alert alert-danger">
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

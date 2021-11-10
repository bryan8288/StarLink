@extends('layout.layoutUser')
@section('content')

                <div class="col-md-12" id="background">
                    <div class="container-fluid" style="padding-top: 50px">
                        <form action="{{url('/addMentor/add')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Username</h5>
                                <input style="width:70%; float: right;" type="text" name="username" class="form-control text-truncate" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Password</h5>
                                <input style="width:70%; float: right;" type="password" name="password" class="form-control text-truncate" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Email</h5>
                                <input style="width:70%; float: right;" type="text" name="email" class="form-control text-truncate" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Name</h5>
                                <input style="width:70%; float: right;" type="text" name="name" class="form-control text-truncate" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Address</h5>
                                <input style="width:70%; float: right;" type="text" name="address" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Phone</h5>
                                <input style="width:70%; float: right;" type="text" name="phone" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Birth Date</h5>
                                <input style="width:70%; float: right;" type="date" name="birth_date" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Birth Place</h5>
                                <input style="width:70%; float: right;" type="text" name="birth_place" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Gender</h5>
                                <input style="width:70%; float: right;" type="text" name="gender" class="form-control" style="margin-bottom: 5px">
                            </div>
                            <div class="mentorDetail">
                                <h5 style="width: 30%;float:left">Profile Picture</h5>
                                <input type="file" class="upload" id="upload" hidden name="profile_picture"/>
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

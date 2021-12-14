@extends('layout.layoutUser')
@section('content')
@if(session('status'))
    <div class="alert alert-success alert-dismissible" role="alert" style="margin-top :10px;">
        {{session('status')}}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('editMentee/update/'.$mentee->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <center>
                @if (empty($mentee->profile_picture))
                <i class="fa fa-user-circle-o card-img-top" style=" font-size: 150px;"></i>
                @else
                <img src="{{url('storage/'.$mentee->profile_picture)}}" style="width: 200px; height: 200px">
                @endif
            </center>
            <div class="mentorDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control text-truncate"
                value="{{$mentee->name}}" style="margin-bottom: 5px">
            </div>
            <div class="mentorDetail">
                <h5 style="width: 30%;float:left">Address</h5>
                <input style="width:70%; float: right;" type="text" name="address" class="form-control"
                value="{{$mentee->address}}" style="margin-bottom: 5px">
            </div>
            <div class="mentorDetail">
                <h5 style="width: 30%;float:left">Phone</h5>
                <input style="width:70%; float: right;" type="text" name="phone" class="form-control"
                value="{{$mentee->phone}}" style="margin-bottom: 5px">
            </div>
            <div class="mentorDetail">
                <h5 style="width: 30%;float:left">Birth Date</h5>
                <input style="width:70%; float: right;" type="date" name="birth_date" class="form-control"
                value="{{$mentee->birth_date}}" style="margin-bottom: 5px">
            </div>
            <div class="mentorDetail">
                <h5 style="width: 30%;float:left">Birth Place</h5>
                <input style="width:70%; float: right;" type="text" name="birth_place" class="form-control"
                value="{{$mentee->birth_place}}" style="margin-bottom: 5px">
            </div>
            <div class="mentorDetail">
                <h5 style="width: 30%;float:left">Gender</h5>
                <input style="width:70%; float: right;" type="text" name="gender" class="form-control"
                value="{{$mentee->gender}}" style="margin-bottom: 5px">
            </div>
            <center>
                <button class="btn btn-primary" style="margin-top: 55px; background-color: #27353F; width: 150px">
                    Submit
                </button>
            </center>
    </div>
</form>
</div>
@if(count($errors) > 0)
<div class="alert alert-danger" style="margin-top:10px">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
</div>
</main>
</div>
</div>
</div>
@endsection

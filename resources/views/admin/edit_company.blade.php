@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('editCompany/update/'.$companyDetail->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="companyDetail">
                <h5 style="width: 30%;float:left">User ID</h5>
                <input style="width:70%; float: right;" type="number" name="user_id" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="companyDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control text-truncate"
                    style="margin-bottom: 5px">
            </div>
            <div class="companyDetail">
                <h5 style="width: 30%;float:left">Address</h5>
                <input style="width:70%; float: right;" type="text" name="address" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="companyDetail">
                <h5 style="width: 30%;float:left">Phone</h5>
                <input style="width:70%; float: right;" type="text" name="phone" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="companyDetail">
                <h5 style="width: 30%;float:left">Profile Picture</h5>
                <input style="width:70%; float: right;" type="text" name="profile_picture" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <center>
                <button class="btn btn-primary" style="margin-top: 55px; background-color: #27353F; width: 150px">
                    Submit
                </button>
            </center>
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
    </form>
</div>
</div>
</main>
</div>
</div>
</div>
@endsection

@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('/addRequestedMentoring/add')}}" method="post">
            {{csrf_field()}}
            <div class="mentorDetail">
                <h5 style="width: 30%;float:left">Mentee</h5>
                <select name="mentee" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                    @foreach ($menteeList as $mentee)
                    <option>{{$mentee->name}}</option>
                    @endforeach
                </select>
                {{-- <input style="width:70%; float: right;" type="text" name="mentee_id" class="form-control text-truncate" style="margin-bottom: 5px"> --}}
            </div>
            <div class="mentorDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control text-truncate"
                    style="margin-bottom: 5px">
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

@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'company')
        <form action="{{url('editJob/update/'.$jobDetail->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                    value="{{$jobDetail->name}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Description</h5>
                <input style="width:70%; float: right;" type="text" name="description"
                    class="form-control text-truncate" value="{{$jobDetail->description}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Programming Language</h5>
                <input style="width:70%; float: right;" type="text" name="language" class="form-control"
                    value="{{$jobDetail->programming_language}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Capacity</h5>
                <input style="width:70%; float: right;" type="number" name="capacity" class="form-control"
                    value="{{$jobDetail->capacity}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Salary</h5>
                <input style="width:70%; float: right;" type="text" name="salary" class="form-control"
                    value="{{number_format($jobDetail->salary,2)}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Type</h5>
                <select name="type" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                    <option selected>{{$jobDetail->type}}</option>
                    <option>{{$typeList[0]->type}}</option>
                </select>
            </div>
            <div style="margin-top: 30px">
                <center>
                    <button class="btn btn-primary" style="margin-top: 55px; background-color: #27353F; width: 150px">
                        Submit
                    </button>
                </center>
            </div>

        </form>
        @else
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control" readonly
                    value="{{$jobDetail->name}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Description</h5>
                <textarea readonly style="width:70%; float: right;" name="description" class="form-control" cols="30" rows="5">{{$jobDetail->description}}</textarea>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Programming Language</h5>
                <input style="width:70%; float: right;" type="text" name="language" class="form-control"
                    value="{{$jobDetail->programming_language}}" style="margin-bottom: 5px" readonly>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Capacity</h5>
                <input style="width:70%; float: right;" type="number" name="capacity" class="form-control"
                    value="{{$jobDetail->capacity}}" style="margin-bottom: 5px" readonly>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Salary</h5>
                <input style="width:70%; float: right;" type="text" name="salary" class="form-control"
                    value="{{number_format($jobDetail->salary,2)}}" style="margin-bottom: 5px" readonly>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Type</h5>
                <select name="type" class="form-control input-sm" style="margin-bottom: 5px; width:70%;" disabled>
                    <option selected>{{$jobDetail->type}}</option>
                    <option>{{$typeList[0]->type}}</option>
                </select>
            </div>
        @endif
    </div>
</div>
@if(count($errors) > 0)
<div class="alert alert-danger" style="margin-top: 20px">
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

@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('/addJob/add')}}" method="post">
            {{csrf_field()}}
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Description</h5>
                <input style="width:70%; float: right;" type="text" name="description"
                    class="form-control text-truncate" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Programming Language</h5>
                <input style="width:70%; float: right;" type="text" name="language" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Capacity</h5>
                <input style="width:70%; float: right;" type="number" name="capacity" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Salary</h5>
                <input style="width:70%; float: right;" type="text" name="salary" class="form-control"
                    style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Type</h5>
                <select name="type" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                    @foreach ($typeList as $type)
                    <option>{{$type->type}}</option>
                    @endforeach
                </select>
            </div>
            <div style="margin-top: 30px">

            </div>
            <center>
                <button type="submit" class="btn btn-primary"
                    style="margin-top: 25px; background-color: #27353F; width: 150px;">
                    Submit
                </button>
            </center>
        </form>
    </div>
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
</main>
</div>
</div>
</div>
@endsection

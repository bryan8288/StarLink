@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <div>
            <h4><b>Job Description for {{$jobDetail[0]->name}}</b></h4>
            <p>{{$jobDetail[0]->description}}</p>
            <br>
            <h4><b>Additional Information</b></h4>
            <div style="display: flex; margin-top: 20px">
                <div style="width: 70%">
                    <h5><b>Programming Language</b></h5>
                    <h5>{{$jobDetail[0]->programming_language}}</h5>
                </div>

                <div style="margin-left : 50px">
                    <h5><b>Capacity</b></h5>
                    <h5>{{$jobDetail[0]->capacity}}</h5>
                </div>
            </div>
            <div style="display: flex; margin-top: 20px">
                <div style="width: 70%">
                    <h5><b>Salary</b></h5>
                    <h5>{{$jobDetail[0]->salary}}</h5>
                </div>

                <div style="margin-left : 50px">
                    <h5><b>Type</b></h5>
                    <h5>{{$jobDetail[0]->type}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

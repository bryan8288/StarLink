@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" style="width: 100%">
                <a style="width: 30%; text-align:center" class="nav-item nav-link active"
                    href="{{'/moduleDetailLearning/'.$id}}">Learning </a>
                <div style="border-left: 3px solid;"></div>
                <a style="width: 30%; text-align:center" class="nav-item nav-link"
                    href="{{'/moduleDetailVideo/'.$id}}">Video</a>
                <div style="border-left: 3px solid;"></div>
                <a style="width: 30%; text-align:center" class="nav-item nav-link"
                    href="{{'/moduleDetailAssignment/'.$id}}">Assignment</a>
            </div>
        </div>
    </nav>
    <div>
        <h5 style="color: white; margin-top:30px; font-size:30px;margin-left:2.5%">Learning</h5>
        <hr style="border-top: 5px solid #ffffff; opacity:1;margin-left:2.5%;width:95%">
        <h4 style="margin-top:30px; margin-left:2.5%">{{$module[0]->name}}</h4>
        <p style="margin-left:2.5%">{{$module[0]->description}}</p>
        <h5 style="margin-left:2.5%">You Can Download Learning Material for This Course Here : </h5>
        <div class="col-md-12" style="display: flex">
            <div style="width: 90%">
                <a href="{{asset('storage/'.$module[0]->learning_material)}}">
                    <button type="button" class="btn btn-primary" style="background-color: #27353F; margin-left:30px">
                        <i class="fa fa-cloud-download"></i>
                        Download
                    </button>
                </a>
            </div>
            @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                @if ($isCompleted == true)
                    <button disabled type="submit" class="btn btn-primary" style="background-color: #27353F;">
                        Already Done
                    </button>
                @else
                <form action="{{url('learning/done/'.$id)}}" method="POST">
                {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary" style="background-color: #27353F; margin-left:2.5%">
                        Done
                    </button>
                </form>
                @endif
            @endif
        </div>
    </div>
</div>
@if(session('status'))
<div class="alert alert-success" style="margin-top :20px;">
    {{session('status')}}
</div>
@endif
</main>
</div>
</div>
</div>
@endsection

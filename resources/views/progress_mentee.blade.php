@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px; margin-top:5px">Progress Mentee</h5>
            </div>
        <hr style="color: #FFFFFF;height: 3px">
        
        <div class="col-md-12" style="margin-top :10px; display: flex;">
            @foreach ($courseList as $item)
            <div class="card2 col-md-4" style="height: auto; text-align: unset; padding-bottom: 20px">
                    <h4 style="margin-left: 20px; margin-top: 20px"><b>{{$item->courseName}}</b></h4>
                @if($item->category == 'Curriculum')
                    <h5 style="margin-left: 20px; color: #9C22B4">{{$item->category}}</h5>   
                @else
                    <h5 style="margin-left: 20px; color: #FF4D4D">{{$item->category}}</h5>   
                @endif
                <center>
                    <hr style="border-top: 1px solid;width:95%;color: #3388FF;opacity:1;">
                </center>
                <div class="col-md-12" style="text-align: center; display: flex; flex-wrap: wrap">
                    @foreach ($item->class as $class)
                    <div class="col-md-4" style="margin-top: 5px">
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                    <a href="{{url('/progressmentee/detailByModule/'.$userData[0]->id.'/'.$class->id)}}" style="text-decoration: none">
                        <button class="btn btn-secondary">{{$class->name}}</button>
                    </a>
                    @else
                    <a href="{{'/progressmentee/detail/'.$class->id}}" style="text-decoration: none; color: black">
                        <button class="btn btn-secondary">{{$class->name}}</button>
                    </a>
                    @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-top:20px; margin-left: 30px">
            {{$courseList->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

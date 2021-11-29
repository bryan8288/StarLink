@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{'/class/'}}">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px; margin-top:5px">Class</h5>
                <input type="text" name="keyword" class="form-control" placeholder="Search By Name"
                    style="width: 500px; margin-left: 40px; padding-bottom: 5px; position: absolute; right: 140px;">
                <input type="submit" class="btn btn-primary" value="Search"
                    style="margin-left: 10px; margin-bottom: 5px; position: absolute; right: 50px; background-color: #27353F">
            </div>
        </form>
        <hr style="color: #FFFFFF;height: 3px">
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
        <a href="{{'/addClass/'}}">
            <button class="btn btn-primary" style="background-color: #27353F; margin-left: 30px;">Create</button>
        </a>
        @endif
        <div style="display: flex; margin-top :20px">
            @foreach ($class as $item)
            <div class="col-md-2 card">
                <div style="margin-top: 40px">
                    <h4>{{$item->name}}</h4>
                    <p class="price">Total Mentee: {{$item->total}}</p>
                    <h6 style="margin-top:20px">Time : {{$item->start_time}} - {{$item->end_time}}</h6>
                    @if ($item->day_of_week == 0)
                    <h5>Day : Monday</h5>
                    @elseif ($item->day_of_week == 1)
                    <h5>Day : Tuesday</h5>
                    @elseif ($item->day_of_week == 2)
                    <h5>Day : Wednesday</h5>
                    @elseif ($item->day_of_week == 3)
                    <h5>Day : Thursday</h5>
                    @elseif ($item->day_of_week == 4)
                    <h5>Day : Friday</h5>
                    @elseif ($item->day_of_week == 5)
                    <h5>Day : Saturday</h5>
                    @else
                    @endif
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <div style="display: flex">
                        <a href="{{'/editClass/'.$item->id}}">
                            <button class="btn btn-primary" style="margin-left: 30px; margin-top: 20px">Edit</button>
                        </a>
                        <form action="{{'/editClass/delete/'.$item->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('post')}}
                            <button class="btn btn-danger"
                                onclick="return confirm('Are you sure to Delete this Class?')"
                                style="margin-left: 30px;margin-top: 20px">Delete</button>
                        </form>
                    </div>
                    @else
                    <center>
                        <a href="{{'/editClass/'.$item->id}}">
                            <button class="btn btn-primary" style="width: 180px; margin-top: 30px">See Detail</button>
                        </a>
                    </center>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-left: 30px; margin-top:20px">
            {{$class->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px; margin-top:5px">Schedule</h5>
            </div>
        <hr style="color: #FFFFFF;height: 3px">
        
        <div style="margin-top :10px">
            @foreach ($scheduleList as $schedule)
            <div class="card5">
                <h5 class="card-header"><b>{{$schedule->date}}</b></h5>
                <div class="col-auto mb-3">
                    <div class="card-body">
                    <h5 class="card-title">{{$schedule->name}} - {{$schedule->courseName}}</h5>
                    <p class="card-text">{{$schedule->start_time}} - {{$schedule->end_time}}</p>
                    <a href="{{$schedule->link}}" class="btn btn-primary">Go to Class Link</a>
                    </div>
                </div>
              </div>
            @endforeach
        </div>
        <div style="margin-top:20px">
            {{$scheduleList->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

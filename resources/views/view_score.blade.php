@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background" style="height: auto; padding-bottom:5px">
    <div class="container-fluid" style="padding-top: 50px">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px; margin-top:5px">Score</h5>
            </div>
        <hr style="color: #FFFFFF;height: 3px">
        
        <div style="margin-top :10px">
            @foreach ($courseData as $item)
            <div class="card5" style="height: auto">
                <h5 class="card-header"><b>{{$item->courseName}} - {{$item->className}}</b></h5>
                <div class="col-auto mb-3">
                    <div class="card-body">
                    <h5><b>Assignment</b></h5>
                    @if ($item->assignments->count() == 0)
                        <h6 style="width: 70%">No Score Yet</h6>
                    @else
                    @foreach ($item->assignments as $assignment)
                    <div style="display: flex">
                        <h6 style="width: 70%">{{$assignment->title}}</h6>
                        <h6>{{$assignment->score}}</h6>
                    </div>
                    @endforeach
                    @endif
                    <hr>
                    <h5><b>Exam</b></h5>
                    @if ($item->assignments->count() == 0)
                        <h6 style="width: 70%">No Score Yet</h6>
                    @else
                    @foreach ($item->exams as $exam)
                    <div style="display: flex">
                        <h6 style="width: 70%">{{$exam->name}}</h6>
                        <h6>{{$exam->score}}</h6>
                    </div>
                    @endforeach
                    @endif
                     {{-- <h5 class="card-title">{{$schedule->name}} - {{$schedule->courseName}}</h5>  --}}
                    {{-- <p class="card-text">{{$schedule->start_time}} - {{$schedule->end_time}}</p>
                    <a href="{{$schedule->link}}" class="btn btn-primary">Go to Class Link</a> --}}
                    </div>
                </div>
              </div>
            @endforeach
        </div>
        <div style="margin-top:20px">
            {{$courseData->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

@extends('layout.layoutUser')
@section('content')
@if(session('status'))
    <div class="alert alert-success alert-dismissible" role="alert" style="margin-top :10px;">
        {{session('status')}}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="col-md-12" id="background">
    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
    <div class="col-md-12" style="padding-top: 50px; display: flex;">
        <div class="col-md-6" id="frame2" style="margin-left: 40px">
            <center>
                <h4>Total Member</h4>
            </center>
            <div class="col-md-6" id="subBackground">
                <div class="col-md-3" id="subBackground2" style="margin-right: 20px">
                    <div>
                        <h4>Mentor</h4>
                        <h2 style="transform: translateY(50%); font-size: 40px">{{$totalMentor}}</h2>
                    </div>
                </div>
                <div class="col-md-3" id="subBackground2" style="margin-left: 20px">
                    <div>
                        <h4>Mentee</h4>
                        <h2 style="transform: translateY(50%); font-size: 40px">{{$totalMentee}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5" id="frame2" style="margin-left: 30px">
            <center>
                <h4>Top 5 Requested Job By Company</h4>
            </center>
            <div class="col-md-3" id="subBackground">
                <div>
                    @foreach ($companyJobs as $job)
                    <div class="col-md-12" style="display: flex; justify-content: center;">
                        <h5 style="width:70%;float: left;">{{$job->name}}</h5>
                        <h5 style="width:30%;float: right;">{{$job->capacity}}</h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="container p-4">
        <div class="col-md-12" id="frame2" style="display: flex">
            <div class="col-md-5" style="margin-left: 50px">
                <div class="col-md-12" id="piechart" style="width: auto; height: 358px;"></div>
            </div>
            <div class="vl"></div>
            <div class="col-md-6" style="margin-left: 25px">
                <div class="col-md-12" id="barchart" style="width: auto; height: 358px;"></div>
            </div>
        </div>
    </div>
    @elseif ($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentor')
    <div class="col-md-12" style="padding-top: 50px; display: flex;">
        <div class="col-md-6" id="frame2" style="margin-left: 40px">
            <center>
                <h4>Today Schedule</h4>
            </center>
            <div class="col-md-3" id="subBackground">
                @if($todaySchedule->count() == 0)
                    <h4 style="font-size: 25px; margin-bottom:15px">There is no schedule for today.</h4>
                @else
                    @foreach ($todaySchedule as $item)
                        <h6 style="font-size: 25px; margin-bottom:15px">{{$item->name}} - {{$item->courseName}} ({{$item->start_time}} - {{$item->end_time}})</h6>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-5" id="frame2" style="margin-left: 30px">
            <center>
                <h4>Your Class</h4>
            </center>
            <div class="col-md-2" id="subBackground">
            @foreach ($classList as $item)
            <div class="col-md-12" style="display: flex; justify-content: center;">
                <h5 style="width:70%;float: left;">{{$item->className}} - {{$item->courseName}}</h5>
                <h5 style="width:30%;float: right;">{{$item->totalMentee}}</h5>
            </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="container p-4">
        <div class="col-md-12" id="frame2">
            <center>
                <h4>Pending Assignment to Rated</h4>
            </center>
            <div class="col-md-12" style="background-color: #99eeff; border-radius: 10px;">
                @foreach ($pendingAssignment as $course)
                <div style="margin-top: 10px">
                    <h4 style="margin-left:2.5%;"><b>{{$course->name}}</b></h4>
                    @foreach ($course->assignment as $assignment)
                        <div style="margin-left:2.5%; display: flex">
                            <h5 style="width: 90%; float: right;">{{$assignment->title}}</h5>
                            <h5 style="width: 10%; float: left;">{{$assignment->totalPending}}</h5>
                        </div>
                    @endforeach
                    <hr style="border-top: 1px solid;margin-left:1.5%;width:95%">
                </div>                    
                @endforeach
            </div>
        </div>
    </div>
    @elseif ($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
    <div class="col-md-12" style="padding-top: 50px; display: flex;">
        <div class="col-md-7" id="frame2" style="margin-left: 40px">
            <center>
                <h4>Today Schedule</h4>
            </center>
            <div class="col-md-3" id="subBackground">
                @if($todaySchedule->count() == 0)
                    <h4 style="font-size: 25px; margin-bottom:15px">There is no schedule for today.</h4>
                @else
                    @foreach ($todayScheduleMentee as $item)
                        <h6 style="font-size: 25px; margin-bottom:15px">{{$item->name}} - {{$item->courseName}} ({{$item->start_time}} - {{$item->end_time}})</h6>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-4" id="frame2" style="margin-left: 30px">
            <center>
                <h4>Your Score</h4>
            </center>
            <div class="col-md-1" id="subBackground">
            @foreach ($score as $item)
            <div class="col-md-12" style="display: flex; justify-content: center; margin-bottom:2px">
                <h4 style="width:30%;float: left;">{{$item->name}}</h4>
                <h4 style="width:20%;float: right;">{{$item->score}}</h4>
            </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="container p-4">
        <div class="col-md-12" id="frame2">
            <center>
                <h4>Assignment</h4>
            </center>
            <div class="col-md-12" style="background-color: #99eeff; border-radius: 10px;">
                @foreach ($assignmentMentee as $course)
                <div style="margin-top: 10px">
                    <h4 style="margin-left:2.5%;"><b>{{$course->name}}</b></h4>
                    @foreach ($course->assignment as $assignment)
                        <div style="margin-left:2.5%; display: flex">
                            <h5 style="width: 80%; float: right;">{{$assignment->title}}</h5>
                            <h5 style="width: 20%; float: left;">{{$assignment->dateDiff}} Day(s) Left</h5>
                        </div>
                    @endforeach
                    <hr style="border-top: 1px solid;margin-left:1.5%;width:95%">
                </div>                    
                @endforeach
            </div>
        </div>
    </div>
    @endif
    
</div>
</div>
</main>
</div>
</div>
@endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.load('current', {
        'packages': ['bar']
    });

    google.charts.setOnLoadCallback(drawPieChart);
    google.charts.setOnLoadCallback(drawBarChart);

    function drawPieChart() {

        var data = google.visualization.arrayToDataTable([
            ['Product Name', 'Total'],

            @php
            foreach($totalRequestedMentoring as $mentoring) {
                echo "['".$mentoring -> name.
                "', ".$mentoring -> total.
                "],";
            }
            @endphp
        ]);

        var options = {
            title: 'Requested Mentoring By Mentee',
            is3D: false,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

    function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Total'],

            @php
            foreach($totalWorkingMentee as $workingMentee) {
                echo "['".$workingMentee -> year.
                "', ".$workingMentee -> total.
                "],";
            }
            @endphp
        ]);

        var options = {
            chart: {
                title: 'Comparison Working Mentee from Last Year'
            },
            bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

</script>

@extends('layout.layoutUser')
@section('content')
                <div class="col-md-12" id="background">
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
                </div>
                @if(session('status'))
                <div class="alert alert-success" style="margin-top :20px;">
                    {{session('status')}}
                </div>
                @endif
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
    google.charts.load('current', {'packages':['bar']});

    google.charts.setOnLoadCallback(drawPieChart);
    google.charts.setOnLoadCallback(drawBarChart);

    function drawPieChart() {

        var data = google.visualization.arrayToDataTable([
            ['Product Name', 'Total'],

            @php
                foreach($totalRequestedMentoring as $mentoring) {
                    echo "['".$mentoring->name."', ".$mentoring->total."],";
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
                  echo "['".$workingMentee->year."', ".$workingMentee->total."],";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StarLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <main class="col ps-md-2 pt-2">
                    <div class="col-md-12" style="display: flex;">
                        <div class="col-md-10" style="display: flex;">
                            <div class="col-md-1">

                                <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse"
                                    class="border rounded-3 p-1 text-decoration-none"
                                    style="display: flex; height: 40px; margin-top:10px; width: 70px"><i
                                        class="fa fa-bars" aria-hidden="true" style="margin-top: 5px"></i>
                                    <div style="margin-left: 5px">Menu</div>
                                </a>
                            </div>
                            <div class="col-md-11">
                                <center>
                                    <h4 style="text-align: center; margin-top: 15px; margin-left: 100px"><a
                                            class="title">Starlink</a>
                                    </h4>
                                </center>
                            </div>
                        </div>
                        <div class="col-md-2" style="display: flex">
                            <div style="width: 70%;float:left;">
                                @if (empty($userData[0]->profile_picture))
                                <i class="fa fa-user-circle-o card-img-top"
                                    style=" font-size: 50px; margin-left:30px"></i>
                                @else
                                <center>
                                    <img src="{{url('storage/'.$userData[0]->profile_picture)}}"
                                        style="height:50px; border-radius: 50%; border: 6px solid #218EED; width: 50px; margin-left: 30px">
                                </center>
                                @endif

                            </div>
                            <div class="dropdown" style="margin-top: 7px">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown" disabled
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="color: black; background-color: white">{{$userData[0]->username}}</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/dashboard/logout">Logout</a>
                                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                                    <a class="dropdown-item" href="{{'/profile/'.$userData[0]->id}}">View Profile</a>
                                    @endif
                                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentor')
                                    <a class="dropdown-item" href="{{'/profile/'.$userData[0]->id}}">View Profile</a>
                                    @endif
                                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{'/profile/'.$userData[0]->id}}">View Profile</a>
                                    @endif
                                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'company')
                                    <a class="dropdown-item" href="{{'/companyprofile/'.$userData[0]->id}}">View
                                        Profile</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="background"
                        style="min-height:852px; height: auto; padding-bottom : 20px">
                        <div class="container-fluid" style="padding-top: 50px">
                            <h5 style="color: white; margin-left: 30px; margin-top:5px">Exam</h5>
                            <hr style="color: #FFFFFF;height: 3px">
                        @foreach ($question as $key => $item)
                        <form action="{{url('/submitAnswer/')}}" method="post">
                        {{csrf_field()}}
                        <br>
                            <h4><b>Question {{$key+1}}</b></h4>
                            <input name="question[]" value="{{$item->id}}" hidden>
                            <p style="font-size: 20px">{{$item->question}}</p>
                            <textarea class="form-control" name="answer[]" cols="30" rows="10" id="answerBox" autocomplete="answer" autofocus>{{request()->input('answer[0]')}}</textarea>
                        @endforeach
                        </div>

                        {{-- <div class="col-md-12" style="display: flex">
                            <button type="button" class="btn btn-secondary"
                                                style="background-color: #27353F; margin-top: 30px; float: right; width:100px; margin-left: 23px">Previous</button>
    
                            <button type="button" class="btn btn-secondary"
                                                style="background-color: #27353F; margin-top: 30px; margin-right: 23px; width:100px; margin-left:auto">Next</button>
                        </div> --}}
                        <br>
                        {{-- <div style="margin-left: 23px">
                            {{$question->links()}}                          
                        </div> --}}
                        <center>
                            <button type="submit" class="btn btn-secondary"
                                    style="background-color: #27353F; margin-top: 10px">Submit</button>
                        </center>
                        </form>

                        <br>
                        <span style="margin-left:30px; font-size:20px; font-weight: 700; margin-top : 40px" id="timer"><span>
                        
                        <script>
                                    window.onload = function () {
                                        const buttonSubmit = document.getElementById('submitButton');

                                        var hour = Math.floor({{$diffMinutes}} / 60);
                                        var minute = {{$diffMinutes}} % 60;
                                        var sec = 1;
                                        setInterval(function () {
                                            document.getElementById("timer").innerHTML =
                                                "Time Left " + hour + " h " + minute + " m " + sec + " s";
                                            sec--;
                                            if (hour != -1) {
                                                if (sec == 00) {
                                                    minute--;
                                                    sec = 60;
                                                    if (minute == 0) {
                                                        hour--;
                                                        minute = 59;
                                                    }
                                                }
                                            } else {
                                                window.location.href = "{{ route('dashboard')}}";
                                            }
                                        }, 1000);
                                    };
                                </script>

                    </div>
            </div>
        </div>
</body>

<style>
    .title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        text-decoration: none;
        color: black;
    }

    #background {
        margin-top: 10px;
        width: 100%;
        height: 852px;
        background-color: #218eed;
        overflow: visible;
        border-radius: 1px;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }

    .courseDetail {
        display: flex;
        margin-top: 20px;
    }

</style>

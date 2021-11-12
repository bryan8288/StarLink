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
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                @include('layout.sidebar')
                <main class="col ps-md-2 pt-2">
                    <div class="col-md-12" style="display: flex; margin-top:10px">
                        <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse"
                            class="border rounded-3 p-1 text-decoration-none" style="display: table;"><i class="fa fa-bars"
                                aria-hidden="true"></i>
                            Menu</a>
                        <div class="col-md-10">
                            <center>
                                <h4 style="margin-top: 2px;text-align: center"><a class="title" href="{{'/'}}">Starlink</a>
                                </h4>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-2" style="display: flex; position: absolute;right: 0;top: 0; padding-left: 64px">
                        <img src="{{url('storage/'.$userData[0]->profile_picture)}}"
                            style="height:60px; border-radius: 40%; border: 6px solid #218EED;margin-top:10px; width: 50px;">
                        <div class="dropdown" style="margin-top: 20px">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                style="margin-left: 20px; color: black; background-color: white">{{$userData[0]->username}}</button>
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
                                <a class="dropdown-item" href="{{'/companyprofile/'.$userData[0]->id}}">View Profile</a>
                                @endif
                            </div>
                        </div>
                    </div>
    @section('content')
    @show
</body>

<style>
    .modules {
        box-sizing: border-box;
        height: auto;
        /* 661px */
        width: 1281px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 5px 73px 5px 73px;
        background-color: #99eeff;
        overflow: visible;
        border-radius: 10px;
    }

    .courseDetail {
        display: flex;
        margin-top: 20px;
    }

    .cardText {
        overflow: hidden;
        -webkit-line-clamp: 4;
        height: 100px;
        display: -webkit-box;
        max-width: 200;
        text-overflow: ellipsis;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        text-align: center;
        font-family: arial;
        border-radius: 10px;
        height: 300px;
        margin-left: 30px;
    }

    .card2 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 340px;
        text-align: center;
        font-family: arial;
        border-radius: 10px;
        height: 340px;
        margin-left: 30px;
        background-color: #ffffff;
    }

    .card3 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        text-align: center;
        font-family: arial;
        border-radius: 10px;
        height: 410px;
        margin-left: 30px;
        background-color: #ffffff;
        width: 220px;
    }
    
    .card4 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        text-align: center;
        font-family: arial;
        border-radius: 10px;
        height: 340px;
        margin-left: 30px;
        background-color: #ffffff;
        width: 220px;
    }

    #sidebar-nav {
        width: 160px;
    }

    .price {
        color: grey;
        font-size: 22px;
    }
    a:hover {
        text-decoration: none;
        color: black;
    }

    .text {
        width: 800px;
    }

    .vl {
        border-left: 3px solid;
        height: 358px;
    }

    .title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        text-decoration: none;
        color: black;
    }

    #background {
        margin-top: 20px;
        width: 100%;
        height: 852px;
        background-color: #218eed;
        overflow: visible;
        border-radius: 1px;
    }

    #background2 {
        margin-top: 20px;
        width: 100%;
        height: auto;
        background-color: #218eed;
        overflow: visible;
        border-radius: 1px;
        padding-bottom: 20px;
    }

    #frame2 {
        background-color: #ffffff;
        overflow: visible;
        border-radius: 10px;
    }

    #subBackground {
        height: 224px;
        background-color: #99eeff;
        overflow: visible;
        display: table-cell;
        border-radius: 10px;
        vertical-align: middle;
        text-align: center;
    }

    #subBackground2 {
        width: 250px;
        height: 168px;
        background-color: #44ccff;
        overflow: visible;
        display: inline-block;
        border-radius: 10px;
        text-align: center;
    }

    .media{
        padding: 20px;
        margin-bottom: 0
    }
    .about-text p {
    font-size: 18px;
    max-width: 450px;
    }
    .about-text p mark {
    font-weight: 600;
    color: #20247b;
    }

    .about-list {
    padding-top: 10px;
    }
    .about-list .media {
    padding: 25px 25px;
    }
    .about-list label {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-weight: normal;
        font-family:Verdana, Geneva, Tahoma, sans-serif;

    font-weight:normal;
    width: 165px;
    margin: 0;
    font-size: 30px;
    position: relative;
    }

    .upload {
        /* display:block; */
        padding: 0.5rem;
        border-radius: 0.3rem;
        cursor: pointer;
    }

    .companyDetail{
        display: flex;
        margin-top: 20px;
    }

    .mentorDetail{
        display: flex;
        margin-top: 20px;
    }

    .card5{
        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
        /* text-align: center; */
        font-family: arial;
        border-radius: 10px;
        height: 200px;
        background-color: #ffffff;
        margin-top: 20px;
    }
    ::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}

</style>

</html>

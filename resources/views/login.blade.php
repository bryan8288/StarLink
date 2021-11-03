@extends('layout.layout')
@section('content')
<div class="col-md-12" style=" text-align: center;">

    <div class="container-fluid">
        <div class="row flex-nowrap">@include('layout.sidebar')
            <main class="col ps-md-2 pt-2">
                <a href="{{'/login/'}}">
                    <button class="btn btn-light" style="position:absolute;top:15;right:0;margin-right:10px;">
                        LOGIN
                    </button>
                </a>
                <a href="{{'/register/'}}">
                    <button class="btn btn-light" style="position:absolute;top:15;right:100px;">
                        REGISTER
                    </button>
                </a>
                <div class="col-md-12" style="display: flex">
                    <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse"
                        class="border rounded-3 p-1 text-decoration-none" style="display: table;"><i></i>
                        Menu</a>
                    <div class="col-md-8" style="margin-left: 25px">
                        <center>
                            <h4 style="margin-top: 5px;text-align: center"><a class="title" href="{{'/'}}">Starlink</a>
                            </h4>
                        </center>
                    </div>
                </div>
                <form action="" method="post"
                    style="text-align: center; background-color: white; padding-top: 20px; padding-bottom: 50px">
                    <div class="col-md-12"
                        style="background-color: #218EED;background-size: cover; background-position: center; background-repeat: no-repeat; margin-top: 30px; padding-bottom : 50px; padding-right: 150px; padding-top:20px">
                        <div class="col-md-12" style="margin-left:30px; width: 1000px; margin: 0 auto;">

                            {{csrf_field()}}
                            <h4 style="text-align: center; margin-top: 10px;color: #FFFFFF">Login</h4>
                            <hr style="color: #FFFFFF;height: 3px; width: 1100px">
                            <div class="container" style="margin-top: 30px;">
                                <div style="display: flex">
                                    <label for="uname" style="margin-top: 5px"><b>Username</b></label>
                                    <input type="text" class="form-control" placeholder="Enter Username"
                                        name="username" required style="width: 800px; margin-left: 57px">
                                </div>
                                <div style="display: flex">
                                    <label for="psw" style="margin-top: 15px"><b>Password</b></label>
                                    <input type="password" class="form-control" placeholder="Enter Password"
                                        name="password" required
                                        style="width: 800px; margin-top: 10px; margin-left: 62px">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary"
                                        style="width: 150px; height: 40px; margin-top: 50px;background-color: #27353F;">Login</button>
                                </div>
                                <div>
                                    <label>
                                        <input type="checkbox" name="remember_me" value="1"> Remember Me
                                    </label>
                                </div>
                                <div>
                                    <u>Forgot Password ?</u>
                                </div>
                                @if($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <strong>{{$message}}</strong>
                                </div>
                                @endif

                                @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                </form>
        </div>
        </main>
    </div>
</div>

</div>
</div>

<style>
    .title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        margin-left: 150px;
        text-decoration: none;
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }

    .text {
        width: 800px;
    }

    #sidebar-nav {
        width: 160px;
    }

</style>

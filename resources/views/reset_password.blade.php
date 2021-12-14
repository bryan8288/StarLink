@extends('layout.layout')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <h4 style="margin-top: 5px;text-align: center"><a class="title" href="{{'/'}}">Starlink</a></h4>
        <div style="background-color: #218EED; text-align: center; margin-top: 30px;">
            <center>
                <h4 style="color: #FFFFFF; padding-top: 30px">Reset Password</h4>
                <hr style="color: #FFFFFF;height: 3px; width: 1100px">
            </center>
            <div class="card-body">
                <form method="POST" action="/reset-password">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group row" id="group">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus
                                placeholder="Enter E-Mail Address">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row" id="group">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password" placeholder="Enter New Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                        </div>

                    </div>

                    <div class="form-group row" id="group">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                            Password</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="form-group row mb-0" id="group">
                        <div class="col-md-12 offset-md-12">
                            <button type="submit" class="btn btn-primary" style="background-color: #27353F">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible" role="alert" style="margin-top :10px;">
                    {{session('status')}}
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    @endsection

    <style>
        .title {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
            text-decoration: none;
            color: black;
        }

        #group {
            margin-top: 10px;
        }

    </style>

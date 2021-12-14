@extends('layout.layout')
@section('content')
<div class="container-fluid">

    <div class="col-md-12">
        <h4 style="margin-top: 5px;text-align: center"><a class="title" href="{{'/'}}">Starlink</a></h4>
        <div style="background-color: #218EED; text-align: center; margin-top: 30px;">
            <center>
                <h4 style="color: #FFFFFF; padding-top: 30px">Forgot Password</h4>
                <hr style="color: #FFFFFF;height: 3px; width: 1100px">
            </center>
            <h5>Enter your email address and we will send you a link to renew your password</h5>
            <div class="">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert" style="margin-top :10px;">
                        {{session('status')}}
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="/forgot-password" style="margin:20px;">
                    @csrf
                    <div class="form-group row" style="display: contents">
                        <label for="email" class="col-md-4 col-form-label text-md-right" style="font-size: 18">E-Mail
                            Address</label>
                        <div class="col-md-12" style="justify-content: center; display: flex">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                placeholder="Enter E-Mail Address" style="width: 300px">


                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-12" style="margin-top: 30px; padding-bottom: 30px;">
                            <button type="submit" class="btn btn-primary" style="background-color: #27353F">
                                Send Password Reset Link
                            </button>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    {{-- <h4>{{$message}}</h4> --}}
                </form>
            </div>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success" style="text-align: center">
            <strong>{{session('message')}}</strong>
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

</style>

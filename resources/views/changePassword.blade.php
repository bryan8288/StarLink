@extends('layout.layoutUser')
@section('content')
                <section class="" id="background">
                    <div class="container row" style="margin: auto">
                        <div style="text-align: center; margin-top:50px">
                        <h5 style="margin:auto;font-weight: 500;font-family: 'Inter-Medium', 'Inter', sans-serif;color: #ffffff;font-size: 50px;line-height: 1.2;">Change Password</h5>
                        <hr style="border-top: 5px solid #ffffff; opacity:1;margin:50px auto;width:95%">
                        </div>
                        <div class="col-12" style="text-align:center; width:30%; margin:auto">
                            <div class="card-body">
                                <form method="POST" action="{{url('changePassword/change/'.$userData[0]->user_id)}}">
                                    @csrf      
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right" style="font-size: 25px; line-height:1.2em">Current Password</label>
              
                                        <div class="">
                                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                        </div>
                                    </div>
              
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right" style="font-size: 25px; line-height:1.2em">New Password</label>
              
                                        <div class="">
                                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                        </div>
                                    </div>
              
                                    <div class="form-group">
                                        <label for="password" class="col-form-label text-md-right" style="font-size: 25px; line-height:1.2em">Confirm New Password</label>
                
                                        <div class="">
                                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="UpdateBtn" style="text-align: center">
                                            <button type="submit" class="btn btn-dark">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                     @endforeach 
                                </form>
                            </div>
                        </div>


                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

@endsection
@extends('layout.layoutUser')
@section('content')
    <div id="background" style="height:100%">
        <div class="row" style="">
            <div class="col-sm" style="background">
                <div class="about-avatar" style="text-align:center">
                    @if ($applicantDetail->profile_picture == null)
                        <i class="fa fa-user-circle-o" style=" font-size: 220px;padding:20px;margin-top:30px"></i>
                    @else
                    <img src="{{url('storage/'.$applicantDetail->profile_picture)}}" width="220px"
                        height="220px" style="border-radius:25px; padding:20px;margin-top:30px">
                        @endif    
                </div>
                
                <div style="text-align: center">
                    @if($applicantDetail->portofolio == null)
                    <li style="list-style-type: none;"><button type="button" class="btn btn-light" style="color: #E08C1F; font-weight:bold;margin-bottom:20px;width:230px" disabled>DOWNLOAD PORTOFOLIO</button></li>
                    @else
                    <li style="list-style-type: none;"><a href="{{asset('storage/'.$applicantDetail->portofolio)}}"><button type="button" class="btn btn-light" style="color: #E08C1F; font-weight:bold;margin-bottom:20px;width:230px">DOWNLOAD PORTOFOLIO</button></a></li>
                    @endif

                    @if($applicantDetail->cv == null)
                    <li style="list-style-type: none;"><button type="button" class="btn btn-light" style="color: #E08C1F; font-weight:bold;width:230px" disabled>DOWNLOAD CV</button></li>
                    @else
                    <li style="list-style-type: none;"><a href="{{asset('storage/'.$applicantDetail->cv)}}"><button type="button" class="btn btn-light" style="color: #E08C1F; font-weight:bold;width:230px">DOWNLOAD CV</button></a></li>
                    @endif

                    <div class="btn btn-primary" style="font-weight: bold; color:white;background:#E08C1F; border:none; margin-top:50px; cursor:context-menu">CONTACT</div><br>
                    <div class="btn" style="background:white; width:280px; text-align:left; margin:20px; font-weight:bold">
                        <li style="list-style-type: none"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                        </svg>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$userDetail->email}}</li>
                        <li style="list-style-type: none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$applicantDetail->phone}}</li>
                    
                    </div>
                </div>
            </div>
            <div class="col-sm" style="">
                <div class="form" style="padding: 20px 50px 20px 0px; margin-top:30px">
                    <input type="text" disabled="true" name="name" class="form-control" value="{{$applicantDetail->name}}" disabled="true">
                </div>
                <div class="form" style="padding: 0px 50px 20px 0px">
                    <input type="text" name="gender" class="form-control" value="{{$applicantDetail->gender}}" disabled="true">
                </div>
                <div class="form" style="padding: 0px 50px 20px 0px">
                    <input type="text" name="dob" class="form-control" value="{{$applicantDetail->birth_date}}, {{$applicantDetail->birth_place}}" disabled="true">
                </div>
                <div class="form" style="padding: 0px 50px 20px 0px">
                    <input type="text" name="address" class="form-control" value="{{$applicantDetail->address}}" disabled="true">
                </div>
                
                <div style=" margin-top:50px;">
                <div class="btn btn-primary" style="font-weight: bold; color:white;background:#E08C1F; border:none; cursor:context-menu; margin-bottom:20px">SKILL</div><br>
                @foreach ($dataDetail as $skill)
                <div style="background:#0099FF;padding:10px;width: fit-content; color:white;font-weight: bold;cursor:context-menu; margin-bottom:5px; display:inline-block">{{$skill->name}}</div>
                
                @endforeach
                
                </div>

            </div>
            <div class="col-sm" style=" margin-top:30px;padding-right:50px;">
                <div class="btn btn-primary" style="font-weight: bold; color:white;background:#E08C1F; border:none; cursor:context-menu; margin-bottom:3px">STARLINK ACHIEVEMENT</div><br>
                
                <div style="overflow: scroll;overflow-x:hidden; height:550px; background:#3388FF; color:white; padding:10px;position: relative;z-index:1;">
                    @foreach ($dataDetail as $skill)
                    <h5 style="font-weight:bold">{{$skill->name}}(Passed)</h5>
                Skor: {{$skill->score}}/100 <br>
                Issued on {{$skill->graduated_date}} <br><br>
                <h5 style="font-weight: bold">Mentor's Feedback</h5>
                {{$skill->mentor_feedback}}
                <hr style="border-top: 3px solid #ffffff; opacity:1;width:100%">
                @endforeach
                </div>
            </div>
            
        </div>
    </div>
@endsection

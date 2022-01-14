@extends('layout.layoutUser')
@section('content')
    <div id="background" style="height:100%">
        <div style="">
            <div class="container">
                <div class="row">
                  <div class="col-sm" style="margin-top:50px;color:#FAE99E;">
                    <div style="margin-left:120px">
                    <h1 style="text-align:left;font-weight: 700;font-family: 'Inter-Bold', 'Inter', sans-serif;color: #ffffff;font-size: 40px;line-height: 1.2;">Discussion Room</h1>
                    <br>
                    
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentor')
                    <h5 style="text-align:left;">Welcome {{$userData[0]->name}}</h4>
                        <h5 style="text-align:left;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg> Let's educate the budding nation!</h4>
                        <h5 style="text-align:left;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg> Please be there 15 minutes in advance <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
                          </svg></h4>
                    @endif
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                    <h5 style="text-align:left;">Ask your questions with our mentor</h4>
                      <h5 style="text-align:left;">in this discussion room :</h4>
                    @endif

                    </div>
                    </div>
        
                  <div class="col-sm-1" style="margin-top:50px; ">
             
                  </div>
                  <div class="col-sm" style="margin-top:50px;text-align: center;">
                    <div style="margin: 65px 0px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="orange" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg><br>

                      @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                      <button type="button" class="btn btn-light" style="font-weight: bold;color:#218EED" data-toggle="modal" data-target="#exampleModal">RULES</button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">                                
                                <h5 class="modal-title" id="exampleModalLabel">RULES</h5>
                              </div>
                              <div class="modal-body" style="text-align: left; list-style-type: none">
                                <li>1. Please keep quite while the mentor is talking</li>
                                <li>2. Cultivate queuing when someone is asking</li>
                                <li>3. Raise hand if you want to ask something</li>
                                <li>4. Please ask politely</li>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentor')
                      <button type="button" class="btn btn-light" style="font-weight: bold;color:#218EED" data-toggle="modal" data-target="#exampleModal">INSTRUCTION</button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">                                
                                <h5 class="modal-title" id="exampleModalLabel">INSTRUCTION</h5>
                              </div>
                              <div class="modal-body" style="list-style-type: none; text-align:left">
                                <li>1. Mentees will be automatically muted when entering the room</li>
                                <li>2. Mentees will raise their hands when they want to ask</li>
                                <li>3. Unmute the mentee who raises hand and answers in sequence</li>
                                <li>4. Remind the mentee to fill out the feedback form when finished</li>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                    
                </div>
                  </div>
                </div>
              </div>
        </div>
        <div style="text-align: center; line-height: 1.2; color:white">
        <h4>Error Handling</h4>
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-square-o" style="color: white" aria-hidden="true"></i></button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">                                
                  <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates laudantium exercitationem iusto voluptatibus dicta, fuga cumque repellat fugit officiis temporibus porro facilis natus iste sequi similique sint minima perspiciatis dolores.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>              
        @endif
        
        <div class="container">
          <?php $i=1;?> 
          @foreach ($clockMentor as $dataClockMentor)
         <a href="{{$dataClockMentor->url}}"><button type="button" class="btn btn-warning" style="margin:10px;width: auto; background-color:#E08C1F;border-color:#E08C1F; color:white;  border-radius: 30px;font-weight: bold">#{{$i}} Diskusi | {{$dataClockMentor->start_time}} - {{$dataClockMentor->end_time}} <h5>Mentor: {{$dataClockMentor->name}}</h1></button></a>
          <?php $i++;?>
        @endforeach
          </div>
          <br>
          <div style="text-align: center; line-height: 1.2; color:white">
            <h4>General Question</h4>
            @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-square-o" style="color: white" aria-hidden="true"></i></button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">                                
                      <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates laudantium exercitationem iusto voluptatibus dicta, fuga cumque repellat fugit officiis temporibus porro facilis natus iste sequi similique sint minima perspiciatis dolores.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>              
            @endif
          
            <div class="container">
              @foreach ($clockAdmin as $dataClock)
              <div class="row">
                <div class="col-sm" style=" text-align:center" >
                 <a href="{{$dataClock->url}}"><button type="button" class="btn btn-warning" style="width: auto; background-color:#E08C1F;border-color:#E08C1F; color:white;  border-radius: 30px;font-weight: bold">#1 Diskusi | {{$dataClock->start_time}} - {{$dataClock->end_time}} <h5>Admin: {{$dataClock->name}}</h5></button></a> 
                </div>
              </div>
            
            @endforeach
          </div>
    </div>
@endsection

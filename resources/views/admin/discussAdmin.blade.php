@extends('layout.layoutUser')
@section('content')
    <div id="background" style="height:100%">
        <div style="">
            <div class="container">
                <div class="row">
                  <div class="col-sm" style="margin-top:50px;color:#FAE99E;">
                    <div style="margin-left:120px">
                    <h1 style="text-align:left;font-weight: 700;font-family: 'Inter-Bold', 'Inter', sans-serif;color: #ffffff;font-size: 40px;line-height: 1.2;">Ruang Diskusi</h1>
                    <br>
                    
                    <h5 style="text-align:left;">MENTOR</h4>
                    <h5 style="text-align:left;">Selamat Datang MENTOR</h4>
                        <h5 style="text-align:left;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg> Mari mendidik tunas bangsa!</h4>
                        <h5 style="text-align:left;"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg> Diharapkan hadir 15 menit sebelumnya ya <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
                          </svg></h4>
                          <hr style="border-top: 5px solid #ffffff; opacity:1;;width:100%">
                        <h5 style="text-align:left;">MENTEE</h4>
                        <h5 style="text-align:left;">Tanyakan pertanyaan Anda dengan mentor kami</h4>
                        <h5 style="text-align:left;">Ruang terbuka di ruang berikut:</h4>


                    </div>
                    </div>
        
                  <div class="col-sm-1" style="margin-top:50px; ">
             
                  </div>
                  <div class="col-sm" style="margin-top:50px;text-align: center;">
                    <div style="margin: 65px 0px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="orange" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                      </svg><br>


                      <button type="button" class="btn btn-light" style="font-weight: bold;color:#218EED" data-toggle="modal" data-target="#exampleModal">PERATURAN</button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">                                
                                <h5 class="modal-title" id="exampleModalLabel">PERATURAN</h5>
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


                      <button type="button" class="btn btn-light" style="font-weight: bold;color:#218EED" data-toggle="modal" data-target="#exampleModal">PETUNJUK</button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">                                
                                <h5 class="modal-title" id="exampleModalLabel">PETUNJUK</h5>
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

                    
                </div>
                  </div>
                </div>
              </div>
        </div>
        <div style="text-align: center; line-height: 1.2; color:white">
        <h4>Error Handling</h4>
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
        <button type="button" class="btn" data-toggle="modal" data-target="#errorhandling"><i class="fa fa-pencil-square-o" style="color: white" aria-hidden="true"></i></button>
        </div>
        <div class="modal fade" id="errorhandling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">                                
                  <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                    
                <div class="modal-body">
                  <?php $i=1;?>
                  @foreach ($MentorRoomData as $dataMentor)
                  <form action="{{url('admin/discussAdmin/update/')}}" method="post">
                    {{ csrf_field() }}
                    {{method_field('put')}}
                  <div class="media">
                      <label>Input Link Room {{$i}}</label>
                      <input type="text" name="url[]" class="form-control" id="inputlg"
                        value="{{$dataMentor->url}}">
                        <input type="text" name="id[]" class="form-control" id="inputlg"
                        value="{{$dataMentor->id}}" hidden>
                  </div>
                  <div class="media">
                    <label>Mentor</label>
                    <select name="mentor[]" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                      <option selected>{{$dataMentor->name}}</option>
                      @foreach ($mentorList as $mentor)
                          <option>{{$mentor->name}}</option>
                      @endforeach
                      <?php $i++;?>
                  </select>
                </div>
                @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
              </form>
              </div>
            </div>
          </div>              
        @endif
        
        <div class="container" style="display:flex; justify-content:center" >
          <?php $i=1;?> 
          @foreach ($clockMentor as $dataClockMentor)
         <a href="{{$dataClockMentor->url}}"><button type="button" class="btn btn-warning" style="margin:10px;width: auto; background-color:#E08C1F;border-color:#E08C1F; color:white;  border-radius: 30px;font-weight: bold">#{{$i}} Diskusi | {{$dataClockMentor->start_time}} - {{$dataClockMentor->end_time}} <h5>Mentor: {{$dataClockMentor->name}}</button></a>
          <?php $i++;?>
        @endforeach
          </div>
          <br>
          <div style="text-align: center; line-height: 1.2; color:white">
            <h4>General Question</h4>
            @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
            <button type="button" class="btn" data-toggle="modal" data-target="#general"><i class="fa fa-pencil-square-o" style="color: white" aria-hidden="true"></i></button>
            </div>
            <div class="modal fade" id="general" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">                                
                      <h5 class="modal-title" id="exampleModalLabel">EDIT</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{url('admin/discussAdmin/update/'.$userData[0]->id)}}" enctype="multipart/form-data"
                        method="post">
                        {{ csrf_field() }}
                        {{method_field('put')}}
                    <div class="modal-body">
                      <?php $i=1;?>
                      @foreach ($AdminRoomData as $dataAdmin)
                        <div class="media">
                            <label>Input Link Room {{$i}}</label>
                            <input type="text" name="url[]" class="form-control" id="inputlg"
                              value="{{$dataAdmin->url}}">
                        </div>
                      @endforeach
                      <?php $i++;?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
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
    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
@endsection

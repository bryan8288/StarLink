@extends('layout.layoutUser')
@section('content')
<style>
    .fa {
  font-size: 50px;
  cursor: pointer;
  user-select: none;
}
</style>

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{'/course/'}}">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px; margin-top:5px">Course</h5>
                <input type="text" name="keyword" class="form-control" placeholder="Search for Product"
                    style="width: 500px; margin-left: 40px; padding-bottom: 5px; position: absolute; right: 140px;">
                <input type="submit" class="btn btn-primary" value="Search"
                    style="margin-left: 10px; margin-bottom: 5px; position: absolute; right: 50px; background-color: #27353F">
            </div>
        </form>
        <hr style="color: #FFFFFF;height: 3px">
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
        <a href="{{'/addCourse/'}}">
            <button class="btn btn-primary" style="background-color: #27353F; margin-left: 30px;">Create</button>
        </a>
        @endif
        @if (count($course) == 0)
        <div style="margin-left: 30px; margin-top: 20px">
            <h4 style="margin-top: 10px">Can't find the course you want ?</h4>
            <h4>You can request your wanted course below : </h4>
            <a style="color: black"
                href="https://docs.google.com/forms/d/e/1FAIpQLScs0ioOf2c70PEYEFm1g5bua8wJMK9i0W0h7q2S8iUsXI_aUg/viewform?usp=sf_link">
                <h4>Link</h4>
            </a>
        </div>
        @else
        <div style="display: flex; margin-top :20px">
            @foreach ($course as $item)
            <div class="col-md-2 card">
                <div style="margin-top: 20px">
                    <h4>{{$item->name}}</h4>
                    <p class="price">Rp.{{$item->price}}</p>
                    <div style="height: 100px;">
                        <p class="cardText" style="overflow: hidden">{{$item->description}}</p>
                    </div>
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <div style="display: flex">
                        <a href="{{'/editCourse/'.$item->id}}">
                            <button class="btn btn-primary" style="margin-left: 30px; margin-top: 20px">Edit</button>
                        </a>
                        <form action="{{'/editCourse/delete/'.$item->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('post')}}
                            <button class="btn btn-danger"
                                onclick="return confirm('Are you sure to Delete this Course?')"
                                style="margin-left: 30px;margin-top: 20px">Delete</button>
                        </form>
                    </div>
                    @else
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
                    
                    {{-- <form action="{{url('buyCourse/'.$userData[0]->id.'/'.$item->id)}}" method="post">
                        {{csrf_field()}} --}}
                        <button class="btn btn-primary" style="width: 180px; margin-top: 5px; background-color:#EE8F1B" data-toggle="modal" data-target="#exampleModal">Buy Course</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">                                
                                  <h5 class="modal-title" id="exampleModalLabel">PETUNJUK</h5>
                                </div>
                                <div class="modal-body" style="list-style-type: none; text-align:left">
                                    <p>
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                                            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                          </button> <img src="{{ asset('storage/image/BCA.png') }}" width="75px" height="25px">
                                      </p>
                                      <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        </div>
                                      </div>
                                      <p>
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="true" aria-controls="collapseExample">
                                            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                          </button> Group Item #1 
                                      </p>
                                      <div class="collapse" id="collapseExample1">
                                        <div class="card card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        </div>
                                      </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                    {{-- </form> --}}
                        <a href="{{'/editCourse/'.$item->id}}">
                            <button class="btn btn-primary" style="width: 180px; margin-top: 10px">See Detail</button>
                        </a>
                    @else
                    <center>
                        <a href="{{'/editCourse/'.$item->id}}">
                            <button class="btn btn-primary" style="width: 180px; margin-top: 30px">See Detail</button>
                        </a>
                    </center>
                    @endif
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif
        <div style="margin-left: 30px; margin-top:20px">
            {{$course->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>

@endsection

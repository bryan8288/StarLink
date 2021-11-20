@extends('layout.layoutUser')
@section('content')
<style>
    .fa {
  font-size: 30px;
  cursor: pointer;
  user-select: none;
}
.card{
    height:1000px
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
                    
                    <form action="{{url('buyCourse/'.$userData[0]->id.'/'.$item->id)}}" method="post">
                        {{csrf_field()}}
                        <a class="btn" style="width: 180px; margin-top: 5px; background-color:#EE8F1B" data-toggle="modal" data-target="#exampleModal">Buy Course</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">                                
                                  <h5 class="modal-title" id="exampleModalLabel"><strong>Payment Method</strong></h5>
                                </div>
                                <div class="modal-body" style="text-align:left;">
                                    <p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></button><img src="{{ asset('storage/image/BCA.png')}}" width="100px" height="25px"> </label>
                                        </div>
                                    </p>

                                      <div class="collapse" id="collapseExample">
                                            <strong><p>Instruction</p></strong>
                                          <li>Insert your ATM card and your BCA pin</li>
                                          <li>Choose Menu <strong>Other Transaction</strong> </li>
                                          <li>Choose Menu <strong>Transfer</strong></li>
                                          <li>Choose Menu <strong>"To BCA Account's Virtual Account</strong></li>
                                          <li>Insert 39358 + your phone number: <strong>39358 08xx-xxxx-xxxx</strong></li>
                                          <li>Insert Top-Up Nominal</li>
                                          <li>Follow Instruction To Complete Transaction</li><br>
                                      </div>
                                      <br>
                                      <p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="true" aria-controls="collapseExample1">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></button><img src="{{ asset('storage/image/BRI.png')}}" width="100px" height="25px"> </label>
                                        </div>
                                      </p>
                                      <div class="collapse" id="collapseExample1">
                                            <strong><p>Instruction</p></strong>
                                          <li>Insert your ATM card and your BRI pin</li>
                                          <li>Choose Menu <strong>Other Transaction</strong> </li>
                                          <li>Choose Menu <strong>Transfer</strong></li>
                                          <li>Choose Menu <strong>"To BRI Account's Virtual Account</strong></li>
                                          <li>Insert 39358 + your phone number: <strong>39358 08xx-xxxx-xxxx</strong></li>
                                          <li>Insert Top-Up Nominal</li>
                                          <li>Follow Instruction To Complete Transaction</li><br>
                                      </div>
                                      <br>
                                      <p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="true" aria-controls="collapseExample2">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></button><img src="{{ asset('storage/image/Mandiri.png')}}" width="100px" height="25px"> </label>
                                        </div>
                                      </p>
                                      <div class="collapse" id="collapseExample2">
                                            <strong><p>Instruction</p></strong>
                                          <li>Insert your ATM card and your Mandiri pin</li>
                                          <li>Choose Menu <strong>Other Transaction</strong> </li>
                                          <li>Choose Menu <strong>Transfer</strong></li>
                                          <li>Choose Menu <strong>"To Mandiri Account's Virtual Account</strong></li>
                                          <li>Insert 39358 + your phone number: <strong>39358 08xx-xxxx-xxxx</strong></li>
                                          <li>Insert Top-Up Nominal</li>
                                          <li>Follow Instruction To Complete Transaction</li><br>
                                      </div>
                                      <br>
                                      <p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="true" aria-controls="collapseExample3">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></button><img src="{{ asset('storage/image/BNI.png')}}" width="100px" height="25px"> </label>
                                        </div>
                                      </p>
                                      <div class="collapse" id="collapseExample3">
                                            <strong><p>Instruction</p></strong>
                                          <li>Insert your ATM card and your BNI pin</li>
                                          <li>Choose Menu <strong>Other Transaction</strong> </li>
                                          <li>Choose Menu <strong>Transfer</strong></li>
                                          <li>Choose Menu <strong>"To BNI Account's Virtual Account</strong></li>
                                          <li>Insert 39358 + your phone number: <strong>39358 08xx-xxxx-xxxx</strong></li>
                                          <li>Insert Top-Up Nominal</li>
                                          <li>Follow Instruction To Complete Transaction</li><br>
                                      </div>
                                      <br>
                                      <p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-toggle="collapse" data-target="#collapseExample4" aria-expanded="true" aria-controls="collapseExample4">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></button><img src="{{ asset('storage/image/Danamon.png')}}" width="100px" height="25px"> </label>
                                        </div>
                                      </p>
                                      <div class="collapse" id="collapseExample4">
                                            <strong><p>Instruction</p></strong>
                                          <li>Insert your ATM card and your Danamon pin</li>
                                          <li>Choose Menu <strong>Other Transaction</strong> </li>
                                          <li>Choose Menu <strong>Transfer</strong></li>
                                          <li>Choose Menu <strong>"To Danamon Account's Virtual Account</strong></li>
                                          <li>Insert 39358 + your phone number: <strong>39358 08xx-xxxx-xxxx</strong></li>
                                          <li>Insert Top-Up Nominal</li>
                                          <li>Follow Instruction To Complete Transaction</li><br>
                                      </div>
                                      <br>
                                      <p>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" data-toggle="collapse" data-target="#collapseExample5" aria-expanded="true" aria-controls="collapseExample5">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></button><img src="{{ asset('storage/image/Panin.png')}}" width="100px" height="25px"> </label>
                                        </div>
                                      </p>
                                      <div class="collapse" id="collapseExample5">
                                            <strong><p>Instruction</p></strong>
                                          <li>Insert your ATM card and your Panin pin</li>
                                          <li>Choose Menu <strong>Other Transaction</strong> </li>
                                          <li>Choose Menu <strong>Transfer</strong></li>
                                          <li>Choose Menu <strong>"To Panin Account's Virtual Account</strong></li>
                                          <li>Insert 39358 + your phone number: <strong>39358 08xx-xxxx-xxxx</strong></li>
                                          <li>Insert Top-Up Nominal</li>
                                          <li>Follow Instruction To Complete Transaction</li><br>
                                      </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Complete Payment</button>
                                </form>  
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
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

@extends('layout.layoutUser')
@section('content')
{{-- <style>
    .fa {
        font-size: 30px;
        cursor: pointer;
        user-select: none;
    }

    .card {
        height: 1000px  
    }

</style> --}}

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{'/course/'}}">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px; margin-top:5px">Course</h5>
                <input type="text" name="keyword" class="form-control" placeholder="Search By Name"
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
            <div class="col-md-2 card" style="height:auto; padding-bottom: 10px">
                <div style="margin-top: 20px">
                    <h4>{{$item->name}}</h4>
                    <p class="price">Rp.{{$item->price}}</p>
                    <div style="height: 100px;">
                        <p class="cardText" style="overflow: hidden">{{$item->description}}</p>
                    </div>
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <div style="display: flex; justify-content: center">
                        <a href="{{'/editCourse/'.$item->id}}">
                            <button class="btn btn-primary" style="margin-top: 20px">Edit</button>
                        </a>
                        <form action="{{'/editCourse/delete/'.$item->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('post')}}
                            <button class="btn btn-danger"
                                onclick="return confirm('Are you sure to Delete this Course?')"
                                style="margin-left: 15px;margin-top: 20px">Delete</button>
                        </form>
                    </div>
                    @else
                    @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')

                        <a class="btn" style="width: 180px; margin-top: 5px; background-color:#EE8F1B"
                            data-toggle="modal" data-target="#exampleModal-{{$item->id}}">Buy Course</a>
                        <div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{url('buyCourse/'.$userData[0]->id.'/'.$item->id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Payment Method</strong>
                                        </h5>
                                    </div>
                                    <div class="modal-body" style="text-align:left;">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        <img src="{{ asset('storage/image/BCA.png')}}" width="84px"
                                                            height="30px">
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <strong>
                                                            <p>Instruction</p>
                                                        </strong>
                                                        <li>Insert your ATM card and your BCA pin</li>
                                                        <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                        <li>Choose Menu <strong>Transfer</strong></li>
                                                        <li>Choose Menu <strong>"To BCA Account's Virtual
                                                                Account"</strong></li>
                                                        <li>Insert 39358 + your phone number: <strong>39358
                                                                08[...]</strong></li>
                                                        <li>Insert Top-Up Nominal</li>
                                                        <li>Follow Instruction To Complete Transaction</li><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        <img src="{{ asset('storage/image/BRI.png')}}" width="100px"
                                                            height="25px">
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <strong>
                                                            <p>Instruction</p>
                                                        </strong>
                                                        <li>Insert your ATM card and your BRI pin</li>
                                                        <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                        <li>Choose Menu <strong>Transfer</strong></li>
                                                        <li>Choose Menu <strong>"To BRI Account's Virtual
                                                                Account"</strong></li>
                                                        <li>Insert 39358 + your phone number: <strong>39358
                                                                08[...]</strong></li>
                                                        <li>Insert Top-Up Nominal</li>
                                                        <li>Follow Instruction To Complete Transaction</li><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        <img src="{{ asset('storage/image/Mandiri.png')}}" width="102px"
                                                            height="32px">
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <strong>
                                                            <p>Instruction</p>
                                                        </strong>
                                                        <li>Insert your ATM card and your Mandiri pin</li>
                                                        <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                        <li>Choose Menu <strong>Transfer</strong></li>
                                                        <li>Choose Menu <strong>"To Mandiri Account's Virtual
                                                                Account"</strong></li>
                                                        <li>Insert 39358 + your phone number: <strong>39358
                                                                08[...]</strong></li>
                                                        <li>Insert Top-Up Nominal</li>
                                                        <li>Follow Instruction To Complete Transaction</li><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        <img src="{{ asset('storage/image/BNI.png')}}" width="88px"
                                                            height="30px">
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <strong>
                                                            <p>Instruction</p>
                                                        </strong>
                                                        <li>Insert your ATM card and your BNI pin</li>
                                                        <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                        <li>Choose Menu <strong>Transfer</strong></li>
                                                        <li>Choose Menu <strong>"To BNI Account's Virtual
                                                                Account"</strong></li>
                                                        <li>Insert 39358 + your phone number: <strong>39358
                                                                08[...]</strong></li>
                                                        <li>Insert Top-Up Nominal</li>
                                                        <li>Follow Instruction To Complete Transaction</li><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                        aria-expanded="false" aria-controls="collapseFive">
                                                        <img src="{{ asset('storage/image/Danamon.png')}}" width="84px"
                                                            height="25px">
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <strong>
                                                            <p>Instruction</p>
                                                        </strong>
                                                        <li>Insert your ATM card and your Danamon pin</li>
                                                        <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                        <li>Choose Menu <strong>Transfer</strong></li>
                                                        <li>Choose Menu <strong>"To Danamon Account's Virtual
                                                                Account"</strong></li>
                                                        <li>Insert 39358 + your phone number: <strong>39358
                                                                08[...]</strong></li>
                                                        <li>Insert Top-Up Nominal</li>
                                                        <li>Follow Instruction To Complete Transaction</li><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingSix">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                        aria-expanded="false" aria-controls="collapseSix">
                                                        <img src="{{ asset('storage/image/Panin.png')}}" width="96px"
                                                            height="40px">
                                                    </button>
                                                </h2>
                                                <div id="collapseSix" class="accordion-collapse collapse"
                                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <strong>
                                                            <p>Instruction</p>
                                                        </strong>
                                                        <li>Insert your ATM card and your Panin pin</li>
                                                        <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                        <li>Choose Menu <strong>Transfer</strong></li>
                                                        <li>Choose Menu <strong>"To Panin Account's Virtual
                                                                Account"</strong></li>
                                                        <li>Insert 39358 + your phone number: <strong>39358
                                                                08[...]</strong></li>
                                                        <li>Insert Top-Up Nominal</li>
                                                        <li>Follow Instruction To Complete Transaction</li><br>
                                                    </div>
                                                </div>
                                            </div>
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

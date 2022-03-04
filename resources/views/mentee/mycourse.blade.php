@extends('layout.layoutUser')
@section('content')

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
            <div class="col-md-2 card" style="height:auto; padding-bottom:10px">
                <div style="margin-top: 20px">
                    <h4>{{$item->name}}</h4>
                    <p class="price">Rp.{{$item->price}}</p>
                    <div style="height: 100px;">
                        <p class="cardText" style="overflow: hidden">{{$item->description}}</p>
                    </div>
                    <center>
                        <a href="{{'/mycourse/detail/'.$item->id}}">
                            <button class="btn btn-primary" style="width: 180px; margin-top: 30px">See Detail</button>
                        </a>
                    </center>
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

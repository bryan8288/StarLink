@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{'/mentor/'}}">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px">Mentor</h5>
                <input type="text" name="keyword" class="form-control" placeholder="Search By Name"
                    style="width: 500px; margin-left: 40px; padding-bottom: 5px; position: absolute; right: 140px;">
                <input type="submit" class="btn btn-primary" value="Search"
                    style="margin-left: 10px; margin-bottom: 5px; position: absolute; right: 50px; background-color: #27353F">
            </div>
        </form>
        <hr style="color: #FFFFFF;height: 3px">
        <a href="{{'/addMentor/'}}">
            <button class="btn btn-primary" style="background-color: #27353F; margin-left: 30px;">Create</button>
        </a>
        <div style="display: flex; margin-top :20px">
            @foreach ($mentor as $item)
            <div class="col-md-6 card2">
                <div style="margin-top: 20px">
                    <h4>{{$item->name}}</h4>
                    <div style="height: 150px; overflow: hidden">
                        <img src="{{url('storage/'.$item->profile_picture)}}"
                            style="height: 150px; width: 100px; display: flex; margin-left: auto; margin-right: auto; width: 50%; margin-top: auto; margin-bottom: auto; justify-content: center; align-items: center; position: relative">
                    </div>
                    <div style="height: 20px; margin-top: 10px">
                        <p class="cardText"
                            style="overflow: hidden; margin-left: auto; margin-right: auto; display: flex; justify-content: center">
                            {{$item->address}}</p>
                    </div>
                    <div style="height: 10px; margin-top: 10px; margin-bottom: 10px">
                        <p class="cardText"
                            style="overflow: hidden; margin-left: auto; margin-right: auto; display: flex; justify-content: center">
                            {{$item->phone}}</p>
                    </div>
                    <div style="display: flex">
                        {{-- <a href="{{'/editMentor/'.$item->id}}">
                        <button class="btn btn-primary" style="margin-left: 30px; margin-top: 20px">Edit</button>
                        </a> --}}
                        <form action="{{'/editMentor/delete/'.$item->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('post')}}
                            <center>
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure to Delete this Mentor?')"
                                    style="margin-left: 130px; margin-right: auto; display: flex; justify-content: center; margin-top: 20px">Delete</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-left: 30px; margin-top:20px">
            {{$mentor->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

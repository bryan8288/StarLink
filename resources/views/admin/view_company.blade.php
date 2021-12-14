@extends('layout.layoutUser')
@section('content')
@if(session('status'))
    <div class="alert alert-success alert-dismissible" role="alert" style="margin-top :10px;">
        {{session('status')}}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="col-md-12" id="background" style="justify-content: center; display:flex">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{'/company/'}}">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px">Company</h5>
                <input type="text" name="keyword" class="form-control" placeholder="Search By Name"
                    style="width: 500px; margin-left: 40px; padding-bottom: 5px; position: absolute; right: 140px;">
                <input type="submit" class="btn btn-primary" value="Search"
                    style="margin-left: 10px; margin-bottom: 5px; position: absolute; right: 50px; background-color: #27353F">
            </div>
        </form>
        <hr style="color: #FFFFFF;height: 3px">
        <a href="{{'/addCompany/'}}">
            <button class="btn btn-primary" style="background-color: #27353F; margin-left: 30px;">Create</button>
        </a>
        <div style="display: flex; margin-top :20px">
            @foreach ($company as $item)
            <div class="col-md-6 card2" style="height:350px">
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
                    <div style="display: flex; justify-content: center">
                        <a href="{{'/editCompany/'.$item->id}}">
                            <button class="btn btn-primary" style="margin-top: 20px">Edit</button>
                        </a>
                        <form action="{{'/editCompany/delete/'.$item->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('post')}}
                                <button class="btn btn-danger"
                                    onclick="return confirm('Are you sure to Delete this Company?')"
                                    style="margin-left: 30px; margin-right: auto; display: flex; justify-content: center; margin-top: 20px">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-left: 30px; margin-top:20px">
            {{$company->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{'/job/'}}">
            <div style="display:flex;">
                <h5 style="color: white; margin-left: 30px; margin-top:5px">Job</h5>
                <input type="text" name="keyword" class="form-control" placeholder="Search for Product"
                    style="width: 500px; margin-left: 40px; padding-bottom: 5px; position: absolute; right: 140px;">
                <input type="submit" class="btn btn-primary" value="Search"
                    style="margin-left: 10px; margin-bottom: 5px; position: absolute; right: 50px; background-color: #27353F">
            </div>
        </form>
        <hr style="color: #FFFFFF;height: 3px">
        <a href="{{'/addJob/'}}">
            <button class="btn btn-primary" style="background-color: #27353F; margin-left: 30px;">Create</button>
        </a>
        <div style="display: flex; margin-top :20px">
            @foreach ($job as $item)
            <div class="col-md-2 card4">
                <div style="margin-top: 20px">
                    <h4>{{$item->name}}</h4>
                    <p class="price">Slot : {{$item->capacity}}</p>
                    <div style="height: 100px;">
                        <p class="cardText" style="overflow: hidden">{{$item->description}}</p>
                    </div>
                    <h4>Salary</h4>
                    <h4 style="margin-top: 10px">{{$item->salary}}</h4>
                    <div style="display: flex">
                        <a href="{{'/editJob/'.$item->id}}">
                            <button class="btn btn-primary" style="margin-left: 30px; margin-top: 10px">Edit</button>
                        </a>
                        <form action="{{'/editJob/delete/'.$item->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('post')}}
                            <button class="btn btn-danger" onclick="return confirm('Are you sure to Delete this Job?')"
                                style="margin-left: 30px;margin-top: 10px">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-left: 30px; margin-top:20px">
            {{$job->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

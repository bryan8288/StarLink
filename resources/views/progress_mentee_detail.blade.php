@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <div style="display: flex;">
            <h5 style="color: white; margin-left: 30px; margin-top:5px; width: 85%">Progress Mentee</h5>
            <h5 style="margin-left: 30px; margin-top: 5px; float: right;">Class {{$classData[0]->className}}</h5>
        </div>
        <hr style="color: #FFFFFF;height: 3px">

        <div class="col-md-12" style="margin-top :10px; display: flex;">
            <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="color: #FFFFFF; border-bottom-width: 3px"><b>No</b></th>
                        <th scope="col" style="color: #FFFFFF; border-bottom-width: 3px; width: 50%"><b>Mentee</b></th>
                        <th scope="col" style="color: #FFFFFF; border-bottom-width: 3px"><b>{{$classData[0]->courseName}}</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <div>
                        @foreach ($progressMentee as $item)
                        <tr>
                            <th scope="row" style="border-bottom: none; color: #FFFFFF;">{{$i}}</th>
                            <td style="border-bottom: none; display: flex; justify-content:; float: left;">
                                @if ($item->profile_picture == null)
                                <i class="fa fa-user-circle-o" style="font-size: 50px;"></i>
                                @else
                                <img src="{{url('storage/'.$item->profile_picture)}}"
                                style="height:50px; border-radius: 50%; width: 50px; ">
                                @endif
                                 <h6 style="margin-top: 10px;margin-left: 10px; color: #FFFFFF;">{{$item->name}}</h6></td>
                            @foreach ($item->totalComplete as $complete)
                            @if(blank($complete->total))
                            <h1>1</h1>
                                <td style="border-bottom: none; color: #FFFFFF;">0/{{$totalModule}}</td>
                            @else
                                <td style="border-bottom: none; color: #FFFFFF;">{{$complete->total}}/{{$totalModule}}</td>
                            @endif
                            @endforeach
                        </tr>
                        <?php $i++;?>
                        @endforeach

                    </div>

                </tbody>
            </table>
            </div>
            {{-- <div class="card2 col-md-4" style="height: auto; text-align: unset; padding-bottom: 20px">
                <h4 style="margin-left: 20px; margin-top: 20px"><b>{{$item->courseName}}</b></h4>
            @if($item->category == 'Curriculum')
            <h5 style="margin-left: 20px; color: #9C22B4">{{$item->category}}</h5>
            @else
            <h5 style="margin-left: 20px; color: #FF4D4D">{{$item->category}}</h5>
            @endif
            <center>
                <hr style="border-top: 1px solid;width:95%;color: #3388FF;opacity:1;">
            </center>
            <div class="col-md-12" style="text-align: center; display: flex; flex-wrap: wrap">
                @foreach ($item->class as $class)
                <div class="col-md-4" style="margin-top: 5px">
                    <a href="{{'/progressmentee/detail/'.$class->id}}" style="text-decoration: none; color: black">
                        <button class="btn btn-secondary">{{$class->name}}</button>
                    </a>
                </div>
                @endforeach
            </div>
        </div> --}}

    </div>
    <div style="margin-top:20px; margin-left: 30px">
        {{$progressMentee->links()}}
    </div>
</div>
</div>
</main>
</div>
</div>
</div>
@endsection

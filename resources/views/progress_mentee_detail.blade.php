@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <div style="display: flex;">
            <h5 style="color: white; margin-left: 30px; margin-top:5px; width: 90%">Progress Mentee</h5>
            <h5 style="margin-top: 5px;">Class {{$classData[0]->className}}</h5>
        </div>
        <hr style="color: #FFFFFF;height: 3px">

        <div class="col-md-12" style="margin-top :10px; display: flex;">
            <div class="container">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="color: #FFFFFF; border-bottom-width: 3px"><b>No</b></th>
                            <th scope="col" style="color: #FFFFFF; border-bottom-width: 3px; width: 50%"><b>Mentee</b>
                            </th>
                            <th scope="col" style="color: #FFFFFF; border-bottom-width: 3px">
                                <b>{{$classData[0]->courseName}}</b></th>
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
                                    <a href="{{url('/progressmentee/detailByModule/'.$item->mentee_id.'/'.$id)}}" style="text-decoration: none">
                                        <h6 style="margin-top: 10px;margin-left: 10px; color: #FFFFFF;">{{$item->name}}</h6>
                                    </a>
                                </td>
                                @forelse ($item->totalComplete as $complete)
                                <td style="border-bottom: none; color: #FFFFFF;">
                                    {{$complete->total}}/{{$totalModule[0]->total}}</td>
                                @empty
                                <td style="border-bottom: none; color: #FFFFFF;">0/{{$totalModule[0]->total}}</td>
                                @endforelse
                            </tr>
                            <?php $i++;?>
                            @endforeach

                        </div>

                    </tbody>
                </table>
            </div>
        </div>
        <div style="margin-top:10px; margin-left: 30px">
            {{$progressMentee->links()}}
        </div>
    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

@extends('layout.layoutUser')
@section('content')
<div class="col-md-12" id="background">
    <div class="container-fluid" style="padding-top: 50px">
        <div style="display: flex;">
            <h5 style="color: white; margin-left: 30px; margin-top:5px; width: 79%">Progress Mentee</h5>
            <h5 style="margin-top: 5px;">Mentee : {{$mentee->name}}</h5>
        </div>
        <hr style="color: #FFFFFF;height: 3px">

        <div class="col-md-12" style="margin-top :10px;">
                <div class="col-md-12">
                    <h5 style="color: white;margin-left: 30px;">In Progress</h5>
                    <div class="col-md-12" style="display: flex">
                        
                        @if($inProgressModule->count() == 0)
                        <div class="card5 card-block d-flex col-md-12" style="height: 150px; margin-left: 30px; width: 1080px; margin-top:0px">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <h4 style="">There are no In Progress Module</h4>
                            </div>
                        </div>
                        @else
                        @foreach ($inProgressModule as $module)
                        <div class="card2 col-md-4" style="height: auto; text-align: unset; padding-bottom: 20px">
                            <h4 style="margin-left: 20px; margin-top: 20px"><b>{{$module->name}}</b></h4>
                            @if($module->category == 'Curriculum')
                                <h5 style="margin-left: 20px; color: #9C22B4">{{$module->category}}</h5>   
                            @else
                                <h5 style="margin-left: 20px; color: #FF4D4D">{{$module->category}}</h5>   
                            @endif
                            <center>
                                <hr style="border-top: 1px solid;width:95%;color: #3388FF;opacity:1;">
                            </center>
                            <h6 style="margin-left: 20px; background-color: #C4C7CF; width: 100px; text-align: center; border-radius: 10px">In Progress</h6>
                        </div>
                        @endforeach 
                        @endif
                    </div>
                    @if ($inProgressModule->count() > 2)
                    <div style="margin-top:10px; margin-left: 30px">
                        {{$inProgressModule->links()}}
                    </div>
                    @endif
                </div>
                <div class="col-md-12" style="margin-top: 30px">
                    <h5 style="color: white;margin-left: 30px;">Completed</h5>
                    <div class="col-md-12" style="display: flex">
                        @if($completedModule->count() == 0)
                        <div class="card5 card-block d-flex col-md-12" style="height: 150px; margin-left: 30px; width: 1080px; margin-top:0px">
                            <div class="card-body align-items-center d-flex justify-content-center">
                                <h4 style="">There are no Completed Module yet</h4>
                            </div>
                        </div>
                        @else
                        @foreach ($completedModule as $module)
                        <div class="card2 col-md-4" style="height: auto; text-align: unset; padding-bottom: 20px">
                            <h4 style="margin-left: 20px; margin-top: 20px"><b>{{$module->name}}</b></h4>
                            @if($module->category == 'Curriculum')
                                <h5 style="margin-left: 20px; color: #9C22B4">{{$module->category}}</h5>   
                            @else
                                <h5 style="margin-left: 20px; color: #FF4D4D">{{$module->category}}</h5>   
                            @endif
                            <center>
                                <hr style="border-top: 1px solid;width:95%;color: #3388FF;opacity:1;">
                            </center>
                            <h6 style="margin-left: 20px; background-color: #C4C7CF; width: 100px; text-align: center; border-radius: 10px">Completed</h6>
                        </div>
                        @endforeach 
                        @endif
                    </div>
                    @if ($completedModule->count() > 2)
                    <div style="margin-top:10px; margin-left: 30px">
                        {{$completedModule->links()}}
                    </div>
                    @endif
                </div>
        </div>

    </div>
</div>
</main>
</div>
</div>
</div>
@endsection

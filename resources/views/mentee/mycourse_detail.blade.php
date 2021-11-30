@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background" style="height: auto; padding-bottom : 20px">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('editCourse/update/'.$courseDetail->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                    value="{{$courseDetail->name}}" style="margin-bottom: 5px" readonly>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Category</h5>
                <select name="category" class="form-control input-sm" disabled
                    style="margin-bottom: 5px; float :right;width:70%">
                    <option selected>{{$courseDetail->category}}</option>
                    @if($courseDetail->category=='E-Learning')
                    <option>Curriculum</option>
                    @endif
                    @if($courseDetail->category=='Curriculum')
                    <option>E-Learning</option>
                    @endif
                </select>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Description</h5>
                <textarea class="form-control" style="width:70%; float: right;" name="description" rows="5"
                    readonly>{{$courseDetail->description}}</textarea>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Price</h5>
                <input style="width:70%; float: right;" type="text" name="price" class="form-control"
                    value="{{$courseDetail->price}}" style="margin-bottom: 5px" readonly>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Weeks</h5>
                <input style="width:70%; float: right;" type="number" name="weeks" class="form-control"
                    value="{{$courseDetail->weeks}}" style="margin-bottom: 5px" readonly>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Minimal Grade</h5>
                <input style="width:70%; float: right;" type="number" name="kkm" class="form-control"
                    value="{{$courseDetail->kkm}}" style="margin-bottom: 5px" readonly>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Exam Time</h5>
                <input style="width:70%; float: right;" type="time" name="kkm" class="form-control"
                    value="{{$courseDetail->exam_time}}" style="margin-bottom: 5px" readonly>
            </div>
            <div style="display: flex">
                <button type="button" class="btn btn-secondary" style="background-color: #27353F; margin-top: 30px"
                    data-bs-toggle="modal" data-bs-target="#scoreboard">View Scoreboard</button>
                @if($exam->count()>0)
                    @if($isSubmitted == true)
                        <button type="button" class="btn btn-primary"
                            style="background-color: #27353F; margin-top:30px; margin-left: 20px" disabled>
                            Go To Exam
                        </button>
                    @else
                    <a href="{{'/exam/'.$exam[0]->id}}">
                        <button type="button" class="btn btn-primary"
                            style="background-color: #27353F; margin-top:30px; margin-left: 20px">
                            Go To Exam
                        </button>
                    </a>
                    @endif
                @endif
            </div>
            <div style="margin-top: 30px">
                <h4>Modules</h4>
                <div class="modules">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Minimal Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach ($moduleList as $module)
                            <tr class="table-info">
                                <th scope="row">{{$i}}</th>
                                <td>
                                    <a href="{{'/editModule/'.$module->id}}" style="text-decoration:none; color:black">
                                        {{$module->name}}
                                    </a>
                                </td>
                                <td class="cardText">{{$module->description}}</td>
                                <td>{{$module->kkm}}</td>
                            </tr>
                            <?php $i++;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-top: 30px">
                <h4>Classes</h4>
                <div class="modules">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Day</th>
                                <th scope="col">Time</th>
                                <th scope="col">Link</th>
                                <th scope="col">Action</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            @foreach ($classList as $class)
                            <tr class="table-info">
                                <th scope="row">{{$i}}</th>
                                <td>
                                    <a href="{{'/editClass/'.$class->id}}" style="text-decoration:none; color:black">
                                        {{$class->name}}
                                    </a>
                                </td>
                                <td>{{$class->day_of_week}}</td>
                                <td>{{$class->start_time}} - {{$class->end_time}}</td>
                                <td style="width:380px">{{$class->link}}</td>
                                <td>
                                    <a href="{{url('/progressmentee/detailByModule/'.$userData[0]->id.'/'.$class->id)}}">
                                        <button type="button" class="btn btn-primary"
                                            style="background-color: #27353F;">
                                            See My Progress
                                        </button>
                                    </a>
                                </td>
                                <td>In Progress</td>
                            </tr>
                            <?php $i++;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="scoreboard" tabindex="-1" aria-labelledby="popupmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupmodel">Scoreboard</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Mentee</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        @foreach ($scoreboard as $item)
                        <tr class="">
                            <th scope="row">{{$i}}</th>
                            <td>{{$item->menteeName}}</td>
                            <td>{{$item->score}}</td>
                        </tr>
                        <?php $i++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection

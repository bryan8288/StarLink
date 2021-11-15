@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background" style="height: auto; padding-bottom : 20px">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('editCourse/update/'.$courseDetail->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            @if($auth && \Illuminate\Support\Facades\Auth::user()->role != 'admin')
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
                <h5 style="width: 30%;float:left">KKM</h5>
                <input style="width:70%; float: right;" type="number" name="kkm" class="form-control"
                    value="{{$courseDetail->kkm}}" style="margin-bottom: 5px" readonly>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Exam Time</h5>
                <input style="width:70%; float: right;" type="time" name="kkm" class="form-control"
                    value="{{$courseDetail->exam_time}}" style="margin-bottom: 5px" readonly>
            </div>
            <div style="display: flex">
                <button type="button" class="btn btn-primary" style="background-color: #27353F; margin-top:30px"
                    data-bs-toggle="modal" data-bs-target="#uploadExam">
                    <i class="fa fa-cloud-upload"></i>
                    Upload Exam
                </button>
                @if($exam->count()>0)
                <a href="{{asset('storage/'.$exam[0]->file)}}">
                    <button type="button" class="btn btn-primary"
                        style="background-color: #27353F; margin-top:30px; margin-left: 20px">
                        <i class="fa fa-cloud-download"></i>
                        Download Exam
                    </button>
                </a>
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
                                <th scope="col">KKM</th>
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
            @else
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Name</h5>
                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                    value="{{$courseDetail->name}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Category</h5>
                <select name="category" class="form-control input-sm"
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
                <textarea class="form-control" style="width:70%; float: right;" name="description"
                    rows="5">{{$courseDetail->description}}</textarea>
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Price</h5>
                <input style="width:70%; float: right;" type="text" name="price" class="form-control"
                    value="{{$courseDetail->price}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Weeks</h5>
                <input style="width:70%; float: right;" type="number" name="weeks" class="form-control"
                    value="{{$courseDetail->weeks}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">KKM</h5>
                <input style="width:70%; float: right;" type="number" name="kkm" class="form-control"
                    value="{{$courseDetail->kkm}}" style="margin-bottom: 5px">
            </div>
            <div class="courseDetail">
                <h5 style="width: 30%;float:left">Exam Time</h5>
                <input style="width:70%; float: right;" type="time" name="kkm" class="form-control"
                    value="{{$courseDetail->exam_time}}" style="margin-bottom: 5px">
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
                                <th scope="col">KKM</th>
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
                <center>
                    <button class="btn btn-primary" style="margin-top: 15px; background-color: #27353F; width: 150px">
                        Submit
                    </button>
                </center>
            </div>
            @endif

        </form>

        <div class="modal fade" id="uploadExam" tabindex="-1" aria-labelledby="popupmodel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupmodel">Exam</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{url('/addExam/'.$courseDetail->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Name</h5>
                                <input style="width:70%; float: right;" type="text" name="name" class="form-control"
                                    style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Type</h5>
                                <select class="form-control input-sm" style="margin-bottom: 5px; float :right;width:70%"
                                    name="type">
                                    <option selected>-- Choose Type --</option>
                                    <option>Project</option>
                                    <option>Coding</option>
                                    <option>Essai</option>
                                </select>
                            </div>
                            <div class="companyDetail">
                                <h5 style="width: 30%;float:left">File</h5>
                                <input type="file" id="video" hidden name="file" />
                                <label style="color: white; font-size:16px; width: 200px; text-align:center"
                                    class="upload bg-dark" for="video">
                                    <i class="fa fa-cloud-upload"></i>
                                    Upload</label><br>
                                <p style="font-size: 1px"> </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if(count($errors) > 0)
<div class="alert alert-danger" style="margin-top: 20px">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
</main>
</div>
</div>
</div>
@endsection

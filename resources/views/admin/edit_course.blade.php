@extends('layout.layoutUser')
@section('content')

                <div class="col-md-12" id="background">
                    <div class="container-fluid" style="padding-top: 50px">
                        <form action="{{url('editCourse/update/'.$courseDetail->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Name</h5>
                                <input style="width:70%; float: right;" type="text" name="name" class="form-control" value="{{$courseDetail->name}}" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Category</h5>
                                <select name="category" class="form-control input-sm" style="margin-bottom: 5px; float :right;width:70%">
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
                                <h5 style="width: 30%;float:left">Mentor</h5>
                                <select name="mentor" class="form-control input-sm" style="margin-bottom: 5px; width:70%;">
                                    <option selected>{{$mentorName->name}}</option>
                                    @foreach ($mentorList as $mentor)
                                        <option value="{{$courseDetail->price}}">{{$mentor->name}}</option>
                                    @endforeach
                                </select>   
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Description</h5>
                                <input style="width:70%; float: right;" type="text" name="description" class="form-control text-truncate" value="{{$courseDetail->description}}" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Price</h5>
                                <input style="width:70%; float: right;" type="text" name="price" class="form-control" value="{{$courseDetail->price}}" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Weeks</h5>
                                <input style="width:70%; float: right;" type="number" name="weeks" class="form-control" value="{{$courseDetail->weeks}}" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">KKM</h5>
                                <input style="width:70%; float: right;" type="number" name="kkm" class="form-control" value="{{$courseDetail->kkm}}" style="margin-bottom: 5px">
                            </div>
                            <div class="courseDetail">
                                <h5 style="width: 30%;float:left">Exam Time</h5>
                                <input style="width:70%; float: right;" type="time" name="kkm" class="form-control" value="{{$courseDetail->exam_time}}" style="margin-bottom: 5px">
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
                                    <button class="btn btn-primary" style="margin-top: 55px; background-color: #27353F; width: 150px">
                                        Submit
                                    </button>
                                </center>
                            </div>
                            
                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                    </ul> 
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
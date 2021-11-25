@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background" style="height: auto; padding-bottom : 20px">
    <div class="container-fluid" style="padding-top: 50px">
        <form action="{{url('editCourse/update/'.$courseDetail->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentor')
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
                <a href="{{asset('storage/exam/templateCoding.xlsx')}}">
                    <button type="button" class="btn btn-primary"
                        style="background-color: #27353F; margin-top:30px; margin-left: 20px">
                        <i class="fa fa-cloud-download"></i>
                        Download Template Exam
                    </button>
                </a>
                @if ($exam[0]->type == 'Project')
                <button type="button" class="btn btn-primary"
                    style="background-color: #27353F; margin-top:30px; margin-left: 20px" data-bs-toggle="modal"
                    data-bs-target="#rateExamProject">
                    Rate Exam
                </button>
                @elseif($exam[0]->type == 'Essai')
                <button type="button" class="btn btn-primary"
                    style="background-color: #27353F; margin-top:30px; margin-left: 20px" data-bs-toggle="modal"
                    data-bs-target="#rateExamEssai">
                    Rate Exam
                </button>
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
            @elseif($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
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
                                <td>{{$module->name}}</td>
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
        @if($auth && \Illuminate\Support\Facades\Auth::user()->role == 'mentee')
        <center>
            <form action="{{url('buyCourse/'.$userData[0]->id.'/'.$courseDetail->id)}}" method="post">
                {{csrf_field()}}
                <a class="btn" style="width: 180px; margin-top: 5px; background-color:#EE8F1B" data-toggle="modal"
                    data-target="#exampleModal">Buy Course</a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Payment Method</strong>
                                </h5>
                            </div>
                            <div class="modal-body" style="text-align:left;">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <img src="{{ asset('storage/image/BCA.png')}}" width="84px"
                                                    height="30px">
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>
                                                    <p>Instruction</p>
                                                </strong>
                                                <li>Insert your ATM card and your BCA pin</li>
                                                <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                <li>Choose Menu <strong>Transfer</strong></li>
                                                <li>Choose Menu <strong>"To BCA Account's Virtual
                                                        Account"</strong></li>
                                                <li>Insert 39358 + your phone number: <strong>39358
                                                        08[...]</strong></li>
                                                <li>Insert Top-Up Nominal</li>
                                                <li>Follow Instruction To Complete Transaction</li><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <img src="{{ asset('storage/image/BRI.png')}}" width="100px"
                                                    height="25px">
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>
                                                    <p>Instruction</p>
                                                </strong>
                                                <li>Insert your ATM card and your BRI pin</li>
                                                <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                <li>Choose Menu <strong>Transfer</strong></li>
                                                <li>Choose Menu <strong>"To BRI Account's Virtual
                                                        Account"</strong></li>
                                                <li>Insert 39358 + your phone number: <strong>39358
                                                        08[...]</strong></li>
                                                <li>Insert Top-Up Nominal</li>
                                                <li>Follow Instruction To Complete Transaction</li><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                <img src="{{ asset('storage/image/Mandiri.png')}}" width="102px"
                                                    height="32px">
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>
                                                    <p>Instruction</p>
                                                </strong>
                                                <li>Insert your ATM card and your Mandiri pin</li>
                                                <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                <li>Choose Menu <strong>Transfer</strong></li>
                                                <li>Choose Menu <strong>"To Mandiri Account's Virtual
                                                        Account"</strong></li>
                                                <li>Insert 39358 + your phone number: <strong>39358
                                                        08[...]</strong></li>
                                                <li>Insert Top-Up Nominal</li>
                                                <li>Follow Instruction To Complete Transaction</li><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                <img src="{{ asset('storage/image/BNI.png')}}" width="88px"
                                                    height="30px">
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>
                                                    <p>Instruction</p>
                                                </strong>
                                                <li>Insert your ATM card and your BNI pin</li>
                                                <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                <li>Choose Menu <strong>Transfer</strong></li>
                                                <li>Choose Menu <strong>"To BNI Account's Virtual
                                                        Account"</strong></li>
                                                <li>Insert 39358 + your phone number: <strong>39358
                                                        08[...]</strong></li>
                                                <li>Insert Top-Up Nominal</li>
                                                <li>Follow Instruction To Complete Transaction</li><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                <img src="{{ asset('storage/image/Danamon.png')}}" width="84px"
                                                    height="25px">
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>
                                                    <p>Instruction</p>
                                                </strong>
                                                <li>Insert your ATM card and your Danamon pin</li>
                                                <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                <li>Choose Menu <strong>Transfer</strong></li>
                                                <li>Choose Menu <strong>"To Danamon Account's Virtual
                                                        Account"</strong></li>
                                                <li>Insert 39358 + your phone number: <strong>39358
                                                        08[...]</strong></li>
                                                <li>Insert Top-Up Nominal</li>
                                                <li>Follow Instruction To Complete Transaction</li><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                <img src="{{ asset('storage/image/Panin.png')}}" width="96px"
                                                    height="40px">
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                            aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>
                                                    <p>Instruction</p>
                                                </strong>
                                                <li>Insert your ATM card and your Panin pin</li>
                                                <li>Choose Menu <strong>Other Transaction</strong> </li>
                                                <li>Choose Menu <strong>Transfer</strong></li>
                                                <li>Choose Menu <strong>"To Panin Account's Virtual
                                                        Account"</strong></li>
                                                <li>Insert 39358 + your phone number: <strong>39358
                                                        08[...]</strong></li>
                                                <li>Insert Top-Up Nominal</li>
                                                <li>Follow Instruction To Complete Transaction</li><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Complete Payment</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </center>
    @endif

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

    <div class="modal fade" id="rateExamProject" tabindex="-1" aria-labelledby="popupmodel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupmodel">Rate Exam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Score</th>
                                <th scope="col">File</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <?php $i=1;?>
                            @foreach ($completedMenteeList as $mentee)
                            <tr class="table-info">
                                <th scope="row">{{$i}}</th>
                                <td>{{$mentee->name}}</td>
                                <td>{{$mentee->score}}</td>
                                <td>
                                    <a href="{{asset('storage/'.$mentee->file)}}">
                                        <button type="button" class="btn btn-primary"
                                            style="background-color: #27353F;">
                                            <i class="fa fa-cloud-download"></i>
                                            Download
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    @if($mentee->score == null)
                                    <form action="{{url('/rateExam/'.$mentee->id)}}" method="post">
                                        {{csrf_field()}}
                                        <div style="display: flex; justify-content: center">
                                            <input style="width:20%" type="number" name="score" class="form-control"
                                                style="margin-bottom: 5px">
                                            <button class="btn btn-primary"
                                                style="width:80px; margin-left:20px">Rate</button>
                                        </div>
                                    </form>
                                    @else
                                    <button class="btn btn-primary" style="width:80px" disabled>Rated</button>
                                    @endif
                                </td>
                            </tr>
                            <?php $i++;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rateExamEssai" tabindex="-1" aria-labelledby="popupmodel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popupmodel">Rate Exam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Score</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <?php $i=1;?>
                            @foreach ($completedMenteeList as $mentee)
                            <tr class="table-info">
                                <th scope="row">{{$i}}</th>
                                <td>{{$mentee->name}}</td>
                                <td>{{$mentee->score}}</td>
                                <td>
                                    @if($mentee->score == null)
                                    <div style="display: flex; justify-content: center">
                                        <a href="{{'/rateEssai/'.$mentee->menteeId.'/'.$courseDetail->id}}">
                                            <button class="btn btn-primary"
                                                style="width:80px; margin-left:20px">Rate</button>
                                        </a>
                                    </div>
                                    @else
                                    <button class="btn btn-primary" style="width:80px" disabled>Rated</button>
                                    @endif
                                </td>
                            </tr>
                            <?php $i++;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
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

@extends('layout.layoutUser')
@section('content')

                <div class="col-md-12" id="background">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav" style="width: 100%">
                                <a style="width: 30%; text-align:center" class="nav-item nav-link"
                                    href="{{'/moduleDetailLearning/'.$id}}">Learning </a>
                                <div style="border-left: 3px solid;"></div>
                                <a style="width: 30%; text-align:center" class="nav-item nav-link active" href="{{'/moduleDetailVideo/'.$id}}">Video</a>
                                <div style="border-left: 3px solid;"></div>
                                <a style="width: 30%; text-align:center" class="nav-item nav-link"
                                    href="{{'/moduleDetailAssignment/'.$id}}">Assignment</a>
                            </div>
                        </div>
                    </nav>
                    <div>
                        <h5 style="color: white; margin-top:30px; font-size:30px;margin-left:2.5%">Assignment</h5>
                        <hr style="border-top: 5px solid #ffffff; opacity:1;margin-left:2.5%;width:95%">
                        @foreach ($assignmentList as $assignment)
                        <h4 style="margin-top:30px; margin-left:2.5%">{{$assignment->title}}</h4>
                        <p style="margin-left:2.5%">{{$assignment->description}}</p>
                        <h4 style="margin-left:2.5%">Deadline : {{$assignment->end_date}}</h4>
                        <a href="{{asset('storage/'.$assignment->assignment_file)}}">
                            <button type="button" class="btn btn-primary"
                                style="background-color: #27353F; margin-left:2.5%">
                                <i class="fa fa-cloud-download"></i>
                                Download
                            </button>
                        </a>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection

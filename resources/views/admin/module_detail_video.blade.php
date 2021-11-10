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
                        <h5 style="color: white; margin-top:30px; font-size:30px;margin-left:2.5%">Video</h5>
                        <hr style="border-top: 5px solid #ffffff; opacity:1;margin-left:2.5%;width:95%">
                        @foreach ($videoList as $video)
                        <h4 style="margin-top:30px; margin-left:2.5%">{{$video->name}}</h4>
                        <p style="margin-left:2.5%">{{$video->description}}</p>
                        <h4 style="margin-left:2.5%">Other Reference: {{$video->other_reference}}</h4>
                        @if(empty($video->video_file))
                            <h4 style="margin-left:2.5%">There is no Video</h4>
                        @else
                        <a href="{{asset('storage/'.$video->video_file)}}">
                            <button type="button" class="btn btn-primary"
                                style="background-color: #27353F; margin-left:2.5%">
                                <i class="fa fa-cloud-download"></i>
                                Download
                            </button>
                        </a>
                        @endif
                        <hr>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection

@extends('layout.layoutUser')
@section('content')

<div class="col-md-12" id="background" style="height: auto; padding-bottom : 20px">
    <div class="container-fluid" style="padding-top: 50px">
        <h5 style="color: white; margin-left: 30px; margin-top:5px">Exam</h5>
        <hr style="color: #FFFFFF;height: 3px">
        @foreach ($menteeAnswer as $key => $item)
        <form action="{{url('/rateEssai/'.$menteeId.'/'.$exam[0]->id)}}" method="post">
        {{csrf_field()}}
        <br>
            <h4><b>Question {{$key+1}}</b></h4>
            <p style="font-size: 20px">{{$item->question}}</p>
            <textarea class="form-control" name="answer[]" cols="30" rows="10" id="answerBox" disabled>{{$item->answer}}</textarea>
        <h5>Score Target : {{$item->score}}</h5>
        @endforeach
        
        <div class="courseDetail">
            <h4 style="width: 30%;float:left"><b>Score</b></h4>
            <input type="number" class="form-control" style="width:70%; float: right;" name="score">
        </div>
        <center>
            <button type="submit" class="btn btn-secondary"
                    style="background-color: #27353F; margin-top: 20px">Submit</button>
        </center>
        </form>
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
@endsection
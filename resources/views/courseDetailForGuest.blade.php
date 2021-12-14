<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StarLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row">
                <div style="display: flex;">
                    <div class="col-md-10">
                        <center>
                            <h4 style="text-align: center; margin-top: 15px; margin-left: 100px"><a class="title" href="{{'/'}}" >Starlink</a>
                            </h4>
                        </center>
                    </div>
                    <div class="col-md-2" style="display: flex">
                        <div style="top:0; right:0; position: absolute;">
                            <a href="{{'/login/'}}">
                                <button class="btn btn-light"
                                    style="width : 100px; margin-top: 15px;">
                                    LOGIN
                                </button>      
                            </a> 
                            <a href="{{'/register/'}}">
                            <button class="btn btn-light"
                                style="width : 100px; margin-top: 15px; margin-left:10px;">
                                REGISTER
                            </button>   
                            </a>    
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="background" style="height:auto; padding-bottom:10px">
                    <div class="container-fluid" style="padding-top: 50px">
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
                            <input style="width:70%; float: right;" type="time" class="form-control"
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
                                            <th scope="col">Minimal Grade</th>
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
                        <center>
                            <a href="{{'/register/'}}" class="btn" style="width: 180px; margin-top: 10px; background-color:#EE8F1B">Buy Course</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<style>
    .courseDetail {
        display: flex;
        margin-top: 20px;
    }

    #background {
        margin-top: 10px;
        width: 100%;
        height: 852px;
        background-color: #218eed;
        overflow: visible;
        border-radius: 1px;
    }

    .modules {
        box-sizing: border-box;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 5px 73px 5px 73px;
        background-color: #99eeff;
        overflow: visible;
        border-radius: 10px;
    }

    .title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', Verdana, sans-serif;
        text-decoration: none;
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }
</style>
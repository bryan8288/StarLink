<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StarLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="bg-image"></div>

    <div class="bg-text">

        <h1 style="color: deepskyblue">Welcome to StarLink</h1>
        <h4 style="margin-top: 20px">A Comfortable Place Where You Can Learn and Apply to A Company</h4>
        <div>
            <a href="{{'/login/'}}">
                <button class="btn btn-light"
                    style="width : 400px; margin-top: 30px; background-color: #242424; color: #f1f1f1">
                    LOGIN
                </button>
            </a>
        </div>
        <div>
            <a href="{{'/register/'}}">
                <button class="btn btn-light"
                    style="width : 400px; margin-top: 20px; background-color: #242424; color: #f1f1f1">
                    REGISTER
                </button>
            </a>
        </div>
        <div style="margin-top:10px">
            Our Course List
        </div>
        <div style="display: flex">
            @foreach ($courseList as $item)
            <div class="col-md-2 card" style="display: flex; align-items: center;">
                <h4 style="color:black;">{{$item->name}}</h4>
                <p class="price">Rp.{{$item->price}}</p>
                <div style="height: 100px;">
                    <p class="cardText" style="overflow: hidden; color:black;">{{$item->description}}</p>
                </div>
                <a href="{{'register'}}" class="btn" style="width: 180px; margin-top: 5px; background-color:#EE8F1B"
                    data-toggle="modal" data-target="#exampleModal">Buy Course</a>
                <a href="{{'course/detail/'.$item->id}}">
                    <button class="btn btn-primary" style="width: 180px; margin-top: 10px">See Detail</button>
                </a>
            </div>
            @endforeach
        </div>
        <div style="margin-left: 30px; margin-top:20px">
            {{$courseList->links()}}
        </div>
    </div>
</body>

</html>

<style>
    body,
    html {
        height: 100%;
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    .bg-image {
        background-image: url("/storage/image/background.jpg");
        filter: blur(8px);
        -webkit-filter: blur(8px);
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .bg-text {
        background-color: rgba(0, 0, 0, 0.4);
        color: white;
        font-weight: bold;
        border: 3px solid #f1f1f1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 80%;
        padding: 20px;
        text-align: center;
    }

    .cardText {
        overflow: hidden;
        -webkit-line-clamp: 4;
        height: 100px;
        display: -webkit-box;
        max-width: 200;
        text-overflow: ellipsis;
    }

    .price {
        color: grey;
        font-size: 22px;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        text-align: center;
        font-family: arial;
        border-radius: 10px;
        height: 300px;
        margin-left: 30px;
    }

</style>

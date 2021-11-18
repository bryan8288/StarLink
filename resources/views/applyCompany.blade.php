@extends('layout.layoutUser')
@section('content')
<section class="section about-section gray-bg" id="background" style="min-height: 852px; height: auto">
    <div style="text-align:center; padding:10px; max-width: 60%;margin: auto;">
        <form action="{{'/applyCompany/search'}}">
            <i class="fa fa-search" style="display: inline;font-size:24px;color:white;"></i>
            <input name="keyword"
                style="margin:20px 20px 20px 20px ;display: inline;width:500px;border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;border-bottom-style: groove;background:none"
                type="text" class="no-outline">
            <button type="submit" class="btn btn-primary"
                style="font-weight:bold;font-size:14px;color: white; background-color:#E08C1F;display: inline; border:none">
                <i class="fa fa-search"> &nbsp SEARCH VACANCY</i></button>
            <br>
            <div class="row justify-content-around">
                <div class="col-md-5">
                    <label for="exampleFormControlSelect1" style="color: white;font-weight:bold;">Job Position</label><br>
                    <span>&nbsp;</span>
                    <select class="no-outline" name="jobPosition"
                        style="width: 100%; margin:auto;border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;border-bottom-style: groove;background:none"
                        id="exampleFormControlSelect1">
                        <option selected>All</option>
                        @foreach ($jobPositionList as $item)
                        <option>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="exampleFormControlSelect1" style="color: white;font-weight:bold;">Salary Range</label><br>
                    <span>&nbsp;</span>
                    <select class="no-outline" name="salary"
                        style="width: 100%; margin:auto;border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;border-bottom-style: groove;background:none"
                        id="exampleFormControlSelect1">
                        <option>All</option>
                        <option>< Rp 10.000.000</option>
                        <option>Rp 10.000.001 - Rp 20.000.000</option>
                        <option>> Rp 20.000.000</option>
                    </select>
                </div>
                <div class="col-md-4" style="margin-top: 10px">
                    <label for="exampleFormControlSelect1" style="color: white;font-weight:bold;">Type</label><br>
                    <span>&nbsp;</span>
                    <select class="no-outline" name="type"
                        style="width: 100%; margin:auto;border-top-style: hidden;border-right-style: hidden;border-left-style: hidden;border-bottom-style: groove;background:none"
                        id="exampleFormControlSelect1">
                        <option>All</option>
                        <option>WFO</option>
                        <option>WFH</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
    <div style="padding:10px;  max-width: 90%;margin: auto;">
        <div class="row justify-content-between" style="margin-top: 50px;">
            <div class="col-md-6" style="color: white;font-weight:bold">
                <h5>Information Technology (IT) - Job Vacancy</h5>
            </div>
            <br><br>
            <hr style="border-top: 5px solid #ffffff; opacity:1;width:100%; border-radius:5px">
        </div>
        @if ($countAccepted > 0)
        <div class="col-3">
            <div class="card border-0" style="height: 430px; margin-bottom:20px;">
                @if (empty($acceptedCompany[0]->profile_picture))
                <i class="fa fa-user-circle-o card-img-top" style=" font-size: 100px;"></i>
                @else
                <center>
                    <img class="" src="{{url('storage/'.$acceptedCompany[0]->profile_picture)}}"
                            style="height:100px; border-radius: 50%; border: 6px solid #218EED;margin-top:10px; width: 100px;">
                </center>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$acceptedCompany[0]->companyName}}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="text-align: left;color:red;">{{$acceptedCompany[0]->name}}</li>
                    <li class="list-group-item text-truncate" style="text-align: justify;">{{$acceptedCompany[0]->description}}</li>
                    <li class="list-group-item" style="text-align: left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>{{$acceptedCompany[0]->companyAddress}}<br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path
                                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                        </svg> {{number_format($acceptedCompany[0]->salary,2)}}
                    </li>
                    <li class="list-group-item">
                        <div class="" style="display: flex">
                            <a href="{{'/editJob/'.$acceptedCompany[0]->id}}">
                            <button type="button" class="btn btn-primary"
                                style="background:#E08C1F; border-color:#08C1F; font-weight:bold; height:50px; width:120px">SEE
                                DETAIL</button>
                            </a>
                            <button type="submit" class="btn btn-primary" disabled
                                style="font-weight:bold; margin-left: 5px; height:50px; width: 120px">ACCEPTED</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @elseif ($countCompletedCourse == 0)
            <h5>You Have to Complete Minimal One Course to Apply a Job</h5>
        @else
        <div class="row" style="display: flex">
            @foreach ($jobList as $job)
            <div class="col-3">
                <div class="card border-0" style="height: 430px; margin-bottom:20px;">
                    @if (empty($job->profile_picture))
                    <i class="fa fa-user-circle-o card-img-top" style=" font-size: 100px;"></i>
                    @else
                    <center>
                        <img class="" src="{{url('storage/'.$job->profile_picture)}}"
                                style="height:100px; border-radius: 50%; border: 6px solid #218EED;margin-top:10px; width: 100px;">
                    </center>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$job->companyName}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="text-align: left;color:red;">{{$job->name}}</li>
                        <li class="list-group-item text-truncate" style="text-align: justify;">{{$job->description}}</li>
                        <li class="list-group-item" style="text-align: left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                            </svg>{{$job->companyAddress}}<br>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path
                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg> {{number_format($job->salary,2)}}
                        </li>
                        <li class="list-group-item">
                            <div class="" style="display: flex">
                                <a href="{{'/editJob/'.$job->id}}">
                                <button type="button" class="btn btn-primary"
                                    style="background:#E08C1F; border-color:#08C1F; font-weight:bold; height:50px; width:120px">SEE
                                    DETAIL</button>
                                </a>
                                @if($job->status->count() == 0)
                                    <form action="{{'/applyCompany/'.$job->id}}" method="POST">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-primary"
                                            style="font-weight:bold; margin-left: 5px; height:50px; width: 100px">APPLY</button>
                                    </form>
                                @else
                                    <button type="submit" class="btn btn-primary" disabled
                                    style="font-weight:bold; margin-left: 5px; height:50px; width: 100px">APPLIED</button>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <p style="text-align: center; color:white; font-weight:bold">{{$countJob}} Available Vacancies</p>
            <div style="margin-top:10px; margin-left: 30px">
                {{$jobList->withQueryString()->links()}}
            </div>
            @endforeach
        </div>
        @endif
       
</section>
@endsection

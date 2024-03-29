<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<x-app-layout>
    <style>
    .outer {
        width: 1px;
        height: 100%;
        margin: auto;
        position: relative;
        overflow: hidden;
    }
    .inner {
        position: absolute;
        width:100%;
        height: 80%;
        background: grey;
        top: 10%;
        box-shadow: 0px 0px 30px 20px grey;
    }
    </style>
 
    <div class="container rounded bg-white mt-5 mb-5" style="max-width: 85%">
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-1 py-5">
                        @if($user->img_path==null)
                            @if($user->gender=="Male")
                            <img src="{{url('images/male.png')}}" style="max-width:200px;max-height: 200px;margin-top:-65px" alt="User" class="rounded-circle mt-5" width="150px">
                            @else
                            <img src="{{url('images/female.png')}}" style="max-width:200px;max-height: 200px;margin-top:-65px" alt="User" class="rounded-circle mt-5" width="150px">
                            @endif
                        @else
                            <img src="{{asset('images/user_profile_img/'.$user->img_path)}}" style="max-width:200px;max-height: 200px;margin-top:-65px" alt="User" class="rounded-circle mt-5" width="300px" height="300px">
                        @endif
                    <span class="font-weight-bold">{{$user->name}}</span>
                    <span class="text-black-50">{{$user->email}}</span>
                    <span class="text-black-50">{{$user->current_position}}</span>                    
                </div>
            </div>
            <div class="col-md-1">
                <div class="outer">
                    <div class="inner"></div>
                </div>
            </div>
            <div class="col-md-9 border-right">
                @forelse($jobs as $job)
                        <ul>
                            <div class="card">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="d-flex justify-content-center align-items-center p-2" style="height: 100%;">
                                            @if($job->img_path==null)
                                            <img src="{{url('images/jobfinderlogo.png')}}" alt="" style="max-width: 200px;max-height: 200px">
                                            @else
                                            <img class="shadow" src="{{asset('images/job_images/'.$job->img_path)}}" alt="" style="max-width: 200px;max-height: 200px">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <h2 style="font-size: 1.5rem" class="pt-6 mt-3">{{ $job->title }}</h2>
                                        <p class="pt-2"
                                           style="display: block; max-width: 98%; ">{{$job->description}}</p>
                                        <br>
                                     <p><i class='fas fa-location-arrow' style="color:#00b074; font-size: 1.3em;"></i> {{$job->city}} &nbsp;<i class="fa fa-money" style="color:#00b074" aria-hidden="true"></i> {{$job->salary}}€ <i class='far fa-calendar-alt' style="color:#00b074"></i> {{$job->created_at->diffForHumans()}} </p>
                                        <hr style="width: 90%;">
                                        @if($job->tags->count())
                                            <strong>Tags:</strong>
                                            @foreach($job->tags as $tag)
                                            <label class="badge" style="background-color: #00b074">{{ $tag->name }}</label>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-2 text-center align-self-center">
                                        <button class="px-4 py-3 text-white rounded" style="background-color: #305d4e;margin-right: 20%;" disabled>Applied</button>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                        </ul>
                    @empty
                        <p class="text-warning d-flex justify-content-center">You have not applied to any Jobs.</p>
                    @endforelse
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>

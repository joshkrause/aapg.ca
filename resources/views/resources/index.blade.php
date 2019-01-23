@extends('layouts.public')

@section('title', 'Resources')

@section('content')

    <div class="bg-light spacer feature3">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Resources to Assist Your Organization</h2>
                    <h6 class="subtitle">Our publicaly available downloads and links are here to assist your organization</h6>
                </div>
            </div>
            <!-- Row  -->
            <div class="row m-t-40">
                <!-- Column -->
                <div class="col-md-6 wrap-feature3-box">
                    <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                        <div class="card-header">
                            <h3>Commission Samples</h3>
                        </div>
                        <div class="card-body d-flex">
                            @if($samples->count())
                                <div class="align-self-center">
                                    @foreach($samples as $sample)
                                    <h5 class="font-medium"><a href="/resources/samples/{{$sample->id}}" class="linking">{{$sample->name}} <i class="ti-arrow-right"></i></a></h5>
                                    <p class="m-t-20">{{$sample->description}}</p>
                                    <hr>
                                    @endforeach
                                    <a href="/resources/samples" class="btn waves-effect waves-light btn-primary btn-sm">View All</a>
                                </div>
                            @else
                                <p class="m-t-20">Coming Soon</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 wrap-feature3-box">
                    <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                        <div class="card-header">
                            <h3>Educational Powerpoints</h3>
                        </div>
                        <div class="card-body d-flex">
                            @if($powerpoints->count())
                            <div class="align-self-center">
                                    @foreach($powerpoints as $powerpoint)
                                    <h5 class="font-medium"><a href="/resources/samples/{{$powerpoint->id}}" class="linking">{{$powerpoint->name}} <i class="ti-arrow-right"></i></a></h5>
                                    <p class="m-t-20">{{$powerpoint->description}}</p>
                                    @endforeach
                                    <hr>
                                    <a href="/resources/powerpoints" class="btn waves-effect waves-light btn-primary btn-sm">View All</a>
                                </div>
                            @else
                                <p class="m-t-20">Coming Soon</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-12 wrap-feature3-box">
                    <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                        <div class="card-header">
                            <h3>Stakeholder Links</h3>
                        </div>
                        <div class="card-body d-flex">
                            @if($links->count())
                            <div class="align-self-center">
                                    @foreach($links as $link)
                                    <h5 class="font-medium"><a href="{{$link->link}}" class="linking">{{$link->name}} <i class="ti-arrow-right"></i></a></h5>
                                    <p class="m-t-20">{{$link->description}}</p>
                                    @endforeach
                                    <hr>
                                    <a href="/resources/links" class="btn waves-effect waves-light btn-primary btn-sm">View All</a>
                                </div>
                            @else
                                <p class="m-t-20">Coming Soon</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
    </div>

@stop

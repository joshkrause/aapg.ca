@extends('layouts.public')

@section('title', 'Resources')

@section('content')

    <div class="bg-light spacer feature3">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Resources to Assist Your Organization</h2>
                    <h6 class="subtitle">Our publicly available downloads and links are here to assist your organization</h6>
                </div>
            </div>
            <!-- Row  -->
            <div class="row m-t-40">
                <!-- Column -->
                <div class="col-md-6 wrap-feature3-box">
                    <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                        <div class="card-header">
                            <h3>Best Practice Samples</h3>
                        </div>
                        <div class="card-body d-flex">
                            @if($samples->count())
                                <div class="align-self-center">
                                    @foreach($samples as $sample)
                                    <h5 class="font-medium">
                                        <a
                                            @if(! empty($sample->link))
                                                href="{{$sample->link}}" target="_NEW"
                                            @elseif(!empty($sample->file))
                                                href="{{$sample->file}}"
                                            @endif
                                            class="linking">{{$sample->name}}
                                            <i class="ti-arrow-right"></i>
                                        </a>
                                    </h5>
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
                <div class="col-md-6 wrap-feature3-box">
                        <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                            <div class="card-header">
                                <h3>Informational Items</h3>
                            </div>
                            <div class="card-body d-flex">
                                @if($information->count())
                                    <div class="align-self-center">
                                        @foreach($information as $info)
                                        <h5 class="font-medium">
                                            <a
                                            @if(! empty($info->link))
                                                href="{{$info->link}}" target="_NEW"
                                            @elseif(!empty($info->file))
                                                href="{{$info->file}}"
                                            @endif
                                            class="linking">{{$info->name}}
                                            <i class="ti-arrow-right"></i>
                                            </a>
                                        </h5>
                                        <p class="m-t-20">{{$info->description}}</p>
                                        <hr>
                                        @endforeach
                                        <a href="/resources/information" class="btn waves-effect waves-light btn-primary btn-sm">View All</a>
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
                <div class="col-md-6 wrap-feature3-box">
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

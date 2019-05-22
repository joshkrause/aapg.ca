@extends('layouts.public')

@section('title', 'Board Member Portal')

@section('content')
<div class="bg-light spacer feature3">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Board Member Resources</h2>
                </div>
            </div>
            <!-- Row  -->
            <div class="row m-t-40">
                    <!-- Column -->
                    <div class="col-md-6 wrap-feature3-box">
                        <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                            <div class="card-header">
                                <h3>Upcoming Meeting</h3>
                            </div>
                            <div class="card-body d-flex">
                                @if($resources->count())
                                    <div class="align-self-center">
                                        @foreach($resources as $resource)
                                        <h5 class="font-medium">
                                            <a
                                                @if(! empty($resource->link))
                                                    href="{{$resource->link}}" target="_NEW"
                                                @elseif(!empty($resource->file))
                                                    href="/storage/{{$resource->file}}"
                                                @endif
                                                class="linking">{{$resource->name}}
                                            </a>
                                        </h5>
                                        <p class="m-t-20">{{$resource->description}}</p>
                                        <hr>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="m-t-20">Coming Soon</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wrap-feature3-box">
                            <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                                <div class="card-header">
                                    <h3>Archive</h3>
                                </div>
                                <div class="card-body d-flex">
                                    @if($archive->count())
                                        <div class="align-self-center">
                                            @foreach($archive as $resource)
                                            <h5 class="font-medium">
                                                <a
                                                    @if(! empty($resource->link))
                                                        href="{{$resource->link}}" target="_NEW"
                                                    @elseif(!empty($resource->file))
                                                        href="/storage/{{$resource->file}}"
                                                    @endif
                                                    class="linking">{{$resource->name}}
                                                </a>
                                            </h5>
                                            <p class="m-t-20">{{$resource->description}}</p>
                                            <hr>
                                            @endforeach
                                            <a href="/portal/archive" class="btn waves-effect waves-light btn-primary btn-sm">View All</a>
                                        </div>
                                    @else
                                        <p class="m-t-20">Coming Soon</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    <!-- Column -->
                </div>
            <!-- Row  -->
        </div>
    </div>
@stop

@section('css')
    <link href="/public/css/features/features11-20.css" rel="stylesheet">
    <style>
        .wrap-feature-20 {
            margin-top: 60px;
        }

        .wrap-feature-20 [class*=col-lg-6] .card {
            overflow: hidden;
        }

        .wrap-feature-20 .linking {
            width: 100%;
            display: block;
            padding: 35px 0;
        }
    </style>

@stop

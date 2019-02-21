@extends('layouts.public')

@section('title', 'Bylaws, AGM Minutes and Police Act')

@section('content')
    <div class="bg-light spacer feature20 up">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Bylaws, AGM Minutes and Police Act</h2>
                </div>
            </div>
            <!-- Row  -->
            <div class="row wrap-feature-20">
                <!-- Column -->
                <div class="col-lg-6" data-aos="flip-left" data-aos-duration="1200">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body d-flex no-block">
                                    <div>
                                        <h5 class="font-medium">Our Bylaws</h5></div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                @if($bylaws->count() > 0)
                                <a href="{{asset($bylaws->first()->file)}}" class="text-white linking bg-success-gradiant">Download <i class="ti-arrow-right"></i></a>
                                @else
                                    Coming Soon
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-6" data-aos="flip-right" data-aos-duration="1200">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body d-flex no-block">
                                    <div>
                                        <h5 class="font-medium">Policy & Procedure Manual</h5></div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{asset($policy_manual->first()->file)}}" class="text-white linking bg-success-gradiant">Download <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->

                <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body d-flex no-block">
                                    <div>
                                        <h5 class="font-medium">AGM Minutes</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                @if($minutes->count() == 1)
                                <a href="/" class="text-white linking bg-success-gradiant">Download <i class="ti-arrow-right"></i></a>
                                @elseif($minutes->count() < 1)
                                    Coming Soon.
                                @else
                                <a href="{{asset($minutes->first()->file)}}" class="text-white linking bg-success-gradiant">Download <i class="ti-arrow-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if($police_act->count() > 0)
                @foreach($police_act as $file)
                <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body d-flex no-block">
                                    <div>
                                        <h5 class="font-medium">{{$file->name}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{asset($file->file)}}" class="text-white linking bg-success-gradiant">Download <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
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

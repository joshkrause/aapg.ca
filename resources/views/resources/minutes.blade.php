@extends('layouts.public')

@section('title', 'Strategic Goals & Business Plan')

@section('content')
    <div class="bg-light spacer feature20 up">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Strategic Goals & Business Plan</h2>
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
                                        <h5 class="font-medium">2018 - 2020 Strategic Goals</h5></div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="{{asset('files/resources/' . $goals->first()->file)}}" class="text-white linking bg-success-gradiant">Download <i class="ti-arrow-right"></i></a>
                            </div>
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
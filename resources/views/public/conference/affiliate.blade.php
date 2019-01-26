@extends('layouts.public')

@section('title', 'Affiliate Conferences')

@section('content')
    <div class="pricing4 spacer bg-light">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Affiliate Conferences</h2>
                    <h6 class="subtitle">Excellent opportunities to learn, meet and experience all our affiliate conferences have to offer.</h6>
                </div>
            </div>
            <!-- Row  -->
            <div class="row m-t-40">
                <!-- Column -->
                @foreach($conferences as $conference)
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">

                        <div class="p-30">
                            <h5 class="font-medium m-b-0">{{$conference->title}}</h5>
                            <ul class="general-listing only-li font-14 m-t-20">
                                <li><i class="fa fa-check-circle text-success"></i> Runs {{$conference->start->format('F d')}} - {{$conference->end->format('d, Y')}}</li>

                            </ul>
                            @unless(empty($conference->description))
                            {!!$conference->description!!}
                            @endunless
                            @unless(empty($conference->link))
                            <div class="d-flex m-t-30 no-block align-items-center">
                                <div class="ml-auto"><a class="btn btn-danger-gradiant btn-rounded" href="{{$conference->link}}" target="_NEW">Learn More</a></div>
                            </div>
                            @endunless
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@stop

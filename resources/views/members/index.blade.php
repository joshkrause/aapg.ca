@extends('layouts.public')

@section('title', 'Our Membership')

@section('css')
    <link href="/public/css/team/team.css" rel="stylesheet">
@stop

@section('content')
    <div class="spacer bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Our Membership</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row m-t-40">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- .row -->
                            <div class="row">
                                <div class="col-md-4 col-sm-4 p-20">
                                    <h4 class="card-title">Commission Members</h4>
                                    <ul class="list-group">
                                        @foreach($commission as $member)
                                            <li class="list-group-item">
                                                {{$member->name}}<br/>
                                                Since {{$member->joined}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-4 col-sm-4 p-20">
                                    <h4 class="card-title">Committee Members</h4>
                                    <ul class="list-group">
                                        @foreach($committee as $member)
                                            <li class="list-group-item">
                                                {{$member->name}}<br/>
                                                Since {{$member->joined}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-4 col-sm-4 p-20">
                                    <h4 class="card-title">Associate Members</h4>
                                    <ul class="list-group">
                                        @foreach($associate as $member)
                                            <li class="list-group-item">
                                                {{$member->name}}<br/>
                                                Since {{$member->joined}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="d-flex">
                <div class="display-7 align-self-center">
                    <h3 class="">Interested In Joining Alberta Association of Police Governance?</h3>
                    <h6 class="font-16 subtitle">Learn more about what we have to offer</h6>
                </div>
                <div class="ml-auto m-t-10 m-b-10">
                    <a href="/members/apply" class="btn btn-info-gradiant btn-md">Learn More</a>
                </div>
            </div>
        </div>
    </div>

@stop

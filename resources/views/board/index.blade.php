@extends('layouts.public')

@section('title', 'Board and Staff')

@section('content')
    <div class="bg-light spacer feature3">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Our Board</h2>
                    <h6 class="subtitle">Our current board and team</h6>
                </div>
            </div>
            <div class="row">
                @if($board->count())
                    <div class="card-columns">
                    @foreach($board as $b)
                        <div class="card" style="width: 20rem;">
                            @if($b->image)
                            <img class="card-img-top" src="{{asset('images/board/' . $b->image)}}" alt="{{$b->name}}">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{$b->name}}</h4>
                                <h5 class="card-title">{{$b->position}}</h5>
                                <p class="card-text">{{$b->bio}}</p>
                            </div>
                        </div>
                    @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop

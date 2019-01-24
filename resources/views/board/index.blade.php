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
                @foreach($board->chunk(3) as $group)
                    <div class="card-group">
                        @foreach($group as $b)
                            <div class="card col-md-4">
                                @if($b->image)
                                <img class="card-img-top" src="{{asset('storage/images/board/' . $b->image)}}" alt="{{$b->name}}">
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">{{$b->name}}</h4>
                                    <h5 class="card-title">{{$b->position}}</h5>
                                    <h5 class="card-title">{{$b->community}}</h5>
                                    <p class="card-text collapse" id="bio{{$b->id}}">{{$b->bio}}</p>
                                    <p><a data-toggle="collapse" href="#bio{{$b->id}}" role="button" aria-expanded="false" aria-controls="#bio{{$b->id}}">View bio &raquo;</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@stop

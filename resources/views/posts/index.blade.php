@extends('layouts.public')

@section('title', 'Hot Topics')

@section('content')
<div class="spacer">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Blog  -->
                    @foreach($posts as $post)
                    <div class="mini-spacer">
                        <ul class="text-uppercase m-t-40 list-inline font-13 font-medium">
                            <li><a href="#">{{$post->created_at->format('F d, Y')}}</a></li>
                        </ul>
                        @unless($post->image == "")
                        <a href="/communications/topics/{{$post->id}}">
                            <img src="{{ asset('images/posts/' . $post->image)}}" alt="{{$post->title}}" class="img-fluid"/>
                        </a>
                        @endunless
                        <h2 class="title font-light"><a href="/communications/topics/{{$post->id}}" class="link">{{$post->title}}</a></h2>
                        <p class="m-t-30 m-b-30">{!!str_limit($post->content, 100)!!}</p>
                        <a href="/communications/topics/{{$post->id}}" class="font-13">CONTINUE READING</a>
                    </div>
                    <!-- Blog  -->
                    <hr class="op-5" />
                    @endforeach
                    <!-- Blog  -->
                </div>
            </div>
            <!-- Row  -->
        </div>
    </div>
@stop

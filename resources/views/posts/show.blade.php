@extends('layouts.public')

@section('title', $post->title)

@section('content')
<div class="spacer">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Blog  -->
                    <div class="mini-spacer">
                        @unless($post->image == "")
                            <img src="{{ asset('images/posts/' . $post->image)}}" alt="{{$post->title}}" class="img-fluid"/>
                        @endunless
                        <ul class="text-uppercase m-t-40 list-inline font-13 font-medium">
                            <li><a href="#">{{$post->created_at->format('F d, Y')}}</a></li>
                        </ul>
                        <h2 class="title font-light"><a href="#" class="link">{{$post->title}}</a></h2>

                        <p class="m-t-30 m-b-30">{!!$post->content!!}</p>

                    </div>
                    <!-- Blog  -->

                </div>
            </div>
            <!-- Row  -->
        </div>
    </div>
@stop

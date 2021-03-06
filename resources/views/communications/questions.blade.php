@extends('layouts.public')

@section('title', 'Ask The Members')

@section('content')
<div class="bg-light spacer feature3">
    <div class="container">
        <!-- Row  -->
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="title">Ask The Members</h2>
                <h6 class="subtitle">Have a question you'd like to ask our members? You can do that here as well as browse other questions and answers.</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="card" data-aos="flip-up" data-aos-duration="1200">
                    <div class="accordion" id="accordion2">
                        @foreach($questions as $question)
                        <div class="card">
                            <div class="card-header bg-white" id="heading{{$question->id}}">
                                <h5 class="mb-0">
                                <a href="#" class="text-muted" data-toggle="collapse" data-target="#collapse{{$question->id}}" aria-expanded="false" aria-controls="collapse{{$question->id}}">
                                  {{$question->question}}
                                </a>
                              </h5>
                            </div>
                            <div id="collapse{{$question->id}}" class="collapse" aria-labelledby="heading{{$question->id}}" data-parent="#accordion2">
                                <div class="card-body">
                                    {{$question->answer}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-40">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ask A Question</h4>
                        <h6 class="card-subtitle"> Our members will review and post your question and answer.</h6>
                        <p>Personal information is not displayed with the question, it's used in answering your question if an area specific question, your name and email are only used to notify you when the question has been answered.</p>

                        <form class="form" method="POST" action="/communications/questions">
                            @csrf
                            <div class="form-group m-t-40 row">
                                <label for="name" class="col-sm-4 col-md-2 col-form-label">Your Name</label>
                                <div class="col-sm-8 col-md-10">
                                    <input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="Your Name">
                                    <small class="form-text text-muted">
                                        Name is never displayed, it is only used to notify you when an answer is posted.
                                    </small>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label for="email" class="col-sm-4 col-md-2 col-form-label">Your Email</label>
                                <div class="col-sm-8 col-md-10">
                                    <input class="form-control" type="text" value="{{old('email')}}" name="email" placeholder="Your Email">
                                    <small class="form-text text-muted">
                                        Email is never displayed, it is only used to notify you when an answer is posted.
                                    </small>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="community" class="col-sm-4 col-md-2 col-form-label">Your City / Community</label>
                                <div class="col-sm-8 col-md-10">
                                    <input class="form-control" type="text" value="{{old('community')}}" name="community" placeholder="Your Community">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="question" class="col-sm-4 col-md-2 col-form-label">Your Question</label>
                                <div class="col-sm-8 col-md-10">
                                    <textarea class="form-control" name="question" rows="10" placeholder="Your Question">{{old('question')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row text-right">
                                <button type="submit" class="btn btn-success waves-effect waves-light pull-right">Submit Question</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop

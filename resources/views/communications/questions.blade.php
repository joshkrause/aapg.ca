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
                        <div class="card">
                            <div class="card-header bg-white" id="headingFour">
                                <h5 class="mb-0">
                                <a href="#" class="text-muted" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                  Question #1
                                </a>
                              </h5>
                            </div>
                            <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion2">
                                <div class="card-body">
                                    Answer to question 1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem pariatur temporibus ab, iusto quisquam fugit veniam necessitatibus nesciunt error esse dolorem unde modi magnam dolores doloribus voluptatem ipsum aperiam doloremque?
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-white" id="headingFive">
                                <h5 class="mb-0">
                                <a href="#" class=" collapsed text-muted" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Question #2
                                </a>
                              </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion2">
                                <div class="card-body">
                                    Answer to question 2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem pariatur temporibus ab, iusto quisquam fugit veniam necessitatibus nesciunt error esse dolorem unde modi magnam dolores doloribus voluptatem ipsum aperiam doloremque?
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-white" id="headingSix">
                                <h5 class="mb-0">
                                <a href="#" class=" collapsed text-muted" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Question #3
                                </a>
                              </h5>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion2">
                                <div class="card-body">
                                    Answer to question 3. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem pariatur temporibus ab, iusto quisquam fugit veniam necessitatibus nesciunt error esse dolorem unde modi magnam dolores doloribus voluptatem ipsum aperiam doloremque?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-40">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ask A Question</h4>
                        <h6 class="card-subtitle"> Our members will review and post your question and answer. </h6>

                        <form class="form">
                            <div class="form-group m-t-40 row">
                                <label for="example-text-input" class="col-2 col-form-label">Your Name</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-2 col-form-label">Your Community</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="" placeholder="Your Community">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-2 col-form-label">Your Question</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="" placeholder="Your Question">
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

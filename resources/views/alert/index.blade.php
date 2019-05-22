@extends('layouts.public')

@section('title', 'Alert CAC')

@section('content')
<div class="spacer ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title spacer">Alert Civilian Advisory Committee</h2>
                </div>
                <div class="col-md-10 ml-auto mr-auto">
                    <p>ALERT was established by the provincial government in 2006 to bring together the province’s most sophisticated law enforcement resources to combat organized and serious crime. ALERT is funded by the provincial government, and also receives federal funding and contributed resources from municipal agencies.</p>
                    <p>Nearly 300 municipal police, RCMP, and civilian staff work together in seven communities across Alberta. These integrated teams specialize in the areas of organized crime and gangs, online child exploitation, threat assessments, criminal intelligence, and law enforcement training.</p>
                    <p>ALERT is a non-profit corporation that is governed by a Board of Directors and an appointed Chief Executive Officer. This unique designation allows ALERT to remains arm’s length from the provincial government and to leverage budgetary benefits. For instance, in the past ALERT was able to carry-over budget surplus. The flexibility afforded under this model allows ALERT to remain responsive to emerging crime trends and assist its partner agencies when the situation is warranted.</p>
                    <p>Since being formed in 2006, ALERT teams from across the province have made nearly 10,000 arrests, seized over $600 million worth of harmful drugs, and have taken 1,200 firearms out of the hands of criminals.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-light spacer feature11">
        <div class="container">
            <!-- Row  -->
            <div class="row m-t-40">
                <!-- Column -->
                <div class="card-deck">
                    <div class="card card-shadow" data-aos="fade-right" data-aos-duration="1200">
                        <div class="card-body">
                            <h5 class="font-medium">Alert CAC Members</h5>
                            <p class="m-t-20">Find out who is involved with the Civilian Advisory Committee.</p>
                            <p><a class="btn btn-success" href="/alert/members">CAC Members</a></p>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="card card-shadow" data-aos="fade-up" data-aos-duration="1200">
                        <div class="card-body">
                            <h5 class="font-medium">Alert CAC Updates</h5>
                            <p class="m-t-20">Stay on top of everything happening with the Civilian Advisory Committee.</p>
                            <p><a class="btn btn-success" href="/alert/news">CAC News</a></p>
                        </div>
                    </div>
                    <div class="card card-shadow" data-aos="fade-left" data-aos-duration="1200">
                        <div class="card-body">
                            <h5 class="font-medium">Nominate an Alert CAC Member</h5>
                            <p class="m-t-20">Do you know someone who would be a great asset to the Civilian Advisory Committee? Nominate them now!</p>
                            <p><a class="btn btn-success" href="/alert/nominate">Nomination Form</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

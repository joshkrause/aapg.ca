@extends('layouts.public')

@section('title', 'Alberta Association of Police Governance')

@section('banner')
    <div class="bg-light">
        <section id="slider-sec" class="slider1">
            <div id="slider1" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover"
                data-interval="7000">
                <ol class="carousel-indicators">
                    <li data-target="#slider1" data-slide-to="0" class="active"></li>
                    <li data-target="#slider1" data-slide-to="1"></li>
                </ol>
                <!-- Wrapper For Slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <!-- Slide Background --><img src="/public/images/slider/slide1.jpg" alt="We are Digital Agency" class="slide-image" />
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_left">
                            <h2 data-animation="animated zoomInRight" class="bg-success-gradiant title">Alberta Association of Police Governance</h2>
                            <p data-animation="animated fadeInLeft">
                                <a class="bg-white btn btn-md btn-arrow" data-toggle="collapse" href="#"> <span> Supporting excellence in civilian governance </span> </a>
                            </p>
                        </div>
                    </div>
                    <!-- End of Slide -->
                    
                    <!-- End of Wrapper For Slides -->
                    <!-- Slider Control -->
                    <div class="slider-control hide">
                        <!-- Left Control -->
                        <a class="left carousel-control-prev" href="#slider1" role="button" data-slide="prev"> <span class="fa fa-angle-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                        <!-- Right Control -->
                        <a class="right carousel-control-next" href="#slider1" role="button" data-slide="next"> <span class="fa fa-angle-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                    </div>
                    <!-- End of Slider Control -->
                </div>
            </div>
            <!-- End Slider -->
        </section>
    </div>
@stop

@section('content')
    <div class="spacer feature43">
        <div class="container">
            <div class="row">
                <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1200">
                    <h3 class="title">2019 Annual AAPG Conference</h3>
                    <h6 class="subtitle">Our 2019 Annual Conference was in Medicine Hat, AB over April 5 & 6.  We had an incredible two days of learning and discussion, as well as some unique activities in the evenings.</h6> 
                </div>
                <div class="col-lg-6 ml-auto">
                    <h3 class="title">What Is The Alberta Association of Police Governance?</h3>
                    <p>The AAPG supports excellence in civilian governance and oversight of police services in Alberta.  Through the AAPG, members have access to educational opportunities, best practices, and forums for liaison with related agencies.  The AAPG is well positioned to advocate for effective police governance and oversight that is responsive to our changing environment.  In that regard, the AAPG provides input and feedback on potential changes to relevant legislation and policies.
                    </p>
                </div>
            </div>
        </div>
    </div>
{{--
    <div class="spacer feature2 bg-light">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">AAPG Resources</h2>
                    <h6 class="subtitle">Our member portal has many resources available to all members.</h6>
                </div>
            </div>
            <!-- Row  -->
            <div class="row m-t-40">
                <!-- Column -->
                <div class="col-md-4 wrap-feature2-box">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <img class="card-img-top" src="/public/images/ser2.jpg" alt="Resources" />
                        <div class="card-body text-center">
                            <h5 class="font-medium">Educational Powerpoints</h5>
                            <p class="m-t-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptatum nulla, saepe alias unde quod reiciendis vero deleniti.</p>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-4 wrap-feature2-box">
                    <div class="card card-shadow" data-aos="flip-up" data-aos-duration="1200">
                        <img class="card-img-top" src="/public/images/ser2.jpg" alt="Resources" />
                        <div class="card-body text-center">
                            <h5 class="font-medium">Policy And Processes</h5>
                            <p class="m-t-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptatum nulla, saepe alias unde quod reiciendis vero deleniti.</p>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-4 wrap-feature2-box">
                    <div class="card card-shadow" data-aos="flip-right" data-aos-duration="1200">
                        <img class="card-img-top" src="/public/images/ser2.jpg" alt="Resources" />
                        <div class="card-body text-center">
                            <h5 class="font-medium">Stakeholder Links</h5>
                            <p class="m-t-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptatum nulla, saepe alias unde quod reiciendis vero deleniti.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mini-spacer bg-info text-white c2a7">
        <div class="container">
            <div class="d-flex">
                <div class="display-7 align-self-center">Interesting in joining the Alberta Association of Police Governance?</div>
                <div class="ml-auto m-t-10 m-b-10">
                    <button class="btn btn-outline-light btn-md">Join Now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="spacer feature2 bg-light">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="title">Our Board Members</h2>
                    <h6 class="subtitle">We have an incredible group ensuring your law enforcement team has what it needs.</h6>
                </div>
            </div>
            <!-- Row  -->
            <div class="row m-t-40">
                <!-- Column -->
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/Greg-Keen.jpg')}}" alt="Greg Keen" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">Greg Keen</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/Al-Bohachyk.jpg')}}" alt="Al Bohachyk" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">Al Bohachyk</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/John-Liu.jpg')}}" alt="John Liu" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">John Liu</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/John-McDougall.jpg')}}" alt="John McDougall" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">John McDougall</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/Mark-Schneider.jpg')}}" alt="Mark Schneider" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">Mark Schneider</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/Nick-Servos.jpg')}}" alt="Nick Servos" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">Nick Servos</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/Perry-Brooks.jpg')}}" alt="Perry Brooks" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">Perry Brooks</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/Terry-Coleman.jpg')}}" alt="Terry Coleman" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">Terry Coleman</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                        <a href="#" class="img-ho"><img class="card-img-top" src="{{asset('storage/images/board/Victoria-Chester.jpg')}}" alt="Victoria Chester" /></a>
                        <div class="card-body">
                            <h5 class="font-medium m-b-0">Victoria Chester</h5>
                            <p class="m-b-0 font-14">Member Position</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="counter-box mini-spacer">
        <div class="container">
            <div class="row">
                <!-- column  -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex no-block">
                        <div class="display-5"><i class="text-success-gradiant icon-Eyeglasses-Smiley"></i></div>
                        <div class="m-l-20">
                            <h1 class="font-bold counter m-b-0">5000</h1>
                            <h6 class="text-muted font-13 text-uppercase">Happy Members</h6>
                        </div>
                    </div>
                </div>
                <!-- column  -->
                <!-- column  -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex no-block">
                        <div class="display-5"><i class="text-success-gradiant icon-Eyeglasses-Smiley"></i></div>
                        <div class="m-l-20">
                            <h1 class="font-bold counter m-b-0">15</h1>
                            <h6 class="text-muted font-13 text-uppercase">Alberta Communities</h6>
                        </div>
                    </div>
                </div>
                <!-- column  -->
                <!-- column  -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex no-block">
                        <div class="display-5"><i class="text-success-gradiant icon-Eyeglasses-Smiley"></i></div>
                        <div class="m-l-20">
                            <h1 class="font-bold counter m-b-0">9</h1>
                            <h6 class="text-muted font-13 text-uppercase">Dedicated staff</h6>
                        </div>
                    </div>
                </div>
                <!-- column  -->
                <!-- column  -->
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex no-block">
                        <div class="display-5"><i class="text-success-gradiant icon-Eyeglasses-Smiley"></i></div>
                        <div class="m-l-20">
                            <h1 class="font-bold counter m-b-0">20</h1>
                            <h6 class="text-muted font-13 text-uppercase">Years In Business</h6>
                        </div>
                    </div>
                </div>
                <!-- column  -->
            </div>
        </div>
    </div>

    <div class="testimonial9 spacer bg-success-gradiant">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 text-white col-md-6">
                    <h2 class="m-t-40 text-white ">What Our Members Say</h2>
                    <span class="devider bg-white"></span>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia numquam placeat veniam voluptatem soluta deserunt perspiciatis neque. Ad suscipit adipisci ea sunt laudantium? Nesciunt, veniam? Autem natus sequi repellat harum.</p>
                </div>
                <div class="col-lg-6 col-md-6 ml-auto">
                    <div class="owl-carousel owl-theme testi9">
                        <!-- item -->
                        <div class="item">
                            <div class="card card-shadow">
                                <div class="p-40">
                                    <h5 class="text">Testimonial 1<br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem et eligendi consequatur numquam natus quod veniam voluptas, quisquam quo rem? Amet vitae debitis, pariatur ipsa architecto voluptate obcaecati adipisci voluptatem.</h5>
                                </div>
                            </div>
                            <div class="d-flex no-block align-items-center">
                                <div class="customer-thumb"><img src="/public/images/1.jpg" alt="wrapkit" class="circle" /></div>
                                <div class="">
                                    <h6 class="font-bold m-b-0 text-white">Member Name</h6><span class="font-13 text-white">Enforcement Department</span></div>
                            </div>
                        </div>
                        <!-- item -->
                        <!-- item -->
                        <div class="item">
                            <div class="card card-shadow">
                                <div class="p-40">
                                    <h5 class="text">Testimonial 2<br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem et eligendi consequatur numquam natus quod veniam voluptas, quisquam quo rem? Amet vitae debitis, pariatur ipsa architecto voluptate obcaecati adipisci voluptatem.</h5>
                                </div>
                            </div>
                            <div class="d-flex no-block align-items-center">
                                <div class="customer-thumb"><img src="/public/images/1.jpg" alt="wrapkit" class="circle" /></div>
                                <div class="">
                                    <h6 class="font-bold m-b-0 text-white">Member Name</h6><span class="font-13 text-white">Enforcement Department</span></div>
                            </div>
                        </div>
                        <!-- item -->
                        <!-- item -->
                        <div class="item">
                            <div class="card card-shadow">
                                <div class="p-40">
                                    <h5 class="text">Testimonial 3<br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem et eligendi consequatur numquam natus quod veniam voluptas, quisquam quo rem? Amet vitae debitis, pariatur ipsa architecto voluptate obcaecati adipisci voluptatem.</h5>
                                </div>
                            </div>
                            <div class="d-flex no-block align-items-center">
                                <div class="customer-thumb"><img src="/public/images/1.jpg" alt="wrapkit" class="circle" /></div>
                                <div class="">
                                    <h6 class="font-bold m-b-0 text-white">Member Name</h6><span class="font-13 text-white">Enforcement Department</span></div>
                            </div>
                        </div>
                        <!-- item -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-home1 spacer bg-light">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <!-- Column -->
                <div class="col-md-8 text-center">
                    <h2 class="title">Our Latest Resources</h2>
                    <h6 class="subtitle">We are constantly adding new resources to our member portal. Here's a few of our latest additions.</h6>
                </div>
                <!-- Column -->
                <!-- Column -->
            </div>
            <div class="row m-t-40">
                <!-- Column -->
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-right" data-aos-duration="1200">
                        <a href="#"><img class="card-img-top" src="/public/images/blog/img1.jpg" alt="wrappixel kit"></a>
                        <div class="p-30">
                            <div class="d-flex no-block font-14">
                                <a href="#">Category name</a>
                                <span class="ml-auto">Oct 18, 2018</span>
                            </div>
                            <h5 class="font-medium m-t-20"><a href="#" class="link">Resource Name or File Name</a></h5>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-right" data-aos-duration="1200">
                        <a href="#"><img class="card-img-top" src="/public/images/blog/img1.jpg" alt="wrappixel kit"></a>
                        <div class="p-30">
                            <div class="d-flex no-block font-14">
                                <a href="#">Category name</a>
                                <span class="ml-auto">Oct 18, 2018</span>
                            </div>
                            <h5 class="font-medium m-t-20"><a href="#" class="link">Resource Name or File Name</a></h5>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-4">
                    <div class="card card-shadow" data-aos="flip-right" data-aos-duration="1200">
                        <a href="#"><img class="card-img-top" src="/public/images/blog/img1.jpg" alt="wrappixel kit"></a>
                        <div class="p-30">
                            <div class="d-flex no-block font-14">
                                <a href="#">Category name</a>
                                <span class="ml-auto">Oct 18, 2018</span>
                            </div>
                            <h5 class="font-medium m-t-20"><a href="#" class="link">Resource Name or File Name</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@stop

@section('js')
<script type="text/javascript">
    // This is for header toggle
$('.op-clo').on('click', function() {
    $('body .h7-nav-box').toggleClass("show");
});
// This is for slider
$('#slider1').bsTouchSlider();
$(".carousel .carousel-inner").swipe({
    swipeLeft: function(event, direction, distance, duration, fingerCount) {
        this.parent().carousel('next');
    },
    swipeRight: function() {
        this.parent().carousel('prev');
    },
    threshold: 0
});
// This is for counter
$('.counter').counterUp({
    delay: 10,
    time: 1000
});
// This is for the testimonial
$('.testi9').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: true,
    autoplay: true,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1

        },
        1650: {
            items: 1
        }
    }
})
</script>
@stop

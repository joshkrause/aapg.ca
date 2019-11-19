<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Metas -->
      <meta charset="utf-8">
      <title>{{$conference->title}}</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Css -->
      <link href="/conference/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="/conference/css/base.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="/conference/css/main.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="/conference/css/flexslider.css" rel="stylesheet" type="text/css"  media="all" />
      <link href="/conference/css/venobox.css" rel="stylesheet" type="text/css"  media="all" />
	  <link href="/conference/css/fonts.css" rel="stylesheet" type="text/css"  media="all" />
	  <link href="/conference/css/builder.css" rel="stylesheet" type="text/css" media="all" />
      <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,700" rel="stylesheet">
      <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
      <script src="https://js.stripe.com/v3/"></script>
   </head>
   <body>
      <!-- Preloader -->
      <div class="loader">
         <!-- Preloader inner -->
         <div class="loader-inner">
            <svg width="120" height="220" viewbox="0 0 100 100" class="loading-spinner" version="1.1" xmlns="http://www.w3.org/2000/svg">
               <circle class="spinner" cx="50" cy="50" r="21" fill="#111111" stroke-width="1.5"/>
            </svg>
         </div>
         <!-- End preloader inner -->
      </div>
      <!-- End preloader-->
      <!--Wrapper-->
      <div class="wrapper">
         <!--Hero section-->
         <section class="hero overlay">
            <!--Main slider-->
            <div class="main-slider slider">
               <ul class="slides">
                  <li>
                     <div class="background-img">
                        <img src="/conference/img/1.jpg" alt="">
                     </div>
                  </li>
               </ul>
            </div>
            <!--End main slider-->
            <!--Header-->
            <header class="header">
               <!--Container-->
               <div class="container ">
                  <!--Row-->
                  <div class="row">
                     <div class="col-md-2">
                        <a class="scroll logo" href="/">
                            <img src="/public/images/logos/nav-logo.png" alt="AAPG"/>
                        </a>
                     </div>
                     <div class="col-md-10 text-right">
                        <nav class="main-nav">
                           <div class="toggle-mobile-but">
                              <a href="#" class="mobile-but" >
                                 <div class="lines"></div>
                              </a>
                           </div>
                           <ul>
                              <li><a class="scroll" href="/">Home</a></li>
                              <li><a class="scroll" href="#schedule">Schedule</a></li>
                              <li><a class="scroll" href="#tickets">Tickets</a></li>
                              <li><a class="scroll" href="#location">Contact</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <!--End row-->
               </div>
               <!--End container-->
            </header>
            <!--End header-->
            <!--Inner hero-->
            <div class="inner-hero fade-out">
               <!--Container-->
               <div class="container hero-content">
                  <!--Row-->
                  <div class="row">
                     <div class="col-sm-12 text-center">
                        <h3 class="mb-10">AAPG</h3>
                        <h1 class="large mb-10">{{$conference->title}}</h1>
                        <a href="#tickets" class="but scroll "> Register Now</a>
                     </div>
                  </div>
                  <!--End row-->
               </div>
               <!--End container-->
            </div>
            <!--End inner hero-->
         </section>
		 <!--End hero section-->
		 <section>
			<div class="container builder">
				@yield('content')
			</div>
		</section>

		<!--Tickest section-->
		<section id="tickets" class="tickets pt-120 pb-120">
			<!--Container-->
			<div class="container">
				<!--Row-->
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 mb-130 text-center">
						<h1 class="title">Conference Tickets</h1>
						@if($conference->options->registration_start <= Carbon\Carbon::now() && $conference->options->registration_end >= Carbon\Carbon::now())
							@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now() && $conference->options->early_bird_registration_end >=
							Carbon\Carbon::now())
							<p class="title-lead mt-10">Early Bird Tickets on sale until {{$conference->options->early_bird_registration_end->format('F d, Y')}}! <br> Grab them now before the price goes up
							@else
								<p class="title-lead mt-10">Tickets on sale until {{$conference->options->registration_end->format('F d, Y')}}! <br> Grab them now
							@endif

						@elseif($conference->options->registration_start <= Carbon\Carbon::now())
						<p class="title-lead mt-10">Tickets go on sale {{$conference->options->registration_start->format('F d, Y')}}!
						@else
						<p class="title-lead mt-10">Tickets are no longer available for purchase! <br> Thanks for your support!
						@endif
						</p>
					</div>
				</div>
				<!--End row-->
			</div>
			<!--End container-->
			<!--Container-->
			<div class="container">
				<!--Row-->
				<div class="row vertical-align tickets">
					<div class="col-sm-4 ">
						<h3 class="sub-title-0  mb-20"><span class="gradient-text">Member groups save $100 every 4th ticket.
							</span><br>
							<span class="gradient-text">Discount Applied automatically.</span>
						</h3>
						<div class="review-slider flexslider">
							<ul class="slides">

								<li>
									<blockquote>Buy 3 member tickets, and save $100 on the fourth ticket! Discount is applied
										automatically.</blockquote>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-8 ">
						<div class="col-sm-4">
							<ul class="block-tickets ">
								<li>
									<ul class="block-ticket active">
										<li class="block-price"><span class="price"><span class="cur">$</span>
											@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now() && $conference->options->early_bird_registration_end >=Carbon\Carbon::now())
												@php
													$price = explode('.', number_format($conference->options->early_bird_member_ticket_price/100, 2));
												@endphp
													{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@elseif($conference->options->registration_start <= Carbon\Carbon::now() && $conference->options->registration_end >=Carbon\Carbon::now())
												@php
													$price = explode('.', number_format($conference->options->regular_member_ticket_price/100, 2));
												@endphp
													{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@endif
											</span><span
												class="block-type">Member Single Ticket</span></li>
										<li>Full Conference Access</li>
										<li>Gala Dinner</li>
										<li>All Sessions</li>
										@if($conference->options->registration_start <= Carbon\Carbon::now() && $conference->options->registration_end >=
											Carbon\Carbon::now())
											<li><a href="#register-modal" class="but mt-30 register-modal" data-vbtype="inline" title="Purchase Tickets"> Buy Ticket Now</a></li>
										@endif
									</ul>
								</li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul class="block-tickets ">
								<li>
									<ul class="block-ticket">
										<li class="block-price"><span class="price"><span class="cur">$</span>
											@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now() && $conference->options->early_bird_registration_end >=Carbon\Carbon::now())
												@php
													$price = explode('.', number_format($conference->options->early_bird_member_ticket_price/100, 2));
												@endphp
													{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@elseif($conference->options->registration_start <= Carbon\Carbon::now() && $conference->options->registration_end >=Carbon\Carbon::now())
												@php
													$price = explode('.', number_format($conference->options->regular_member_ticket_price/100, 2));
												@endphp
													{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@endif

											</span><span
												class="block-type">New Member Ticket</span></li>
										<li>Full Conference Access</li>
										<li>Gala Dinner</li>
										<li>All Sessions</li>
										@if($conference->options->registration_start <= Carbon\Carbon::now() && $conference->options->registration_end >=
											Carbon\Carbon::now())
											<li><a href="#register-modal" class="but mt-30 register-modal" data-vbtype="inline" title="Purchase Tickets"> Buy Ticket Now</a></li>
										@endif
									</ul>
								</li>
							</ul>
						</div>
						<div class="col-sm-4">
							<ul class="block-tickets ">
								<li>
									<ul class="block-ticket">
										<li class="block-price"><span class="price"><span class="cur">$</span>
											@if($conference->options->early_bird_registration_start <= Carbon\Carbon::now() && $conference->options->early_bird_registration_end >=Carbon\Carbon::now())
												@php
													$price = explode('.', number_format($conference->options->early_bird_non_member_ticket_price/100, 2));
												@endphp
													{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@elseif($conference->options->registration_start <= Carbon\Carbon::now() && $conference->options->registration_end >=Carbon\Carbon::now())
												@php
													$price = explode('.', number_format($conference->options->regular_non_member_ticket_price/100, 2));
												@endphp
													{{ $price[0] }}<span style="font-size:12px">.{{$price[1]}}</span>
											@endif

											</span><span
												class="block-type">Non Member Ticket</span></li>
										<li>Full Conference Access</li>
										<li>Gala Dinner</li>
										<li>All Sessions</li>
										@if($conference->options->registration_start <= Carbon\Carbon::now() && $conference->options->registration_end >=
											Carbon\Carbon::now())
											<li><a href="#register-modal" class="but mt-30 register-modal" data-vbtype="inline" title="Purchase Tickets"> Buy Ticket Now</a></li>
										@endif
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--End row-->
			</div>
			<!--End container-->
		</section>
		<!--End tickets section-->

         <footer class=" bg-dark">


            <div class="bottom-footer bg-black pt-50 pb-50">
               <!--Container-->
               <div class="container ">
                  <div class="row">
                     <div class="col-md-6">
                        <p>	&copy; {{now()->format('Y')}} all rights reserved - website by <a href="https://tride.ca" target="_NEW">Tride Media</a></p>
                     </div>
                     <div class="col-md-6 ">
                        <ul class="block-legal">
                           <li><a href="/">Home</a>
                           <li><span><a class="gradient-text scroll" href="#wrapper">Back To Top</a></span></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!--End container-->
            </div>
         </footer>
      </div>
      <div id="register-modal">

                   <form class="registry-form form" id="checkout-form" method="post" action="/conferences" autocomplete="off"
                   {{-- onSubmit="process(event);" --}}
                   >
                    @csrf
                        <h2 class="sub-title-1 mb-30">Register For The AAPG Annual Conference 2019</h2>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <input placeholder="Your Name" value="" id="name" name="name" type="text" required >
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <input placeholder="Your Email" value="" id="email" name="email" type="text" required>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <input placeholder="Phone number" value="" id="phone" name="phone" type="text">
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <input placeholder="Community" value="" id="company" name="company" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="block-select">
                                    <select required name="ticket">
                                        <option value="">Choose Ticket Type</option>
                                        <option value="275">Member Ticket ( $275 )</option>
                                        <option value="200">NEW Member Ticket ( $200 )</option>
                                        <option value="350">Non Member Ticket ( $350 )</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <input placeholder="# of Conference Tickets" value="" id="quantity" name="quantity" type="text">
                            </div>
                            <div class="col-md-6">
                                <input placeholder="Names of Registrants" value="" id="member_names" name="member_names" type="text">
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <input placeholder="Number of Guest Tickets" value="" id="guest" name="guest" type="text">
                            </div>
                            <div class="col-md-6">
                                    <input placeholder="Names of Guests" value="" id="guests_names" name="guests_names" type="text">
                                </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="block-select">
                                    <select required name="payment">
                                        <option value="cc">Pay Now Via Credit Card</option>
                                        <option value="cheque">Pay Via Invoice</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                    <input placeholder="Credit Card Number" value="" id="cc" name="cc" type="text">
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <input placeholder="Expiry Month MM" value="" id="month" name="month" type="text">
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <input placeholder="Expiry Year YY" value="" id="year" name="year" type="text">
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <input placeholder="Security Code" value="" id="security" name="security" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <button class="but submit" type="submit">Purchase</button>
                            </div>
                            <div class="col-sm-12">
                                <p>* All credit card transactions are encrypted and processed securly through Stripe.com</p>
                                <p>* Guest Tickets are for the Gala Dinner only and cost $75. One guest ticket per full conference ticket.</p>
                            </div>
                        </div>
                   </form>

      </div>
      <!-- End wrapper-->
      <!--Javascript-->
      <script src="/conference/js/jquery-1.12.4.min.js" type="text/javascript"></script>
      <script src="/conference/js/jquery.flexslider-min.js" type="text/javascript"></script>
      <script src="/conference/js/jquery.countdown.min.js" type="text/javascript"></script>
      <script src="/conference/js/smooth-scroll.js" type="text/javascript"></script>
      <script src="/conference/js/venobox.min.js" type="text/javascript"></script>
      <script src="/conference/js/script.js" type="text/javascript"></script>
      <script src="/conference/js/sweetalert2.all.min.js" type="text/javascript"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initializeMap"></script>
      @include('sweet::alert')

      <!-- Google analytics -->
      <!-- End google analytics -->
   </body>
</html>

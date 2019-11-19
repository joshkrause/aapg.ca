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

		@yield('registration')

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
	  @yield('js')
      <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initializeMap"></script>
      @include('sweet::alert')

      <!-- Google analytics -->
      <!-- End google analytics -->
   </body>
</html>

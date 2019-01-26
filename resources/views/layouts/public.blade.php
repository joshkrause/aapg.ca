<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="16x16" href="/public/images/favicon.png">
    <title>@yield('title') - AAPG</title>

    <link href="/public/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="/public/node_modules/aos/dist/aos.css" rel="stylesheet">
    <link href="/public/node_modules/prism/prism.css" rel="stylesheet">
    <link href="/public/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" >

    <link href="/public/node_modules/bootstrap-touch-slider/bootstrap-touch-slider.css" rel="stylesheet">
    <link href="/public/node_modules/owl.carousel/dist/assets/owl.theme.green.css" rel="stylesheet">
    {{-- <link href="/public/node_modules/sweetalert2/css/sweetalert2.all.min.css" rel="stylesheet"> --}}

    <link href="/public/css/demo.css" rel="stylesheet">

    <link href="/public/css/style.css" rel="stylesheet">
    <link href="/public/css/yourstyle.css" rel="stylesheet">
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">AAPG</p>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="topbar">
            <div class="header7">
                <div class="container po-relative">
                    @include('public.partials.nav')
                </div>
            </div>
        </div>

        <div class="page-wrapper">

            <div class="container-fluid">

                @yield('banner')

                @yield('content')

            </div>

            @include('public.partials.footer')

            <a class="bt-top btn btn-circle btn-lg btn-info" href="#top"><i class="ti-arrow-up"></i></a>
        </div>

    </div>

    <script src="/public//node_modules/jquery/dist/jquery.min.js"></script>

    <script src="/public//node_modules/popper/dist/popper.min.js"></script>
    <script src="/public//node_modules/bootstrap/js/bootstrap.min.js"></script>

    <script src="/public//node_modules/aos/dist/aos.js"></script>

    <script src="/public/js/custom.min.js"></script>

    <script src="/public/js/jquery.touchSwipe.min.js"></script>
    <script src="/public/js/jquery.waypoints.min.js"></script>
    <script src="/public/js/jquery.counterup.min.js"></script>
    <script src="/public//node_modules/bootstrap-touch-slider/bootstrap-touch-slider.js"></script>
    <script src="/public//node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/public/js/sweetalert.min.js" type="text/javascript"></script>
    @include('sweet::alert')
    @yield('js')
</body>

</html>

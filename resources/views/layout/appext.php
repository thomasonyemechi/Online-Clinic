<html lang="en">

<head>
    <title> {{ env('APP_NAME') }} @yield('page_title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="myonlineclinic stomatologist, dental clinic, medical booking,
      clinic, surgery clinic, plastic surgery" />
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.png" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/themify/themify-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animsition/css/animsition.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/lightbox2/css/lightbox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/alert.css') }}" />
</head>

<body class="animsition">

    @include('layout.inc.header')
    @include('layout.inc.sidebar')
    @include('layout.inc.alert')



    @yield('page_content')
    
    @include('layout.inc.footer')

    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <div id="dropDownSelect1"></div>
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG" /></div>
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--End of Tawk.to Script-->
    <script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/slick-custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/parallax100/parallax100.js') }}"></script>
    <script type="text/javascript">
        $('.parallax100').parallax100();
    </script>
    <script type="text/javascript" src="{{ asset('assets/vendor/countdowntime/countdowntime.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/lightbox2/js/lightbox.min.js') }}"></script>
    <script src="assets/js/main.js"></script>

    <script>
        $(function () {
            $('.alert').delay(5000).fadeOut(400);
        })
    </script>
    
</body>

</html>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}">
    <title>Register</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" />
</head>

<body>
    @include('layout.inc.alert')
    <div class="page-wrapper">
        <div class="content-wrapper">
            <section class="Login-wrap pb-75">
                <div class="container">
                    <div class="row gx-5">
                        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                            <div class="login-form-wrap">
                                <div class="login-header">
                                    <h3>Register</h3>
                                </div>
                                <form class="login-form" method="POST" action="/register">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="name" type="text"
                                                    placeholder="Full Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="phone" type="text"
                                                    placeholder="Phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="email" type="email"
                                                    placeholder="Email Address" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="password" placeholder="Password"
                                                    type="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12 mb-20">
                                            <div class="checkbox style3">
                                                <input type="checkbox" id="test_1" required>
                                                <label for="test_1">
                                                    I Agree with the <a class="link style1" href="#">Terms &amp;
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button class="btn style1 w-100 d-block">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="mb-0">Already have an Account? <a class="link style1"
                                                    href="/login">Log In</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/tweenmax.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(function () {
            $('.alert').delay(5000).fadeOut(400);
        })
    </script>
</body>

</html>

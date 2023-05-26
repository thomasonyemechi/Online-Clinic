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
    <title>Forgot Password</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" />
</head>

<body>
    <div class="page-wrapper">
        <div class="content-wrapper">
            <section class="Login-wrap  pb-75">
                <div class="container">
                    <div class="row gx-5">
                        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                            <div class="login-form-wrap">
                                <div class="login-header">
                                    <h3>Recover Password</h3>
                                </div>
                                <form class="login-form" method="post" action="/password_reset">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="email" type="email" placeholder="Email Address"
                                                    required>
                                            </div>

                                            <p class="alt_error">
                                                @if (session('success'))
                                                    <div class="alert alert-success"><i><b>{!! session('success') !!}</b></i></div>
                                                @endif
                                                @if (session('error'))
                                                    <div class="alert alert-danger"><i><b>{!! session('error') !!}</b></i></div>
                                                @endif

                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        @foreach ($errors->all() as $err)
                                                            <i><b>{{ $err }}</b></i> <br>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button class="btn style1 w-100 d-block">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="mb-0">Don't have an Account? <a class="link style1"
                                                    href="/register">Create One</a></p>
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
        $(function() {
            $('.alert').delay(5000).fadeOut(400);
        })


        $(function() {
            $('.login').on('submit', function(e) {
                e.preventDefault();
                email = $(this).find('input[name=email]');

                btn = $(this).find('button');


                console.log(email.val(), btn);


                $.ajax({
                    method: 'post',
                    url: '/password_reset',
                    data: {
                        email: email
                    },
                    beforeSend: () => {
                        btn.attr('disabled', 'disabled');
                        btn.html('Sending request ...');
                        console.log('veververv');

                    }
                }).done(function(res) {
                    console.log(res);
                }).fail(function(res) {
                    console.log(res);
                })
            })
        })
    </script>
</body>

</html>

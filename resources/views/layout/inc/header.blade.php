<header class="header-wrap style1">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="header-top-left">
                        <ul class="contact-info list-style">
                            <li>
                                <span><i class="ri-customer-service-fill"></i></span>
                                <p>Your Trusted Service Provider</p>
                            </li>
                            <li>
                                <span><i class="ri-phone-fill"></i></span>
                                <a href="tel:{{ env('PHONE_2') }}"> {{ env('PHONE_2') }} </a>
                            </li>
                            <li>
                                <span><i class="ri-map-pin-fill"></i></span>
                                <p>{{ env('LOCATION') }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header-top-right">
                        <div class="select-lang">
                            <i class="ri-earth-fill"></i>
                            <div class="navbar-option-item navbar-language dropdown language-option">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="lang-name"></span>
                                </button>
                                <div class="dropdown-menu language-dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/img/uk.png" alt="flag">
                                        Eng
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/img/china.png" alt="flag">
                                        简体中文
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/img/uae.png" alt="flag">
                                        العربيّة
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="social-profile list-style style1">
                            <li>
                                <a href="https://facebook.com/">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://pinterest.com/">
                                    <i class="ri-pinterest-line"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img class="logo-light"  src="{{ asset('assets/img/logo-dark.png') }}" alt="logo" style="width: 226px" >
                    <img class="logo-dark" src="{{ asset('assets/img/logo.png') }}" alt="logo" style="width: 226px">
                </a>
                <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                    <div class="menu-close d-lg-none">
                        <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/about" class="nav-link">
                                About
                            </a>
                        </li>
                        @if (!auth()->user())
                            <li class="nav-item">
                                <a href="/appointment" class="nav-link">
                                    Book Appointment
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="/contact" class="nav-link">Contact</a>
                        </li>
                        @if (auth()->user())
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">
                                    <b>{{ ucfirst(auth()->user()->name) }}</b>
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="/dashboard" class="nav-link">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/logout" class="nav-link">Log Out</a>
                                    </li>
                                    @if (auth()->user()->id == 1)
                                        <li class="nav-item bg-blue ">
                                            <a href="/admin/dashboard" class="nav-link text-white">Administrator</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a href="/appointment" class="nav-link btn style1">Book Appointment</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Log In</a>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a href="/register" class="nav-link btn style1">Get Started</a>
                            </li>
                        @endif

                    </ul>
                    @if (auth()->user())
                        <div class="other-options md-none">
                            <div class="option-item">
                                <a href="/appointment" class="btn btn-sm btn-outline-cyan style1">Book Appointment</a>
                            </div>
                        </div>
                    @else
                        <div class="other-options md-none">
                            <div class="option-item">
                                <a href="/register" class="btn btn-sm btn-outline-cyan style1">Get Started</a>
                            </div>
                        </div>
                    @endif

                </div>
            </nav>


            <div class="mobile-bar-wrap">
                <button class="searchbtn d-lg-none"><i class="ri-search-line"></i></button>
                <div class="mobile-menu d-lg-none">
                    <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>

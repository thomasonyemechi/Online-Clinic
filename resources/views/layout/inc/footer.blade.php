<footer class="footer-wrap">
    <div class="container">
        <div class="row pt-100 pb-75">
            <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12">
                <div class="footer-widget">
                    <a href="/" class="footer-logo">
                        <img src="{{ asset('assets/img/logo.png') }}" style="width: 226px" alt="Image">
                    </a>
                    <p class="comp-desc">
                        We are an online health care provider that puts Africans at the heart of everything we do.
                    </p>
                    <ul class="social-profile style1 list-style">
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
                            <a href="https://instagram.com/">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://linkedin.com/">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">Company</h3>
                    <ul class="footer-menu list-style">
                        <li>
                            <a href="/">
                                <i class="ri-arrow-right-s-line"></i>
                               Home
                            </a>
                        </li>
                        <li>
                            <a href="/about">
                                <i class="ri-arrow-right-s-line"></i>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ri-arrow-right-s-line"></i>
                              Our Services
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ri-arrow-right-s-line"></i>
                                Our Team
                            </a>
                        </li>
                        <li>
                            <a href="/contact">
                                <i class="ri-arrow-right-s-line"></i>
                               Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">Important</h3>
                    <ul class="footer-menu list-style">
                        <li>
                            <a href="#">
                                <i class="ri-arrow-right-s-line"></i>
                               Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="/appointment">
                                <i class="ri-arrow-right-s-line"></i>
                              Appointment
                            </a>
                        </li>
                        <li>
                            <a href="/faq">
                                <i class="ri-arrow-right-s-line"></i>
                                FAQ 
                            </a>
                        </li>
                        <li>
                            <a href="/privacy-policy">
                                <i class="ri-arrow-right-s-line"></i>
                                Privacy Policy
                            </a>
                        </li>
                        <li>
                            <a href="/terms-of-service">
                                <i class="ri-arrow-right-s-line"></i>
                                Terms &amp; Conditions
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-5 col-md-6 col-sm-6 pe-xl-4">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">Quick Link</h3>
                    <ul class="footer-menu list-style">
                        <li>
                            <a href="/about#why_choose_us">
                                <i class="ri-arrow-right-s-line"></i>
                               Why Choose Us
                            </a>
                        </li>
                        <li>
                            <a href="/about#pricing">
                                <i class="ri-arrow-right-s-line"></i>
                                Pricing Plan
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ri-arrow-right-s-line"></i>
                               News &amp; Articles
                            </a>
                        </li>
                        <li>
                            <a href="/login">
                                <i class="ri-arrow-right-s-line"></i>
                               Login
                            </a>
                        </li>
                        <li>
                            <a href="/contact#newsletter">
                                <i class="ri-arrow-right-s-line"></i>
                                Subscribe
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-7 col-md-6 col-sm-6">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">Official Info</h3>
                    <ul class="contact-info list-style">
                        <li>
                            <i class="flaticon-map"></i>
                            <h6>Location</h6>
                            <p>{{ env('LOCATION') }}</p>
                        </li>
                        <li>
                            <i class="flaticon-email-1"></i>
                            <h6>Email</h6>
                            <a href="mail:{{env('MAIL_USERNAME')}}"><span>{{env('MAIL_USERNAME')}}</span></a>
                        </li>
                        <li>
                            <i class="flaticon-phone-call-1"></i>
                            <h6>Phone</h6>
                            <a href="tel:{{env('PHONE_2')}}">{{env('PHONE_2')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p class="copyright-text"><i class="ri-copyright-line"></i> Copyright &copy; {{ date('Y') }} All rights reserved Medics <i class="fa fa-heart"></i> </p>
</footer>

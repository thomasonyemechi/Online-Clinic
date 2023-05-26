@extends('layout.app')
@section('page_title')
    About
@endsection
@section('page_content')
    <div class="content-wrapper">
        <div class="breadcrumb-wrap bg-f br-2">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>About Us</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="/">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>


        <section class="about-wrap style1 ptb-100">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img-wrap">
                            <img src="assets/img/about/about-img-1.png" alt="Image" class="about-img-one">
                            <img src="assets/img/about/about-img-2.jpg" alt="Image" class="about-img-two">
                            <div class="about-doctor-box">
                                <div class="doctor-img">
                                    <img src="assets/img/about/doctor-1.jpg" alt="Image">
                                </div>
                                <div class="doctor-info">
                                    <h5>Dr. Drew Uyi</h5>
                                    <span>Radiology</span>
                                </div>
                                <button type="button" class="btn style1">Select</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="content-title style1">
                                <span>About Our Program</span>
                                <h2>Our Story</h2>
                                <p>
                                    We are an online health care provider that puts Africans at the heart of everything we
                                    do. Specialising in general, sexual and mental health, our highly experienced medical
                                    team understands the importance of professionalism and compassion.
                                    <br><br>
                                    Talking about personal health issues is not always easy and that is why we provide all
                                    patients with the freedom to make choices that best serve their medical needs. Available
                                    7 days a week, we deliver on affordability and accessibility with our virtual health
                                    care services.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="wh-wrap style1 bg-chathamas ptb-100">
            <div class="container">
                <div class="row align-items-center mb-40">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div class="section-title style2">
                            {{-- <span>Why Choose us</span> --}}
                            <h2>Health plans</h2>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <p class="section-para style2">
                            Our 1-2-3 Health Plan makes it easy for you and your family to get the healthcare you need and claim back the costs. It’s as easy as
                            Our 1-2-3 Health Plan makes it easy for you and your family to get the healthcare you need and claim back the costs. It’s as easy as
                        </p>
                    </div>
                </div>
                <div class="row align-items-center gx-5">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                        <div class="wh-img-wrap">
                            <div class="wh-shape-one">
                                <img src="assets/img/why-choose-us/wh-shape-1.png" alt="Image" class=" bounce">
                            </div>
                            <img src="assets/img/why-choose-us/wh-bg-5.jpg" alt="Image" class="wh-img-one">
                            <img src="assets/img/why-choose-us/wh-img-2.jpg" alt="Image" class="wh-img-two">
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                        <div class="wh-content">
                            <div class="feature-item-wrap">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="ri-check-line"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h3>Get seen</h3>
                                        <p>Talk to a 24/7 GP or counsellor and claim back for your dental check-up, eye-test, physio, and more.</p>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="ri-check-line"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h3>Get healthy</h3>
                                        <p>If you need treatment for something, claim back the costs fast in our app or online, with no excess to pay.</p>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="ri-check-line"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h3>Get rewarded</h3>
                                        <p>Access discounts and get money off amazing rewards.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="partner-slider-one owl-carousel pt-100">
                    <div class="partner-item">
                        <img src="assets/img/partner/logo.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/logo.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/logo.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/logo.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/logo.png" alt="Image">
                    </div>
                    <div class="partner-item">
                        <img src="assets/img/partner/logo.png" alt="Image">
                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="testimonial-wrap style2 ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2  col-md-10 offset-md-1">
                        <div class="section-title style1 text-center mb-40">
                            <span>Testimonial</span>
                            <h2>Trusted by over 1 million people</h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider-two owl-carousel">
                    <div class="testimonial-card style2">
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="assets/img/testimonials/client-1.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Jim Morison</h3>
                                    <span>Director, BAT</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                    </div>
                    <div class="testimonial-card style2">
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="assets/img/testimonials/client-2.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Alex Cruis</h3>
                                    <span>CEO, IBAC</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                    </div>
                    <div class="testimonial-card style2">
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="assets/img/testimonials/client-3.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Tom Haris</h3>
                                    <span>Engineer, Olleo</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                    </div>
                    <div class="testimonial-card style2">
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="assets/img/testimonials/client-4.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Harry Jackson</h3>
                                    <span>Enterpreneur</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                    </div>
                    <div class="testimonial-card style2">
                        <div class="client-info-area">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="assets/img/testimonials/client-5.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h3>Chris Haris</h3>
                                    <span>MD, ITec</span>
                                </div>
                            </div>
                            <div class="quote-icon">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                        </div>
                        <ul class="ratings list-style">
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                            <li><i class="ri-star-fill"></i></li>
                        </ul>
                        <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam
                            aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <p class="mb-0 md-center">Are you impressed? Do you want to take our service here? <a
                                href="/appointment" class="link style1">Book An Appointment</a></p>
                    </div>
                </div>
            </div>
        </section>
  --}}


       
    </div>
@endsection

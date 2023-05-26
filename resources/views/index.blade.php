@extends('layout.app')
@section('page_title')
    Home
@endsection
@section('page_content')
    <style>

    </style>
    <section class="hero-wrap style1">
        <div class="hero-slider-one owl-carousel">
            <div class="hero-slide-item bbg">
                <div class="container">
                    <div class="row align-items-center gx-5">
                        <div class="col-xl-5 col-lg-6">
                            <div class="hero-content">
                                <span>Online Doctor</span>
                                <h1>Speak to an online doctor today</h1>
                                <p>All of our Doctors are friendly and experienced, which is why 92% of patients say the
                                    Doctors helped alleviate their concerns.</p>
                                <div class="hero-btn">
                                    <a href="/login" class="btn style1">Login</a>
                                    <a href="/register" class="btn style3">Register</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="hero-img-wrap">
                                <img class="hero-img" src="assets/img/hero/hero-img-1.jpg" style="opacity: .8" alt="Image" >
                                <img src="assets/img/hero/hero-shape-2.png" alt="Image" class="hero-shape-two rotate">
                                <div class="row promo-box-wrap">
                                    <div class="col-xl-5 col-lg-7 col-md-5">
                                        <div class="promo-box">
                                            <span><i class="flaticon-support"></i></span>
                                            <h4>24/7 Support</h4>
                                            <p>You can speak to a doctors 24 hours a day, 7 days a week</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-7 col-md-5">
                                        <div class="promo-box">
                                            <span><i class="flaticon-aid-man"></i></span>
                                            <h4>Qualified Doctors</h4>
                                            <p>Gian access to doctors of high profiles for consultation</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="counter-wrap pt-100 pb-100 bg-blue">
        <div class="container">
            <div class="counter-card-wrap style1 pb-75" data-aos="fade-up">
                <div class="section-title style2 mb-40">
                    <h2>Join today Personal care, whenever you need it</h2>
                    <div>
                        <p style="font-size: larger">
                            All of our Doctors are friendly and experienced, which is why 92% of patients say the Doctors
                            helped alleviate their concerns (Jan to July 2022).
                        </p>
                    </div>
                </div>

            </div>
            <div class="promo-wrap style1">
                <div class="container">
                    <div class="row justify-content-center" style="flex-direction: row">
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="300">
                            <div class="promo-card">
                                <div class="promo-icon">
                                    <i class="flaticon-time"></i>
                                </div>
                                <div class="promo-info">
                                    <h3>24/7 appointments that suit you</h3>
                                    <p>
                                        You can speak to a doctors 24 hours a day, 7 days a week, 365 days a year.
                                        <br> <br>
                                        And you can pick an appointment time to fit your schedule.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="300">
                            <div class="promo-card">
                                <div class="promo-icon">
                                    <i class="flaticon-doctor"></i>
                                </div>
                                <div class="promo-info">
                                    <h3>Choose your doctor</h3>
                                    <p>
                                        All of our doctors have profiles so that you can view and choose the right doctor.
                                        <br><br>
                                        And, to make sure you get personal care, you can choose the same doctors if you need
                                        another appointment.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="400">
                            <div class="promo-card">
                                <div class="promo-icon">
                                    <i class="flaticon-pills"></i>
                                </div>
                                <div class="promo-info">
                                    <h3>Prescriptions</h3>
                                    <p>
                                        We'll arrange for collection from your local pharmacy or you can pay to have it
                                        delivered to your door.
                                        <br><br>
                                        You can also arrange to send NHS repeat prescriptions to your home with free
                                        delivery
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-wrap style1 ptb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
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
                            <button type="button" class="btn style1 ">Select</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    <div class="about-content">
                        <div class="content-title style1">
                            <h2>What can an online doctor treat?</h2>
                            <p>Our doctors can treat many of the same things as your local doctors. Some of the most common
                                things are:</p>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <ul class="content-feature-list list-style">
                                    <li><i class="ri-checkbox-circle-line"></i>Skin issues, including rashes, moles, and
                                        other skin lumps</li>
                                    <li><i class="ri-checkbox-circle-line"></i>Women's health, including contraception</li>
                                    <li><i class="ri-checkbox-circle-line"></i>Ear, nose and throat problems, including
                                        hayfever</li>
                                    <li><i class="ri-checkbox-circle-line"></i>Joint and muscle problems, including strains
                                        and sprains </li>
                                    <li><i class="ri-checkbox-circle-line"></i>Men's health, including prostate problems
                                    </li>
                                    <li><i class="ri-checkbox-circle-line"></i>Back and neck problems, including sciatica
                                    </li>
                                    <li><i class="ri-checkbox-circle-line"></i>Stomach and bowel problems, including
                                        indigestion </li>
                                    <li><i class="ri-checkbox-circle-line"></i>Colds, flu and other minor infectious
                                        symptoms </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ceo-msg">
                            <a href="/register" class="btn style2">Get Started Now <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="service-wrap ptb-100 bg-athens">
        <div class="container">
            <div class="section-title style1 text-center mb-40">
                <span>Our Services</span>
                <h2>What We Do</h2>
            </div>
            <div class="service-slider-one owl-carousel" style="  display: flex; flex-flow: row wrap;">
                <div class="service-card style1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    <div class="service-img">
                        <img src="assets/img/services/service-2.jpg" alt="Image">
                        <span class="service-icon"><i class="flaticon-health-care"></i></span>
                    </div>
                    <div class="service-info">
                        <h3><a href="javascript:;">General Health</a></h3>
                        <p>
                            We major in general health by assisting in giving quick prescriptions,
                            making recommendations, interpreting test results and constant medical follow up.</p>
                    </div>
                </div>
                <div class="service-card style1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
                    <div class="service-img">
                        <img src="assets/img/services/service-3.jpg" alt="Image">
                        <span class="service-icon"><i class="flaticon-health-care"></i></span>
                    </div>
                    <div class="service-info">
                        <h3><a href="javascript:;">Sexual Health</a></h3>
                        <p>We offer assistance and advice on sexual health, cases relating to gender and women,
                            contraception, pregnancy and STDs.</p>
                    </div>
                </div>
                <div class="service-card style1" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="400">
                    <div class="service-img">
                        <img src="assets/img/services/service-4.jpg" alt="Image">
                        <span class="service-icon"><i class="flaticon-health-care"></i></span>
                    </div>
                    <div class="service-info">
                        <h3><a href="javascript:;">Mental Health</a></h3>
                        <p>We render therapeutic services to individuals who need assistance and support on issues relating
                            to mental health. Join us today for counselling and advice.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="appointment-wrap style1 bg-athens">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                    <div class="appointment-content">
                        <div class="content-title style1">
                            <h2>Why Choose Us</h2>
                        </div>
                        <ul class="content-feature-list list-style">
                            <li><i class="ri-checkbox-circle-line"></i>Online private medical appointments from just N1000
                            </li>
                            <li><i class="ri-checkbox-circle-line"></i>Access qualified Doctors and Nurses</li>
                            <li><i class="ri-checkbox-circle-line"></i>Appointment from anywhere and anytime 7 Days a week
                            </li>
                            <li><i class="ri-checkbox-circle-line"></i>No long waiting times, access a Doctor in minutes
                            </li>
                            <li><i class="ri-checkbox-circle-line"></i>Get your Prescriptions, referrals and sick notes.
                            </li>
                            <li><i class="ri-checkbox-circle-line"></i>Online Medical appointments for all ages</li>
                        </ul>
                        <a href="/contact" class="btn style1">Contact Us Now</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    <div class="appointment-bg bg-f">
                        <form action="#" class="appointment-form">
                            <h2>Book An Appointment</h2>
                            <div class="form-group">
                                <input type="text" placeholder="Full name">
                            </div>
                            <div class="form-group">
                                <input type="number" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="date">
                            </div>
                            <a type="submit" href="/appointment" class="btn btn-block style2" style="width: 100%" >Book Now</a>
                        </form>
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
                        <h2>Health plans</h2>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <p class="section-para style2">
                        Our 1-2-3 Health Plan makes it easy for you and your family to get the healthcare you need and claim
                        back the costs. It’s as easy as
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
                                    <p>Talk to a 24/7 Doctor or counsellor and claim back for your dental check-up, eye-test,
                                        physio, and more.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="ri-check-line"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Get healthy</h3>
                                    <p>If you need treatment for something, claim back the costs fast in our app or online,
                                        with no excess to pay.</p>
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
    <section class="testimonial-wrap style3 ptb-100">
        <div class="container">
            <div class="cta-wrap pt-100">
                <div class="row gx-5 align-items-center">
                    <div class="col-xl-8 col-lg-7">
                        <div class="cta-content">
                            <div class="cta-logo">
                                <img src="assets/img/icon.png" alt="Image">
                            </div>
                            <div class="content-title">
                                <h2>Don't Hesitate To Contact us</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="cta-btn d-flex justify-content-sm-center ">
                            <a href="/appointment" class="btn style1">Make Appointment</a>
                            <a href="/contact" class="btn style2">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

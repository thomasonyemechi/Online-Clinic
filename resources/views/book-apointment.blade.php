@extends('layout.app')
@section('page_title')
    Book Appointment
@endsection
@section('page_content')
    @php
        $user = auth()->user();
    @endphp
    <div class="content-wrapper">

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap bg-f br-1">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>Book Appointment</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="/">Home </a></li>
                        <li>Appointment</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="appointment-form-wrap ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                        <form action="/book" method="post" class="book-appointment-form">
                            @csrf
                            <div class="content-title">
                                <h4>Your Information</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name="name" placeholder="Name"  value="{{$user->name}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" placeholder="Email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="number" name="phone" placeholder="Phone Number" value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Appointment Date</label>
                                        <input type="date" name="date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Appointment Time</label>
                                        <select name="time" id="select_time">
                                            <option selected disabled>Select Time</option>
                                            <option >8:00am - 10:00am</option>
                                            <option >10:00am - 12:00pm</option>
                                            <option >12:00pm - 2:00pm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea name="symtoms" id="item_desc" cols="30" rows="10" placeholder="Specify Symtoms"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn style1 d-block w-100">Book Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

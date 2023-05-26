@extends('layout.app')
@section('page_title')
    Users Dashboard
@endsection
@section('page_content')
    @php
        $user = auth()->user();
        $uid = $user->id . 'MYD' . date('jmY', strtotime($user->created_at));
        $sent = isset($_GET['ref']) ? 1 : 0;
        
    @endphp



    <div class="content-wrapper">

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap bg-f br-1">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>My Dashboard</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li>Welcome Back</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="appointment-form-wrap ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div>
                            @if (!auth()->user()->email_verified_at)
                                <div class="sidebar mb-4">
                                    <div class="sidebar-widget portfolio-info-widget">
                                        <p>
                                            HI <b>{{ ucfirst($user->name) }}</b>,
                                            <br><br>

                                            You are welcome to <b>My Online Clinic</b>
                                            To start booking appointments with doctor please confirm your email address
                                            <br><br>
                                            <a class="btn send_verification_btn style1 pt-1 pb-1 rounded-pill">Resend
                                                Verification Mail </a>
                                        </p>
                                    </div>
                                </div>
                            @endif


                            <div class="row ">
                                <div class="col-lg-3 mb-4 col-6">
                                    <div class="rounded bg-info" style="padding: 10px 10px ">
                                        <h3 class="pb-0 mb-0 text-white" style="font-wwight: 600">
                                            {{ \App\Models\Appointment::where(['user_id' => $user->id])->count() }}</h3>
                                        <p class="mt-0 mb-0 text-white" style="font-wwight: 600">Appointments</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-4 col-6">
                                    <div class="rounded bg-success" style="padding: 10px 10px ">
                                        <h3 class="pb-0 mb-0 text-white" style="font-wwight: 600">
                                            {{ \App\Models\Appointment::where(['user_id' => $user->id, 'status' => 5])->count() }}
                                        </h3>
                                        <p class="mt-0 mb-0 text-white" style="font-wwight: 600">Completed</p>
                                    </div>
                                </div>
                                <div class="col-lg-3  col-6">
                                    <div class="rounded bg-secondary" style="padding: 10px 10px ">
                                        <h3 class="pb-0 mb-0 text-white" style="font-wwight: 600">
                                            {{ \App\Models\Appointment::where(['user_id' => $user->id])->count() }}
                                        </h3>
                                        <p class="mt-0 mb-0 text-white" style="font-wwight: 600">Message Sent</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="rounded bg-primary" style="padding: 10px 10px ">
                                        <h3 class="pb-0 mb-0 text-white" style="font-wwight: 600">
                                            {{ \App\Models\Appointment::where(['user_id' => $user->id, 'status' => 1])->count() }}
                                        </h3>
                                        <p class="mt-0 mb-0 text-white" style="font-wwight: 600">Pending</p>
                                    </div>
                                </div>

                            </div>

                            <h2 class="mt-3 mb-1">Recent Appointments </h2>
                            <h6 class="mb-3">List of appointments made by you</h6>

                            <div class="sidebar">
                                @php
                                    $ct = count($appointments);
                                @endphp
                                @if ( $ct == 0 AND auth()->user()->email_verified_at)
                                    <div class="sidebar-widget portfolio-info-widget">
                                        <p>
                                            HI <b>{{ ucfirst($user->name) }}</b>,
                                            <br><br>

                                            You are welcome to <b>My Online Clinic</b>
                                            You have not book any appointment.<br> Click <a href="/appointment">here</a>
                                            to book appointment
                                        </p>
                                    </div>
                                @endif
                                @foreach ($appointments as $apt)
                                    @php
                                        $exploded = explode('-', $apt->time);
                                        $start = strtotime($exploded[0]);
                                        $end = strtotime($exploded[1]);
                                    @endphp
                                    <div class="sidebar-widget portfolio-info-widget">
                                        <p style="border-bottom: thin solid #0d6efd;">
                                            {{ $apt->description }}
                                        </p>
                                        <div class="portfolio-info-item-wrap">
                                            <div class="portfolio-info-item">
                                                <p><i class="ri-calendar-line inline"></i>Date:</p>
                                                <span style="width: auto;">
                                                    {{ date('D j M Y', strtotime($apt->date)) }}
                                                    <span style="font-weight: bolder">
                                                        {{ date('H a', $start) . ' to ' . date('h a', $end) }}
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="portfolio-info-item">
                                                <p><i class="ri-user-unfollow-line"></i>Doctor:</p>
                                                <span style="width: auto">{{ $apt->doctor->name }}</span>
                                            </div>
                                            <div class="portfolio-info-item">
                                                <p><i class="ri-bill-line"></i>Payment:</p>
                                                <span style="display: inline">
                                                    {{ $apt->payment->amount ?? '' }}
                                                    @if ($apt->status == 0)
                                                        <div class="badge bg-danger" style="display: inline">Failed</div>
                                                    @else
                                                        <div class="badge bg-success" style="display: inline">Successfull
                                                        </div>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            @if ($apt->status == 1)
                                                @if (time() >= strtotime($apt->date))
                                                    <a href="/appointment/room/{{ $apt->id }}" class="btn style1 pt-1 pb-1 rounded-pill">Send Message </a>
                                                @else
                                                    <p style="font-weight: 600">You will be able to chat with your docotor
                                                        on the date and time of your appointment</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="sidebar-widget portfolio-info-widget">
                                <h4>{{ $user->name }} </h4>
                                <div class="portfolio-info-item-wrap">
                                    <div class="portfolio-info-item">
                                        <p><i class="ri-calendar-line"></i>ID:</p>
                                        <span>{{ $uid }}</span>
                                    </div>
                                    <div class="portfolio-info-item">
                                        <p><i class="ri-envelope-line"></i>Email:</p>
                                        <span style="overflow: hidden">{{ $user->email }}</span>
                                    </div>
                                    <div class="portfolio-info-item">
                                        <p><i class="ri-phone-line"></i>Phone:</p>
                                        <span>{{ $user->phone }}</span>
                                    </div>
                                    <div class="portfolio-info-item">
                                        <p><i class="ri-map-pin-line"></i>Address:</p>
                                        <span>Address</span>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button class="btn style3 pt-1 pb-1 rounded-pill" style="width: 100%">Edit Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(function() {
            let sent = `<?= $sent ?>`
            console.log(sent);
            btn = $('.send_verification_btn');
            if (sent == 1) {
                let i = 60;
                const interval = setInterval(() => {
                    let c = i--;
                    btn.html(`Resend Mail in ${c}s `);
                    console.log(c);

                    if (c == 0) {
                        btn.attr('href', '/verificationmail/{{ $user->id }}?ref=verification+sent');
                        btn.html(`Resend Verification Mail`);
                        clearInterval(interval);
                        console.log('interval deleted');
                    }

                }, 1000);
            } else {
                btn.html('Resendv Verification Mail')
                btn.attr('href', '/verificationmail/{{ $user->id }}?ref=verification+sent');
            }

        })
    </script>
@endsection

@extends('layout.admin')
@section('page_title')
    Dashboard
@endsection
@section('page_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ \App\Models\Appointment::count() }}</h3>

                                    <p>Appointment</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><sup style="font-size: 20px">N</sup> {{  number_format(\App\Models\Payment::sum('amount')) }}</h3>

                                    <p>Payments Made</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ \App\Models\User::count() }}</h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ \App\Models\User::where('email_verified_at', '!=', '' )->count() }}</h3>

                                    <p>Verified User</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-checked"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-bold"> <a href="/admin/today_appointment"> Today</a></span>
                                    <span class="info-box-number">
                                        {{    \App\Models\Appointment::where('date', date('Y-m-j'))->count() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-bold">Completed</span>
                                    <span class="info-box-number">{{ \App\Models\Appointment::where('status', 5)->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-bold">Pending</span>
                                    <span class="info-box-number">{{ \App\Models\Appointment::where('status', '<', 1)->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-bold"> <a href="/admin/contact_message"> Contact </a></span>
                                    <span class="info-box-number">{{ \App\Models\Contact::count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Latest Members</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="users-list clearfix">
                                @foreach (\App\Models\User::inRandomOrder()->limit(20)->get() as $user)
                                    <li>
                                        <img src="{{ asset('assets/images/user.png') }}" alt="">
                                        <a class="users-list-name"
                                            href="/admin/profile/{{ $user->id }}">{{ $user->name }}</a>
                                        <span class="users-list-date"> {{ date('j M Y', strtotime($user->created_at)) }}
                                        </span>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="/admin/manage_users">View All Users</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Appointment</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Models\Appointment::where('status' , 1)->orderby('id', 'desc')->get() as $apt)
                                            <tr>
                                                <td>{{ $apt->user->name }}</td>
                                                <td>{{ $apt->description }}</td>
                                                <td>
                                                    <a class="btn btn-secondary btn-xs"
                                                        href="/admin/appointment/{{ $apt->id }}">Chat <i
                                                            class="fa fa-arrow-right"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="/admin/appointment/all" class="btn btn-sm btn-secondary float-right">View All Appointment</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

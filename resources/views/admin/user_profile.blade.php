@extends('layout.admin')
@section('page_title')
    User Profile
@endsection
@section('page_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('assets/images/user.png') }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center"> {{ $user->phone }} </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>ID</b> <a class="float-right">12MYD2012023</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <a style="text-align: center"> Joined :{{ $user->created_at }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-md-9">
                    <div class="card card-blue card-outline">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Appointments</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <h5>All Appointments Booked By {{$user->name}} </h5>
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Date/Time</th>
                                                    <th>Description</th>
                                                    <th>Payment</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appointments as $apt)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $apt->date }} / {{ $apt->time }}</td>
                                                        <td>{{ $apt->description }}</td>
                                                        <td>
                                                            @if ($apt->payment)
                                                                <i class="text-success">Successful
                                                                    ({{ $apt->payment->amount }})</i>
                                                            @else
                                                                <i class="text-danger">Pending</i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($apt->status == 5)
                                                                <i class="text-success">Done
                                                                    ({{ $apt->payment->amount }})</i>
                                                            @elseif($apt->status == 0)
                                                                <i class="text-danger">Error</i>
                                                            @elseif ($apt->status == 1)
                                                                <i class="text-primary">Pending</i>
                                                            @endif
                                                        </td>
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

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                    placeholder="Name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                    placeholder="Email" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2"
                                                    placeholder="Phone" value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn disabled btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
@endsection

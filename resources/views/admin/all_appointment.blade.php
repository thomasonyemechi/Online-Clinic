@extends('layout.admin')
@section('page_title')
    All Appointment
@endsection
@section('page_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Appointment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Appointment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Of All Appointments</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email/Phone</th>
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
                                                <td>{{ $apt->user->name }}</td>
                                                <td>{{ $apt->user->email }} / {{ $apt->user->phone ?? '' }}</td>
                                                <td>{{ $apt->date }} / {{ $apt->time }}</td>
                                                <td>{{ $apt->description }}</td>
                                                <td>
                                                    @if ($apt->payment)
                                                        <i class="text-success">Successful ({{ $apt->payment->amount }})</i>
                                                    @else
                                                        <i class="text-danger">Pending</i>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($apt->status == 5)
                                                        <i class="text-success">Done ({{ $apt->payment->amount }})</i>
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
                    </div>
                </section>
            </div>
        </div>
    </section>

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
@endsection

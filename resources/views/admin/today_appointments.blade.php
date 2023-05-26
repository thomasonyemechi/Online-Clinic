@extends('layout.admin')
@section('page_title')
    Appointment
@endsection
@php
    $date =  $_GET['date'] ?? date('Y-m-j');

    $appointments = \App\Models\Appointment::where('date', $date)->get();

@endphp
@section('page_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Scheduled For Today {{$date}} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Today Appointment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-fuchsia card-outline">
                        <div class="card-body">
                            <form action="/admin/today_appointment">
                                <label for="">Select Date To View Appointment</label>
                                <input type="date" name="date" class="form-control" onchange="submit()">
                            </form>
                        </div>
                    </div>
                </div>
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-cyan card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Apointment Scheduled for today {{$date}}</h3>
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

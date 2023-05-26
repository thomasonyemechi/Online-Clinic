@extends('layout.admin')
@section('page_title')
Search
@endsection
@php
    $q = $_GET['q'];

    $users = \App\Models\User::where('name', 'like', "%{$q}%")
    ->orwhere('email', 'like', "%{$q}%")
    ->orwhere('phone', 'like', "%{$q}%")
   ->get();



@endphp
@section('page_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Search Results For "{{$q}}" </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-cyan card-outline">
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Verified</th>
                                            <th>Joined On</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->email_verified_at }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-xs"
                                                        href="/admin/profile/{{ $user->id }}">Profile <i
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

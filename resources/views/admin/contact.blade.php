@extends('layout.admin')
@section('page_title')
    Contact Message
@endsection
@php
    $messages = App\Models\Contact::orderby('id', 'desc')->paginate(100);
@endphp
@section('page_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Contact Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contact Message</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Contact Message List </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            {{-- <th class="align-middle">
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="check_all" value="0">
                                                    <label for="check_all"> </label>
                                                </div>
                                            </th> --}}
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($messages as $msg)
                                            <tr>
                                                {{-- <td class="align-middle">
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="checks"
                                                            id="check{{ $loop->iteration }}" value="{{ $msg->id }}">
                                                        <label for="check{{ $loop->iteration }}"> </label>
                                                    </div>
                                                </td> --}}
                                                <td class="align-middle">{{ $loop->iteration }} </td>
                                                <td class="align-middle"> {{ $msg->full_name }} </td>
                                                <td class="align-middle"> {{ $msg->email }} </td>
                                                <td class="align-middle"> {{ $msg->phone }} </td>
                                                <td class="align-middle"> {{ $msg->message }} </td>
                                                <td class="align-middle"> {{ date('j M Y | h:i', strtotime($msg->created_at)) }} </td>
                                                <td class="align-middle">

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
    <script>
        $(function() {
            $('#check_all').on('click', function() {
                inp = $('#check_all');
                if (inp.val() == 0) {
                    $('.checks').attr('checked', '');
                    inp.val(1)
                } else {
                    $('.checks').removeAttr('checked');
                    inp.val(0)
                }
            })
        })
    </script>
@endsection

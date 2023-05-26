<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ env('APP_NAME') }} @yield('page_title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/images/icons/icon.png') }}" alt="AdminLTELogo" height="60"
        width="60">
    </div> --}}

        @php
            $uid = $appointment->id . 'MYD' . date('jmY', strtotime($appointment->created_at));
        @endphp
        <div class="">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Appointment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Appointment</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="row">
                                <section class="col-lg-7 connectedSortable">
                                    <div class="card direct-chat direct-chat-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Chat With A Doctor</h3>

                                        </div>
                                        <div class="card-body">
                                            <div class="direct-chat-messages msg_card_body" style="height: 60vh;">

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <form method="post" id="messageform">
                                                <input type="hidden" id="last_message">
                                                <div class="input-group">
                                                    <textarea type="text" name="message" autofocus placeholder="Type Message ..." class="form-control type_msg"> </textarea>
                                                    <span class="input-group-append">
                                                        <button type="button" class="btn btn-primary send_btn"><i
                                                                class="fas fa-paper-plane mr-2"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                                <section class="col-lg-5 content">
                                    <div class="container-fluid">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                                <h2 class="profile-username text-center">{{ $appointment->user->name }}
                                                </h2>
                                                <p class="text-muted text-center">{{ $appointment->user->phone }}</p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Appointment ID</b> <a
                                                            class="float-right">{{ $uid }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Date & Time</b> <a
                                                            class="float-right">{{ $appointment->date }} |
                                                            {{ $appointment->time }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Payment</b> <a class="float-right">
                                                            @if ($appointment->payment)
                                                                <span class="text-success">Sucessful </span>
                                                                {{ $appointment->payment->amount }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Email</b> <a
                                                            class="float-right">{{ $appointment->user->email }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a class="text-center"> CREATED:
                                                            {{ date('j M Y', strtotime($appointment->created_at)) }}</a>
                                                    </li>
                                                </ul>
                                                <strong><i class="fas fa-book mr-1"></i> Symptoms </strong>
                                                <p class="text-muted">
                                                    {{ $appointment->description }}
                                                </p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>


        @include('layout.inc.admin_foot')

    </div>

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#action_menu_btn').click(function() {
                $('.action_menu').toggle();
            });

            function placeMessages(messages) {
                let string = ''
                user_id = `<?= auth()->user()->id ?>`
                messages.forEach(msg => {
                    if (user_id == msg.user_id) {
                        string += `
                <div class="direct-chat-msg right msg${msg.id}">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-timestamp float-left">${msg.date}</span>
                    </div>
                    <div class="direct-chat-text">
                        ${msg.message}
                    </div>
                </div>
            `
                    } else {
                        string += `
                    <div class="direct-chat-msg msg${msg.id}">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-timestamp float-right">${msg.date}</span>
                        </div>
                        <div class="direct-chat-text">
                            ${msg.message}
                        </div>
                    </div>
                `
                    }
                });


                let last = messages[messages.length - 1];
                if (last) {
                    $('#last_message').val(last.id);
                }
                return string
            }


            function compareChat() {
                message_id = $('#last_message').val();
                if (message_id == '') {
                    message_id = 0;
                }
                $.ajax({
                    method: 'get',
                    url: `/compare_mesages/${message_id}/<?= $appointment_id ?>`
                }).done(function(res) {
                    console.log('compared', res);
                    if (res.new) {
                        $('.msg_card_body').html(placeMessages(res.messages));
                        $(".msg_card_body").scrollTop($(".msg_card_body")[0].scrollHeight);
                    }
                }).fail(function(res) {
                    console.log('failed to compare');
                })
            }




            function fetchChat() {
                $.ajax({
                    method: 'get',
                    url: '/mesages/<?= $appointment_id ?>'
                }).done(function(res) {
                    console.log(res.messages);
                    $('.msg_card_body').html(placeMessages(res.messages));
                    $(".msg_card_body").scrollTop($(".msg_card_body")[0].scrollHeight);

                    setInterval(() => {
                        compareChat()
                    }, 3000);
                });
            }

            $(".type_msg").keypress(function(e) {
                if (e.which === 13 && !e.shiftKey) {
                    e.preventDefault();
                    //$(this).closest("form").submit();
                    send()
                }
            });

            $('.send_btn').on('click', function(e) {
                e.preventDefault();
                send();
            });

            function send() {
                form = $('#messageform')
                msg = $(form).find('textarea');
                $.ajax({
                    method: 'get',
                    url: '/mesage',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        message: msg.val(),
                        appointment_id: '<?= $appointment_id ?>'
                    },
                    beforeSend: () => {
                        $('.msg_card_body').append(`
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-timestamp float-left"></span>
                                </div>
                                <div class="direct-chat-text">
                                    ${msg.val()}
                                </div>
                            </div>
                        `);

                        msg.val(``);
                        $(".msg_card_body").scrollTop($(".msg_card_body")[0].scrollHeight);
                    }
                }).done(function(res) {

                    console.log(res);
                });
            }
            fetchChat()
        });
    </script>
</body>

</html>

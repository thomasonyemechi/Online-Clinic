@extends('layout.app')
@section('page_title')
    Users Dashboard
@endsection
@section('page_content')
    @php
        $user = auth()->user();
        $uid = $appointment->id . 'MYD' . date('jmY', strtotime($appointment->created_at));
    @endphp




    <div class="content-wrapper">
        <section class="appointment-form-wrap ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="sidebar">
                            <div class="sidebar-widget msg_card_body portfolio-info-widget" data-mdb-perfect-scrollbar="true"
                                style="position: relative; height: 50vh; overflow-y:scroll">


                            </div>
                            <div>
                                <form method="post" id="messageform">
                                    <input type="hidden" id="last_message">
                                    <div class="d-flex justify-content-between">
                                        <textarea class="form-control type_msg autofocus mr-4 form-control-xs" rows="1"
                                            placeholder="Type Your Message  Here"></textarea>
                                        <button type="button" class="btn  style2 send_btn">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">


                        <div class="sidebar">
                            <div class="sidebar-widget portfolio-info-widget">
                                <h4> {{ $uid }} </h4>
                                <div class="portfolio-info-item-wrap">
                                    <div class="portfolio-info-item">
                                        <p><i class="ri-calendar-line"></i>Date:</p>
                                        <span>{{ $appointment->date }} | {{ $appointment->time }}</span>
                                    </div>
                                    <div class="portfolio-info-item">
                                        <p><i class="ri-envelope-line"></i>Email:</p>
                                        <span style="overflow: hidden" >{{ $user->email }}</span>
                                    </div>
                                    <div class="portfolio-info-item">
                                        <p><i class="ri-coin-line"></i>Payment:</p>
                                        <span>
                                            {{ $appointment->payment->amount ?? '' }}
                                            @if ($appointment->status == 0)
                                                <div class="badge bg-danger" style="display: inline">Failed</div>
                                            @else
                                                <div class="badge bg-success" style="display: inline">Successfull
                                                </div>
                                            @endif
                                        </span>

                                    </div>
                                    <div class="portfolio-info-item">
                                        <p>Created: </p>
                                        <span>{{ $appointment->created_at }}</span>
                                    </div>
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
                        <div class="d-flex flex-row msg${msg.id} justify-content-end mb-4 pt-1">
                                <div>
                                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${msg.message}</p>
                                    <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">${msg.date}</p>
                                </div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                            </div>
                        `
                    } else {
                        string += `
                 

                            <div class="d-flex flex-row msg${msg.id} justify-content-start">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                <div>
                                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">
                                        ${msg.message}    
                                    </p>
                                    <p class="small ms-3 mb-3 rounded-3 text-muted">${msg.date}</p>
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
                            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                <div>
                                    <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${msg.val()}</p>
                                    <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">now</p>
                                </div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
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
@endsection

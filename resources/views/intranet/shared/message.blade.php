@extends('intranet.layouts.app')
@section('content')
    @php
        $lang = Session::get('language');
        if (!$lang) {
            $lang = App::getLocale();
        }
        $short_description = 'short_description_' . $lang;
        $description = 'description_' . $lang;
        $designation = 'designation_' . $lang;
        App::setLocale($lang);
    @endphp
    @if (Session::has('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('success') }}';
            swal({
                text: msg,
                title: 'Merci',
                type: 'success',
                toastr: true,
                timer: 3000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal({
                text: msg,
                title: 'réessayer SVP',
                type: 'warning',
                toastr: true,
                timer: 3000,
                showConfirmButton: false
            })
            //     swal(
            //     '',
            //     msg,
            //     'warning'
            //   )
        </script>
    @endif
    @if (Session::has('warning'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('warning') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif

    <style>
        .new_message{
            width: 10px;
    height: 10px;
    background: #ed8226;
    display: inline-block;
    border-radius: 50%;
        }
    </style>

    {{-- modal add group start --}}
    <div class="modal fade" id="add_section_model" tabindex="-1" aria-labelledby="lectureModalLabel" aria-hidden="true"
        style="background-color:#3e3e3e7d;">
        <div class="modal-dialog modal-lg" style="margin-top: 212px;">
            <form action="{{ route('sendMessageGroup') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="padding-bottom: 0px;">
                        <h5 class="modal-title" id="lectureModalLabel">@lang('intranet.Nouveau groupe')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding-top: 0px;">
                        <div class="new-section-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="new-section">
                                        <div class="form_group">
                                            <label class="label25">@lang('intranet.Désignation')</label>
                                            <input class="form_input_1" type="text" required name="designation_group"
                                                placeholder="@lang('intranet.Désignation de groupe')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="mt-30 lbel25">
                                        <label>@lang('intranet.Choisir')</label>
                                    </div>

                                    <select name="users[]" class="ui hj145 dropdown cntry152 prompt srch_explore" multiple>
                                        <option value="">@lang('intranet.Choisir')</option>
                                        @foreach ($all_users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>


                                </div>
                                {{-- <div class="col-md-12">
                                        <div class="new-section">
                                            <div class="form_group">
                                                <label class="label25">@lang('intranet.Description')</label>
                                                <textarea class="form_input_1" rows="5" style="height: unset;" name="description_fr"
                                                    placeholder="@lang('intranet.Description')"></textarea>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- <div class="ui toggle checkbox _1457s2" style="padding-left: 15px;">
                                    <input type="checkbox" name="permission_comment" checked="">
                                    <label>Autorisation des commentaires</label>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="main-btn cancel" data-dismiss="modal">
                            @lang('intranet.Fermer')
                        </button>
                        <button type="submit" class="main-btn">@lang('intranet.Ajouter')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- modal add group end --}}
    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 30px;margin-bottom: 0px">
            <div class="value_content">
                <h4 class="">@lang('intranet.Messages')</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12" style="padding: 0px !important;">
            <div class="all_msg_bg">
                <div class="row no-gutters" style="margin: 0 !important;">
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="msg_search">
                            <div class="ui search focus">
                                {{-- <div class="ui left icon input swdh11 swdh15">
                                    <input class="prompt srch_explore" type="text" placeholder="Search Messages...">
                                    <i class="uil uil-search-alt icon icon8"></i>
                                </div> --}}


                                <div class="ui left icon input swdh11 swdh15">
                                    {{-- <label for="ice-cream-choice">Choose a flavor:</label> --}}
                                    {{-- <input class="prompt srch_explore" list="ice-cream-flavors" id="ice-cream-choice"
                                        name="ice-cream-choice" placeholder="Search Messages...">
                                    <i class="uil uil-search-alt icon icon8"></i> --}}
                                    <select id="select_u" class="form-control" onchange="select_u()">
                                        <option value="">@lang('intranet.Choisir')</option>
                                        @foreach ($all_users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    <script>
                                        function select_u() {
                                            var x = document.getElementById("select_u").value;
                                            location.href = "/{{env('PROJECT_NAME')}}/intranet/new_messages/" + x;
                                        }
                                    </script>

                                </div>

                                <div class="row">
                                    <div class="ui left icon input swdh11 swdh15" style="margin-top: 15px;">
                                        <button class="create_btn_dash" data-toggle="modal"
                                            data-target="#add_section_model"> <i class="voyager-people"></i>
                                            @lang('intranet.Créer un groupe') </button>
                                    </div>
                                    {{-- <div class="ui left icon input swdh11 swdh15" style="margin-top: 15px;">
                                        <button class="create_btn_dash" data-toggle="modal"
                                        data-target="#add_section_model"> <i ></i> @lang('intranet.Nouvelle discussion') </button>
                                    </div> --}}
                                </div>


                            </div>
                        </div>
                        <div class="simplebar-content-wrapper">
                            <div class="group_messages">
                                {{-- <div class="chat__message__dt active">
                                                <div class="user-status">
                                                    <div class="user-avatar">
                                                        <img src="images/left-imgs/img-1.jpg" alt="">
                                                        <div class="msg__badge">2</div>
                                                    </div>
                                                    <p class="user-status-title"><span class="bold">John Doe</span></p>
                                                    <p class="user-status-text">Hi! Sir, How are you. I ask you one
                                                        thing please explain it this video price.</p>
                                                    <p class="user-status-time floaty">7 hours ago</p>
                                                </div>
                                            </div> --}}
                                {{-- @dd($user) --}}
                                @foreach ($users_chat as $userchat)
                                    @php
                                         $last_message = App\Message::where('chat_id', $userchat->chat_id)

                                            ->orderBy('created_at', 'desc')
                                            ->first();
/*
                                        $number_messages = App\Message::where('receiver_id', auth()->user()->id)
                                            ->where('sender_id', $userchat->id)
                                            ->where('seen', 0)
                                            ->count();
 */
                                        $chat = App\Chat::find($userchat->chat_id);
                                        $chat_receiver = App\UserChat::where('user_id', '<>', auth()->user()->id)
                                            ->where('chat_id', $userchat->chat_id)
                                            ->first();
                                    @endphp

                                    @if ($chat->designation != null)
                                        <a href="{{ route('message', ['chat_id' => $userchat->chat_id]) }}"
                                            @if (isset($chat_id) && $userchat->chat_id == $chat_id) class="active" @endif>
                                            <div class="chat__message__dt">
                                                <div class="user-status">
                                                    <div class="user-avatar">
                                                        <img src="{{ asset('theme2/images/avatar.jpg') }}"
                                                            alt="" style="height:55px;">
                                                        {{-- @if ($number_messages > 0)
                                                            <div class="msg__badge">{{ $number_messages }}</div>
                                                        @else
                                                            <div class="msg__badge">
                                                                <i class="voyager-check"></i>
                                                            </div>
                                                        @endif --}}

                                                    </div>
                                                    <p class="user-status-title"><span
                                                            class="bold">{{ @$chat->designation }}</span>
                                                            <span  id="last_message_info{{$userchat->chat_id}}" ></span>
                                                    </p>
                                                    <p class="user-status-text" id="last_message{{$userchat->chat_id}}">{{ @$last_message->content }}</p>
                                                    <p class="user-status-time floaty">
                                                        {{ Carbon\Carbon::parse(@$last_message->created_at)->format('d-m-Y') }}
                                                    </p>
                                                    @if(@$last_message)
                                                    <p>
                                                        {{ @$last_message->created_at->diffForHumans() }}
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{ route('message', ['chat_id' => $userchat->chat_id]) }}"
                                            @if (isset($chat_id) && $userchat->chat_id == $chat_id) class="active" @endif>
                                            <div class="chat__message__dt">
                                                <div class="user-status">
                                                    <div class="user-avatar">
                                                        <img src="@if ($chat_receiver->user->avatar) {{ Voyager::image(@$chat_receiver->user->avatar) }}@else{{ Voyager::asset('theme2/images/avatar.jpg') }} @endif"
                                                            alt="" style="height:55px;">
                                                       {{--  @if ($number_messages > 0)
                                                            <div class="msg__badge">{{ $number_messages }}</div>
                                                        @else
                                                            <div class="msg__badge">
                                                                <i class="voyager-check"></i>
                                                            </div>
                                                        @endif --}}

                                                    </div>
                                                    <p class="user-status-title"><span
                                                            class="bold">{{ @$chat_receiver->user->name }}</span>
                                                            <span  id="last_message_info{{$userchat->chat_id}}" ></span>
                                                    </p>

                                                    <p class="user-status-text" id="last_message{{$userchat->chat_id}}">{{ @$last_message->content }}</p>
                                                    <p class="user-status-time floaty">
                                                        {{ Carbon\Carbon::parse(@$last_message->created_at)->format('d-m-Y') }}
                                                    </p>
                                                    @if(@$last_message)
                                                    <p>  {{ @$last_message->created_at->diffForHumans() }}
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach

                                <hr>

                                {{-- @foreach ($all_users as $user)
                                    <a href="{{ route('new_message', ['user_id' => $user->id]) }}">
                                        <div class="chat__message__dt">
                                            <div class="user-status">
                                                <div class="user-avatar">
                                                    <img src="@if ($user->avatar) {{ Voyager::image($user->avatar) }}@else{{ Voyager::asset('theme2/images/avatar.jpg') }} @endif"
                                                        alt="" style="height:55px;">


                                                </div>
                                                <p class="user-status-title"><span
                                                        class="bold">{{ $user->name }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                    @if (@$chat_id != null)
                        @php
                            $chat = App\Chat::find($chat_id);
                            $chat_receiver = App\UserChat::where('user_id', '<>', auth()->user()->id)
                                ->where('chat_id', $chat_id)
                                ->first();

                        @endphp
                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="chatbox_right">
                                <div class="chat_header">
                                    <div class="user-status">
                                        @if (@$chat_id == 'new')
                                            @php
                                                $selected_user = App\Models\User::find($user_id);

                                            @endphp
                                            <div class="user-avatar">
                                                <img src="{{ Voyager::image(@$selected_user->avatar) }}"alt="">
                                            </div>
                                            <p class="user-status-title"><span class="bold">
                                                    {{ $selected_user->name }}

                                            </p>
                                        @else
                                            <div class="user-avatar">
                                                @if ($chat->designation != null)
                                                    <img src="{{ asset('theme2/images/avatar.jpg') }}"
                                                        alt="" style="height:55px;">
                                                @else
                                                    <img src="{{ Voyager::image(@$chat_receiver->user->avatar) }}"
                                                        alt="">
                                                @endif
                                            </div>
                                            <p class="user-status-title"><span class="bold">
                                                    @if ($chat->designation != null)
                                                        {{ $chat->designation }}
                                                    @else
                                                        {{ $chat_receiver->user->name }}
                                                    @endif
                                                </span>
                                            </p>
                                        @endif
{{--                                         <p class="user-status-tag online">Online</p>
 --}}                                       {{--  <div class="user-status-time floaty eps_dots eps_dots5 more_dropdown">
                                            <a href="#"><i class="uil uil-ellipsis-h"></i></a>
                                            <div class="dropdown-content">
                                                <span><i class="uil uil-trash-alt"></i>Delete</span>
                                                <span><i class="uil uil-ban"></i>Block</span>
                                                <span><i class="uil uil-windsock"></i>Report</span>
                                                <span><i class="uil uil-volume-mute"></i>Mute</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="messages-line simplebar-content-wrapper2 scrollstyle_4" id="myDiv">
                                    <div class="mCustomScrollbar" id="chat-area">
                                        @foreach ($messages as $msg)
                                            @if ($msg->user_id == auth()->user()->id)
                                                <div class="main-message-box ta-right">
                                                    <div class="message-dt" style="float:right">
                                                        <div class="message-inner-dt" style="min-width:100%">
                                                            <p>{{ $msg->content }}</p>
                                                        </div>
                                                        <div class="lecture-btn pull-right">
                                                            @php
                                                                $files = json_decode($msg->files);
                                                            @endphp
                                                            @if (@$files)
                                                                @foreach (@$files as $file)
                                                                    @if ($file)
                                                                        <a href="{{ Voyager::image($file->download_link) }}"
                                                                            target="_blank">
                                                                            <i class="voyager-cloud-download"></i>
                                                                            {{ $file->original_name }} </a> <br>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $msg->created_at)->format('d-m-Y') }}
                                                            à
                                                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $msg->created_at)->format('H:i') }}</span>

                                                    </div>
                                                </div>
                                            @else
                                                <div class="main-message-box st3">
                                                    <div class="message-dt st3">
                                                        <div class="message-inner-dt">
                                                            <p>{{ $msg->content }}</p>
                                                        </div>
                                                        <div class="lecture-btn pull-right">
                                                            @php
                                                                $files = json_decode($msg->files);
                                                            @endphp
                                                            @if ($files)
                                                                @foreach (@$files as $file)
                                                                    @if ($file)
                                                                        <a href="{{ Voyager::image($file->download_link) }}"
                                                                            target="_blank">
                                                                            <i class="voyager-cloud-download"></i>
                                                                            {{ $file->original_name }} </a> <br>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $msg->created_at)->format('d-m-Y') }}
                                                            à
                                                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $msg->created_at)->format('H:i') }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        {{--  <div class="main-message-box st3">
                                                        <div class="message-dt st3">
                                                            <div class="message-inner-dt">
                                                                <p>....</p>
                                                            </div>
                                                            <span>Typing...</span>
                                                        </div>
                                                    </div> --}}
                                    </div>
                                </div>

                                <div class="message-send-area">


                                    <div class="mf-field">
                                        <div class="ui search focus input__msg">
                                            <div class="ui left icon input swdh19" style="position : relative">
                                                <input type="hidden" name="receiver_id"
                                                    value="@if ($chat_id == 'new') {{ $user_id }} @else {{ $chat_receiver->user->id }} @endif">
                                                <input type="hidden" name="chat_id" value="{{ $chat_id }}">
                                                <input class="prompt srch_explore" type="text" style="width : 100%"
                                                    id="message" name="content" placeholder="écrire un message..."
                                                    required>
                                                <input type="file" class="custom-file-input"
                                                    style="right:45px ; width:30px !important" id="inputGroupFile"
                                                    name="files[]" multiple>
                                                <label class=" " for="inputGroupFile"
                                                    style="position: absolute; right: 10px; top: 10px;"><i
                                                        class="voyager-paperclip"></i></label>
                                            </div>
                                        </div>
                                        <button class="add_msg" type="submit" id="send"><i
                                                class="uil uil-message"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
           setTimeout(() => {
                var myDiv = document.getElementById('myDiv');

                // Scroll to the bottom of the div
                myDiv.scrollTop = myDiv.scrollHeight;

            }, 0);
        $i = 0;
        $("#send").click(function() {
            if($("#message").val() != ''){


            $i++;
            let senderMessage =
                `<div class="main-message-box ta-right">
                                                    <div class="message-dt" style="float:right">
                                                        <div class="message-inner-dt" style="min-width:100%">
                                                            <p>${ $("#message").val()}</p>
                                                        </div>
                                                        <div class="lecture-btn pull-right">
                                                            <span> &nbsp;</span>
                                                        </div>


                                                    </div>
                                                </div>`

            $("#chat-area").append(senderMessage);
            setTimeout(() => {
                var myDiv = document.getElementById('myDiv');

                // Scroll to the bottom of the div
                myDiv.scrollTop = myDiv.scrollHeight;

            }, 0);

            console.log($("#message").val())
            receiver_id = {{@$chat_id == 'new' ? selectedUser->id : @$chat_receiver->user->id}}
            $.post("/{{env('PROJECT_NAME')}}/intranet/sendMessage", {
                    content: $("#message").val(),
                    chat_id: "{{ @$chat_id }}",
                    receiver_id: receiver_id,
                },
                function(data, status) {
                    console.log("Data: " + data + "\nStatus: " + status);
                    // wssol el message
                    $('#message').val("")
                    let x = '#azerty' + $i
                    $(x).css("background-color", "yellow");
                }
            );
        }
        });

        $("#message").keyup(function(e) {
            if (e.keyCode == 13) {
                $.post("/{{env('PROJECT_NAME')}}/chat/{{ @$chat_id }}", {
                        message: $("#message").val(),
                    },
                    function(data, status) {
                        console.log("Data: " + data + "\nStatus: " + status);
                        let senderMessage = `<div class="main-message-box ta-right">
                                                    <div class="message-dt" style="float:right">
                                                        <div class="message-inner-dt" style="min-width:100%">
                                                            <p>${ $("#message").val()}</p>
                                                        </div>
                                                        <div class="lecture-btn pull-right">
                                                            <span> &nbsp;</span>
                                                        </div>

                                                    </div>
                                                </div>`
                        $("#chat-area").append(senderMessage);
                        $('#message').val("")
                        setTimeout(() => {
                            var myDiv = document.getElementById('myDiv');

                            // Scroll to the bottom of the div
                            myDiv.scrollTop = myDiv.scrollHeight;

                        }, 0);

                    }
                );
            }
        });









        Pusher.logToConsole = true;

        var pusher = new Pusher('b028126cce8f3345459f', {
            cluster: 'mt1'
        });
        var $uid = {{ auth()->user()->id}};

        var channel = pusher.subscribe('chat'+$uid);
        channel.bind('chatMessage', function(data) {
            console.log('receive', data)
            // JSON.stringify(data)
            let receiverMessage = `<div class="main-message-box st3">
                        <div class="message-dt st3">
                            <div class="message-inner-dt">
                                <p title="gtytyt">${data.message}</p>
                            </div>
                            <div class="lecture-btn pull-right">
                                {{-- @php
                                    $files = json_decode($msg->files);
                                @endphp
                                @if ($files)
                                    @foreach (@$files as $file)
                                        @if ($file)
                                            <a href="{{ Voyager::image($file->download_link) }}"
                                                target="_blank">
                                                <i class="voyager-cloud-download"></i>
                                                {{ $file->original_name }} </a> <br>
                                        @endif
                                    @endforeach
                                @endif --}}
                            </div>
                            <span> &nbsp;</span>
                        </div>
                    </div>`

                    if($uid != data.sender.id && data.receiver.chat_id == {{@$chat_id}}){
                        $("#chat-area").append(receiverMessage);

                    }else {
                        $("#last_message"+data.receiver.chat_id).text(data.message);
                        $("#last_message_info"+data.receiver.chat_id).addClass('new_message');
                    }

            setTimeout(() => {
                var myDiv = document.getElementById('myDiv');

                // Scroll to the bottom of the div
                myDiv.scrollTop = myDiv.scrollHeight;

            }, 0);

        });
    </script>

@endsection

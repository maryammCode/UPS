@extends('intranet.layouts.app')
@section('content')


    <div class="row">
        <div class="col-md-12 fcrse_2" style="padding-bottom: 25px;">
            <div class="value_content stage_header">
                <h4 class="">@lang('intranet.Nofications')</h4>
                {{-- <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"> + Ajouter </button> --}}
            </div>
        </div>
        @if ($notifications->count() > 0)
            <div class="_215td5 col-md-12" style="padding-top: 1px;">
                <div class="row">
                    <div class="col-12 col-md-12 p-0">
                        @if ($nb_notifications > 0)
                            <p style="margin-bottom: 5px;color:#0808ffa3; font-size: 12px;font-weight: bold">  {{$nb_notifications}} @lang('intranet.Notification(s) non lue')</p>
                        @endif
                        <div class="all_msg_bg mt-0">
                            @foreach ($notifications as $notification)
                                <div class="channel_my item all__noti5 @if($notification->seen == 0) not_seen @endif">
                                    <a
                                    href="{{ env('APP_URL') }}{{ $notification->link }}"
                                        onclick="notification_seen({{ $notification->id }})">
                                        <div class="profile_link" >
                                            <img src="{{ $notification->sender->entreprise_id ? Voyager::image(@$notification->sender->company->logo) : Voyager::image(@$notification->sender->avatar) }}"
                                                alt="">
                                            <div class="pd_content">
                                                <h6>{{ $notification->sender->entreprise_id ? $notification->sender->company->designation : $notification->sender->name }}
                                                    @if ($notification->seen == 0)
                                                        <span style="color:red">  <i class="uil uil-bell"></i></span>
                                                    @endif
                                                </h6>
                                                <p class="noti__text5">{{ $notification->text }}</p>
                                                <span
                                                    class="nm_time">{{ $notification->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            {{$notifications->links('pagination::bootstrap-4')}}
        @else
            <div class="col-md-12 ">
            @include('intranet.layouts.empty_status', [
                'message' => 'Aucune notification',
            ])
            </div>
        @endif
    </div>
    <script>
        function notification_seen(id) {
            console.log('hhhh' , id);
            var url = "{{ route('notification_seen', ":id"  )}}"
            url = url.replace(':id', id);
            console.log(url);
            $.ajax({
                type: "GET",
                url: url,

                success: function(data) {
                    console.log(data);


                }
            });
        }
    </script>
@endsection

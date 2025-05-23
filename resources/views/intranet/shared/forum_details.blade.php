@extends('intranet.layouts.app')
@section('content')
    <style>
        .sent_msg {
            float: right;
            width: 46%;

        }

        .input_msg_write {
            margin-top: 20px
        }

        .input_msg_write input {
            background: rgba(227, 227, 227, 0.585) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }

        .input_msg_write textarea {
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }

        .replytextarea {
            background: rgba(227, 227, 227, 0.585) none repeat scroll 0 0;
        }

        .input_msg_write textarea:focus,
        .input_msg_write input:focus {
            border: 1px solid #04488e;

        }

        .type_msg {


            position: relative;
        }

        .msg_send_btn {
            /* background: #05728f none repeat scroll 0 0; */
            background: #04488e;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;

            margin-right: 6px;
        }
    </style>
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

    <div class="student_reviews">
        <div class="row">
            <div class="col-lg-12">
                <div class="reviews_left" style="padding:10px !important;">

                    {{-- <div class="mb-3">
                            <form action="{{route('updateStatusClaim')}}" method="POST">
                                @csrf
                                <input type="hidden" name="claim_id" value="{{ $forum->id }}">
                                <button type="submit" class="btn btn-danger">Cloturer</button>
                            </form>
                        </div> --}}
                    <div class="rvds10 my_comment" style="margin:0;">
                        <div class="review_usr_dt">
                            <img src="@if (@$forum->user->avatar) {{ Voyager::image(@$forum->user->avatar) }}@else{{ asset('theme2/images/left-imgs/img-1.jpg') }} @endif"
                                alt="avatar">
                            <div class="rv1458">
                                <h4 class="tutor_name1" style="margin-top:7px;">{{ @$forum->user->name }}</h4>
                                <span class="time_145">{{ Carbon\Carbon::parse(@$forum->created_at)->format('d-m-Y') }}
                                    à {{ Carbon\Carbon::parse(@$forum->created_at)->format('H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <h3>{{ $forum->title }}</h3>

                         <a
                         href="@if($forum->file){{ Voyager::image(json_decode($forum->file)[0]->download_link) }}@endif" target="_blank"><i
                             class="fa fa-download"></i>@if($forum->file) {{ json_decode($forum->file)[0]->original_name }} @endif</a>
                        <div class="rv1458" style="position : absolute ; right : 28px; top : 87px">
                            @if ($forum->user_id == auth()->user()->id)
                                <form id="f{{ $forum->id }}"
                                    action="{{ route('deleteForum', [$forum->id]) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button style="padding: 5px;" type="button" class="btn btn-danger"
                                        onclick="sureDeleteComment({{ $forum->id }})"> <i
                                            class="voyager-trash"></i></button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="total_rating">

                        <div class="_rate001">
                            <p>{!! $forum->description !!}</p>
                        </div>
                    </div>
                    {{--
                    @if ($forum->file)
                        <div class="_rate003">
                            <div class="_rate004">
                                <div class="">
                                    <div>Ficher</div>
                                </div>

                                <a href="{{ Voyager::image($forum->file) }}" target="_blank">Piece jointe</a>

                                <div class="rating-box">
                                    <a href="{{ Voyager::image($forum->file) }}" target="_blank">
                                        <span class="uil uil-download-alt"></span>
                                    </a>
                                </div>
                                <div class="_rate002">{{ Carbon\Carbon::parse($forum->created_at)->format('d-m-Y') }}
                                    </div>
                            </div>
                        </div>
                    @endif --}}
                    {{-- <ul class="allcate15">
                        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Sujet')
                                    :</span>{{ $claim->subject }}</a></li>

                        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Nom et prénom')
                                    :</span>{{ $claim->name }}</a></li>
                        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Email') :</span>
                                {{ $claim->email }}</a></li>
                        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Destinataire') :</span>
                                {{ @$claim->destination->designation_fr }}</a>
                        </li>
                        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Etat') :</span>
                                @switch($claim['status'])
                                    @case(0)
                                        <span class="badge badge-primary">@lang('intranet.En cours')</span>
                                    @break

                                    @case(1)
                                        <span class="badge badge-danger"> @lang('intranet.Cloturer')</span>
                                    @break
                                @endswitch

                            </a></li>
                        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Priorité') :</span>
                                @switch($claim['priority'])
                                    @case(0)
                                        <span class="badge badge-primary">@lang('intranet.Normal') </span>
                                    @break

                                    @case(1)
                                        <span class="badge badge-warning"> @lang('intranet.Urgent')</span>
                                    @break

                                    @case(2)
                                        <span class="badge badge-danger"> @lang('intranet.Très urgent')</span>
                                    @break
                                @endswitch

                            </a>
                        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Type') :</span>
                                {{ $claim->type->designation_fr }}

                            </a>
                        <li><a href="#" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Responsable') :</span>
                                {{ @$claim->responsable->name }} </a>
                        </li>

                        @if (Auth::user()->role_id == $claim->destination->role_id)
                            <div>
                                <form action="{{route('add_responsable_claim')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                    <select name="responsible_id" id="" class="form-control">
                                        <option value="" selected disabled>@lang('intranet.Choisir')</option>
                                        @foreach ($users as $user)
                                        @if ($user->id != Auth::user()->id && $user->id != $claim->user_id)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary" type="submit">@lang('intranet.Affecter')</button>
                                </form>
                            </div>
                        @endif
                    </ul> --}}
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-11">

                @if ($comontaires->count() > 0)
                    <div class="review_all120" >
                        @foreach ($comontaires as $reponse)
                            <div class="review_item">
                                <div class="rvds10 my_comment" style="margin:0">
                                    <div class="review_usr_dt">
                                        <img src="@if (@$reponse->user->avatar) {{ Voyager::image(@$reponse->user->avatar) }}@else{{ asset('theme2/images/left-imgs/img-1.jpg') }} @endif"
                                            alt="">
                                        <div class="rv1458">
                                            <h4 class="tutor_name1" style="margin-top:7px;">{{ @$reponse->user->name }}

                                                {{-- &nbsp;&nbsp;<span class="badge badge-success">@lang('intranet.Support')</span> --}}

                                            </h4>
                                            <span
                                                class="time_145">{{ Carbon\Carbon::parse(@$reponse->created_at)->format('d-m-Y') }}
                                                à {{ Carbon\Carbon::parse(@$reponse->created_at)->format('H:i') }}</span>
                                        </div>
                                        <div class="rv1458" style="position : absolute ; right : 2px">
                                            @if ($reponse->user_id == auth()->user()->id)
                                                <form id="f{{ $reponse->id }}"
                                                    action="{{ route('deleteCommentForum', [$reponse->id]) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button style="padding: 5px;" type="button" class="btn btn-danger"
                                                        onclick="sureDeleteComment({{ $reponse->id }})"> <i
                                                            class="voyager-trash"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                    <p class="rvds10 my_comment_2">{!! $reponse->response !!}</p>
                                </div>


                                {{-- @foreach ($comment->replies as $reply)
                                    <div style="margin-left : 40px" class="rvds10 my_comment">
                                        <div class="review_usr_dt">
                                            <img src="@if ($reply->user->avatar) {{ Voyager::image($reply->user->avatar) }}@else{{ asset('theme2/images/left-imgs/img-1.jpg') }} @endif"
                                                alt="">
                                            <div class="rv1458">
                                                <h4 class="tutor_name1" style="margin-top:7px;">{{ $reply->user->name }}
                                                </h4>
                                                <span
                                                    class="time_145">{{ Carbon\Carbon::parse($reply->created_at)->format('d-m-Y') }}
                                                    à {{ Carbon\Carbon::parse($reply->created_at)->format('H:i') }}</span>
                                            </div>
                                            <div class="rv1458" style="position : absolute ; right : 0">
                                                @if (@$reply->user_id == auth()->user()->id)
                                                    <form id="f{{ $reply->id }}"
                                                        action="{{ route('delete_comment', [$reply->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button style="padding: 5px;" type="button" class="btn btn-danger"
                                                            onclick="sureDeleteComment({{ $reply->id }})"> <i
                                                                class="voyager-trash"></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="rvds10  my_comment_2">{!! $reply->content !!}</p>
                                    </div>
                                @endforeach
                                <div style="margin-left : 40px">
                                    <form action="{{ route('send_comment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <div class="type_msg">
                                            <div class="input_msg_write">
                                                <textarea type="text" class="write_msg replytextarea" name="content" required rows="1" data-min-rows="4"
                                                    placeholder="@lang('intranet.Entrez votre commentaire ici')"></textarea>
                                                <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                        @endforeach
                        <div class="review_item">
                            {{ $comontaires->links('pagination::bootstrap-4') }}
                        </div>
                    </div>


                @else
                    {{-- <div class="input_msg_write">
                        <p></p>
                    </div> --}}
                    <div class="col-md-12 fcrse_2 mt-0">
                        <div class="col-md-4">
                            {{-- <img src="{{ asset('theme2/images/smile.jfif') }}" alt=""> --}}
                            <i class="uil uil-box" style="text-align: center; font-size: 150px; color: #666;"></i>
                        </div>
                        <div class="col-md-8 title589">
                            <h2 style="margin-top: 82px;float: left;">@lang('intranet.Aucune réponse trouvée')</h2>
                        </div>

                    </div>
                @endif
                <div class="review_all120 container pb-3 pt-3">
                    <div class="col-md-12">
                        <form action="{{ route('forumComment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="forum_subject_id" value="{{ $forum->id }}">
                            <textarea class="autoExpand forumPost form-control write_msg" required rows="4" data-min-rows="4" name="response"
                                placeholder="@lang('intranet.Tapez votre message ici')" style="height: 69px; width: 100%;"></textarea><br>

                            <button class="forumPostButton btn btn-default btn_comment"
                                type="submit">@lang('intranet.Envoyer')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

    <script>
        function sureDeleteComment(id) {
            swal({
                    title: "êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier imaginaire!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Supprimer",
                    cancelButtonText: "Annuler",
                })
                .then((willDelete) => {
                    console.log(willDelete)
                    if (willDelete.value) {
                        document.getElementById('f' + id).submit()
                    }
                });
        }
    </script>
@endsection

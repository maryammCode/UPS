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
            <div class="col-lg-5">
                <div class="reviews_left">
                    @if ($claim->status == 0)
                        <div class="mb-3">
                            <form action="{{route('updateStatusClaim')}}" method="POST">
                                @csrf
                                <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                @if (($claim->type->module == 'absence' || $claim->type->module == 'note') && (Auth::user()->role_id == @$claim->destination->role_id || $claim->responsible_id == Auth::user()->id) )
                                    <select name="etat_reclamation"  class="form-control" style="width: min-content">
                                        <option value="" disabled selected>-- Choisir --</option>
                                        <option value="2">Corriger et clôturer</option>
                                        <option value="3">Rejeter et clôturer</option>
                                    </select>
                                @endif
                                <button type="submit" class="btn btn-danger">Cloturer</button>
                            </form>
                        </div>
                    @endif

                    @if ($claim->message)
                        <div class="total_rating">

                            <div class="_rate001">
                                <p>{!! $claim->message !!}</p>
                            </div>
                        </div>
                    @endif
                    @if ($claim->file)
                        <div class="_rate003">
                            <div class="_rate004">
                                {{-- <div class="">
                                    <div>Ficher</div>
                                </div> --}}

                                <a href="{{ Voyager::image($claim->file) }}" target="_blank">Piece jointe</a>

                                <div class="rating-box">
                                    <a href="{{ Voyager::image($claim->file) }}" target="_blank">
                                        <span class="uil uil-download-alt"></span>
                                    </a>
                                </div>
                                {{-- <div class="_rate002">{{ Carbon\Carbon::parse($claim->created_at)->format('d-m-Y') }}
                                    </div> --}}
                            </div>
                        </div>
                    @endif
                    <ul class="allcate15">
                        <li><a href="javascript:void(0)" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Sujet')
                                    :</span>{{ $claim->subject }}</a></li>

                        <li><a href="javascript:void(0)" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Nom et prénom')
                                    :</span>{{ $claim->name }}</a></li>
                        <li><a href="javascript:void(0)" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Email') :</span>
                                {{ $claim->email }}</a></li>
                        <li><a href="javascript:void(0)" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Destinataire') :</span>
                                {{ @$claim->destination->designation_fr }}</a>
                        </li>
                        <li><a href="javascript:void(0)" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
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
                        <li style="display: flex"><a href="javascript:void(0)" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Priorité') :</span>
                                @switch($claim['priority'])
                                    @case(0)
                                        <span class="badge badge-primary">@lang('intranet.Normal') </span>
                                    @break

                                    @case(1)
                                        <span class="badge badge-warning"> @lang('intranet.Moyenne')</span>
                                    @break

                                    @case(2)
                                        <span class="badge badge-danger"> @lang('intranet.Urgent')</span>
                                    @break
                                @endswitch


                            </a>
                            @if ( Auth::user()->role_id == @$claim->destination->role_id)
                                <form action="{{route('update_priority_claim')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                    <select name="priority" class="form-control" style="width: min-content" onchange="this.form.submit()">
                                        <option value="0" {{ isset($claim) && $claim->priority == 0 ? 'selected' : '' }}>@lang('intranet.Normal')</option>
                                        <option value="1" {{ isset($claim) && $claim->priority == 1 ? 'selected' : '' }}> @lang('intranet.Moyenne')</option>
                                        <option value="2" {{ isset($claim) && $claim->priority == 2 ? 'selected' : '' }}>@lang('intranet.Urgent')</option>
                                    </select>

                                </form>
                            @endif
                        </li>
                        <li><a href="javascript:void(0)" class="ct_item"><i class='uil uil-angle-double-right'></i> <span
                                    style="font-size: 15px;font-weight: 600;">@lang('intranet.Type') :</span>
                                {{ $claim->type->designation_fr }}

                            </a>
                        <li style="display: flex">
                            <a href="javascript:void(0)" class="ct_item"><i class='uil uil-angle-double-right'></i>
                                <span style="font-size: 15px;font-weight: 600;">@lang('intranet.Responsable') :</span>
                                @if ( Auth::user()->role_id != @$claim->destination->role_id)
                                    {{ @$claim->responsable->name }}
                                @endif
                            </a>
                            @if ( Auth::user()->role_id == @$claim->destination->role_id)
                                <form action="{{route('add_responsable_claim')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                    <select name="responsible_id" id="" class="form-control" style="width: min-content" onchange="this.form.submit()">

                                        @foreach ($users as $user)
                                        @if($user->id != Auth::user()->id && $user->id != $claim->user_id)
                                            <option value="{{ $user->id }}" @if($user->id == $claim->responsible_id) selected @endif>{{ $user->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                @if ($claim->status == 0)
                    <div class="card p-3 mb-3">
                        <div class="input_msg_write">
                            <form action="{{ route('ClaimComment') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="claim_id" value="{{ $claim->id }}">
                                <textarea class="autoExpand forumPost form-control write_msg" required rows="4" data-min-rows="4" name="message"
                                    placeholder="@lang('intranet.Tapez votre message ici')" style="height: 69px; width: 100%;border: groove;"></textarea><br>
                                    <input class="form-control mb-3" type="file" name="file">

                                <button class="forumPostButton btn btn-default btn_comment"
                                    type="submit">@lang('intranet.Envoyer')</button>
                            </form>
                        </div>
                    </div>
                @endif
                @if ($reponses->count() > 0)
                    <div class="review_all120">
                        @foreach ($reponses as $reponse)
                            <div class="review_item">
                                <div class="rvds10 my_comment">
                                    <div class="review_usr_dt">
                                        <img src="@if (@$reponse->user->avatar) {{ Voyager::image(@$reponse->user->avatar) }}@else{{ asset('theme2/images/left-imgs/img-1.jpg') }} @endif"
                                            alt="">
                                        <div class="rv1458">
                                            <h4 class="tutor_name1" style="margin-top:7px;">{{ @$reponse->user->name }}
                                                @if ( $reponse->user_id == $claim->responsible_id)
                                                    &nbsp;&nbsp;<span class="badge badge-success">@lang('intranet.Support')</span>
                                                @endif
                                                @if ( $reponse->user->role_id == $claim->destination->role_id)
                                                &nbsp;&nbsp;<span class="badge badge-success">{{$claim->destination->designation_fr}}</span>
                                            @endif

                                            </h4>
                                            <span
                                                class="time_145">{{ Carbon\Carbon::parse(@$reponse->created_at)->format('d-m-Y') }}
                                                à {{ Carbon\Carbon::parse(@$reponse->created_at)->format('H:i') }}</span>
                                        </div>
                                        {{-- <div class="rv1458" style="position : absolute ; right : 0">
                                            @if ($comment->user_id == auth()->user()->id)
                                                <form id="f{{ $comment->id }}"
                                                    action="{{ route('delete_comment', [$comment->id]) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button style="padding: 5px;" type="button" class="btn btn-danger"
                                                        onclick="sureDeleteComment({{ $comment->id }})"> <i
                                                            class="voyager-trash"></i></button>
                                                </form>
                                            @endif
                                        </div> --}}
                                    </div>

                                    <p class="rvds10 my_comment_2">{{ $reponse->message }}</p>
                                    @if ($reponse->file != null)
                                    <a href="{{ Voyager::image(json_decode($reponse->file)[0]->download_link) }}" target="_blank" >
                                        <i class="fa fa-download"></i>   {{ json_decode($reponse->file)[0]->original_name }}
                                    </a>
                                    @endif


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
                            {{ $reponses->links('pagination::bootstrap-4') }}
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

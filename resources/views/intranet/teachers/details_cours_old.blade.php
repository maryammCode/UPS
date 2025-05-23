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
                    <h3> Titre : {{ $course->designation_fr }}</h3>
                    @if ($course->description_fr)
                        <div class="total_rating">
                            <div class="_rate001">
                                <p>{!! $course->description_fr !!}</p>
                            </div>
                        </div>
                    @endif
                    <div class="_rate003">
                        <br>
                        <h3>Support de cours </h3>
                        @foreach (@$course->chapters as $chapter)
                            <div class="_rate004" style="    justify-content: space-between;">

                                    <div style="font-size: 16px">
                                        <a href="{{ Voyager::image($chapter->files) }}" target="_blank">
                                            <span class="uil uil-download-alt"></span>

                                        {{ $chapter->designation_fr }}
                                    </a>
                                    </div>





                                <div class="_rate002" style="float: right">{{ Carbon\Carbon::parse($chapter->created_at)->format('d-m-Y') }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                @if ($course->permission_comment == 'on')
                    <div class="input_msg_write">
                        <form action="{{ route('send_comment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <textarea class="autoExpand forumPost form-control write_msg" required rows="4" data-min-rows="4" name="content"
                                placeholder="@lang('intranet.Entrez votre commentaire ici')" style="height: 69px; width: 100%;"></textarea><br>
                            <button class="forumPostButton btn btn-default btn_comment"
                                type="submit">@lang('intranet.Commenter')</button>
                        </form>
                    </div>

                    <div class="review_right">
                        <div class="review_right_heading">
                            <h3>@lang('intranet.Commentaires')</h3>
                            {{-- <div class="review_search">
                                    <input class="rv_srch" type="text"
                                        placeholder="Commentaires" disabled>
                                </div> --}}
                        </div>
                    </div>
                    <div class="review_all120">
                        @foreach ($comments as $comment)
                            <div class="review_item">

                                <div class="rvds10 my_comment">
                                    <div class="review_usr_dt">
                                        <img src="@if ($comment->user->avatar) {{ Voyager::image($comment->user->avatar) }}@else{{ asset('theme2/images/left-imgs/img-1.jpg') }} @endif"
                                            alt="">
                                        <div class="rv1458">
                                            <h4 class="tutor_name1" style="margin-top:7px;">{{ $comment->user->name }}</h4>
                                            <span
                                                class="time_145">{{ Carbon\Carbon::parse($comment->created_at)->format('d-m-Y') }}
                                                à {{ Carbon\Carbon::parse($comment->created_at)->format('H:i') }}</span>
                                        </div>
                                        <div class="rv1458" style="position : absolute ; right : 0">
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
                                        </div>
                                    </div>

                                    <p class="rvds10 my_comment_2">{!! $comment->content !!}</p>
                                </div>


                                @foreach ($comment->replies as $reply)
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
                                </div>
                            </div>
                        @endforeach
                        <div class="review_item">
                            {{ $comments->links('pagination::bootstrap-4') }}
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
                            <h2 style="margin-top: 82px;float: left;">@lang('intranet.Commentaires non Autorisés')</h2>
                        </div>

                    </div>
                @endif

            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

    <script>
        function sureDeleteComment(id) {
            Swal({
                    title: "êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne serez pas en mesure de récupérer ce fichier imaginaire!",
                    icon: "warning",
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

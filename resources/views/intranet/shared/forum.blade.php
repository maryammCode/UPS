@extends('intranet.layouts.app')
@section('content')
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
        .light-theme .current {
            background: #1a47ac;
            color: #fff;
            border-color: #225b91;
            box-shadow: 0 1px 0 rgba(255, 255, 255, 1), 0 0 2px rgba(0, 0, 0, .3) inset;
            cursor: default;
        }

        .light-theme span {
            float: left;
            /* color: #666; */
            color: #1b1c1d;
            font-size: 14px !important;
            line-height: 30px !important;
            font-weight: 400;
            text-align: center;
            border: 1px solid #bbb;
            min-width: 14px;
            padding: 0 7px;
            margin: 0 5px 0 0;
            border-radius: 0px !important;
        }

        .light-theme a {
            border-radius: 0px !important;
            font-size: 14px !important;
            line-height: 30px !important;
        }
    </style>
    <div class="col-md-12 fcrse_2" style="padding-bottom: 20px !important">
        <div class="value_content" style="padding-bottom: 20px !important">
            <h4>@lang('intranet.Forums')</h4>
            {{-- <a href="{{ route('forum') }}" class="btn btn-primary"> + @lang('intranet.Ajouter') </a> --}}
        </div>

        <div class="specific_btn_modal" style="cursor: pointer">
            <a data-toggle="modal" data-target="#exampleModal">@lang('intranet.Posez votre question') +</a>
        </div>


        <div class="section3125">
            <div class="explore_search">
                <div class="ui search focus">
                    <div class="ui left icon input swdh11">
                        <input class="prompt srch_explore" type="text" placeholder="Recherche" id="myInput">
                        <i class="uil uil-search-alt icon icon2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (count($forums) > 0)
        <div id="myList">
            @foreach ($forums as $data)
                <div class="blogbg_1 mt-50 col-xl-12 col-lg-12 col-md-12 col-sm-6 col-12 myFilterDiv item"
                    style="margin-top:18px; position:relative">
                    {{-- <div class="col-md-2">
                <a href="{{ route('details_actualite', ['id' => $data->id]) }}" class="hf_img" style="width: 100% !important; height: 68px;">
                    <img src="{{ asset('theme2/images/blog/news.jpg') }}" alt="" style="height:68px;">

                    <div class="course-overlay"></div>
                </a>
                 </div> --}}

                    <div class="hs_content width_120 col-md-7">
                        <div class="vdtodt">
                            <span>@lang('intranet.Publiée le') {{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>

                        </div>
                        <a href="{{ route('forum_details', ['id' => $data->id]) }}"
                            class="crse14s title900">{{ $data->title }}</a>
                        {{-- <p class="blog_des">Donec eget arcu vel mauris lacinia vestibulum id eu elit. Nam metus
                    odio, iaculis eu nunc et, interdum mollis arcu. Pellentesque viverra faucibus diam.
                    In sit amet laoreet dolor, vitae fringilla quam interdum mollis arcu.</p> --}}

                    </div>
                    <div class="col-md-3" style="position:initial;">
                        <a href="{{ route('forum_details', ['id' => $data->id]) }}" style="bottom: 22px;"
                            class="view-blog-link nachd_news zoom">@lang('intranet.Voir plus')<i class="uil uil-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container row" style="padding-top: 30px;">
            {{-- {{ $forums->links('pagination::bootstrap-4') }} --}}
            <div id="pagination"></div>
        </div>
    @else
        @include('intranet.layouts.empty_status', ['message' => 'Données non disponibles pour le moment'])
    @endif

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog add_stage" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">@lang('intranet.Posez votre question')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('addForum') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body ">
                        <div class="ui search focus mt-10">
                            <label for="">@lang('intranet.Titre')</label>
                            <div class="ui left icon input swdh11 swdh19">
                                <input type="text" name="title" placeholder="@lang('intranet.Titre')" class="form-control">
                            </div>
                        </div>
                        <div class="ui search focus mt-30">
                            <label for="">@lang('intranet.Description')</label>
                            <div class="ui form swdh30">
                                <div class="field">
                                    <textarea rows="6" name="description" placeholder="@lang('intranet.Description')"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group1 mt-30">
                            {{-- <label for="file5">@lang("intranet.Ajouter une capture d'écran (facultative)")</label>
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" id="file5" type="file" name="file"
                                    onchange="readURL(this);" accept="image/*">
                                <div class="drag-text">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h4>@lang("intranet.Sélectionnez les captures d'écran à télécharger")</h4>

                                </div>
                            </div> --}}
                            <label
                            class="label25 text-left mt-30 ">@lang('intranet.Photo')</label>
                        <div class="thumb-item ">
                            <img src="images/thumbnail-demo.jpg"
                                alt="">
                            <div class="thumb-dt filerequired p-0">
                                <div class="upload-btn p-4 ">
                                    <input class="uploadBtn-main-input"
                                        type="file"
                                        id="ThumbFile__input--source" required
                                        name="file" onchange="fileUpload()" >

                                    <label for="ThumbFile__input--source"
                                        title="Zip">@lang("intranet.Déposez votre photo d'identité")</label>
                                    <div class="uploadBtn-main-file">
                                        @lang('intranet.Size: 590x300 pixels. Supports: jpg,jpeg, or png')</div>
                                        <p id="showFile"></p>
                                </div>
                            </div>
                        </div>
                        </div>
                        {{-- <button class="save_btn color-btn-ups" type="submit">@lang('intranet.Envoyer vos avis')</button> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myList .myFilterDiv").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.min.js"></script>
    <script>
        $("#myList .item").slice(2).hide();
        $('#pagination').pagination({

            // Total number of items present
            // in wrapper class
            items: {{ $forums->count() }},

            // Items allowed on a single page
            itemsOnPage: 2,
            onPageClick: function(noofele) {
                $("#myList .item").hide()
                    .slice(2 * (noofele - 1),
                        2 + 2 * (noofele - 1)).show();
            }
        });


        function fileUpload() {
            var file = document.getElementById("ThumbFile__input--source").files[0];
            document.getElementById("showFile").innerHTML = file.name + "(" + (file.size / 1024).toFixed('3') +
                " Ko )";
        }
    </script>
@endsection

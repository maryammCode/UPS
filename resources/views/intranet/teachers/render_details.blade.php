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
    <button onclick="window.history.back();" class="btn btn-primary">@lang('intranet.Retour à la liste principale')</button>
    <div class="student_reviews">
        <div class="row">
            <div class="col-lg-5">
                <div class="reviews_left">
                        <div class="total_rating">
                            <div class="_rate001">
                                <p> {!! $render->description!!}</p>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="review_all120">
                    <table id="render" class="table ucp-table display" style="width:100%">
                        <thead class="thead-s">
                            <tr>
                                <th class="specific_th">#</th>
                                <th class="specific_th">@lang('intranet.Nom & Prénom')</th>
                                <th class="specific_th">@lang('intranet.Fichiers')</th>
                                <th class="specific_th">@lang("intranet.Date d'envoi")</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student_renders as $student_render)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $student_render->userRenders->name }} </td>
                                    <td>

                                        @if ($student_render->files)
                                            @php
                                                $files = json_decode($student_render->files);

                                            @endphp
                                            @if (count(@$files) > 0)
                                                @foreach ($files as $file )
                                                    <a href="{{ Voyager::image($file->download_link) }}"
                                                        download="{{ $file->download_link }}"
                                                        target="_blank" style="color:blue;font-size:14px;">{{ $file->original_name }}  <i class="uil uil-download-alt"></i></a><br>
                                                @endforeach
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($student_render->created_at)->format('d-m-Y') }} à {{ Carbon\Carbon::parse($student_render->created_at)->format('H:i') }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="thead-s">
                            <tr>
                                <th class="specific_th">#</th>
                                <th class="specific_th">@lang('intranet.Nom & Prénom')</th>
                                <th class="specific_th">@lang('intranet.Fichiers')</th>
                                <th class="specific_th">@lang("intranet.Date d'envoi")</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="review_item">
                        {{-- {{ $reponses->links('pagination::bootstrap-4') }} --}}
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
    @section('specific_js')
    <script src="{{ asset('public/data_table/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#render').DataTable();
        });
    </script>
@endsection

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

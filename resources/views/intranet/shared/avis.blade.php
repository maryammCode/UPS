@extends('intranet.layouts.app')
@section('content')
    @if (Session::has('success'))
        <script type="text/javascript">
            var msg = '{{ session('success') }}';
            swal({
                title: 'Merci',
                text: msg,

                type: 'success',

                toastr: true,
                timer: 5000,
                showConfirmButton: false
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal({
                text: msg,
                title: '',
                type: 'warning',
                toastr: true,
                timer: 5000,
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
        <script type="text/javascript">
            var msg = '{{ session('warning') }}';
            swal(
                msg,
                'réessayer SVP',
                'danger'
            )
        </script>
    @endif

    <h2 class="st_title"><i class="uil uil-comment-info-alt"></i>@lang('intranet.Envoyer vos avis')</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            @if (Session::has('success3'))
                <div class="alert alert-success">@lang('translate.Votre avis envoyé avec succés') </div>
            @endif
            <form action="{{ route('send_feedback') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ui search focus">
                    <label for="">@lang('intranet.Sujet')</label>
                    <div class="ui left icon input swdh11 swdh19">
                        <select class="ui hj145 dropdown cntry152 prompt srch_explore mt-10" name="subject">
                            <option value="Avis">@lang('intranet.Avis')</option>
                            <option value="Suggestion">@lang('intranet.Suggestion')</option>
                            <option value="Réclamation">@lang('intranet.Réclamation')</option>
                        </select>
                    </div>
                </div>
                <div class="ui search focus mt-30">
                    <div class="ui form swdh30">
                        <div class="field">
                            <textarea rows="6" name="message" id="id_about" placeholder="@lang('intranet.Décrivez votre problème ou partagez vos idées')"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group1 mt-30">
                    <label for="file5">@lang("intranet.Ajouter une capture d'écran (facultative)")</label>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" id="file5" type="file" name="file"
                            onchange="readURL(this);" accept="image/*">
                        <div class="drag-text">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <h4>@lang("intranet.Sélectionnez les captures d'écran à télécharger")</h4>
                            {{-- <p>@lang('intranet.or drag and drop screenshots')</p> --}}
                        </div>
                    </div>
                </div>
                <button class="save_btn color-btn-ups" type="submit">@lang('intranet.Envoyer vos avis')</button>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

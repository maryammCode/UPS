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

    <h2 class="st_title"><i class="uil uil-comment-info-alt"></i>@lang('intranet.Envoyer votre testimonial')</h2>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            {{-- @if (Session::has('success3'))
                <div class="alert alert-success">@lang('translate.Votre avis envoyé avec succés') </div>
            @endif --}}
            <form action="{{ route('sendTestimonial') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="ui search focus mt-30">
                    <div class="ui form swdh30">
                        <div class="field">
                            <textarea rows="6" name="message" id="id_about" placeholder="@lang('intranet.Décrivez votre problème Testimonial')" >@if($testimonial != null) {{ $testimonial->message }} @endif</textarea>
                        </div>
                    </div>
                </div>
                <button class="save_btn color-btn-ups" type="submit">@lang('intranet.Envoyer')</button>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

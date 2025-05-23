@extends('intranet.layouts.app')
@section('content')
<style>
    .form-control {
        border-color : #939393
    }
</style>
    @if(Session::has('success'))
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
      <script type="text/javascript">
          var msg = '{{ session('success') }}';
          swal({
                text:msg , title :'Merci',
                type : 'success' , toastr : true  , timer:3000,
                showConfirmButton : false
            }
            )
      </script>
    @endif
    @if(Session::has('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>
        <script type="text/javascript">
            var msg = '{{ session('error') }}';
            swal({
                text:msg , title :'réessayer SVP',
                type : 'warning' , toastr : true  , timer:3000,
                showConfirmButton : false
            }
            )
        //     swal(
        //     '',
        //     msg,
        //     'warning'
        //   )
        </script>
    @endif
    @if(Session::has('warning'))
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
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="account_setting" style="margin-top: 0px;    margin-top: 0px;">
                {{-- <h4>Votre compte</h4> --}}
                <div class="basic_profile fcrse_2 mb-10 " style="margin-top:0px">
                    <div class="basic_ptitle">
                        <h4>@lang('intranet.Votre compte')</h4>
                        <p>@lang('intranet.Informations personnelles')</p>
                    </div>
                    <div class="basic_form">
                        <div class="row">
                            <div class="col-lg-12" style="margin-bottom: 0px;">
                                {{-- @if (Session::has('success4'))
                                    <div class="alert alert-success">@lang('translate.Votre modification est terminer avec succès') </div>
                                @endif  --}}
                                <div class="row">
                                    <form action="{{route('update_profil')}}" method="POST" style="width: 100%">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="mt-10">

                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Nom et prénom')*
                                                    </label>
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ @Auth::user()->name }}" id="id[name]" required="" maxlength="64"
                                                        placeholder="@lang('intranet.Nom et prénom')*" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Adresse Email')*
                                                    </label>
                                                    <input class="form-control" type="email" name="surname"
                                                        value="{{ @Auth::user()->email }}" id="id[surname]" required="" maxlength="64"
                                                        placeholder="@lang('intranet.Adresse Email')*" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Date de naissance')*
                                                    </label>
                                                    <input class="form-control" type="date" name="date_naissance"
                                                        value="{{ @Auth::user()->date_naissance }}" id="id[surname]" required=""
                                                        placeholder="@lang('intranet.Date de naissance')*" @if(@Auth::user()->date_naissance != null)disabled @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Adresse')
                                                    </label>
                                                    <input class="form-control" type="text" name="address"
                                                        value="{{ @Auth::user()->address }}" id="id[surname]" required=""
                                                        placeholder="@lang('intranet.Adresse')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.N° Téléphone')
                                                    </label>
                                                    <input class="form-control" type="text" name="phone"
                                                        value="{{ @Auth::user()->phone }}" id="id[surname]" required=""
                                                        placeholder="@lang('intranet.Numéro de téléphone')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Deuxième N° Téléphone')
                                                    </label>
                                                    <input class="form-control" type="text" name="phone2"
                                                        value="{{ @Auth::user()->phone2 }}" id="id[surname]" required=""
                                                        placeholder="@lang('intranet.Deuxième numéro de téléphone')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Compte LinkedIN')
                                                    </label>
                                                    <input class="form-control" type="text" name="linkedin"
                                                        value="{{ @Auth::user()->linkedin }}" id="id_headline" required=""
                                                        placeholder="@lang('intranet.Compte LinkedIN')" pattern="^(https://www.linkedin.com/)+[a-zA-Z1-9//]+.*" title="https://www.linkedin.com/...">
                                                    {{-- <div class="form-control-counter"
                                            data-purpose="form-control-counter">36</div> --}}
                                                </div>

                                            </div>
                                        </div>

                                        <button class="save_btn2 profile_btn" type="submit" >@lang('intranet.Sauvegarder les modifications')</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="basic_profile1 fcrse_2 mb-5">
                    <div class="basic_ptitle">
                        <h4>@lang('intranet.Sécurité')</h4>
                    </div>
                    <div class="basic_form">
                        <div class="row">
                            <div class="col-lg-12" >
                                {{-- @if (Session::has('success5'))
                                    <div class="alert alert-success">@lang('translate.Votre mot de passe a été bien modifié') </div>
                                @endif  --}}
                                <div>
                                    <form action="{{route('update_password')}}" method="POST">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Mot de passe actuel')*
                                                    </label>
                                                    <input class="form-control" type="password" name="current_password"
                                                        value="" id="id_site" required=""
                                                        placeholder="@lang('intranet.Mot de passe actuel')*">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ui left icon labeled input swdh11 swdh31 --}}
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Nouveau mot de passe')*
                                                    </label>
                                                    <input class="form-control" type="password" name="new_password"
                                                        id="id_facebook" required=""
                                                        placeholder="@lang('intranet.Nouveau mot de passe')*">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Confirmez votre nouveau mot de passe')*
                                                    </label>
                                                    <input class="form-control" type="password" name="confirm_password"
                                                        id="id_twitter" required=""
                                                        placeholder="@lang('intranet.Confirmez votre nouveau mot de passe')*">
                                                </div>
                                                

                                            </div>
                                        </div>
                                        <button class="save_btn2" type="submit" style="background:#ffbc3b;">@lang('intranet.Sauvegarder les modifications')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- left sidebar start --}}
        <div class="col-xl-4 col-lg-5">
            <div class="right_side">
                <div class="fcrse_2 mb-30">
                    <div class="tutor_img">
                        <a href="#"><img src="{{ Voyager::image(@Auth::user()->avatar) }}" alt="avatar"></a>
                    </div>
                    <div class="tutor_content_dt">
                        <form action="{{route('update_avatar')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="thumb-item " style="margin-bottom: 0px !important;" >
                                <img src="images/thumbnail-demo.jpg"
                                    alt="">
                                <div class="thumb-dt filerequired p-0">
                                    <div class="upload-btn">
                                        <input class="uploadBtn-main-input"
                                            type="file"
                                            id="ThumbFile__input--source" required
                                            name="avatar">

                                        <label for="ThumbFile__input--source"
                                            title="Zip">@lang("intranet.Déposez votre photo d'identité")</label>
                                            <div
                                            class="uploadBtn-main-file">@lang('intranet.Size: 590x300 pixels. Supports: jpg,jpeg, or png')</div>

                                    </div>
                                 </div>
                            </div>
                            <button class="save_btn2" type="submit" style="background:#ffbc3b;">@lang('intranet.Sauvegarder les modifications')</button>
                        </form>

                       @include('public.widgets.donnees_universitaire')
                    </div>
                </div>
            </div>
        </div>
        {{-- left sidebar end --}}

    </div>
@endsection

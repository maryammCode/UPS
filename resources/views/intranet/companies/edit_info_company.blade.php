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
        <div class="col-xl-12 col-lg-12">
            <div class="account_setting" style="margin-top: 0px;    margin-top: 0px;">
                <div class="basic_profile fcrse_2 mb-10 " style="margin-top:0px">
                    <div class="basic_ptitle">
                        <h4>@lang('intranet.Votre compte')</h4>
                        <p>@lang("intranet.Informations d'entreprise")</p>
                    </div>
                    <div class="basic_form">
                        <div class="row">
                            <div class="col-lg-12" style="margin-bottom: 0px;">
                                <div class="row">
                                    <form action="{{route('updateInfoCompany')}}" method="POST" style="width: 100%" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="entreprise_id" value="{{ $company->id }}" hidden>
                                        <div class="col-lg-12">
                                            <div class="mt-10">

                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Domaine')*
                                                    </label>
                                                  <select name="domaine_id" id="" class="form-control">
                                                        <option value="" disabled>@lang('intranet.Choisir')</option>
                                                        @foreach ($domaines as $domaine )
                                                            <option value="{{ $domaine->id }}" {{ $company->domaine_id == $domaine->id ? 'selected' : '' }}>{{ $domaine->designation_fr }}</option>
                                                        @endforeach
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mt-10">

                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Désignation')*
                                                    </label>
                                                    <input class="form-control" type="text" name="designation"
                                                        value="{{ $company->designation }}" id="id[name]" required="" maxlength="64"
                                                        placeholder="@lang('intranet.Désignation')*" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Adresse Email')*
                                                    </label>
                                                    <input class="form-control" type="email" name="email"
                                                        value="{{ $company->email }}" id="id[surname]" required="" maxlength="64"
                                                        placeholder="@lang('intranet.Adresse Email')*" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Site web')
                                                    </label>
                                                    <input class="form-control" type="text" name="website"
                                                        value="{{ $company->website }}" id="id[surname]"
                                                        placeholder="@lang('intranet.Site web')*">
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
                                                        value="{{ $company->address }}" id="id[surname]" required=""
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
                                                        value="{{ $company->phone }}" id="id[surname]" required=""
                                                        placeholder="@lang('intranet.Numéro de téléphone')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.N° Fax')
                                                    </label>
                                                    <input class="form-control" type="text" name="fax"
                                                        value="{{ $company->fax }}" id="id[surname]"
                                                        placeholder="@lang('intranet.Fax')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Responsable')
                                                    </label>
                                                    <input class="form-control" type="text" name="responsable_name"
                                                        value="{{$company->responsable_name }}" id="id[surname]" required=""
                                                        placeholder="@lang('intranet.Responsable')">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Lien de géolocalisation')
                                                    </label>
                                                    <input class="form-control" type="text" name="location"
                                                    value="{{$company->location }}" id="id[surname]"
                                                    placeholder="@lang('intranet.Lien de géolocalisation')">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class=" mt-10">
                                                <div class="form-group">
                                                    <label class="w_font_bold">
                                                        @lang('intranet.Description')
                                                    </label>
                                                    <textarea class="form-control" name="description"  cols="30" rows="10">{{ $company->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <label class="w_font_bold">
                                                @lang('intranet.Logo')
                                            </label>
                                            @if ($company->logo)
                                                <img src="{{ Voyager::image($company->logo) }}" alt="logo" height="80">
                                            @endif
                                            <div class="thumb-item " style="margin-bottom: 0px !important;" >
                                                <img src="images/thumbnail-demo.jpg"
                                                    alt="">
                                                <div class="thumb-dt filerequired p-0">
                                                    <div class="upload-btn">
                                                        <input class="uploadBtn-main-input"
                                                            type="file"
                                                            id="ThumbFile__input--source"
                                                            name="logo">
                                                        <label for="ThumbFile__input--source"
                                                            title="Zip">@lang("intranet.Déposez votre logo")</label>
                                                            <div
                                                            class="uploadBtn-main-file">@lang('intranet.Size: 590x300 pixels. Supports: jpg,jpeg, or png')</div>
                                                    </div>
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

            </div>

        </div>
    </div>
@endsection

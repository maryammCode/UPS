@extends('intranet.layouts.auth')

@section('content_auth')
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
    <div class="sign_form">
        <div class="main-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item " style="width: 100%;">
                    <a href="#instructor-signup-tab" id="instructor-tab" class="nav-link active"
                        data-toggle="tab">@lang('intranet.Entreprise')</a>
                </li>

            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="instructor-signup-tab" role="tabpanel"
                aria-labelledby="instructor-tab">
                <p>{{ __('Register') }}</p>
                <form method="POST" action="{{ route('register_company') }}">
                    @csrf

                    @php
                        $role = TCG\Voyager\Models\Role::where('name','Etudiant')->first();
                    @endphp
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="company_designation" type="text" class="form-control @error('company_designation') is-invalid @enderror"
                                name="company_designation" value="{{ old('company_designation') }}" required autocomplete="company_designation" autofocus
                                placeholder="Designation">

                                @error('company_designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('intranet.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    {{-- @lang('intranet.cin') --}}
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="company_email" type="company_email" class="form-control @error('company_email') is-invalid @enderror"
                                name="company_email" value="{{ old('company_email') }}" required autocomplete="company_email"
                                placeholder="Email">

                                @error('company_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('intranet.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="company_phone" type="company_phone" class="form-control @error('company_phone') is-invalid @enderror"
                                name="company_phone" value="{{ old('company_phone') }}" required autocomplete="company_phone"
                                placeholder="Téléphone">

                                @error('company_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('intranet.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="company_address" type="company_address" class="form-control @error('company_address') is-invalid @enderror"
                                name="company_address" value="{{ old('company_address') }}" required autocomplete="company_address"
                                placeholder="Adresse">

                                @error('company_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('intranet.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h3>@lang('intranet.Responsable')</h3>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="company_user_name" type="company_user_name" class="form-control @error('company_user_name') is-invalid @enderror"
                                name="company_user_name" value="{{ old('company_user_name') }}" required autocomplete="company_user_name"
                                placeholder="Nom et prénom">

                                @error('company_user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('intranet.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="company_user_email" type="company_user_email" class="form-control @error('company_user_email') is-invalid @enderror"
                                name="company_user_email" value="{{ old('company_user_email') }}" required autocomplete="company_user_email"
                                placeholder="Email">

                                @error('company_user_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('intranet.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="company_user_password" type="password"
                                class="form-control @error('company_user_password') is-invalid @enderror" name="company_user_password" required
                                autocomplete="new-company_user_password" placeholder="Mot de passe">
                                @error('company_user_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('intranet.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirmez votre mot de passe">
                        </div>
                    </div>
                    <button class="login-btn" type="submit">@lang("intranet.S'inscrire")</button>
                </form>
            </div>

        </div>
        <p class="mb-0 mt-30">@lang('intranet.Vous avez déjà un compte?') <a href="{{route('login')}}">@lang("intranet.Se connecter")</a></p>
        <p class="mb-0 mt-30 hvsng145"> <i class="uil uil-angle-double-left" style="font-size:18px;"></i> <a href="{{route('index')}}" style="color:#4479a3;;" >@lang('intranet.Retourner vers le site') </a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

@endsection

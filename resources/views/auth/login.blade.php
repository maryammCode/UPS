@extends('intranet.layouts.auth')

@section('content_auth')


    <div class="sign_form">
        {{-- <h2>{{ __('Login') }}</h2> --}}
        <h2>@lang('translate.Bienvenu(e)')</h2>
        <p>@lang("translate.Veuillez saisir vos paramètres d'accès à votre compte!")</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="ui search focus mt-15">
                <div class="ui left icon input swdh95">
                    <input class="prompt srch_explore @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" id="email" required maxlength="100" placeholder="Email" autocomplete="email" autofocus>
                    <i class="uil uil-envelope icon icon2"></i>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>@lang('translate.Vérifier vos coordonnées !')</strong>
                    </span>
                @enderror
                </div>
            </div>
            {{-- <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}

            <div class="ui search focus mt-15">
                <div class="ui left icon input swdh95">
                    <input class="prompt srch_explore @error('password') is-invalid @enderror" type="password" name="password" value="" id="password" required autocomplete="current-password" maxlength="100" placeholder="Password">
                    <i class="uil uil-key-skeleton-alt icon icon2"></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>@lang('translate.Vérifier vos coordonnées !')</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}


            <div class="ui form mt-30 checkbox_sign">
                <div class="inline field">
                    <div class="ui checkbox mncheck">
                        <input type="checkbox" tabindex="0" class="hidden" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label  for="remember" >{{ __('Remember Me') }}</label>
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div> --}}


            {{-- <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div> --}}

            {{-- <button class="login-btn" type="submit"> {{ __('Login') }}</button> --}}
            <button class="login-btn" type="submit">@lang('intranet.Se connecter')</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}" style="margin-top: 25px;">
                    @lang('intranet.Mot de passe oublié? Cliquez ici.')
                </a>
                {{-- {{ __('Forgot Your Password?') }} --}}
            @endif
        </form>
        {{-- <p class="sgntrm145">Or <a href="forgot_password.html">Forgot Password</a>.</p> --}}
        <p class="mb-0 mt-30 hvsng145">@lang("intranet.Vous n'avez pas de compte?")<a href="{{route('register')}}" style="color:#4479a3;;" > @lang("intranet.S'inscrire")</a></p>
        <p class="mb-0 mt-30 hvsng145">@lang("intranet.Vous n'avez pas de compte?")<a href="{{route('show_register_company')}}" style="color:#4479a3;;" > @lang("intranet.S'inscrire pour une société")</a></p>
        <p class="mb-0 mt-30 hvsng145"> <i class="voyager-double-left"></i> <a href="{{route('index')}}" style="color:#4479a3;;" >@lang('intranet.Retourner vers le site') </a></p>


    </div>



    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div> --}}
@endsection



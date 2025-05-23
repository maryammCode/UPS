@extends('intranet.layouts.auth')

@section('content_auth')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="sign_form">
        <h2>{{ __('Reset Password') }}</h2>
        <h6>
            Veuillez saisir votre adresse email avec laquelle vous avez effectué votre inscription dans l'espace UPS. Un lien de réinitialisation de votre mot de passe vous sera envoyé
        </h6>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="ui search focus mt-50">
                <div class="ui left icon input swdh95">
                    <input class="prompt srch_explore @error('email') is-invalid @enderror"  type="email" name="email" value=""
                        id="email" required autocomplete="email" autofocus maxlength="100" placeholder="{{ __('Email Address') }}">
                    <i class="uil uil-envelope icon icon2"></i>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button class="login-btn" type="submit">{{ __('Send Password Reset Link') }}</button>
        </form>
        <p class="mb-0 mt-30"> <i class="uil uil-angle-double-left" style="font-size:18px;"></i>  @lang('intranet.Retourner vers')<a href="{{route('login')}}"> @lang('intranet.Se connecter')</a></p>
        <p class="mb-0 mt-30 hvsng145"> <i class="uil uil-angle-double-left" style="font-size:18px;"></i> <a href="{{route('index')}}" style="color:#4479a3;;" >@lang('intranet.Retourner vers le site') </a></p>
    </div>
@endsection

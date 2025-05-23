@extends('intranet.layouts.auth')

@section('content_auth')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @include('public.widgets.sweet_alert')
    <div class="sign_form">
        <div class="main-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item " style="width: 50%;">
                    <a href="#instructor-signup-tab" id="instructor-tab" class="nav-link active"
                        data-toggle="tab">@lang('translate.Etudiant')</a>
                </li>
                <li class="nav-item " style="width: 50%;">
                    <a href="#student-signup-tab" id="student-tab" class="nav-link" data-toggle="tab">@lang('translate.Enseignant')</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="instructor-signup-tab" role="tabpanel"
                aria-labelledby="instructor-tab">
                <p>{{ __('Register') }}</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    @php
                        $role = TCG\Voyager\Models\Role::where('name','Etudiant')->first();
                    @endphp
                    <input type="hidden" name="role_type" value="student">
                    <!-- <input type="hidden" name="role_id" value="{{@$role->id}}"> -->
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror"
                                name="cin" value="{{ old('name') }}" required autocomplete="cin" autofocus
                                placeholder="CIN / ID inscription étrangère">

                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('translate.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    {{-- @lang('translate.cin') --}}
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('translate.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('translate.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirmez votre nouveau mot de passe">
                        </div>
                    </div>
                    <button class="login-btn" type="submit">@lang("translate.S'nscrire en tant que étudiant")</button>
                </form>
            </div>
            <div class="tab-pane fade" id="student-signup-tab" role="tabpanel" aria-labelledby="student-tab">
                <p>{{ __('Register') }}</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @php
                        $role = TCG\Voyager\Models\Role::where('name','Enseignant')->first();
                    @endphp
                    <input type="hidden" name="role_type" value="teacher">
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror"
                                name="cin" value="{{ old('cin') }}" required autocomplete="cin" autofocus
                                placeholder="CIN">

                                @error('cin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('translate.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('translate.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>@lang('translate.Vérifier vos coordonnées !')</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="ui form swdh30 mt-15">
                        <div class="field">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirmez votre nouveau mot de passe">
                        </div>
                    </div>
                    <button class="login-btn" type="submit">@lang("translate.S'nscrire en tant que enseignant")</button>
                </form>
            </div>
        </div>
        <p class="mb-0 mt-30">@lang('translate.Vous avez déjà un compte?') <a href="{{route('login')}}">@lang("translate.Se connecter")</a></p>
        <p class="mb-0 mt-30 hvsng145"> <i class="uil uil-angle-double-left" style="font-size:18px;"></i> <a href="{{route('index')}}" style="color:#4479a3;;" >@lang('intranet.Retourner vers le site') </a></p>
    </div>
@endsection

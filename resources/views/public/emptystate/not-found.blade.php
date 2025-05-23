@extends('public.layouts.app')

@section('content')
    @php
        $lang = session('lang', config('app.locale'));
        if (!$lang) {
            $lang = App::getLocale();
        }
        app()->setLocale(session('lang', config('app.locale')));
    @endphp
    <!-- breadcrumb area start -->
    <section class="breadcrumb-height ns-breadcrumb-area"
        data-background="{{ asset('enis/img/breadcrumb/breadcrumb-bg.jpg') }}">
        <img src="{{ asset('enis/img/breadcrumb/shape-1.png') }}" alt="" class="ns-breadcrumb-shape-1">
        <img src="{{ asset('enis/img/breadcrumb/breadcrumb-map.png') }}" alt="" class="ns-breadcrumb-map">
        <img src="{{ asset('enis/img/breadcrumb/shape-2.png') }}" alt="" class="ns-breadcrumb-shape-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-breadcrumb-wrap text-center">
                        <h2 class="ns-breadcrumb-title">@lang('translate.Erreur')</h2>
                        <div class="ns-breadcrumb-list">
                            <a href="index-2.html">@lang('translate.Home')</a>
                            <span>@lang('translate.Erreur')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- error area start -->
    <div class="ns-error-area pt-70 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-error-wrap text-center">
                        <div class="ns-error-img">
                            <img src="{{ asset('enis/img/error/error.png') }}" alt="">
                        </div>
                        <div class="ns-error-content">
                            <a href="{{ route('index') }}" class="ns-theme-btn">@lang('translate.Home')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- error area end -->
@endsection

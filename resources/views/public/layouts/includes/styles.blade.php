@php
    $lang = session('lang', config('app.locale'));
    app()->setLocale($lang);
@endphp




<!-- Stylesheet -->

<link rel="stylesheet" href="{{ asset('enis/css/lightbox.min.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/lang-share-widgets.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/icofont.min.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/fontawesome-all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/odometer.min.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/nice-select.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/meanmenu.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/swipper.css') }}" />

@if (app()->getLocale() == 'ar')

{{-- @dd('aze') --}}
<link rel="stylesheet" href="{{ asset('enis/css/dropdown-menu-rtl.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/main-rtl.css') }}" />
@else

{{-- @dd('aze') --}}

<link rel="stylesheet" href="{{ asset('enis/css/dropdown-menu.css') }}" />
<link rel="stylesheet" href="{{ asset('enis/css/main.css') }}" />

@endif


{{-- Calendar-theme --}}
<link href='{{ asset('calendar-theme/fullcalendar/packages/core/main.css') }}' rel='stylesheet' />
<link href='{{ asset('calendar-theme/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />



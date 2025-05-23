@php
    $lang = session('lang', config('app.locale'));
    app()->setLocale($lang);
@endphp






<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7"></script>

<script src="{{ asset('enis/js/fslightbox.js') }}"></script>
<script src="{{ asset('enis/js/jquery.min.js') }}"></script>
<script src="{{ asset('enis/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('enis/js/swipper-bundle.min.js') }}"></script>
<script src="{{ asset('enis/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('enis/js/wow.min.js') }}"></script>
<script src="{{ asset('enis/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('enis/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('enis/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('enis/js/odometer.min.js') }}"></script>
<script src="{{ asset('enis/js/appear.min.js') }}"></script>
<script src="{{ asset('enis/js/main.js') }}"></script>
<script src="{{ asset('enis/js/main1.js') }}"></script>




{{-- calendar --}}
<script src="{{ asset('calendar-theme/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('calendar-theme/js/popper.min.js') }}"></script>
<script src="{{ asset('calendar-theme/js/bootstrap.min.js') }}"></script>

<script src='{{ asset('calendar-theme/fullcalendar/packages/core/main.js') }}'></script>
<script src='{{ asset('calendar-theme/fullcalendar/packages/interaction/main.js') }}'></script>
<script src='{{ asset('calendar-theme/fullcalendar/packages/daygrid/main.js') }}'></script>
<script src='{{ asset('calendar-theme/fullcalendar/packages/timegrid/main.js') }}'></script>
<script src='{{ asset('calendar-theme/fullcalendar/packages/list/main.js') }}'></script>




@php
    // Retrieve language from session or use default
    $lang = session('lang', config('app.locale'));
    $lang = Session::get('language');
    if (!$lang) {
        $lang = App::getLocale();
    }
    switch ($lang) {
        case 'en':
            $direction = 'ltr';
            $menuName = 'public_en';
            break;
        case 'fr':
            $direction = 'ltr';
            $menuName = 'public_fr';
            break;
        case 'ar':
            $menuName = 'public_ar';
            $direction = 'rtl';
            break;
        default:
            $direction = 'ltr';
            $menuName = 'public_fr';
            break;
    }
@endphp

<!--/style fixed bar-->
<!-- fixed bar-->
<div class="{{ $direction == 'rtl' ? 'wrapper-rtl hidden' : 'wrapper hidden' }}"> <!-- Added 'hidden' class to initially hide the wrapper -->
    <div class="button">
        <div class="icon"><i class="fa fa-globe"></i></div>
        <a class="newLangName" ><span class="lang_active"style="{{ $lang == 'fr' ? 'background-color: red;' : '' }}">Fr</span></a>
        <a class="newLangName" ><span class="lang_active"style="{{ $lang == 'en' ? 'background-color: red;' : '' }}">En</span></a>
        <a class="newLangName" ><span class="lang_active"style="{{ $lang == 'ar' ? 'background-color: red;' : '' }}">Ar</span></a>
    </div>
    <div class="button">
        <div class="icon"><i class="icofont-mega-phone"></i></div>
        <a href="{{ route('tenders') }}"> @lang('translate.Tenders') </a>
    </div>

    <div class="button">
        <div class="icon">
            <img src="{{ asset('enis/img/logo-inai.png') }}" alt="" class="img_inai" />
        </div>
        <a href="{{ route('pages', ['slug' => 'inai']) }}">INAI</a>
    </div>
    <div class="button">
        <div class="icon"><i class="icofont-bars"></i></div>
        <a href="{{ route('partenaires', ['slug' => 'nationale']) }}" class="Instagram">@lang('translate.Partenaires Nationale')</a>
    </div>
    <div class="button">
        <div class="icon"><i class="icofont-signal"></i></div>
        <a href="{{ route('partenaires', ['slug' => 'internationale']) }}" class="Instagram">@lang('translate.Partenaires Internationale')</a>
    </div>
    <div class="{{ $direction == 'rtl' ? 'button-hide-rtl' : 'button-hide' }}">
        <div class="icon"><i class="{{ $direction == 'rtl' ? 'icofont-double-right' : 'icofont-double-left' }}"></i>
        </div>
    </div>
</div>
<div class="{{ $direction == 'rtl' ? 'show-button-rtl visible' : 'show-button visible' }}"> <!-- Added 'visible' class to initially show the show button -->
    <div class="icon"><i class="{{ $direction == 'rtl' ? 'icofont-double-left' : 'icofont-double-right' }}"></i></div>
</div>
<!-- /fixed bar-->
<script>
    document.querySelectorAll('.newLangName').forEach(function(element) {
        element.addEventListener('click', function(event) {
            // Prevent the default action of the link (e.g., navigating to another page)
            event.preventDefault();

            // Extract the language from the clicked element
            var language = this.innerText.trim().toLowerCase();

            // Construct the URL for the language change route
            var url = "{{ route('set.language', ':locale') }}";
            url = url.replace(':locale', language);

            // Redirect the user to the constructed URL
            window.location.href = url;
        });
    });
    var hideButton = document.querySelector('.{{ $direction == 'rtl' ? 'button-hide-rtl' : 'button-hide' }}');
    var showButton = document.querySelector('.{{ $direction == 'rtl' ? 'show-button-rtl' : 'show-button' }}');
    if (hideButton && showButton) {
        hideButton.addEventListener('click', function() {
            var wrapper = document.querySelector('.{{ $direction == 'rtl' ? 'wrapper-rtl' : 'wrapper' }}');
            if (wrapper) {
                wrapper.classList.add('hidden'); // Add 'hidden' class to hide the wrapper
            }
            showButton.classList.add('visible'); // Add 'visible' class to show the button
        });

        showButton.addEventListener('click', function() {
            var wrapper = document.querySelector('.{{ $direction == 'rtl' ? 'wrapper-rtl' : 'wrapper' }}');
            if (wrapper) {
                wrapper.classList.remove('hidden'); // Remove 'hidden' class to show the wrapper
            }
            showButton.classList.remove('visible'); // Remove 'visible' class to hide the button
        });
    }
</script>

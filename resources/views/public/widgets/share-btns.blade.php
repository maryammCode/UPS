
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



<div class=" {{ $direction == 'rtl' ? 'card-share-rtl' : 'card-share' }}">
    {{-- Share to Social-Media --}}
    <?php
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
    $current_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>
    <span>Share</span>
    {{-- facebook --}}

    <a class="social-link-share " href="https://www.facebook.com/sharer/sharer.php?u={{ @$current_url }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1.1em" viewBox="0 0 448 512" stroke-width="0"
            fill="blue" stroke="currentColor" class="w-5">
            <path
                d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
            </path>
        </svg>
    </a>
    {{-- twitter --}}

    <a class="social-link-share " href="https://twitter.com/intent/tweet?url={{ @$current_url }}">
        <svg viewBox="0 0 512 512" height="1.7em" xmlns="http://www.w3.org/2000/svg" class="svgIcon" fill="black">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                </path>
        </svg>
    </a>
    {{-- linkedin --}}

    <a class="social-link-share" href="https://www.linkedin.com/shareArticle?mini=true&url={{ @$current_url }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1.1em" viewBox="0 0 512 512" stroke-width="0"
            fill="#0077b5">
            <path
                d="M444.17 32H70.28C49.85 32 32 46.7 32 66.89v374.72C32 461.91 49.85 480 70.28 480h373.78c20.54 0 35.94-18.21 35.94-38.39V66.89C480.12 46.7 464.6 32 444.17 32zm-273.3 373.43h-64.18V205.88h64.18zM141 175.54h-.46c-20.54 0-33.84-15.29-33.84-34.43 0-19.49 13.65-34.42 34.65-34.42s33.85 14.82 34.31 34.42c-.01 19.14-13.31 34.43-34.66 34.43zm264.43 229.89h-64.18V296.32c0-26.14-9.34-44-32.56-44-17.74 0-28.24 12-32.91 23.69-1.75 4.2-2.22 9.92-2.22 15.76v113.66h-64.18V205.88h64.18v27.77c9.34-13.3 23.93-32.44 57.88-32.44 42.13 0 74 27.77 74 87.64z">
            </path>
        </svg>
    </a>
    {{-- whatsapp --}}

    <a class="social-link-share" href="https://wa.me/?text=Content_WhatsApp%20{{ @$current_url }}">
        <svg class="socialSvg whatsappSvg" viewBox="0 0 16 16" fill="green">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                </path>
        </svg>

    </a>

</div>

@php
    $lang = session('lang', config('app.locale'));
    app()->setLocale($lang);
    if (!$lang) {
        $lang = App::getLocale();
    }

    if (!function_exists('getFieldValue')) {
        function getFieldValue($field, $fieldBase, $lang)
        {
            $fieldLang = $fieldBase . '_' . $lang;
            $fieldFallback = $fieldBase . '_fr';
            return $field->$fieldLang ?? $field->$fieldFallback;
        }
    }
    if ($field && $param) {
        // Retrieve values with fallback
        $designation = getFieldValue($field, 'designation', $lang);
        $shortDescription = getFieldValue($field, 'short_description', $lang);
        $description = getFieldValue($field, 'description', $lang);
        $btnText = getFieldValue($field, 'btn_text', $lang);
        $btnText2 = getFieldValue($field, 'btn_text', $lang . '_2');
        $title = getFieldValue($field, 'title', $lang);
    }

@endphp

@if ($param === 'designation')
    {{ $designation }}
@elseif ($param === 'short_description')
    {!! $shortDescription !!}
@elseif ($param === 'description')
    {!! $description !!}
@elseif ($param === 'btn_text')
    {{ $btnText }}
@elseif ($param === 'btn_text_2')
    {{ $btnText2 }}
@elseif ($param === 'title')
    {{ $title }}
@endif

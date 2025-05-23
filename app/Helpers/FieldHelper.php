<?php

if (!function_exists('getFieldValue')) {
    function getFieldValue($field, $fieldBase, $lang)
    {
        $fieldLang = $fieldBase . '_' . $lang;
        $fieldFallback = $fieldBase . '_fr';
        return $field->$fieldLang ?? $field->$fieldFallback;
    }

    
}
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class Some of these rules have multiple versions such
    | as the size rules Feel free to tweak each of these messages here
    |
    */

    'accepted' => 'يجب قبول الحقل :attribute',
    'accepted_if' => 'يجب قبول الحقل :attribute عندما يكون :other :value',
    'active_url' => 'الحقل :attribute ليس عنوان URL صالحًا',
    'after' => 'يجب أن يكون الحقل :attribute تاريخًا بعد :date',
    'after_or_equal' => 'يجب أن يكون الحقل :attribute تاريخًا بعد أو يساوي :date',
    'alpha' => 'يجب أن يحتوي الحقل :attribute على أحرف فقط',
    'alpha_dash' => 'يجب أن يحتوي الحقل :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط',
    'alpha_num' => 'يجب أن يحتوي الحقل :attribute على أحرف وأرقام فقط',
    'array' => 'يجب أن يكون الحقل :attribute مصفوفة',
    'before' => 'يجب أن يكون الحقل :attribute تاريخًا قبل :date',
    'before_or_equal' => 'يجب أن يكون الحقل :attribute تاريخًا قبل أو يساوي :date',
    'between' => [
        'numeric' => 'يجب أن يكون الحقل :attribute بين :min و :max',
        'file' => 'يجب أن يكون حجم الحقل :attribute بين :min و :max كيلوبايت',
        'string' => 'يجب أن يكون عدد حروف الحقل :attribute بين :min و :max',
        'array' => 'يجب أن يحتوي الحقل :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean' => 'يجب أن يكون الحقل :attribute صحيحًا أو خطأ',
    'confirmed' => 'تأكيد الحقل :attribute لا يتطابق',
    'current_password' => 'كلمة المرور غير صحيحة',
    'date' => 'الحقل :attribute ليس تاريخًا صحيحًا',
    'date_equals' => 'يجب أن يكون الحقل :attribute تاريخًا يساوي :date',
    'date_format' => 'الحقل :attribute لا يتطابق مع التنسيق :format',
    'declined' => 'يجب رفض الحقل :attribute',
    'declined_if' => 'يجب رفض الحقل :attribute عندما يكون :other :value',
    'different' => 'يجب أن يكون الحقل :attribute مختلفًا عن :other',
    'digits' => 'يجب أن يحتوي الحقل :attribute على :digits أرقام',
    'digits_between' => 'يجب أن يحتوي الحقل :attribute على عدد من الأرقام بين :min و :max',
    'dimensions' => 'الحقل :attribute يحتوي على أبعاد صورة غير صالحة',
    'distinct' => 'الحقل :attribute له قيمة مكررة',
    'email' => 'يجب أن يكون الحقل :attribute عنوان بريد إلكتروني صالح',
    'ends_with' => 'يجب أن ينتهي الحقل :attribute بأحد القيم التالية: :values',
    'enum' => 'القيمة المحددة :attribute غير صالحة',
    'exists' => 'القيمة المحددة :attribute غير صالحة',
    'file' => 'يجب أن يكون الحقل :attribute ملفًا',
    'filled' => 'يجب أن يحتوي الحقل :attribute على قيمة',
    'gt' => [
        'numeric' => 'يجب أن يكون الحقل :attribute أكبر من :value',
        'file' => 'يجب أن يكون حجم الحقل :attribute أكبر من :value كيلوبايت',
        'string' => 'يجب أن يكون عدد حروف الحقل :attribute أكبر من :value',
        'array' => 'يجب أن يحتوي الحقل :attribute على عدد من العناصر أكبر من :value',
    ],
    'gte' => [
        'numeric' => 'يجب أن يكون الحقل :attribute أكبر من أو يساوي :value',
        'file' => 'يجب أن يكون حجم الحقل :attribute أكبر من أو يساوي :value كيلوبايت',
        'string' => 'يجب أن يكون عدد حروف الحقل :attribute أكبر من أو يساوي :value',
        'array' => 'يجب أن يحتوي الحقل :attribute على :value عنصر أو أكثر',
    ],
    'image' => 'يجب أن يكون الحقل :attribute صورة',
    'in' => 'القيمة المحددة :attribute غير صالحة',
    'in_array' => 'الحقل :attribute غير موجود في :other',
    'integer' => 'يجب أن يكون الحقل :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون الحقل :attribute عنوان IP صالحًا',
    'ipv4' => 'يجب أن يكون الحقل :attribute عنوان IPv4 صالحًا',
    'ipv6' => 'يجب أن يكون الحقل :attribute عنوان IPv6 صالحًا',
    'json' => 'يجب أن يكون الحقل :attribute سلسلة JSON صالحة',
    'lt' => [
        'numeric' => 'يجب أن يكون الحقل :attribute أقل من :value',
        'file' => 'يجب أن يكون حجم الحقل :attribute أقل من :value كيلوبايت',
        'string' => 'يجب أن يكون عدد حروف الحقل :attribute أقل من :value',
        'array' => 'يجب أن يحتوي الحقل :attribute على عدد من العناصر أقل من :value',
    ],
    'lte' => [
        'numeric' => 'يجب أن يكون الحقل :attribute أقل من أو يساوي :value',
        'file' => 'يجب أن يكون حجم الحقل :attribute أقل من أو يساوي :value كيلوبايت',
        'string' => 'يجب أن يكون عدد حروف الحقل :attribute أقل من أو يساوي :value',
        'array' => 'يجب أن يحتوي الحقل :attribute على :value عنصر أو أقل',
    ],
    'mac_address' => 'يجب أن يكون الحقل :attribute عنوان MAC صالحًا',
    'max' => [
        'numeric' => 'يجب ألا يتجاوز الحقل :attribute :max',
        'file' => 'يجب ألا يتجاوز حجم الحقل :attribute :max كيلوبايت',
        'string' => 'يجب ألا يتجاوز عدد حروف الحقل :attribute :max',
        'array' => 'يجب ألا يحتوي الحقل :attribute على عدد من العناصر أكثر من :max',
    ],
    'mimes' => 'يجب أن يكون الحقل :attribute ملفًا من النوع: :values',
    'mimetypes' => 'يجب أن يكون الحقل :attribute ملفًا من النوع: :values',
    'min' => [
        'numeric' => 'يجب أن يكون الحقل :attribute على الأقل :min',
        'file' => 'يجب أن يكون حجم الحقل :attribute على الأقل :min كيلوبايت',
        'string' => 'يجب أن يكون عدد حروف الحقل :attribute على الأقل :min',
        'array' => 'يجب أن يحتوي الحقل :attribute على الأقل :min عنصرًا',
    ],
    'multiple_of' => 'يجب أن يكون الحقل :attribute مضاعفًا للقيمة :value',
    'not_in' => 'القيمة المحددة :attribute غير صالحة',
    'not_regex' => 'تنسيق الحقل :attribute غير صالح',
    'numeric' => 'يجب أن يكون الحقل :attribute رقمًا',
    'password' => 'كلمة المرور غير صحيحة',
    'present' => 'يجب أن يكون الحقل :attribute موجودًا',
    'prohibited' => 'الحقل :attribute ممنوع',
    'prohibited_if' => 'الحقل :attribute ممنوع عندما يكون :other :value',
    'prohibited_unless' => 'الحقل :attribute ممنوع ما لم يكن :other في :values',
    'prohibits' => 'الحقل :attribute يمنع :other من التواجد',
    'regex' => 'تنسيق الحقل :attribute غير صالح',
    'required' => 'الحقل :attribute  مطلوب',
    'required_array_keys' => 'يجب أن تحتوي الحقل :attribute على مفاتيح لـ :values',
    'required_if' => 'الحقل :attribute مطلوب عندما يكون :other :value',
    'required_unless' => 'الحقل :attribute مطلوب ما لم يكن :other في :values',
    'required_with' => 'الحقل :attribute مطلوب عندما يكون :values موجودًا',
    'required_with_all' => 'الحقل :attribute مطلوب عندما تكون :values موجودة',
    'required_without' => 'الحقل :attribute مطلوب عندما لا يكون :values موجودًا',
    'required_without_all' => 'الحقل :attribute مطلوب عندما لا يكون أي من :values موجودًا',
    'same' => 'يجب أن يتطابق الحقل :attribute مع :other',
    'size' => [
        'numeric' => 'يجب أن يكون الحقل :attribute :size',
        'file' => 'يجب أن يكون حجم الحقل :attribute :size كيلوبايت',
        'string' => 'يجب أن يكون عدد حروف الحقل :attribute :size',
        'array' => 'يجب أن يحتوي الحقل :attribute على :size عنصرًا',
    ],
    'starts_with' => 'يجب أن يبدأ الحقل :attribute بأحد القيم التالية: :values',
    'string' => 'يجب أن يكون الحقل :attribute نصًا',
    'timezone' => 'يجب أن يكون الحقل :attribute منطقة زمنية صالحة',
    'unique' => 'القيمة المدخلة في الحقل :attribute موجودة بالفعل',
    'uploaded' => 'فشل في تحميل الحقل :attribute',
    'url' => 'تنسيق الحقل :attribute غير صالح',
    'uuid' => 'يجب أن يكون الحقل :attribute UUID صالحًا',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attributerule" to name the lines This makes it quick to
    | specify a specific custom language line for a given attribute rule
    |
    */

    'custom' => [
        'newsletter_email' => [
            'unique' => 'هذا البريد الإلكتروني مشترك بالفعل في النشرة الإخبارية',
            'required'  => 'حقل البريد الإلكتروني مطلوب',
            'email'  => 'يرجى إدخال عنوان بريد إلكتروني صحيح',
            'success'  => 'شكرا لك على تسجيلك',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email" This simply helps us make our message more expressive
    |
    */

    'attributes' => [
        'name' => 'الاسم الكامل',
        'email' => 'عنوان البريد الإلكتروني',
        'subject' => 'الموضوع',
        'message' => 'الرسالة',
        'destination_id' => 'الوجهة',
        'newsletter_email' => 'البريد الإلكتروني'
    ],

];

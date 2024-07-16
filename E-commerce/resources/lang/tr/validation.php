<?php

return [
    'accepted'             => ':attribute kabul edilmelidir.',
    'active_url'           => ':attribute geçerli bir URL olmalıdır.',
    'after'                => ':attribute şundan daha eski bir tarih olmalıdır :date.',
    'after_or_equal'       => ':attribute tarihi :date tarihinden sonra veya eşit olmalıdır.',
    'alpha'                => ':attribute sadece harflerden oluşmalıdır.',
    'alpha_dash'           => ':attribute sadece harfler, rakamlar ve tirelerden oluşmalıdır.',
    'alpha_num'            => ':attribute sadece harfler ve rakamlar içermelidir.',
    'array'                => ':attribute dizi olmalıdır.',
    'before'               => ':attribute :date tarihinden önceki bir tarih olmalıdır.',
    'before_or_equal'      => ':attribute tarihi :date tarihinden önce veya eşit olmalıdır.',
    'between'              => [
        'numeric' => ':attribute :min - :max arasında olmalıdır.',
        'file'    => ':attribute :min - :max kilobyte arasında olmalıdır.',
        'string'  => ':attribute :min - :max karakter arasında olmalıdır.',
        'array'   => ':attribute :min - :max arasında nesneye sahip olmalıdır.',
    ],
    'boolean'              => ':attribute alanı doğru veya yanlış olmalıdır.',
    'confirmed'            => ':attribute tekrarı eşleşmiyor.',
    'date'                 => ':attribute geçerli bir tarih olmalıdır.',
    'date_equals'          => ':attribute :date tarihine eşit olmalıdır.',
    'date_format'          => ':attribute :format formatı ile eşleşmiyor.',
    'different'            => ':attribute ve :other farklı olmalıdır.',
    'digits'               => ':attribute :digits rakam olmalıdır.',
    'digits_between'       => ':attribute :min ile :max arasında rakam olmalıdır.',
    'dimensions'           => ':attribute geçersiz resim boyutlarına sahiptir.',
    'distinct'             => ':attribute alanı tekrar eden bir değere sahiptir.',
    'email'                => ':attribute geçerli bir email adresi olmalıdır.',
    'ends_with'            => ':attribute şunlardan biriyle bitmelidir : :values',
    'exists'               => 'Seçili :attribute geçersiz.',
    'file'                 => ':attribute bir dosya olmalıdır.',
    'filled'               => ':attribute alanı gereklidir.',
    'gt'                   => [
        'numeric' => ':attribute :value değerinden büyük olmalıdır.',
        'file'    => ':attribute :value kilobyte değerinden büyük olmalıdır.',
        'string'  => ':attribute :value karakter değerinden büyük olmalıdır.',
        'array'   => ':attribute :value nesneden daha fazlasına sahip olmalıdır.',
    ],
    'gte'                  => [
        'numeric' => ':attribute :value değerine eşit veya daha büyük olmalıdır.',
        'file'    => ':attribute :value kilobyte değerine eşit veya daha büyük olmalıdır.',
        'string'  => ':attribute :value karakter değerine eşit veya daha büyük olmalıdır.',
        'array'   => ':attribute :value nesne veya daha fazlasına sahip olmalıdır.',
    ],
    'image'                => ':attribute bir resim olmalıdır.',
    'in'                   => 'Seçili :attribute geçersiz.',
    'in_array'             => ':attribute alanı :other içinde mevcut değil.',
    'integer'              => ':attribute bir tam sayı olmalıdır.',
    'ip'                   => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4'                 => ':attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6'                 => ':attribute geçerli bir IPv6 adresi olmalıdır.',
    'json'                 => ':attribute geçerli bir JSON dizesi olmalıdır.',
    'lt'                   => [
        'numeric' => ':attribute :value değerinden küçük olmalıdır.',
        'file'    => ':attribute :value kilobyte değerinden küçük olmalıdır.',
        'string'  => ':attribute :value karakter değerinden küçük olmalıdır.',
        'array'   => ':attribute :value nesneden daha azına sahip olmalıdır.',
    ],
    'lte'                  => [
        'numeric' => ':attribute :value değerine eşit veya daha küçük olmalıdır.',
        'file'    => ':attribute :value kilobyte değerine eşit veya daha küçük olmalıdır.',
        'string'  => ':attribute :value karakter değerine eşit veya daha küçük olmalıdır.',
        'array'   => ':attribute :value nesneden daha fazlasına sahip olmalıdır.',
    ],
    'max'                  => [
        'numeric' => ':attribute :max değerinden büyük olamaz.',
        'file'    => ':attribute :max kilobyte değerinden büyük olamaz.',
        'string'  => ':attribute :max karakterden uzun olamaz.',
        'array'   => ':attribute en fazla :max nesneye sahip olabilir.',
    ],
    'mimes'                => ':attribute dosya türü : :values olmalıdır.',
    'mimetypes'            => ':attribute dosya türü : :values olmalıdır.',
    'min'                  => [
        'numeric' => ':attribute en az :min olmalıdır.',
        'file'    => ':attribute en az :min kilobyte olmalıdır.',
        'string'  => ':attribute en az :min karakter olmalıdır.',
        'array'   => ':attribute en az :min nesneye sahip olmalıdır.',
    ],
    'not_in'               => 'Seçili :attribute geçersiz.',
    'not_regex'            => ':attribute formatı geçersiz.',
    'numeric'              => ':attribute bir sayı olmalıdır.',
    'password'             => 'Şifre yanlış.',
    'present'              => ':attribute alanı mevcut olmalıdır.',
    'regex'                => ':attribute formatı geçersiz.',
    'required'             => ':attribute alanı gereklidir.',
    'required_if'          => ':attribute alanı, :other :value değerine sahip olduğunda gereklidir.',
    'required_unless'      => ':attribute alanı, :other :values içinde olmadığı sürece gereklidir.',
    'required_with'        => ':attribute alanı :values varken gereklidir.',
    'required_with_all'    => ':attribute alanı :values varken gereklidir.',
    'required_without'     => ':attribute alanı :values yokken gereklidir.',
    'required_without_all' => ':attribute alanı :values değerlerinden hiçbiri yokken gereklidir.',
    'same'                 => ':attribute ile :other eşleşmelidir.',
    'size'                 => [
        'numeric' => ':attribute :size olmalıdır.',
        'file'    => ':attribute :size kilobyte olmalıdır.',
        'string'  => ':attribute :size karakter olmalıdır.',
        'array'   => ':attribute :size nesneye sahip olmalıdır.',
    ],
    'starts_with'          => ':attribute şunlardan biriyle başlamalıdır : :values',
    'string'               => ':attribute bir dize olmalıdır.',
    'timezone'             => ':attribute geçerli bir bölge olmalıdır.',
    'unique'               => ':attribute zaten alınmış.',
    'uploaded'             => ':attribute yüklenemedi.',
    'url'                  => ':attribute formatı geçersiz.',
    'uuid'                 => ':attribute geçerli bir UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader-friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],
];

<?php return
[
    /*
    |--------------------------------------------------------------------------
    | Cryto
    |--------------------------------------------------------------------------
    |
    | Sets the predefined driver for the Crypto library.
    |
    | Options: openssl, mcrypt, hash, phash, mhash
    |
    */

    'crypto' =>
    [
        'driver' => 'openssl'
    ],

    /*
    |--------------------------------------------------------------------------
    | Encode
    |--------------------------------------------------------------------------
    |
    | Sets which encryption algorithm will use the Encode class methods by default.
    |
    */

    'encode' =>
    [
        'type' => 'md5'
    ]
];
<?php
return [
    'required' => 'Field :attribute is required.',
    'email' => 'The :attribute must be a valid email address.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'custom' => [
        'email' => [
            'required' => 'We need to know your email address!',
            'email' => 'Please enter a valid email address!',
        ],
        'password' => [
            'required' => 'Password is required!',
        ],
    ],
    'attributes' => [
        'email' => 'email address',
        'password' => 'password',
    ],
];

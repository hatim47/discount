<?php

return [
    'company' => [
        'name' => 'MyWebsite',
        'email' => 'contact@mywebsite.com',
        'address' => '123 Business St, City, Country',
        'phone' => '+1 (555) 123-4567',
        'logo' => '/images/logo.png',
    ],

    'menus' => [
        [
            'title' => 'Features',
            'url'   => '#features',
        ],
        [
            'title' => 'Pricing',
            'url'   => '#pricing',
        ],
        [
            'title' => 'About',
            'url'   => '#about',
            'children' => [
                ['title' => 'Team', 'url' => '#team'],
                ['title' => 'Careers', 'url' => '#careers'],
            ],
        ],
        [
            'title' => 'Contact',
            'url'   => '#contact',
        ],
    ],

    'footer_links' => [
        ['title' => 'Privacy Policy', 'url' => '/privacy-policy'],
        ['title' => 'Terms of Service', 'url' => '/terms'],
    ],
];

<?php

return [
    'program' => [
        'cover_image' => [
            'store-path' => storage_path('app/public/programs/%s/cover_image'),
            'save-path' => '/storage/programs/%s/cover_image/%s',
            'size' => [
                'small' => [
                    'height' => 300,
                    'width' => 300
                ],
                'medium' => [
                    'height' => 800,
                    'width' => 600
                ],
                'large' => [
                    'height' => 1200,
                    'width' => 800
                ],
            ]
        ],
    ],
];

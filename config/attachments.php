<?php

return [
    'table' => 'vendor_bigbeartech_attachments',
    'post_attachment_route' => 'bigbeartech/attachment',
    'fields' => [
        'item_id',
    ],
    'middleware' => [],
    'glide' => [
        'on' => true,
        'route' => 'bigbeartech/img/',
    ]
];

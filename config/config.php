<?php

return [
    'routes' => [
//        'prefix' => 'mdigi', # Uncomment this to set prefix to package routes.
        'middleware' => ['web']
    ],
    'assets' => [
//        'url_prefix' => 'mdigi' # Uncoment this to set prefix to view assets url.
    ],
    'landing_page' => true, # Set `false` if you have your own landing page implementation
];
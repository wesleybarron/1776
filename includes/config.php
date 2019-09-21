<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '') {
    $config = [
        'name' => '[FIXME: ADD SITE TITLE!]',
        'pretty_uri' => false,
        'site_url' => '[FIXME: ADD URL!]]',
        'nav_menu' => [
            '' => 'Home',
            'search' => 'Search',
            'about-us' => 'About Us'
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v1.0',
    ];
    return isset($config[$key]) ? $config[$key] : null;
}

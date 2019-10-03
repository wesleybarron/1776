<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '') {
    $config = [
        'name' => 'filmBUFF',
        'pretty_uri' => false,
        'site_url' => 'https://filmbuff1776.herokuapp.com/',
        'nav_menu' => [
            '' => 'Home',
            'search' => 'Search',
            'about-us' => 'About Us'
            'contact-us' => 'Contact Us'
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v1.0',
    ];
    return isset($config[$key]) ? $config[$key] : null;
}

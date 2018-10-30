<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    'Adresses' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
        ['show', '/Adresses/{id:\d+}', 'GET'], // action, url, method
    ],
];

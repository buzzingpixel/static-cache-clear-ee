<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

defined('STATIC_CACHE_CLEAR_VER') || define('STATIC_CACHE_CLEAR_VER', '1.0.0');

return [
    'author' => 'TJ Draper',
    'author_url' => 'https://buzzingpixel.com',
    'description' => 'Clear static cache files in ExpressionEngine',
    'name' => 'Static Cache Clear',
    'namespace' => 'buzzingpixel\cacheclear',
    'settings_exist' => true,
    'version' => STATIC_CACHE_CLEAR_VER,
    'commands' => [
        'clearCaches' => [
            'class' => '\buzzingpixel\cacheclear\commands\ClearCacheCommand',
            'method' => 'runCacheClear',
            'description' => 'Clear static caches',
        ],
    ],
];

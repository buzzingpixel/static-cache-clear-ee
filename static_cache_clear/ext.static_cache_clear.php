<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

/**
 * Class Static_cache_clear_ext
 */
class Static_cache_clear_ext
{
    /** @var string $version */
    public $version = STATIC_CACHE_CLEAR_VER;

    /**
     * Clears the static cache
     */
    public function clearCache()
    {
        var_dump('clearCache_ext_method');
        die;
    }
}

<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

/**
 * Class Static_cache_clear_mcp
 */
class Static_cache_clear_mcp
{
    /**
     * Displays the index page
     * @return string
     */
    public function index()
    {
        $lang = lang('clearStaticCaches');
        $url = ee('CP/URL', 'addons/settings/static_cache_clear/clear');
        return "<a href=\"{$url}\" class=\"btn\">{$lang}</a>";
    }

    /**
     * Clears the static cache
     */
    public function clear()
    {
        var_dump('clear cp');
        die;
    }
}

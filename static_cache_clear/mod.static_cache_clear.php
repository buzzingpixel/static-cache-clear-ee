<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

use buzzingpixel\cacheclear\services\CacheClearingService;

/**
 * Class Static_cache_clear
 */
class Static_cache_clear
{
    /**
     * Clears the statis cache
     */
    public function clear_static_cache()
    {
        $cacheClearingService = new CacheClearingService();
        $cacheClearingService->clear();
    }
}

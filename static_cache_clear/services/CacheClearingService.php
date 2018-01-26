<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace buzzingpixel\cacheclear\services;

/**
 * Class CacheClearingService
 */
class CacheClearingService
{
    /** @var \EE_Config $eeConfigService */
    private $eeConfigService;

    /**
     * CacheClearingService constructor
     */
    public function __construct()
    {
        $this->eeConfigService = ee()->config;
    }

    /**
     * Clears the static cache
     */
    public function clear()
    {
        $cachePath = $this->eeConfigService->item(
            'cache_path',
            'static_cache_clear'
        );

        if (! is_dir($cachePath)) {
            return;
        }

        $useSudo = $this->eeConfigService->item(
            'use_sudo',
            'static_cache_clear'
        );

        $command = "rm -rf {$cachePath}/*";

        if ($useSudo === true) {
            $command = "sudo {$command}";
        }

        exec($command);
    }
}

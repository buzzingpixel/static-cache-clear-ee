<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace buzzingpixel\cacheclear\commands;

use BuzzingPixel\Executive\Abstracts\BaseCommand;
use buzzingpixel\cacheclear\services\CacheClearingService;

/**
 * Class ClearCacheCommand
 */
class ClearCacheCommand extends BaseCommand
{
    public function runCacheClear()
    {
        $cacheClearingService = new CacheClearingService();
        $cacheClearingService->clear();

        ee()->lang->loadfile('static_cache_clear');

        $this->consoleService->writeLn(
            lang('theStaticCacheWasClearedSuccessfully'),
            'green'
        );
    }
}

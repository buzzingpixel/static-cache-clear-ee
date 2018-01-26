<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

use buzzingpixel\cacheclear\services\CacheClearingService;
use EllisLab\ExpressionEngine\Service\Alert\AlertCollection;

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
        /** @var AlertCollection $eeAlertCollection */
        $eeAlertCollection = ee('CP/Alert');

        $lang = lang('clearStaticCaches');
        $url = ee('CP/URL', 'addons/settings/static_cache_clear/clear');
        $alerts = $eeAlertCollection->getAllInlines();

        if ($alerts) {
            $alerts = "<br>{$alerts}";
        }

        return "<div class='form-standard'>{$alerts}<fieldset><div class='field-control'><a href=\"{$url}\" class=\"btn\">{$lang}</a></div></fieldset><br></div>";
    }

    /**
     * Clears the static cache
     */
    public function clear()
    {
        $cacheClearingService = new CacheClearingService();
        $cacheClearingService->clear();

        /** @var \EE_Functions $eeFunctionsService */
        $eeFunctionsService = ee()->functions;

        /** @var AlertCollection $eeAlertCollection */
        $eeAlertCollection = ee('CP/Alert');

        $eeAlertCollection->makeInline('static_cache_clear')
            ->asSuccess()
            ->withTitle(lang('staticCacheCleared'))
            ->addToBody(lang('theStaticCacheWasClearedSuccessfully'))
            ->defer();

        $eeFunctionsService->redirect(
            ee('CP/URL', 'addons/settings/static_cache_clear')
        );
    }
}

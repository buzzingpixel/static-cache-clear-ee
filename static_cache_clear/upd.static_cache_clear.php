<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

use EllisLab\ExpressionEngine\Service\Database\Query as QueryBuilder;

/**
 * Class Static_cache_clear_upd
 */
class Static_cache_clear_upd
{
    private static $hooks = [
        'after_category_save',
        'after_channel_entry_save',
        'collective_updated',
        'freeform_next_form_after_save',
        'freeform_next_form_after_delete',
    ];

    /** @var QueryBuilder $queryBuilder */
    private $queryBuilder;

    /**
     * Static_cache_clear_upd constructor
     */
    public function __construct()
    {
        $this->queryBuilder = ee('db');
    }

    /**
     * Installs the addon
     * @return bool
     */
    public function install()
    {
        foreach (self::$hooks as $hook) {
            $this->queryBuilder->insert('extensions', [
                'class' => 'Static_cache_clear_ext',
                'method' => 'clearCache',
                'hook' => $hook,
                'settings' => '',
                'priority' => 10,
                'version' => STATIC_CACHE_CLEAR_VER,
                'enabled' => 'y',
            ]);
        }

        $this->queryBuilder->insert('modules', array(
            'module_name' => 'Static_cache_clear',
            'module_version' => STATIC_CACHE_CLEAR_VER,
            'has_cp_backend' => 'y',
            'has_publish_fields' => 'n',
        ));

        return true;
    }

    /**
     * Uninstalls the addon
     * @return bool
     */
    public function uninstall()
    {
        $this->queryBuilder->delete('extensions', [
            'class' => 'Static_cache_clear_ext'
        ]);

        $this->queryBuilder->delete('modules', [
            'module_name' => 'Static_cache_clear'
        ]);

        return true;
    }

    /**
     * Updates the addon
     * @return bool
     */
    public function update()
    {
        $this->queryBuilder->update(
            'extensions',
            [
                'version' => STATIC_CACHE_CLEAR_VER,
            ],
            [
                'class' => 'Static_cache_clear_ext'
            ]
        );

        $this->queryBuilder->update(
            'modules',
            [
                'module_version' => STATIC_CACHE_CLEAR_VER,
            ],
            [
                'module_name' => 'Static_cache_clear'
            ]
        );

        return true;
    }
}

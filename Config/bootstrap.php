<?php

    /**
     * Admin menu (navigation)
     */
    CroogoNav::add('settings.children.clear_cache',
        array(
            'title' => __('ClearCache'),
            'url' => array(
                'plugin' => 'clear_cache',
                'controller' => 'clear_caches',
                'action' => 'clear'
            )
        )
    );
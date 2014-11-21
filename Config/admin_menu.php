<?php
/**
 * Admin menu (navigation)
 */
CroogoNav::add('settings.children.clear_cache', array(
	'icon' => 'trash',
	'title' => __d('clear_cache', 'Clear Cache'),
	'url' => array(
		'admin' => true,
		'plugin' => 'clear_cache',
		'controller' => 'clear_caches',
		'action' => 'clear',
	),
	'weight' => 100,
	'children' => array(
	),
));
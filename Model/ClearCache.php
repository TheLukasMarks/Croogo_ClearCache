<?php
/**
 * ClearCache
 * Copyright (c) Lukas Marks (http://lumax-web.de/)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Lukas Marks (http://lumax-web.de/)
 * @since         0.1
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('ClearCacheAppModel', 'ClearCache.Model');

class ClearCache extends ClearCacheAppModel {

    public $name = 'ClearCache';
    
    public $useTable = false;

    public function delete($path = null, $recursive = true) {

        if (!$path) { $path = TMP . 'cache' . DS; }

        $dirItems = scandir($path);
        $ignore = array('.', '..');

        foreach ($dirItems AS $dirItem) {

            if (in_array($dirItem, $ignore)) continue;

            if (is_dir($path . $dirItem) && $recursive) {
                $this->delete($path . $dirItem . DS);
            } elseif (substr($dirItem, 0, 5) == 'cake_') {
                unlink($path . $dirItem);
            } elseif (substr($dirItem, 0, 7) == 'croogo_') {
                unlink($path . $dirItem);
            } elseif (substr($dirItem, 0, 5) == 'type_') {
                unlink($path . $dirItem);
            } elseif (substr($dirItem, 0, 5) == 'types_') {
                unlink($path . $dirItem);
            } elseif (substr($dirItem, 0, 5) == 'node_') {
                unlink($path . $dirItem);
            } elseif (substr($dirItem, 0, 6) == 'nodes_') {
                unlink($path . $dirItem);
            } elseif (substr($dirItem, 0, 11) == 'permission_') {
                unlink($path . $dirItem);
            } elseif (substr($dirItem, 0, 12) == 'permissions_') {
                unlink($path . $dirItem);
            }
        }
    }
}
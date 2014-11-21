<?php
/**
 * ClearCache
 *
 * @category Model
 * @package  ClearCache
 * @version  2.x
 * @author   Lukas Marks <info@lumax-web.de>
 * @link     http://www.lumax-web.de/
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
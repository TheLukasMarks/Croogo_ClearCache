<?php
    /**
     * ClearCache
     *
     * PHP version 5
     *
     * @category ClearCache.Model
     * @package  Croogo.ClearCache
     * @version  1.4, 1.5
     * @author   Lukas Marks <info@lumax-web.de>
     * @link     https://www.lumax-web.de
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
                if (in_array($dirItem, $ignore)) {
                    continue;
                }

                if (is_dir($path . $dirItem) && $recursive) {
                    $this->delete($path . $dirItem . DS);
                } elseif (substr($dirItem, 0, 5) == 'cake_') {
                    unlink($path . $dirItem);
                } elseif (substr($dirItem, 0, 6) == 'nodes_') {
                    unlink($path . $dirItem);
                } elseif (substr($dirItem, 0, 7) == 'croogo_') {
                    unlink($path . $dirItem);
                } elseif (substr($dirItem, 0, 12) == 'permissions_') {
                    unlink($path . $dirItem);
                }
            }
        }
    }
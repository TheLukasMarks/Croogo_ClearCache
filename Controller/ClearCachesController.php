<?php
/**
 * ClearCache
 *
 * @category Controller
 * @package  ClearCache
 * @version  2.x
 * @author   Lukas Marks <info@lumax-web.de>
 * @link     http://www.lumax-web.de/
 */
App::uses('ClearCachesAppController', 'ClearCache.Controller');

class ClearCachesController extends ClearCachesAppController {
    public $uses = array('ClearCache.ClearCache');
    public function admin_clear() {
        $this->ClearCache->delete();
        $this->Session->setFlash(__d('clear_cache', 'Cache has been cleared successfully.'), 'flash', array('class' => 'success'));
        return $this->redirect(array('plugin' => 'settings', 'controller' => 'settings', 'action' => 'dashboard'));
    }
}
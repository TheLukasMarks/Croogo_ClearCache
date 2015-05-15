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

App::uses('ClearCachesAppController', 'ClearCache.Controller');

class ClearCachesController extends ClearCachesAppController {
    public $uses = array('ClearCache.ClearCache');
    public function admin_clear() {
        $this->ClearCache->delete();
        $this->Session->setFlash(__d('clear_cache', 'Cache has been cleared successfully.'), 'flash', array('class' => 'success'));
        return $this->redirect(DS . 'admin');
    }
}
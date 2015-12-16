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

class ClearCachesController extends ClearCachesAppController
{
	
	/**
	 * Models used by the Controller
	 *
	 * @var array
	 * @access public
	 */ 
	public $uses = ['ClearCache.ClearCache'];
	
	/**
	 * Admin clear
	 *
	 * @return void
	 * @access public
	 */
	public function admin_clear()
	{
		if ($this->{$this->modelClass}->delete()) {
			$this->Session->setFlash(__d('clear_cache', 'Cache has been cleared successfully.'), 'flash', ['class' => 'success']);
			return $this->redirect(Configure::read('Croogo.dashboardUrl'));
		}
		
		$this->Session->setFlash(__d('clear_cache', 'An error occurred. Please, try again.'), 'flash', ['class' => 'error']);
		return $this->redirect(Configure::read('Croogo.dashboardUrl'));
	}
}

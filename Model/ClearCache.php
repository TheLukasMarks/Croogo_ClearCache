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

class ClearCache extends ClearCacheAppModel
{

	/**
	 * Model name
	 *
	 * @var string
	 * @access public
	 */
	public $name = 'ClearCache';
    
	/**
	 * Model table
	 *
	 * @var string
	 * @access public
	 */
	public $useTable = false;

	/**
	 * Removes record for given ID. If no ID is given, the current ID is used. Returns true on success.
	 *
	 * @param int|string $id ID of record to delete
	 * @param bool $cascade Set to true to delete records that depend on this record
	 * @return bool True on success
	 * @triggers Model.beforeDelete $this, array($cascade)
	 * @triggers Model.afterDelete $this
	 * @link http://book.cakephp.org/2.0/en/models/deleting-data.html
	 */
	public function delete($id = null, $cascade = true)
	{

		/**
		 * Returns an array containing the currently configured Cache settings.
		 *
		 * @return array Array of configured Cache config names.
		 */
		$cacheConfigNames = Cache::configured();
		
		foreach ($cacheConfigNames as $name) {
			
			/**
			 * Delete all keys from the cache.
			 *
			 * @param boolean $check if true will check expiration, otherwise delete all
			 * @param string $config name of the configuration to use. Defaults to 'default'
			 * @return boolean True if the cache was successfully cleared, false otherwise
			 */
			if (Cache::clear(false, $name)) {
				continue;
			} else {
				return false;
			}
		}
		
		return true;
	}
}

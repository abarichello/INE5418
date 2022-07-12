<?php
/**
 */

namespace haxe;

use \php\Boot;

interface IMap {
	/**
	 * @param mixed $k
	 * 
	 * @return bool
	 */
	public function exists ($k) ;

	/**
	 * @param mixed $k
	 * 
	 * @return mixed
	 */
	public function get ($k) ;

	/**
	 * @return object
	 */
	public function iterator () ;

	/**
	 * @return object
	 */
	public function keys () ;
}

Boot::registerClass(IMap::class, 'haxe.IMap');
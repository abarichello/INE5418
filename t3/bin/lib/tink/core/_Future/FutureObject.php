<?php
/**
 */

namespace tink\core\_Future;

use \php\Boot;
use \tink\core\LinkObject;
use \tink\core\FutureStatus;

interface FutureObject {
	/**
	 * @return void
	 */
	public function eager () ;

	/**
	 * @return FutureStatus
	 */
	public function getStatus () ;

	/**
	 * @param \Closure $callback
	 * 
	 * @return LinkObject
	 */
	public function handle ($callback) ;
}

Boot::registerClass(FutureObject::class, 'tink.core._Future.FutureObject');

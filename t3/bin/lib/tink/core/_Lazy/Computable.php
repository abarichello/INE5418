<?php
/**
 */

namespace tink\core\_Lazy;

use \php\Boot;

interface Computable {
	/**
	 * @return void
	 */
	public function compute () ;

	/**
	 * @return bool
	 */
	public function isComputed () ;

	/**
	 * @return Computable
	 */
	public function underlying () ;
}

Boot::registerClass(Computable::class, 'tink.core._Lazy.Computable');

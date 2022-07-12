<?php
/**
 */

namespace tink\core\_Lazy;

use \php\Boot;

interface LazyObject extends Computable {
	/**
	 * @return mixed
	 */
	public function get () ;
}

Boot::registerClass(LazyObject::class, 'tink.core._Lazy.LazyObject');

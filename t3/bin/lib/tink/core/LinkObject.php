<?php
/**
 */

namespace tink\core;

use \php\Boot;

interface LinkObject {
	/**
	 * @return void
	 */
	public function cancel () ;
}

Boot::registerClass(LinkObject::class, 'tink.core.LinkObject');

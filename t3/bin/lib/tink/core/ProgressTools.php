<?php
/**
 */

namespace tink\core;

use \tink\core\_Progress\ProgressObject;
use \php\Boot;
use \tink\core\_Future\FutureObject;

class ProgressTools {
	/**
	 * @param ProgressObject $p
	 * 
	 * @return FutureObject
	 */
	public static function asPromise ($p) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:218: characters 5-20
		return $p->result;
	}
}

Boot::registerClass(ProgressTools::class, 'tink.core.ProgressTools');

<?php
/**
 */

namespace tink\core;

use \php\Boot;

class ProgressStatusTools {
	/**
	 * @param ProgressStatus $p
	 * @param \Closure $f
	 * 
	 * @return ProgressStatus
	 */
	public static function map ($p, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:199: lines 199-202
		$__hx__switch = ($p->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:200: characters 23-24
			$v = $p->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:200: characters 27-40
			return ProgressStatus::InProgress($v);
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:201: characters 21-22
			$v = $p->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:201: characters 25-39
			return ProgressStatus::Finished($f($v));
		}
	}
}

Boot::registerClass(ProgressStatusTools::class, 'tink.core.ProgressStatusTools');

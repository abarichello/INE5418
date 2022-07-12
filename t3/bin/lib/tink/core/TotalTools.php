<?php
/**
 */

namespace tink\core;

use \php\Boot;
use \haxe\ds\Option as DsOption;

class TotalTools {
	/**
	 * @param DsOption $a
	 * @param DsOption $b
	 * 
	 * @return bool
	 */
	public static function eq ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:208: lines 208-212
		$__hx__switch = ($a->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:208: characters 23-24
			if ($b->index === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:209: characters 28-30
				$t2 = $b->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:209: characters 18-20
				$t1 = $a->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:209: characters 34-42
				return Boot::equal($t1, $t2);
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:211: characters 15-20
				return false;
			}
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:208: characters 23-24
			if ($b->index === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:210: characters 26-30
				return true;
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:211: characters 15-20
				return false;
			}
		}
	}
}

Boot::registerClass(TotalTools::class, 'tink.core.TotalTools');

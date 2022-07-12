<?php
/**
 */

namespace tink\core\_Progress;

use \php\Boot;
use \php\_Boot\HxString;

final class UnitInterval_Impl_ {
	/**
	 * @param float $this
	 * @param int $dp
	 * 
	 * @return string
	 */
	public static function toPercentageString ($this1, $dp) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:172: characters 5-30
		$m = (10 ** $dp);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:173: characters 5-44
		$v = (int)(\floor($this1 * $m * 100 + 0.5)) / $m;
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:174: characters 5-27
		$s = \Std::string($v);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:175: characters 19-33
		$_g = HxString::indexOf($s, ".");
		if ($_g === -1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:176: characters 16-61
			return ($s??'null') . "." . (\StringTools::lpad("", "0", $dp)??'null') . "%";
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:177: characters 12-13
			$i = $_g;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:177: lines 177-178
			if ((mb_strlen($s) - $i) > $dp) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:177: characters 38-67
				return (\mb_substr($s, 0, $dp + $i + 1)??'null') . "%";
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:178: characters 12-13
				$i = $_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:178: characters 15-57
				return (\StringTools::rpad($s, "0", $i + $dp + 1)??'null') . "%";
			}
		}
	}
}

Boot::registerClass(UnitInterval_Impl_::class, 'tink.core._Progress.UnitInterval_Impl_');
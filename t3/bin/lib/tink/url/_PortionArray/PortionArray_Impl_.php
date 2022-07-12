<?php
/**
 */

namespace tink\url\_PortionArray;

use \php\Boot;
use \tink\url\_Portion\Portion_Impl_;

final class PortionArray_Impl_ {
	/**
	 * @param string[]|\Array_hx $this
	 * 
	 * @return string[]|\Array_hx
	 */
	public static function toStringArray ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/PortionArray.hx:7: characters 10-39
		$_g = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/PortionArray.hx:7: characters 11-38
		$_g1 = 0;
		while ($_g1 < $this1->length) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/PortionArray.hx:7: characters 15-16
			$p = ($this1->arr[$_g1] ?? null);
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/PortionArray.hx:7: characters 11-38
			++$_g1;
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/PortionArray.hx:7: characters 26-38
			$x = Portion_Impl_::toString($p);
			$_g->arr[$_g->length++] = $x;
		}
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/PortionArray.hx:7: characters 10-39
		return $_g;
	}
}

Boot::registerClass(PortionArray_Impl_::class, 'tink.url._PortionArray.PortionArray_Impl_');

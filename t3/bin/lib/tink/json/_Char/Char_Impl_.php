<?php
/**
 */

namespace tink\json\_Char;

use \php\Boot;

final class Char_Impl_ {
	/**
	 * @param int $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_json/0,11,0/src/tink/json/Char.hx:19: characters 5-37
		return \mb_chr($this1);
	}
}

Boot::registerClass(Char_Impl_::class, 'tink.json._Char.Char_Impl_');

<?php
/**
 */

namespace tink\http\_Header;

use \php\Boot;

final class HeaderName_Impl_ {

	/**
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function _new ($s) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:239: character 3
		$this1 = $s;
		return $this1;
	}

	/**
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_http/0,10,0/src/tink/http/Header.hx:242: characters 12-43
		$this1 = \mb_strtolower($s);
		return $this1;
	}
}

Boot::registerClass(HeaderName_Impl_::class, 'tink.http._Header.HeaderName_Impl_');

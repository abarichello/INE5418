<?php
/**
 */

namespace tink\url\_Portion;

use \php\Boot;

final class Portion_Impl_ {

	/**
	 * @param string $v
	 * 
	 * @return string
	 */
	public static function _new ($v) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:21: character 3
		$this1 = $v;
		return $this1;
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function get_raw ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:10: characters 7-18
		return $this1;
	}

	/**
	 * @param string $this
	 * 
	 * @return bool
	 */
	public static function isValid ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:14: lines 14-19
		if ($this1 !== null) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:15: lines 15-19
			try {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:16: characters 11-27
				\urldecode($this1);
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:17: characters 11-15
				return true;
			} catch(\Throwable $_g) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:19: characters 27-32
				return false;
			}
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:14: lines 14-19
			return true;
		}
	}

	/**
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function ofString ($s) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:35: characters 12-61
		$this1 = ($s === null ? "" : \rawurlencode($s));
		return $this1;
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function stringly ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:25: characters 5-22
		return Portion_Impl_::toString($this1);
	}

	/**
	 * @param string $this
	 * 
	 * @return string
	 */
	public static function toString ($this1) {
		#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:29: lines 29-32
		if ($this1 === null) {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:29: characters 25-29
			return null;
		} else {
			#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:31: lines 31-32
			try {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:31: characters 13-29
				return \urldecode($this1);
			} catch(\Throwable $_g) {
				#/home/barichello/.local/share/haxelib/tink_url/0,5,0/src/tink/url/Portion.hx:32: characters 27-29
				return "";
			}
		}
	}
}

Boot::registerClass(Portion_Impl_::class, 'tink.url._Portion.Portion_Impl_');
Boot::registerGetters('tink\\url\\_Portion\\Portion_Impl_', [
	'raw' => true
]);

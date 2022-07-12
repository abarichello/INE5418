<?php
/**
 */

namespace tink\core\_Pair;

use \php\Boot;
use \tink\core\MPair;

final class Pair_Impl_ {

	/**
	 * @param mixed $a
	 * @param mixed $b
	 * 
	 * @return MPair
	 */
	public static function _new ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Pair.hx:9: character 3
		$this1 = new MPair($a, $b);
		return $this1;
	}

	/**
	 * @param MPair $this
	 * 
	 * @return mixed
	 */
	public static function get_a ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Pair.hx:11: characters 29-42
		return $this1->a;
	}

	/**
	 * @param MPair $this
	 * 
	 * @return mixed
	 */
	public static function get_b ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Pair.hx:12: characters 29-42
		return $this1->b;
	}

	/**
	 * @param MPair $this
	 * 
	 * @return bool
	 */
	public static function isNil ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Pair.hx:18: characters 5-24
		return $this1 === null;
	}

	/**
	 * @return MPair
	 */
	public static function nil () {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Pair.hx:21: characters 5-16
		return null;
	}

	/**
	 * @param MPair $this
	 * 
	 * @return bool
	 */
	public static function toBool ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Pair.hx:15: characters 5-24
		return $this1 !== null;
	}
}

Boot::registerClass(Pair_Impl_::class, 'tink.core._Pair.Pair_Impl_');
Boot::registerGetters('tink\\core\\_Pair\\Pair_Impl_', [
	'b' => true,
	'a' => true
]);

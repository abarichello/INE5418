<?php
/**
 */

namespace tink\core\_Progress;

use \haxe\ds\Option;
use \php\Boot;
use \tink\core\MPair;

final class ProgressValue_Impl_ {
	/**
	 * @var MPair
	 */
	static public $ZERO;

	/**
	 * @param float $value
	 * @param Option $total
	 * 
	 * @return MPair
	 */
	public static function _new ($value, $total) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:155: characters 12-34
		$this1 = new MPair($value, $total);
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:154: character 3
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param MPair $this
	 * 
	 * @return Option
	 */
	public static function get_total ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:167: characters 5-18
		return $this1->b;
	}

	/**
	 * @param MPair $this
	 * 
	 * @return float
	 */
	public static function get_value ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:164: characters 5-18
		return $this1->a;
	}

	/**
	 * Normalize to 0-1 range
	 * 
	 * @param MPair $this
	 * 
	 * @return Option
	 */
	public static function normalize ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Progress.hx:161: characters 12-51
		$o = $this1->b;
		if ($o->index === 0) {
			$v = $o->params[0];
			return Option::Some($this1->a / $v);
		} else {
			return Option::None();
		}
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		$this1 = new MPair(0, Option::None());
		$this2 = $this1;
		self::$ZERO = $this2;
	}
}

Boot::registerClass(ProgressValue_Impl_::class, 'tink.core._Progress.ProgressValue_Impl_');
Boot::registerGetters('tink\\core\\_Progress\\ProgressValue_Impl_', [
	'total' => true,
	'value' => true
]);
ProgressValue_Impl_::__hx__init();

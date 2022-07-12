<?php
/**
 */

namespace haxe\io;

use \haxe\_Int64\___Int64;
use \php\Boot;

class FPHelper {
	/**
	 * @var ___Int64
	 */
	static public $i64tmp;
	/**
	 * @var bool
	 */
	static public $isLittleEndian;

	/**
	 * @param float $v
	 * 
	 * @return ___Int64
	 */
	public static function doubleToI64 ($v) {
		#/usr/share/haxe/std/php/_std/haxe/io/FPHelper.hx:44: characters 3-76
		$a = \unpack((FPHelper::$isLittleEndian ? "V2" : "N2"), \pack("d", $v));
		#/usr/share/haxe/std/php/_std/haxe/io/FPHelper.hx:45: characters 3-20
		$i64 = FPHelper::$i64tmp;
		#/usr/share/haxe/std/php/_std/haxe/io/FPHelper.hx:46: characters 19-57
		$i64->low = $a[(FPHelper::$isLittleEndian ? 1 : 2)];
		#/usr/share/haxe/std/php/_std/haxe/io/FPHelper.hx:47: characters 19-58
		$i64->high = $a[(FPHelper::$isLittleEndian ? 2 : 1)];
		#/usr/share/haxe/std/php/_std/haxe/io/FPHelper.hx:49: characters 3-13
		return $i64;
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


		self::$isLittleEndian = Boot::equal(\unpack("S", "\x01\x00")[1], 1);
		$this1 = new ___Int64(0, 0);
		self::$i64tmp = $this1;
	}
}

Boot::registerClass(FPHelper::class, 'haxe.io.FPHelper');
FPHelper::__hx__init();

<?php
/**
 */

namespace haxe;

use \php\Boot;

/**
 * If `haxe.MainLoop` is kept from DCE, then we will insert an `haxe.EntryPoint.run()` call just at then end of `main()`.
 * This class can be redefined by custom frameworks so they can handle their own main loop logic.
 */
class EntryPoint {
	/**
	 * @var \Closure[]|\Array_hx
	 */
	static public $pending;
	/**
	 * @var int
	 */
	static public $threadCount = 0;

	/**
	 * @return float
	 */
	public static function processEvents () {
		#/usr/share/haxe/std/haxe/EntryPoint.hx:104: lines 104-115
		while (true) {
			#/usr/share/haxe/std/haxe/EntryPoint.hx:107: characters 12-27
			$_this = EntryPoint::$pending;
			if ($_this->length > 0) {
				$_this->length--;
			}
			#/usr/share/haxe/std/haxe/EntryPoint.hx:107: characters 4-28
			$f = \array_shift($_this->arr);
			#/usr/share/haxe/std/haxe/EntryPoint.hx:112: lines 112-113
			if ($f === null) {
				#/usr/share/haxe/std/haxe/EntryPoint.hx:113: characters 5-10
				break;
			}
			#/usr/share/haxe/std/haxe/EntryPoint.hx:114: characters 4-7
			$f();
		}
		#/usr/share/haxe/std/haxe/EntryPoint.hx:116: characters 3-46
		$time = MainLoop::tick();
		#/usr/share/haxe/std/haxe/EntryPoint.hx:117: lines 117-118
		if (!MainLoop::hasEvents() && (EntryPoint::$threadCount === 0)) {
			#/usr/share/haxe/std/haxe/EntryPoint.hx:118: characters 4-13
			return -1;
		}
		#/usr/share/haxe/std/haxe/EntryPoint.hx:119: characters 3-14
		return $time;
	}

	/**
	 * Start the main loop. Depending on the platform, this can return immediately or will only return when the application exits.
	 * 
	 * @return void
	 */
	public static function run () {
		#/usr/share/haxe/std/haxe/EntryPoint.hx:154: lines 154-160
		while (true) {
			#/usr/share/haxe/std/haxe/EntryPoint.hx:155: characters 4-35
			$nextTick = EntryPoint::processEvents();
			#/usr/share/haxe/std/haxe/EntryPoint.hx:156: lines 156-157
			if ($nextTick < 0) {
				#/usr/share/haxe/std/haxe/EntryPoint.hx:157: characters 5-10
				break;
			}
			#/usr/share/haxe/std/haxe/EntryPoint.hx:158: characters 8-20
			$tmp = $nextTick > 0;
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


		self::$pending = new \Array_hx();
	}
}

Boot::registerClass(EntryPoint::class, 'haxe.EntryPoint');
EntryPoint::__hx__init();
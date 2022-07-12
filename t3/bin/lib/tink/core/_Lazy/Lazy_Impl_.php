<?php
/**
 */

namespace tink\core\_Lazy;

use \php\Boot;

final class Lazy_Impl_ {
	/**
	 * @var LazyObject
	 */
	static public $NOISE;
	/**
	 * @var LazyObject
	 */
	static public $NULL;

	/**
	 * @param LazyObject $this
	 * @param \Closure $f
	 * 
	 * @return LazyObject
	 */
	public static function flatMap ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:27: characters 5-60
		return new LazyFunc(function () use (&$f, &$this1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:27: characters 34-53
			return Lazy_Impl_::get($f($this1->get()));
		}, $this1);
	}

	/**
	 * @param LazyObject $l
	 * 
	 * @return LazyObject
	 */
	public static function fromNoise ($l) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:18: characters 5-18
		return $l;
	}

	/**
	 * @param LazyObject $this
	 * 
	 * @return mixed
	 */
	public static function get ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:13: characters 5-19
		$this1->compute();
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:14: characters 5-22
		return $this1->get();
	}

	/**
	 * @param LazyObject $this
	 * 
	 * @return bool
	 */
	public static function get_computed ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:10: characters 7-31
		return $this1->isComputed();
	}

	/**
	 * @param LazyObject $this
	 * @param \Closure $f
	 * 
	 * @return LazyObject
	 */
	public static function map ($this1, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:24: characters 5-54
		return new LazyFunc(function () use (&$f, &$this1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:24: characters 34-47
			return $f($this1->get());
		}, $this1);
	}

	/**
	 * @param mixed $c
	 * 
	 * @return LazyObject
	 */
	public static function ofConst ($c) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:31: characters 5-28
		return new LazyConst($c);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return LazyObject
	 */
	public static function ofFunc ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Lazy.hx:21: characters 5-27
		return new LazyFunc($f);
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


		self::$NOISE = new LazyConst(null);
		self::$NULL = Lazy_Impl_::$NOISE;
	}
}

Boot::registerClass(Lazy_Impl_::class, 'tink.core._Lazy.Lazy_Impl_');
Boot::registerGetters('tink\\core\\_Lazy\\Lazy_Impl_', [
	'computed' => true
]);
Lazy_Impl_::__hx__init();

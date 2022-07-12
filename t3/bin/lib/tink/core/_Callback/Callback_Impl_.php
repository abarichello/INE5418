<?php
/**
 */

namespace tink\core\_Callback;

use \haxe\Timer;
use \php\Boot;

final class Callback_Impl_ {
	/**
	 * @var int
	 */
	const MAX_DEPTH = 500;

	/**
	 * @var int
	 */
	static public $depth = 0;

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function _new ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:7: character 3
		$this1 = $f;
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public static function defer ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:50: characters 7-29
		Timer::delay($f, 0);
	}

	/**
	 * @param \Closure[]|\Array_hx $callbacks
	 * 
	 * @return \Closure
	 */
	public static function fromMany ($callbacks) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:31: lines 31-34
		return function ($v) use (&$callbacks) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:33: lines 33-34
			$_g = 0;
			while ($_g < $callbacks->length) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:33: characters 14-22
				$callback = ($callbacks->arr[$_g] ?? null);
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:33: lines 33-34
				++$_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:34: characters 11-29
				Callback_Impl_::invoke($callback, $v);
			}
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function fromNiladic ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:28: characters 5-48
		return function ($_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:28: characters 45-48
			$f();
		};
	}

	/**
	 * @param \Closure $this
	 * @param mixed $data
	 * 
	 * @return void
	 */
	public static function invoke ($this1, $data) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:25: characters 5-41
		if (Callback_Impl_::$depth < 500) {
			Callback_Impl_::$depth++;
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:25: characters 30-40
			$this1($data);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:25: characters 5-41
			Callback_Impl_::$depth--;
		} else {
			Callback_Impl_::defer(function () use (&$data, &$this1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:25: characters 30-40
				$this1($data);
			});
		}
	}

	/**
	 * @param \Closure $this
	 * 
	 * @return \Closure
	 */
	public static function toFunction ($this1) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Callback.hx:11: characters 5-16
		return $this1;
	}
}

Boot::registerClass(Callback_Impl_::class, 'tink.core._Callback.Callback_Impl_');

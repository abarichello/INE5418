<?php
/**
 */

namespace tink\core\_Promise;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\Future_Impl_;

final class Next_Impl_ {
	/**
	 * @param \Closure $a
	 * @param \Closure $b
	 * 
	 * @return \Closure
	 */
	public static function _chain ($a, $b) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:300: characters 5-29
		return function ($v) use (&$b, &$a) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:300: characters 17-29
			return Promise_Impl_::next($a($v), $b);
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSafe ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:291: characters 5-21
		return function ($x) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:291: characters 17-21
			return new SyncFuture(new LazyConst($f($x)));
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSafeSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:297: characters 5-21
		return function ($x) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:297: characters 17-21
			return new SyncFuture(new LazyConst(Outcome::Success($f($x))));
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:294: characters 5-21
		return function ($x) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:294: characters 17-21
			return Future_Impl_::map($f($x), Boot::getStaticClosure(Outcome::class, 'Success'));
		};
	}
}

Boot::registerClass(Next_Impl_::class, 'tink.core._Promise.Next_Impl_');

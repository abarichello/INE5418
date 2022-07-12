<?php
/**
 */

namespace tink\core\_Promise;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\Future_Impl_;

final class Combiner_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSafe ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:319: characters 5-33
		return function ($x1, $x2) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:319: characters 24-33
			return Future_Impl_::map($f($x1, $x2), Boot::getStaticClosure(Outcome::class, 'Success'));
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSafeSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:322: characters 5-33
		return function ($x1, $x2) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:322: characters 24-33
			return new SyncFuture(new LazyConst(Outcome::Success($f($x1, $x2))));
		};
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:316: characters 5-33
		return function ($x1, $x2) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:316: characters 24-33
			return new SyncFuture(new LazyConst($f($x1, $x2)));
		};
	}
}

Boot::registerClass(Combiner_Impl_::class, 'tink.core._Promise.Combiner_Impl_');

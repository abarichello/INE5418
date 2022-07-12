<?php
/**
 */

namespace tink\core\_Promise;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\_Lazy\LazyConst;

final class Recover_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:309: characters 5-34
		return function ($e) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Promise.hx:309: characters 17-34
			return new SyncFuture(new LazyConst($f($e)));
		};
	}
}

Boot::registerClass(Recover_Impl_::class, 'tink.core._Promise.Recover_Impl_');

<?php
/**
 */

namespace tink\streams\_Stream;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\_Lazy\LazyConst;

final class Regrouper_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofFunc ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:95: characters 5-22
		return new _HxAnon_Regrouper_Impl_0($f);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofFuncSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:98: characters 5-63
		return new _HxAnon_Regrouper_Impl_0(function ($i, $s) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:98: characters 42-62
			return new SyncFuture(new LazyConst($f($i, $s)));
		});
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofIgnorance ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:89: characters 5-47
		return new _HxAnon_Regrouper_Impl_0(function ($i, $_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:89: characters 35-46
			return $f($i);
		});
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofIgnoranceSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:92: characters 5-60
		return new _HxAnon_Regrouper_Impl_0(function ($i, $_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:92: characters 42-59
			return new SyncFuture(new LazyConst($f($i)));
		});
	}
}

class _HxAnon_Regrouper_Impl_0 extends HxAnon {
	function __construct($apply) {
		$this->apply = $apply;
	}
}

Boot::registerClass(Regrouper_Impl_::class, 'tink.streams._Stream.Regrouper_Impl_');

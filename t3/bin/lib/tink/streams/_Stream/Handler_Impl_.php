<?php
/**
 */

namespace tink\streams\_Stream;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\FutureObject;

final class Handler_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function _new ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:486: character 3
		$this1 = $f;
		return $this1;
	}

	/**
	 * @param \Closure $this
	 * @param mixed $item
	 * 
	 * @return FutureObject
	 */
	public static function apply ($this1, $item) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:490: characters 5-22
		return $this1($item);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSafe ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:499: characters 12-26
		$this1 = $f;
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSafeSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:493: characters 12-62
		$this1 = function ($i) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:493: characters 44-61
			return new SyncFuture(new LazyConst($f($i)));
		};
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:493: characters 12-62
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofUnknown ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:502: characters 12-26
		$this1 = $f;
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofUnknownSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:496: characters 12-62
		$this1 = function ($i) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:496: characters 44-61
			return new SyncFuture(new LazyConst($f($i)));
		};
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:496: characters 12-62
		return $this1;
	}
}

Boot::registerClass(Handler_Impl_::class, 'tink.streams._Stream.Handler_Impl_');

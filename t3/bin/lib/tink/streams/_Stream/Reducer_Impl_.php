<?php
/**
 */

namespace tink\streams\_Stream;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\streams\ReductionStep;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

final class Reducer_Impl_ {
	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function _new ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:506: character 3
		$this1 = $f;
		return $this1;
	}

	/**
	 * @param \Closure $this
	 * @param mixed $res
	 * @param mixed $item
	 * 
	 * @return FutureObject
	 */
	public static function apply ($this1, $res, $item) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:510: characters 5-27
		return $this1($res, $item);
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofPlainSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:522: characters 12-86
		$this1 = function ($res, $cur) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:522: characters 51-85
			return new SyncFuture(new LazyConst(ReductionStep::Progress($f($res, $cur))));
		};
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:522: characters 12-86
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofPromiseBased ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:528: lines 528-531
		$this1 = function ($res, $cur) use (&$f) {
			return Future_Impl_::map($f($res, $cur), function ($s) {
				$__hx__switch = ($s->index);
				if ($__hx__switch === 0) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:529: characters 20-21
					$r = $s->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:529: characters 24-35
					return ReductionStep::Progress($r);
				} else if ($__hx__switch === 1) {
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:530: characters 20-21
					$e = $s->params[0];
					#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:530: characters 24-32
					return ReductionStep::Crash($e);
				}
			});
		};
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:528: lines 528-531
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSafe ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:519: characters 12-26
		$this1 = $f;
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofSafeSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:513: characters 12-76
		$this1 = function ($res, $cur) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:513: characters 51-75
			return new SyncFuture(new LazyConst($f($res, $cur)));
		};
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:513: characters 12-76
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofUnknown ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:525: characters 12-26
		$this1 = $f;
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return \Closure
	 */
	public static function ofUnknownSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:516: characters 12-76
		$this1 = function ($res, $cur) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:516: characters 51-75
			return new SyncFuture(new LazyConst($f($res, $cur)));
		};
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:516: characters 12-76
		return $this1;
	}
}

Boot::registerClass(Reducer_Impl_::class, 'tink.streams._Stream.Reducer_Impl_');

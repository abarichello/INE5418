<?php
/**
 */

namespace tink\streams\_Stream;

use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\streams\RegroupResult;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Promise\Recover_Impl_;
use \tink\streams\Empty_hx;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Promise\Promise_Impl_;

final class Filter_Impl_ {
	/**
	 * @param object $o
	 * 
	 * @return object
	 */
	public static function _new ($o) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:312: character 3
		$this1 = $o;
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofAsync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:321: lines 321-323
		$this1 = new _HxAnon_Filter_Impl_0(function ($i, $_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:322: characters 39-146
			return Future_Impl_::map($f(($i->arr[0] ?? null)), function ($matched) use (&$i) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:322: characters 77-145
				return RegroupResult::Converted(($matched ? Stream_Impl_::single(($i->arr[0] ?? null)) : Empty_hx::$inst));
			});
		});
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:321: lines 321-323
		return $this1;
	}

	/**
	 * @param \Closure $n
	 * 
	 * @return object
	 */
	public static function ofNext ($n) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:316: lines 316-318
		$this1 = new _HxAnon_Filter_Impl_0(function ($i, $_) use (&$n) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:317: characters 46-164
			$this1 = Promise_Impl_::next($n(($i->arr[0] ?? null)), function ($matched) use (&$i) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:317: characters 78-146
				return new SyncFuture(new LazyConst(Outcome::Success(RegroupResult::Converted(($matched ? Stream_Impl_::single(($i->arr[0] ?? null)) : Empty_hx::$inst)))));
			});
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:317: characters 46-164
			$f = Recover_Impl_::ofSync(Boot::getStaticClosure(RegroupResult::class, 'Errored'));
			return Future_Impl_::flatMap($this1, function ($o) use (&$f) {
				$__hx__switch = ($o->index);
				if ($__hx__switch === 0) {
					$d = $o->params[0];
					return new SyncFuture(new LazyConst($d));
				} else if ($__hx__switch === 1) {
					$e = $o->params[0];
					return $f($e);
				}
			});
		});
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:316: lines 316-318
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofPlain ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:334: lines 334-336
		$this1 = new _HxAnon_Filter_Impl_0(function ($i, $_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:335: characters 46-120
			return new SyncFuture(new LazyConst(RegroupResult::Converted(($f(($i->arr[0] ?? null)) ? Stream_Impl_::single(($i->arr[0] ?? null)) : Empty_hx::$inst))));
		});
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:334: lines 334-336
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:326: lines 326-331
		$this1 = new _HxAnon_Filter_Impl_0(function ($i, $_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:327: lines 327-330
			$v = null;
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:327: characters 65-72
			$_g = $f(($i->arr[0] ?? null));
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:328: characters 22-23
				$v1 = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:327: lines 327-330
				$v = RegroupResult::Converted(($v1 ? Stream_Impl_::single(($i->arr[0] ?? null)) : Empty_hx::$inst));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:329: characters 22-23
				$e = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:327: lines 327-330
				$v = RegroupResult::Errored($e);
			}
			return new SyncFuture(new LazyConst($v));
		});
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:326: lines 326-331
		return $this1;
	}
}

class _HxAnon_Filter_Impl_0 extends HxAnon {
	function __construct($apply) {
		$this->apply = $apply;
	}
}

Boot::registerClass(Filter_Impl_::class, 'tink.streams._Stream.Filter_Impl_');

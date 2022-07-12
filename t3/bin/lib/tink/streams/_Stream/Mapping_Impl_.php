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
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Promise\Promise_Impl_;

final class Mapping_Impl_ {
	/**
	 * @param object $o
	 * 
	 * @return object
	 */
	public static function _new ($o) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:282: character 3
		$this1 = $o;
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofAsync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:291: lines 291-293
		$this1 = new _HxAnon_Mapping_Impl_0(function ($i, $_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:292: characters 40-106
			return Future_Impl_::map($f(($i->arr[0] ?? null)), function ($o) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:292: characters 71-105
				return RegroupResult::Converted(Stream_Impl_::single($o));
			});
		});
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:291: lines 291-293
		return $this1;
	}

	/**
	 * @param \Closure $n
	 * 
	 * @return object
	 */
	public static function ofNext ($n) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:286: lines 286-288
		$this1 = new _HxAnon_Mapping_Impl_0(function ($i, $_) use (&$n) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:287: characters 47-124
			$this1 = Promise_Impl_::next($n(($i->arr[0] ?? null)), function ($o) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:287: characters 72-106
				return new SyncFuture(new LazyConst(Outcome::Success(RegroupResult::Converted(Stream_Impl_::single($o)))));
			});
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:287: characters 47-124
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
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:286: lines 286-288
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofPlain ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:304: lines 304-306
		$this1 = new _HxAnon_Mapping_Impl_0(function ($i, $_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:305: characters 47-93
			return new SyncFuture(new LazyConst(RegroupResult::Converted(Stream_Impl_::single($f(($i->arr[0] ?? null))))));
		});
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:304: lines 304-306
		return $this1;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return object
	 */
	public static function ofSync ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:296: lines 296-301
		$this1 = new _HxAnon_Mapping_Impl_0(function ($i, $_) use (&$f) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:297: lines 297-300
			$v = null;
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:297: characters 66-73
			$_g = $f(($i->arr[0] ?? null));
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:298: characters 22-23
				$v1 = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:297: lines 297-300
				$v = RegroupResult::Converted(Stream_Impl_::single($v1));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:299: characters 22-23
				$e = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:297: lines 297-300
				$v = RegroupResult::Errored($e);
			}
			return new SyncFuture(new LazyConst($v));
		});
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:296: lines 296-301
		return $this1;
	}
}

class _HxAnon_Mapping_Impl_0 extends HxAnon {
	function __construct($apply) {
		$this->apply = $apply;
	}
}

Boot::registerClass(Mapping_Impl_::class, 'tink.streams._Stream.Mapping_Impl_');

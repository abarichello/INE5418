<?php
/**
 */

namespace tink\streams\_RealStream;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \haxe\Exception;
use \tink\streams\_Stream\Stream_Impl_;
use \tink\streams\StreamObject;
use \tink\core\Outcome;
use \tink\streams\Handled;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\_Stream\Handler_Impl_;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

final class RealStream_Impl_ {
	/**
	 * @param StreamObject $this
	 * 
	 * @return FutureObject
	 */
	public static function collect ($this1) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:26: characters 5-18
		$buf = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:27: lines 27-34
		return Future_Impl_::map($this1->forEach(Handler_Impl_::ofSafe(function ($x) use (&$buf) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:28: characters 7-18
			$buf->arr[$buf->length++] = $x;
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:29: characters 7-20
			return new SyncFuture(new LazyConst(Handled::Resume()));
		})), function ($c) use (&$buf) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:30: lines 30-34
			$__hx__switch = ($c->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:33: characters 15-16
				$_g = $c->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:33: characters 19-24
				throw Exception::thrown("unreachable");
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:32: characters 15-16
				$e = $c->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:32: characters 19-29
				return Outcome::Failure($e);
			} else if ($__hx__switch === 3) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:31: characters 18-30
				return Outcome::Success($buf);
			}
		});
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return StreamObject
	 */
	public static function promiseOfIdealStream ($p) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:11: characters 5-34
		return Stream_Impl_::promise($p);
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return StreamObject
	 */
	public static function promiseOfRealStream ($p) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:19: characters 5-34
		return Stream_Impl_::promise($p);
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return StreamObject
	 */
	public static function promiseOfStreamError ($p) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:23: characters 5-34
		return Stream_Impl_::promise($p);
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return StreamObject
	 */
	public static function promiseOfStreamNoise ($p) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/RealStream.hx:15: characters 5-34
		return Stream_Impl_::promise($p);
	}
}

Boot::registerClass(RealStream_Impl_::class, 'tink.streams._RealStream.RealStream_Impl_');

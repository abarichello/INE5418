<?php
/**
 */

namespace tink\streams\_IdealStream;

use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\streams\_Stream\Stream_Impl_;
use \tink\streams\StreamObject;
use \tink\streams\Handled;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\_Stream\Handler_Impl_;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

final class IdealStream_Impl_ {
	/**
	 * @param StreamObject $this
	 * 
	 * @return FutureObject
	 */
	public static function collect ($this1) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:18: characters 5-18
		$buf = new \Array_hx();
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:19: lines 19-22
		return Future_Impl_::map($this1->forEach(Handler_Impl_::ofSafe(function ($x) use (&$buf) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:20: characters 7-18
			$buf->arr[$buf->length++] = $x;
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:21: characters 7-20
			return new SyncFuture(new LazyConst(Handled::Resume()));
		})), function ($c) use (&$buf) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:22: characters 24-34
			return $buf;
		});
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return StreamObject
	 */
	public static function promiseOfIdealStream ($p) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:11: characters 5-34
		return Stream_Impl_::promise($p);
	}

	/**
	 * @param FutureObject $p
	 * 
	 * @return StreamObject
	 */
	public static function promiseOfStreamNoise ($p) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/IdealStream.hx:15: characters 5-34
		return Stream_Impl_::promise($p);
	}
}

Boot::registerClass(IdealStream_Impl_::class, 'tink.streams._IdealStream.IdealStream_Impl_');

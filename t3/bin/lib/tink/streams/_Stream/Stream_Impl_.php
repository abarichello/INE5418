<?php
/**
 */

namespace tink\streams\_Stream;

use \php\Boot;
use \tink\streams\Step;
use \tink\streams\Generator;
use \tink\streams\Single;
use \tink\core\TypedError;
use \tink\streams\RegroupResult;
use \tink\streams\StreamObject;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\FutureStream;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Future\FutureObject;

final class Stream_Impl_ {

	/**
	 * @param StreamObject $this
	 * 
	 * @return StreamObject
	 */
	public static function dirty ($this1) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:15: characters 5-21
		return $this1;
	}

	/**
	 * @param StreamObject $stream
	 * 
	 * @return StreamObject
	 */
	public static function flatten ($stream) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:25: characters 5-66
		return $stream->regroup(Regrouper_Impl_::ofIgnoranceSync(function ($arr) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:25: characters 41-65
			return RegroupResult::Converted(($arr->arr[0] ?? null));
		}));
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	public static function future ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:37: characters 5-31
		return new FutureStream($f);
	}

	/**
	 * @param StreamObject $this
	 * 
	 * @return bool
	 */
	public static function get_depleted ($this1) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:12: characters 7-27
		return $this1->get_depleted();
	}

	/**
	 * @param TypedError $e
	 * 
	 * @return StreamObject
	 */
	public static function ofError ($e) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:63: characters 5-30
		return new ErrorStream($e);
	}

	/**
	 * @param object $i
	 * 
	 * @return StreamObject
	 */
	public static function ofIterator ($i) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:21: characters 29-118
		$next = null;
		$next = function ($step) use (&$next, &$i) {
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:21: characters 54-117
			$next1 = null;
			if ($i->hasNext()) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:21: characters 75-83
				$next2 = $i->next();
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:21: characters 54-117
				$next1 = Step::Link($next2, Generator::stream($next));
			} else {
				$next1 = Step::End();
			}
			#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:21: characters 49-118
			$step($next1);
		};
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:21: characters 5-119
		return Generator::stream($next);
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	public static function promise ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:57: lines 57-60
		return Stream_Impl_::future(Future_Impl_::map($f, function ($o) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:58: characters 20-21
				$s = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:58: characters 24-33
				return Stream_Impl_::dirty($s);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:59: characters 20-21
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:59: characters 24-34
				return Stream_Impl_::ofError($e);
			}
		}));
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	public static function promiseIdeal ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:51: characters 5-27
		return Stream_Impl_::promise($f);
	}

	/**
	 * @param FutureObject $f
	 * 
	 * @return StreamObject
	 */
	public static function promiseReal ($f) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:54: characters 5-27
		return Stream_Impl_::promise($f);
	}

	/**
	 * @param mixed $i
	 * 
	 * @return StreamObject
	 */
	public static function single ($i) {
		#/home/barichello/.local/share/haxelib/tink_streams/0,4,0/src/tink/streams/Stream.hx:18: characters 5-25
		return new Single(new LazyConst($i));
	}
}

Boot::registerClass(Stream_Impl_::class, 'tink.streams._Stream.Stream_Impl_');
Boot::registerGetters('tink\\streams\\_Stream\\Stream_Impl_', [
	'depleted' => true
]);

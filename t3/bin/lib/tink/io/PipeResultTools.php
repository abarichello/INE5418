<?php
/**
 */

namespace tink\io;

use \tink\chunk\ChunkObject;
use \haxe\ds\Option;
use \php\Boot;
use \tink\streams\Single;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \tink\streams\Conclusion;

class PipeResultTools {
	/**
	 * Transform PipeResult to an Outcome of the sink result
	 * 
	 * @param PipeResult $result
	 * 
	 * @return Outcome
	 */
	public static function toOutcome ($result) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:21: lines 21-25
		$__hx__switch = ($result->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:22: characters 24-37
			return Outcome::Success(Option::None());
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:23: characters 30-31
			$_g = $result->params[1];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:23: characters 22-28
			$result1 = $result->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:23: characters 34-55
			return Outcome::Success(Option::Some($result1));
		} else if ($__hx__switch === 2) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:24: characters 26-27
			$_g = $result->params[1];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:24: characters 23-24
			$e = $result->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:24: characters 48-58
			return Outcome::Failure($e);
		} else if ($__hx__switch === 3) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:24: characters 44-45
			$e = $result->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:24: characters 48-58
			return Outcome::Failure($e);
		}
	}

	/**
	 * @param Conclusion $c
	 * @param mixed $result
	 * @param ChunkObject $buffered
	 * 
	 * @return PipeResult
	 */
	public static function toResult ($c, $result, $buffered = null) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:31: lines 31-35
		$mk = function ($s) use (&$buffered) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:32: lines 32-35
			if ($buffered === null) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:33: characters 20-21
				return $s;
			} else {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:34: characters 14-15
				$v = $buffered;
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:34: characters 17-29
				return $s->prepend(new Single(new LazyConst($v)));
			}
		};
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:37: lines 37-42
		$__hx__switch = ($c->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:41: characters 19-23
			$rest = $c->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:41: characters 26-53
			return PipeResult::SinkEnded($result, $mk($rest));
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:39: characters 20-21
			$e = $c->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:39: characters 23-27
			$rest = $c->params[1];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:39: characters 30-53
			return PipeResult::SinkFailed($e, $mk($rest));
		} else if ($__hx__switch === 2) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:38: characters 19-20
			$e = $c->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:38: characters 23-38
			return PipeResult::SourceFailed($e);
		} else if ($__hx__switch === 3) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/PipeResult.hx:40: characters 22-32
			return PipeResult::AllWritten();
		}
	}
}

Boot::registerClass(PipeResultTools::class, 'tink.io.PipeResultTools');

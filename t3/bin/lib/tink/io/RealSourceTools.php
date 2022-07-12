<?php
/**
 */

namespace tink\io;

use \tink\chunk\ChunkObject;
use \php\_Boot\HxAnon;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \tink\streams\_Stream\Stream_Impl_;
use \tink\io\_Source\Source_Impl_;
use \tink\streams\Single;
use \tink\core\TypedError;
use \tink\streams\StreamObject;
use \tink\io\_StreamParser\StreamParser_Impl_;
use \tink\core\Outcome;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Promise\Next_Impl_;
use \tink\core\_Future\Future_Impl_;
use \tink\core\_Promise\Promise_Impl_;
use \tink\core\MPair;
use \tink\core\_Future\FutureObject;

class RealSourceTools {
	/**
	 * @param StreamObject $s
	 * 
	 * @return FutureObject
	 */
	public static function all ($s) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:192: lines 192-195
		return Future_Impl_::map(Source_Impl_::concatAll($s), function ($o) {
			$__hx__switch = ($o->index);
			if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:194: characters 19-20
				$e = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:194: characters 23-33
				return Outcome::Failure($e);
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:193: characters 20-21
				$c = $o->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:193: characters 24-34
				return Outcome::Success($c);
			}
		});
	}

	/**
	 * @param StreamObject $s
	 * @param \Closure $rescue
	 * 
	 * @return StreamObject
	 */
	public static function idealize ($s, $rescue) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:223: characters 5-69
		return Source_Impl_::chunked($s)->idealize($rescue);
	}

	/**
	 * @param StreamObject $s
	 * @param StreamParserObject $p
	 * 
	 * @return FutureObject
	 */
	public static function parse ($s, $p) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:198: lines 198-201
		return Future_Impl_::map(StreamParser_Impl_::parse($s, $p), function ($r) {
			$__hx__switch = ($r->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:199: characters 19-23
				$data = $r->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:199: characters 25-29
				$rest = $r->params[1];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:199: characters 40-60
				$this1 = new MPair($data, $rest);
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:199: characters 32-61
				return Outcome::Success($this1);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:200: characters 23-24
				$_g = $r->params[1];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:200: characters 20-21
				$e = $r->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:200: characters 38-48
				return Outcome::Failure($e);
			} else if ($__hx__switch === 2) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:200: characters 34-35
				$e = $r->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:200: characters 38-48
				return Outcome::Failure($e);
			}
		});
	}

	/**
	 * @param StreamObject $s
	 * @param StreamParserObject $p
	 * 
	 * @return StreamObject
	 */
	public static function parseStream ($s, $p) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:220: characters 5-42
		return StreamParser_Impl_::parseStream($s, $p);
	}

	/**
	 * @param StreamObject $src
	 * @param ChunkObject $delim
	 * 
	 * @return object
	 */
	public static function split ($src, $delim) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:204: characters 5-45
		$s = RealSourceTools::parse($src, new Splitter($delim));
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:207: lines 207-210
		$tmp = Stream_Impl_::promise(Promise_Impl_::next($s, Next_Impl_::ofSafeSync(function ($p) use (&$src) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:207: characters 116-119
			$_g = $p->a;
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:208: characters 19-24
				$chunk = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:208: characters 27-45
				return new Single(new LazyConst($chunk));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:209: characters 20-23
				return $src;
			}
		})));
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:211: lines 211-214
		$tmp1 = Promise_Impl_::next($s, function ($p) use (&$delim) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:211: characters 51-54
			$_g = $p->a;
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:212: characters 19-20
				$_g1 = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:212: characters 9-28
				return new SyncFuture(new LazyConst(Outcome::Success($delim)));
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:213: characters 9-62
				return new SyncFuture(new LazyConst(Outcome::Failure(new TypedError(404, "Delimiter not found", new _HxAnon_RealSourceTools0("tink/io/Source.hx", 213, "tink.io.RealSourceTools", "split")))));
			}
		});
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:206: lines 206-216
		return new _HxAnon_RealSourceTools1($tmp, $tmp1, Stream_Impl_::promise(Promise_Impl_::next($s, Next_Impl_::ofSafeSync(function ($p) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:215: characters 101-111
			return $p->b;
		}))));
	}
}

class _HxAnon_RealSourceTools0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

class _HxAnon_RealSourceTools1 extends HxAnon {
	function __construct($before, $delimiter, $after) {
		$this->before = $before;
		$this->delimiter = $delimiter;
		$this->after = $after;
	}
}

Boot::registerClass(RealSourceTools::class, 'tink.io.RealSourceTools');
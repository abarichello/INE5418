<?php
/**
 */

namespace tink\io;

use \tink\chunk\ChunkObject;
use \php\_Boot\HxAnon;
use \php\Boot;
use \tink\io\_Source\Source_Impl_;
use \tink\streams\StreamObject;
use \tink\io\_StreamParser\StreamParser_Impl_;
use \tink\core\Outcome;
use \tink\core\_Future\Future_Impl_;
use \tink\core\MPair;
use \tink\core\_Future\FutureObject;

class IdealSourceTools {
	/**
	 * @param StreamObject $s
	 * 
	 * @return FutureObject
	 */
	public static function all ($s) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:235: lines 235-237
		return Future_Impl_::map(Source_Impl_::concatAll($s), function ($o) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:236: characters 20-21
			$c = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:236: characters 24-25
			return $c;
		});
	}

	/**
	 * @param StreamObject $s
	 * @param StreamParserObject $p
	 * 
	 * @return FutureObject
	 */
	public static function parse ($s, $p) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:240: lines 240-243
		return Future_Impl_::map(StreamParser_Impl_::parse($s, $p), function ($r) {
			$__hx__switch = ($r->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:241: characters 19-23
				$data = $r->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:241: characters 25-29
				$rest = $r->params[1];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:241: characters 40-60
				$this1 = new MPair($data, $rest);
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:241: characters 32-61
				return Outcome::Success($this1);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:242: characters 23-24
				$_g = $r->params[1];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:242: characters 20-21
				$e = $r->params[0];
				#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:242: characters 27-37
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
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:246: characters 5-42
		return StreamParser_Impl_::parseStream($s, $p);
	}

	/**
	 * @param StreamObject $s
	 * @param ChunkObject $delim
	 * 
	 * @return object
	 */
	public static function split ($s, $delim) {
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:249: characters 5-63
		$s1 = RealSourceTools::split($s, $delim);
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:252: characters 15-65
		$tmp = RealSourceTools::idealize($s1->before, function ($e) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:252: characters 45-64
			return Source_Impl_::$EMPTY;
		});
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:253: characters 18-29
		$s = $s1->delimiter;
		#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:251: lines 251-255
		return new _HxAnon_IdealSourceTools0($tmp, $s, RealSourceTools::idealize($s1->after, function ($e) {
			#/home/barichello/.local/share/haxelib/tink_io/0,9,0/src/tink/io/Source.hx:254: characters 43-62
			return Source_Impl_::$EMPTY;
		}));
	}
}

class _HxAnon_IdealSourceTools0 extends HxAnon {
	function __construct($before, $delimiter, $after) {
		$this->before = $before;
		$this->delimiter = $delimiter;
		$this->after = $after;
	}
}

Boot::registerClass(IdealSourceTools::class, 'tink.io.IdealSourceTools');
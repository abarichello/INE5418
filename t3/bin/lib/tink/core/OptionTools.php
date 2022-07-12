<?php
/**
 */

namespace tink\core;

use \php\_Boot\HxAnon;
use \tink\core\_Lazy\LazyObject;
use \php\Boot;
use \haxe\Exception;
use \haxe\ds\Option as DsOption;
use \tink\core\_Lazy\Lazy_Impl_;

class OptionTools {
	/**
	 *  Returns `true` if the option is `Some` and the value is equal to `v`, otherwise `false`
	 * 
	 * @param DsOption $o
	 * @param mixed $v
	 * 
	 * @return bool
	 */
	public static function equals ($o, $v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:84: characters 12-60
		if ($o->index === 0) {
			$v1 = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:84: characters 49-59
			return Boot::equal($v1, $v);
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:84: characters 12-60
			return false;
		}
	}

	/**
	 *  Returns `Some(value)` if the option is `Some` and the filter function evaluates to `true`, otherwise `None`
	 * 
	 * @param DsOption $o
	 * @param \Closure $f
	 * 
	 * @return DsOption
	 */
	public static function filter ($o, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:66: lines 66-69
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:67: characters 17-21
			if ($f($o->params[0]) === false) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:67: characters 33-37
				return DsOption::None();
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:68: characters 16-17
				return $o;
			}
		} else {
			return $o;
		}
	}

	/**
	 *  Transforms the option value with a transform function
	 *  Different from `map`, the transform function of `flatMap` returns an `Option`
	 * 
	 * @param DsOption $o
	 * @param \Closure $f
	 * 
	 * @return DsOption
	 */
	public static function flatMap ($o, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:101: lines 101-104
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:102: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:102: characters 21-25
			return $f($v);
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:103: characters 16-20
			return DsOption::None();
		}
	}

	/**
	 * @param DsOption $o
	 * @param object $pos
	 * 
	 * @return mixed
	 */
	public static function force ($o, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:9: characters 12-24
		if ($o->index === 0) {
			$v = $o->params[0];
			return $v;
		} else {
			throw Exception::thrown(new TypedError(404, "Some value expected but none found", $pos));
		}
	}

	/**
	 *  Creates an iterator from the option.
	 *  The iterator has one item if the option is `Some`, and no items if it is `None`
	 * 
	 * @param DsOption $o
	 * 
	 * @return OptionIter
	 */
	public static function iterator ($o) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:111: characters 5-29
		return new OptionIter($o);
	}

	/**
	 *  Transforms the option value with a transform function
	 *  Different from `flatMap`, the transform function of `map` returns a plain value
	 * 
	 * @param DsOption $o
	 * @param \Closure $f
	 * 
	 * @return DsOption
	 */
	public static function map ($o, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:91: lines 91-94
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:92: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:92: characters 21-31
			return DsOption::Some($f($v));
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:93: characters 16-20
			return DsOption::None();
		}
	}

	/**
	 *  Extracts the value if the option is `Some`, uses the fallback value otherwise
	 * 
	 * @param DsOption $o
	 * @param LazyObject $l
	 * 
	 * @return mixed
	 */
	public static function or ($o, $l) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:39: lines 39-42
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:40: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:40: characters 21-22
			return $v;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:41: characters 16-23
			return Lazy_Impl_::get($l);
		}
	}

	/**
	 *  Extracts the value if the option is `Some`, otherwise `null`
	 * 
	 * @param DsOption $o
	 * 
	 * @return mixed
	 */
	public static function orNull ($o) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:57: lines 57-60
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:58: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:58: characters 21-22
			return $v;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:59: characters 16-20
			return null;
		}
	}

	/**
	 *  Extracts the value if the option is `Some`, uses the fallback value otherwise
	 * 
	 * @param DsOption $o
	 * @param LazyObject $fallback
	 * 
	 * @return DsOption
	 */
	public static function orTry ($o, $fallback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:48: lines 48-51
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:49: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:49: characters 21-22
			return $o;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:50: characters 16-30
			return Lazy_Impl_::get($fallback);
		}
	}

	/**
	 *  Returns `true` if the option is `Some` and the filter function evaluates to `true`, otherwise `false`
	 * 
	 * @param DsOption $o
	 * @param \Closure $f
	 * 
	 * @return bool
	 */
	public static function satisfies ($o, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:75: lines 75-78
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:76: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:76: characters 21-25
			return $f($v);
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:77: characters 16-21
			return false;
		}
	}

	/**
	 *  Extracts the value if the option is `Some`, throws an `Error` otherwise
	 * 
	 * @param DsOption $o
	 * @param object $pos
	 * 
	 * @return mixed
	 */
	public static function sure ($o, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:15: lines 15-20
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:16: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:17: characters 9-10
			return $v;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:19: characters 9-14
			throw Exception::thrown(new TypedError(404, "Some value expected but none found", $pos));
		}
	}

	/**
	 *  Creates an array from the option.
	 *  The array has one item if the option is `Some`, and no items if it is `None`
	 * 
	 * @param DsOption $o
	 * 
	 * @return mixed[]|\Array_hx
	 */
	public static function toArray ($o) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:118: lines 118-121
		if ($o->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:119: characters 17-18
			$v = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:119: characters 21-24
			return \Array_hx::wrap([$v]);
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:120: characters 16-18
			return new \Array_hx();
		}
	}

	/**
	 *  Creates an `Outcome` from an `Option`, with made-up `Failure` information
	 * 
	 * @param DsOption $o
	 * @param object $pos
	 * 
	 * @return Outcome
	 */
	public static function toOutcome ($o, $pos = null) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:27: lines 27-32
		$__hx__switch = ($o->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:28: characters 19-24
			$value = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:29: characters 11-25
			return Outcome::Success($value);
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Option.hx:31: characters 11-124
			return Outcome::Failure(new TypedError(404, "Some value expected but none found in " . ($pos->fileName??'null') . "@line " . ($pos->lineNumber??'null'), new _HxAnon_OptionTools0("tink/core/Option.hx", 31, "tink.core.OptionTools", "toOutcome")));
		}
	}
}

class _HxAnon_OptionTools0 extends HxAnon {
	function __construct($fileName, $lineNumber, $className, $methodName) {
		$this->fileName = $fileName;
		$this->lineNumber = $lineNumber;
		$this->className = $className;
		$this->methodName = $methodName;
	}
}

Boot::registerClass(OptionTools::class, 'tink.core.OptionTools');
<?php
/**
 */

namespace tink\core;

use \tink\core\_Lazy\LazyObject;
use \tink\core\_Future\SyncFuture;
use \php\Boot;
use \haxe\Exception;
use \haxe\ds\Option as DsOption;
use \tink\core\_Lazy\LazyConst;
use \tink\core\_Lazy\Lazy_Impl_;
use \tink\core\_Future\FutureObject;
use \tink\core\_Outcome\OutcomeMapper_Impl_;

class OutcomeTools {
	/**
	 *  Try to run `f` and wraps the result in `Success`,
	 *  thrown exceptions are transformed by `report` then wrapped into a `Failure`
	 * 
	 * @param \Closure $f
	 * @param \Closure $report
	 * 
	 * @return Outcome
	 */
	public static function attempt ($f, $report) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:142: lines 142-144
		try {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:142: characters 11-23
			return Outcome::Success($f());
		} catch(\Throwable $_g) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:143: characters 14-15
			$e = Exception::caught($_g)->unwrap();
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:144: characters 9-27
			return Outcome::Failure($report($e));
		}
	}

	/**
	 *   Returns `true` if the outcome is `Some` and the value is equal to `v`, otherwise `false`
	 * 
	 * @param Outcome $outcome
	 * @param mixed $to
	 * 
	 * @return bool
	 */
	public static function equals ($outcome, $to) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:82: lines 82-85
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:83: characters 22-26
			$data = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:83: characters 29-39
			return Boot::equal($data, $to);
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:84: characters 22-23
			$_g = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:84: characters 26-31
			return false;
		}
	}

	/**
	 *  Transforms the outcome with a transform function
	 *  Different from `map`, the transform function of `flatMap` returns an `Outcome`
	 * 
	 * @param Outcome $o
	 * @param object $mapper
	 * 
	 * @return Outcome
	 */
	public static function flatMap ($o, $mapper) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:115: characters 5-27
		return OutcomeMapper_Impl_::apply($mapper, $o);
	}

	/**
	 * @param Outcome $o
	 * 
	 * @return Outcome
	 */
	public static function flatten ($o) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:147: lines 147-150
		$__hx__switch = ($o->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:149: characters 20-30
			$_g = $o->params[0];
			$__hx__switch = ($_g->index);
			if ($__hx__switch === 0) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:148: characters 28-29
				$d = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:148: characters 33-43
				return Outcome::Success($d);
			} else if ($__hx__switch === 1) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:149: characters 28-29
				$f = $_g->params[0];
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:149: characters 46-56
				return Outcome::Failure($f);
			}
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:149: characters 42-43
			$f = $o->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:149: characters 46-56
			return Outcome::Failure($f);
		}
	}

	/**
	 *  Returns `true` if the outcome is `Success`
	 * 
	 * @param Outcome $outcome
	 * 
	 * @return bool
	 */
	public static function isSuccess ($outcome) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:104: lines 104-107
		if ($outcome->index === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:105: characters 22-23
			$_g = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:105: characters 26-30
			return true;
		} else {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:106: characters 18-23
			return false;
		}
	}

	/**
	 *  Transforms the outcome with a transform function
	 *  Different from `flatMap`, the transform function of `map` returns a plain value
	 * 
	 * @param Outcome $outcome
	 * @param \Closure $transform
	 * 
	 * @return Outcome
	 */
	public static function map ($outcome, $transform) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:92: lines 92-97
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:93: characters 22-23
			$a = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:94: characters 11-32
			return Outcome::Success($transform($a));
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:95: characters 22-23
			$f = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:96: characters 11-21
			return Outcome::Failure($f);
		}
	}

	/**
	 * @param Outcome $outcome
	 * @param \Closure $f
	 * 
	 * @return FutureObject
	 */
	public static function next ($outcome, $f) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:131: lines 131-134
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:132: characters 20-21
			$v = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:132: characters 24-28
			return $f($v);
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:133: characters 20-21
			$e = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:133: characters 7-25
			return new SyncFuture(new LazyConst(Outcome::Failure($e)));
		}
	}

	/**
	 *  Extracts the value if the option is `Success`, uses the fallback value otherwise
	 * 
	 * @param Outcome $outcome
	 * @param LazyObject $fallback
	 * 
	 * @return mixed
	 */
	public static function or ($outcome, $fallback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:63: lines 63-66
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:64: characters 22-26
			$data = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:64: characters 29-33
			return $data;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:65: characters 22-23
			$_g = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:65: characters 26-40
			return Lazy_Impl_::get($fallback);
		}
	}

	/**
	 *  Extracts the value if the option is `Success`, otherwise `null`
	 * 
	 * @param Outcome $outcome
	 * 
	 * @return mixed
	 */
	public static function orNull ($outcome) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:49: lines 49-52
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:50: characters 22-26
			$data = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:50: characters 29-33
			return $data;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:51: characters 22-23
			$_g = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:51: characters 26-30
			return null;
		}
	}

	/**
	 *  Extracts the value if the option is `Success`, uses the fallback `Outcome` otherwise
	 * 
	 * @param Outcome $outcome
	 * @param LazyObject $fallback
	 * 
	 * @return Outcome
	 */
	public static function orTry ($outcome, $fallback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:73: lines 73-76
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:74: characters 22-23
			$_g = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:74: characters 26-33
			return $outcome;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:75: characters 22-23
			$_g = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:75: characters 26-40
			return Lazy_Impl_::get($fallback);
		}
	}

	/**
	 * @param Outcome $outcome
	 * @param LazyObject $fallback
	 * 
	 * @return mixed
	 */
	public static function orUse ($outcome, $fallback) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:56: characters 5-33
		return OutcomeTools::or($outcome, $fallback);
	}

	/**
	 *  Extracts the value if the outcome is `Success`, throws the `Failure` contents otherwise
	 * 
	 * @param Outcome $outcome
	 * 
	 * @return mixed
	 */
	public static function sure ($outcome) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:24: lines 24-32
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:25: characters 22-26
			$data = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:26: characters 11-15
			return $data;
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:27: characters 22-29
			$failure = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:28: characters 18-40
			$_g = TypedError::asError($failure);
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:29: lines 29-30
			if ($_g === null) {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:29: characters 24-29
				throw Exception::thrown($failure);
			} else {
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:30: characters 18-19
				$e = $_g;
				#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:30: characters 21-34
				return $e->throwSelf();
			}
		}
	}

	/**
	 *  Like `map` but with a plain value instead of a transform function, thus discarding the orginal result
	 * 
	 * @param Outcome $outcome
	 * @param mixed $v
	 * 
	 * @return Outcome
	 */
	public static function swap ($outcome, $v) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:123: lines 123-128
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:124: characters 22-23
			$a = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:125: characters 11-21
			return Outcome::Success($v);
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:126: characters 22-23
			$f = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:127: characters 11-21
			return Outcome::Failure($f);
		}
	}

	/**
	 *  Creates an `Option` from this `Outcome`, discarding the `Failure` information
	 * 
	 * @param Outcome $outcome
	 * 
	 * @return DsOption
	 */
	public static function toOption ($outcome) {
		#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:39: lines 39-42
		$__hx__switch = ($outcome->index);
		if ($__hx__switch === 0) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:40: characters 22-26
			$data = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:40: characters 29-46
			return DsOption::Some($data);
		} else if ($__hx__switch === 1) {
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:41: characters 22-23
			$_g = $outcome->params[0];
			#/home/barichello/.local/share/haxelib/tink_core/2,0,2/src/tink/core/Outcome.hx:41: characters 26-37
			return DsOption::None();
		}
	}
}

Boot::registerClass(OutcomeTools::class, 'tink.core.OutcomeTools');